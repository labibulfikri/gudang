<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_aset extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    function make_query()
    {

        $table = "m_aset_baru";
        $select_column = "           
            m_aset_baru.id_aset as idnya,
            m_aset_baru.register_baru,
            m_aset_baru.register_lama,
            m_aset_baru.masalah,
            m_aset_baru.lokasi_pencatatan,
            m_aset_baru.luas,
            m_aset_baru.penggunaan,
            m_aset_baru.tahun_pengadaan,
            m_aset_baru.terbit,
            m_aset_baru.alamat,
            m_aset_det.id_aset,  
            status_map
            
        FROM
            `m_aset_baru`
            LEFT JOIN (SELECT * FROM m_aset_det GROUP BY id_det_aset, id_aset ORDER BY status_map asc ) m_aset_det ON (
                m_aset_det.id_aset = m_aset_baru.id_aset)

             
 
    ";


        $this->db->select($select_column);
        $i = 0;
        $order = array('id_aset' => 'asc');
        $column_search = array('m_aset_baru.register_baru', 'register_lama', 'alamat');
        // $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.

        // $this->db->group_end();
        foreach ($column_search as $item) // loop column 
        {
            if (@$_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->group_by('idnya');
                    $this->db->group_by('m_aset_baru.id_aset');

                    $this->db->order_by('status_map', 'DESC');
                    $this->db->like($item, $_POST['search']['value']);
                } else {

                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i) //last loop

                    //     $this->db->group_by('idnya');
                    // $this->db->group_by('m_aset_baru.id_aset');

                    // $this->db->order_by('status_map', 'DESC');
                    $this->db->group_end(); //close bracket
            }

            $i++;
        }
        // $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
        $this->db->group_by('idnya');
        $this->db->group_by('m_aset_baru.id_aset');

        $this->db->order_by('status_map', 'DESC');

        // if (isset($_POST["order"])) {

        //     $this->db->group_by('m_aset_det.id_aset');
        //     $this->db->order_by('status_map', 'DESC');

        //     // $this->db->group_by('kegiatan_hed.id_kegiatan_hed');
        // } else {

        //     $this->db->group_by('m_aset_det.id_aset');
        //     $this->db->order_by('status_map', 'DESC');
        //     // $this->db->group_by('kegiatan_hed.id_kegiatan_hed');
        // }
    }

    function make_datatables()
    {

        // $id = $id;
        $this->make_query();


        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        // $a = $this->db->last_query($query);
        // print_r($a);
        // exit();

        return $query->result();
    }

    function get_filtered_data()
    {
        // $id = $id;
        $this->make_query();
        $i = 0;
        $column_search = array('m_aset_baru.register_baru', 'register_lama', 'alamat');
        foreach ($column_search as $item) // loop column 
        {
            if (@$_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->group_by('idnya');
                    $this->db->group_by('m_aset_baru.id_aset');

                    $this->db->order_by('status_map', 'DESC');
                    $this->db->like($item, $_POST['search']['value']);
                } else {

                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i) //last loop 
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        $query = $this->db->get();


        return $query->num_rows();
    }
    function get_all_data()
    {
        $select_column = "           
        m_aset_baru.id_aset as idnya,
        m_aset_baru.register_baru,
        m_aset_baru.register_lama,
        m_aset_baru.masalah,
        m_aset_baru.lokasi_pencatatan,
        m_aset_baru.luas,
        m_aset_baru.penggunaan,
        m_aset_baru.tahun_pengadaan,
        m_aset_baru.terbit,
        m_aset_baru.alamat,
        m_aset_det.id_aset,  
        status_map
        
    FROM
        `m_aset_baru`
        LEFT JOIN (SELECT * FROM m_aset_det GROUP BY id_det_aset, id_aset ORDER BY status_map asc ) m_aset_det ON (
            m_aset_det.id_aset = m_aset_baru.id_aset ) 
        	GROUP BY idnya, m_aset_baru.id_aset
	ORDER BY status_map desc    
        ";

        $this->db->select($select_column);
        $i = 0;
        $order = array('id_aset' => 'asc');
        $column_search = array('m_aset_det.register_baru', 'register_lama', 'alamat');
        foreach ($column_search as $item) // loop column 
        {
            if (@$_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->group_by('idnya');
                    $this->db->group_by('m_aset_baru.id_aset');
                    $this->db->order_by('status_map', 'DESC');
                    $this->db->like($item, $_POST['search']['value']);
                } else {

                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i) //last loop

                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        // if (isset($_POST["order"])) {
        //     $this->db->group_by('idnya');
        //     $this->db->group_by('m_aset_det.id_aset');
        //     $this->db->order_by('status_map', 'DESC');
        // } else {
        //     $this->db->group_by('idnya');
        //     $this->db->group_by('m_aset_det.id_aset');
        //     $this->db->order_by('status_map', 'DESC');
        // }
        $query = $this->db->get();

        return $this->db->count_all_results();
    }


    //////////////////////////////////////////////////////////


    function make_query_lap($searcMap)
    {

        $table = "m_aset_baru";
        $select_column = "           
            m_aset_baru.id_aset as idnya,
            m_aset_baru.register_baru,
            m_aset_baru.register_lama,
            m_aset_baru.masalah,
            m_aset_baru.lokasi_pencatatan,
            m_aset_baru.luas,
            m_aset_baru.penggunaan,
            m_aset_baru.tahun_pengadaan,
            m_aset_baru.terbit,
            m_aset_baru.alamat,
            m_aset_det.id_aset,  
            m_aset_baru.lokasi_bpn,  
            status_map
            
        FROM
            `m_aset_baru`";
        if ($searcMap == "3") {
            $select_column .= "  JOIN (SELECT * FROM m_aset_det GROUP BY id_aset HAVING status_map = 3 ORDER BY status_map asc ) m_aset_det ON (
                m_aset_det.id_aset = m_aset_baru.id_aset) ";
        } else if ($searcMap == "2") {

            $select_column .= "  JOIN (SELECT * FROM m_aset_det GROUP BY id_aset HAVING status_map = 2 ORDER BY status_map asc ) m_aset_det ON (
                m_aset_det.id_aset = m_aset_baru.id_aset) ";
        } else if ($searcMap == "1") {

            $select_column .= "  JOIN (SELECT * FROM m_aset_det GROUP BY id_aset HAVING status_map = 1 ORDER BY status_map asc ) m_aset_det ON (
                m_aset_det.id_aset = m_aset_baru.id_aset) ";
        } else {

            $select_column .= " LEFT JOIN (SELECT * FROM m_aset_det GROUP BY id_aset ORDER BY status_map asc ) m_aset_det ON (
                m_aset_det.id_aset = m_aset_baru.id_aset) ";
        }
        // $select_column .= "";


        $this->db->select($select_column);
        $i = 0;
        $order = array('id_aset' => 'asc');
        $column_search = array('m_aset_baru.register_baru', 'register_lama', 'alamat');



        // $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.

        // $this->db->group_end();
        foreach ($column_search as $item) // loop column 
        {
            if (@$_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->group_by('idnya');
                    $this->db->group_by('m_aset_baru.id_aset');

                    $this->db->order_by('status_map', 'DESC');
                    $this->db->like($item, $_POST['search']['value']);
                } else {

                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i) //last loop

                    //     $this->db->group_by('idnya');
                    // $this->db->group_by('m_aset_baru.id_aset');

                    // $this->db->order_by('status_map', 'DESC');
                    $this->db->group_end(); //close bracket
            }

            $i++;
        }
        // $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
        $this->db->group_by('idnya');
        $this->db->group_by('m_aset_baru.id_aset');

        $this->db->order_by('status_map', 'DESC');

        // if (isset($_POST["order"])) {

        //     $this->db->group_by('m_aset_det.id_aset');
        //     $this->db->order_by('status_map', 'DESC');

        //     // $this->db->group_by('kegiatan_hed.id_kegiatan_hed');
        // } else {

        //     $this->db->group_by('m_aset_det.id_aset');
        //     $this->db->order_by('status_map', 'DESC');
        //     // $this->db->group_by('kegiatan_hed.id_kegiatan_hed');
        // }
    }

    function make_datatables_lap($searcMap)
    {

        // $id = $id;
        $searcMap = $searcMap;


        $this->make_query_lap($searcMap);


        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        // $a = $this->db->last_query($query);
        // print_r($a);
        // exit();

        return $query->result();
    }

    function get_filtered_data_lap($searcMap)
    {
        // $id = $id;
        $searcMap = $searcMap;

        $this->make_query_lap($searcMap);
        $i = 0;
        $column_search = array('m_aset_baru.register_baru', 'register_lama', 'alamat');
        foreach ($column_search as $item) // loop column 
        {
            if (@$_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->group_by('idnya');
                    $this->db->group_by('m_aset_baru.id_aset');

                    $this->db->order_by('status_map', 'DESC');
                    $this->db->like($item, $_POST['search']['value']);
                } else {

                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i) //last loop 
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        $query = $this->db->get();


        return $query->num_rows();
    }
    function get_all_data_lap($searcMap)
    {
        $searcMap = $searcMap;

        $select_column = "           
        m_aset_baru.id_aset as idnya,
        m_aset_baru.register_baru,
        m_aset_baru.register_lama,
        m_aset_baru.masalah,
        m_aset_baru.lokasi_pencatatan,
        m_aset_baru.luas,
        m_aset_baru.penggunaan,
        m_aset_baru.tahun_pengadaan,
        m_aset_baru.terbit,
        m_aset_baru.alamat,
        m_aset_det.id_aset,  
        status_map
        
    FROM
        `m_aset_baru`
        LEFT JOIN (SELECT * FROM m_aset_det GROUP BY  id_aset";
        if ($searcMap == "3") {
            $select_column .= " HAVING status_map = 3 ";
        } else if ($searcMap == "2") {

            $select_column .= " HAVING status_map = 2 ";
        } else if ($searcMap == "1") {

            $select_column .= " HAVING status_map = 1 ";
        } else {
        }
        $select_column .= "ORDER BY status_map asc ) m_aset_det ON (
                m_aset_det.id_aset = m_aset_baru.id_aset)";

        $this->db->select($select_column);
        $i = 0;
        $order = array('id_aset' => 'asc');
        $column_search = array('m_aset_det.register_baru', 'register_lama', 'alamat');


        if ($searcMap != "") {
            $this->db->where('m_aset_det.status_map', $searcMap);
        }
        foreach ($column_search as $item) // loop column 
        {
            if (@$_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->group_by('idnya');
                    $this->db->group_by('m_aset_baru.id_aset');
                    $this->db->order_by('status_map', 'DESC');
                    $this->db->like($item, $_POST['search']['value']);
                } else {

                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i) //last loop

                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        // if (isset($_POST["order"])) {
        //     $this->db->group_by('idnya');
        //     $this->db->group_by('m_aset_det.id_aset');
        //     $this->db->order_by('status_map', 'DESC');
        // } else {
        //     $this->db->group_by('idnya');
        //     $this->db->group_by('m_aset_det.id_aset');
        //     $this->db->order_by('status_map', 'DESC');
        // }
        $query = $this->db->get();

        return $this->db->count_all_results();
    }
    ////////////////////


    function make_datatables_export($searcMap)
    {

        // $id = $id;
        $searcMap = $searcMap;


        $this->make_query_lap($searcMap);


        // if ($_POST["length"] != -1) {
        //     $this->db->limit($_POST['length'], $_POST['start']);
        // }

        $query = $this->db->get();
        // $a = $this->db->last_query($query);
        // print_r($a);
        // exit();

        return $query->result();
    }
    ///////////////////////


    function get_detail($id_aset)
    {

        $id_aset = $id_aset;

        $table = "m_aset_baru";
        $select_column = array(
            "m_aset_baru.nomor",
            "m_aset_baru.lokasi_pencatatan",
            "m_aset_baru.jenis_aset",
            "m_aset_baru.kode",
            "m_aset_baru.register_baru",
            "m_aset_baru.register_lama",
            "m_aset_baru.luas",
            "m_aset_baru.tahun_pengadaan",
            "m_aset_baru.alamat",
            "m_aset_baru.alas_hak",
            "m_aset_baru.tanggal_alas_hak",
            "m_aset_baru.no_dokumen",
            "m_aset_baru.dokumen_tanah",
            "m_aset_baru.penggunaan",
            "m_aset_baru.atas_nama",
            "m_aset_baru.asal_usul",
            "m_aset_baru.keterangan",
            "m_aset_baru.harga",
            "m_aset_baru.terbit",
            "m_aset_baru.masalah",
            "m_aset_baru.lokasi_bpn",
            "m_aset_baru.id_regencies",
            "regencies.name as nama_kota",
            "m_aset_baru.id_districts",
            "districts.name as nama_kecamatan",
            "villages.name as nama_kelurahan",
            "m_aset_baru.id_villages",
        );
        $this->db->select($select_column);
        $this->db->from($table);

        $this->db->join('m_aset_det', 'm_aset_det.id_aset = m_aset_baru.id_aset', 'left');
        $this->db->join('regencies', 'regencies.id = m_aset_baru.id_regencies', 'left');
        $this->db->join('districts', 'districts.id = m_aset_baru.id_districts', 'left');
        $this->db->join('villages', 'villages.id = m_aset_baru.id_villages', 'left');

        $this->db->where('m_aset_baru.id_aset', $id_aset);
        $query = $this->db->get();

        return $query->row_array();
    }

    function peta_bidang($id_aset)
    {

        $id_aset = $id_aset;

        $table = "m_aset_det";
        $select_column = array(
            "m_aset_det.id_det_aset",
            "m_aset_det.status_map",
            "m_aset_det.keterangan",
            "m_aset_det.register_baru",
            "m_aset_baru.register_baru",
            "m_aset_det.status",
            "m_aset_det.no_sps",
            "m_aset_det.tgl_sps",
            "m_aset_det.no_nib",
            "m_aset_det.tgl_nib",
        );
        $this->db->select($select_column);
        $this->db->from($table);


        $this->db->join('m_aset_baru', 'm_aset_baru.id_aset = m_aset_det.id_aset', 'left');
        $this->db->where('m_aset_baru.id_aset', $id_aset);
        $this->db->where('status_map', 1);
        $query = $this->db->get();


        return $query->result();
        // return $query->row_array();
    }

    function permohonan_hak($id_aset)
    {
        $table = "m_aset_det";
        $select_column = array(

            "m_aset_det.id_det_aset",
            "m_aset_det.status_map",
            "m_aset_det.register_baru",
            "m_aset_det.status",
            "m_aset_det.status_permohonan",
            "m_aset_det.tgl_sk_bpn",
            "m_aset_det.no_sk_bpn",
            "m_aset_det.tgl_penelitian",
            "m_aset_det.biaya_permohonan",
            "m_aset_det.no_sps_permohonan",
            "m_aset_det.tgl_sps_permohonan",
            "m_aset_det.keterangan_permohonan",
        );
        $this->db->select($select_column);
        $this->db->from($table);

        $this->db->join('m_aset_baru', 'm_aset_baru.id_aset = m_aset_det.id_aset', 'left');
        $this->db->where('m_aset_baru.id_aset', $id_aset);
        $this->db->where('status_map', 2);
        $query = $this->db->get();
        return $query->result();
    }


    function pendaftaran_hak($id_aset)
    {
        $table = "m_aset_det";
        $select_column = array(

            "m_aset_det.id_det_aset",
            "m_aset_det.status_map",
            "m_aset_det.register_baru",
            "m_aset_det.status_pendaftaran",
            "m_aset_det.keterangan_pendaftaran",
            "m_aset_det.tgl_sertifikat",
            "m_aset_det.no_sertifikat",
            "m_aset_det.biaya_pendaftaran",
            "m_aset_det.no_sps_pendaftaran",
            "m_aset_det.tgl_sps_pendaftaran",
        );
        $this->db->select($select_column);
        $this->db->from($table);

        $this->db->join('m_aset_baru', 'm_aset_baru.id_aset = m_aset_det.id_aset', 'left');
        $this->db->where('m_aset_baru.id_aset', $id_aset);
        $this->db->where('status_map', 3);
        $query = $this->db->get();


        return $query->result();
    }

    function hapus_data($id, $table)
    {
        $this->db->where('id_aset', $id);
        $this->db->delete($table);
    }

    function hapus_data_det($id)
    {
        $id = $id;
        $this->db->where('id_det_aset', $id);
        $this->db->delete('m_aset_det');
    }


    function update($data, $id)
    {
        $exe = $this->db->where('id_aset', $id);
        $exe = $this->db->update('m_aset_baru', $data);
        if ($exe) {
            return '1';
        } else {
            return '0';
        }
    }

    function update_det($data, $id)
    {
        $exe = $this->db->where('id_det_aset', $id);
        $exe = $this->db->update('m_aset_det', $data);

        // $a = $this->db->last_query($exe);
        // print_r($a);
        // exit();

        if ($exe) {
            return '1';
        } else {
            return '0';
        }
    }

    function insertdata($data)
    {
        $exe = $this->db->insert('m_aset_det', $data);
        $id_det_aset = $this->db->insert_id();

        if ($exe) {
            return '1';
        } else {
            return '0';
        }
    }

    function datakota($a)
    {


        $table = "regencies";
        $select_column = array(
            "regencies.id",
            "regencies.province_id",
            "regencies.name"
        );
        $this->db->select($select_column);

        if ($a == null || $a == "") {

            $this->db->where('regencies.province_id', 35);
        } else {
            $this->db->where('regencies.province_id', 35);
            $this->db->like('regencies.name', $a);
        }

        $this->db->from($table);
        $this->db->join('provinces', 'provinces.id = regencies.province_id');

        $query = $this->db->get();

        // $str = $this->db->last_query();
        // print_r($str);
        // exit();
        return $query->result();
    }

    function kecamatan()
    {


        $table = "districts";
        $select_column = array(
            "districts.id",
            "districts.regency_id",
            "districts.name"
        );
        $this->db->select($select_column);


        $this->db->where('districts.regency_id', 3578);

        $this->db->from($table);
        $this->db->join('regencies', 'regencies.id = districts.regency_id', 'left');

        $query = $this->db->get();

        // $str = $this->db->last_query();
        // print_r($str);
        // exit();
        return $query->result();
    }



    function datakecamatan($id, $search)
    {
        $table = "districts";
        $select_column = array(
            "districts.id",
            "districts.regency_id",
            "districts.name"
        );
        $this->db->select($select_column);

        if ($search == null || $search == "") {

            $this->db->where('districts.regency_id', 0);
        } else {
            // $this->db->where('regencies.province_id', 35);
            $this->db->where('districts.regency_id', $id);
            $this->db->like('districts.name', $search);
        }

        $this->db->from($table);
        $this->db->join('regencies', 'regencies.id = districts.regency_id');

        $query = $this->db->get();

        // $str = $this->db->last_query();
        // print_r($str);
        // exit();
        return $query->result();
    }


    function datakelurahan($id)
    {
        $id = $id;
        $table = "villages";
        $select_column = array(
            "villages.id as id",
            "villages.district_id",
            "villages.name"
        );
        $this->db->select($select_column);

        // $this->db->where('villages.district_id', $id);
        $this->db->where('regencies.id', 3578);
        $this->db->from($table);

        $this->db->join('districts', 'districts.id = villages.district_id');
        $this->db->join('regencies', 'regencies.id = districts.regency_id');

        $query = $this->db->get();

        // $str = $this->db->last_query();
        // print_r($str);
        // exit();
        return $query->result();
    }

    function registrasi($data)
    {

        $this->db->insert('user', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
}
