<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }



    public function buat_kode_agenda()
    {

        $this->db->select('RIGHT(transaksi.surat_jalan,2) as kode', FALSE);
        $this->db->order_by('id_transaksi', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('transaksi'); //cek dulu apakah ada sudah ada kode di tabel.
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada
            $kode = 1;
        }


        $kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
        // $kodejadi = "JADWAL/" . date('Y/m/d') . "/" . $kodemax; // hasilnya ODJ-9921-0001 dst.
        $kodejadi = "SJ-0" . $kodemax; // hasilnya ODJ-9921-0001 dst.


        return $kodejadi;
    }


    function insertdata($data)
    {
        $exe = $this->db->insert('transaksi', $data);
        $id_transaksi = $this->db->insert_id();

        if ($exe) {
            return $id_transaksi;
        } else {
            return '0';
        }
    }


    // function barang_masuk($subDataArray){

    //     var_dump($subDataArray);
    //     exit();

    //     $exe = $this->db->where('id_barang', $id);
    //     $exe = $this->db->update('barang', $qty);
 
    //     if ($exe) {
    //         return '1';
    //     } else {
    //         return '0';
    //     }
    // }


    function make_query()
    {

        $table = "transaksi";
        $select_column = array(
            "transaksi.surat_jalan",
            "transaksi.id_pelanggan",
            "transaksi.id_transaksi",
            "transaksi.grand_total",
            "transaksi.jenis_transaksi",
            "transaksi.jenis_bayar",
            "transaksi.keterangan",
            "transaksi.jenis",
            "transaksi.tgl_transaksi",
            "transaksi_det.id_det_transaksi",
            "transaksi_det.id_transaksi",
            "transaksi_det.id_barang",
            "transaksi_det.qty",
            "transaksi_det.det_harga",
            "transaksi_det.keterangan",
            "transaksi_det.total_harga",
            "pelanggan.nama_pelanggan",
            "pelanggan.id_pelanggan",
            "barang.id_barang",
            "barang.nama_barang"
        );

        $this->db->select($select_column);
        $this->db->from($table);

        $i = 0;

        $this->db->join('transaksi_det', 'transaksi_det.id_transaksi = transaksi.id_transaksi');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan');
        $this->db->join('barang', 'transaksi_det.id_barang = barang.id_barang');
        // $this->db->join('villages', 'villages.id = m_aset_baru.id_villages');

        $order = array('transaksi.id_transaksi' => 'asc');
        $column_search = array('surat_jalan', 'nama_pelanggan', 'alamat_pelanggan');
        // $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.

        // $this->db->group_end();
        foreach ($column_search as $item) // loop column 
        {
            if (@$_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.

                    $this->db->like($item, $_POST['search']['value']);
                } else {

                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i) //last loop

                    $this->db->group_end(); //close bracket
            }

            $i++;
        }

        $this->db->group_by('transaksi.id_transaksi');
        $this->db->order_by('transaksi.id_transaksi', 'ASC');
    }



    function alldata()
    {
        $this->make_query();
        $query = $this->db->get();


        return $query->result();
    }
    function make_datatables()
    {

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
        $column_search = array('surat_jalan', 'nama_pelanggan', 'alamat_pelanggan');
        foreach ($column_search as $item) // loop column 
        {
            if (@$_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
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

        $table = "transaksi";
        $select_column = array(
            "transaksi.surat_jalan",
            "transaksi.id_pelanggan",
            "transaksi.id_transaksi",
            "transaksi.grand_total",
            "transaksi.keterangan",
            "transaksi.jenis",
            "transaksi.tgl_transaksi",
            "transaksi_det.id_det_transaksi",
            "transaksi_det.id_transaksi",
            "transaksi_det.id_barang",
            "transaksi_det.qty",
            "transaksi_det.det_harga",
            "transaksi_det.keterangan",
            "transaksi_det.total_harga",
            "pelanggan.nama_pelanggan",
            "pelanggan.id_pelanggan",
            "barang.id_barang",
            "barang.nama_barang"
        );

        $this->db->select($select_column);
        $this->db->from($table);

        $i = 0;

        $this->db->join('transaksi_det', 'transaksi_det.id_transaksi = transaksi.id_transaksi');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan');
        $this->db->join('barang', 'transaksi_det.id_barang = barang.id_barang');
        // $this->db->join('villages', 'villages.id = m_aset_baru.id_villages');

        $order = array('transaksi.id_transaksi' => 'asc');
        $column_search = array('surat_jalan', 'nama_pelanggan', 'alamat_pelanggan');
        foreach ($column_search as $item) // loop column 
        {
            if (@$_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.

                    $this->db->like($item, $_POST['search']['value']);
                } else {

                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i) //last loop

                    $this->db->group_end(); //close bracket
            }
            $i++;
        }


        $this->db->group_by('transaksi.id_transaksi');
        $query = $this->db->get();

        return $this->db->count_all_results();
    }


    function detail($id)
    {

        $id = $id;

        $table = "transaksi";
        $select_column = array(
            "transaksi.surat_jalan",
            "transaksi.id_pelanggan",
            "transaksi.id_transaksi",
            "transaksi.grand_total",
            "transaksi.keterangan",
            "transaksi.jenis",
            "transaksi.tgl_transaksi",
            "transaksi_det.id_det_transaksi",
            "transaksi_det.id_transaksi",
            "transaksi_det.id_barang",
            "transaksi_det.qty",
            "transaksi_det.stok_det",
            "transaksi_det.sisa",
            "transaksi_det.det_harga",
            "transaksi_det.keterangan",
            "transaksi_det.total_harga",
            "pelanggan.nama_pelanggan",
            "pelanggan.id_pelanggan",
            "barang.id_barang",
            "barang.nama_barang"
        );

        $this->db->select($select_column);
        $this->db->from($table);

        $i = 0;

        $this->db->join('transaksi_det', 'transaksi_det.id_transaksi = transaksi.id_transaksi');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan');
        $this->db->join('barang', 'transaksi_det.id_barang = barang.id_barang');
        // $this->db->join('villages', 'villages.id = m_aset_baru.id_villages');
        $this->db->where('transaksi.id_transaksi', $id);

        $query = $this->db->get();
        // $a = $this->db->last_query($query);
        // print_r($a);
        // exit();

        return $query->result();
    }


    function detail_hed($id)
    {

        $id = $id;

        $table = "transaksi";
        $select_column = array(
            "transaksi.surat_jalan",
            "transaksi.id_pelanggan",
            "transaksi.id_transaksi",
            "transaksi.grand_total",
            "transaksi.jenis_bayar",
            "transaksi.jenis_transaksi",
            "transaksi.keterangan",
            "transaksi.jenis",
            "transaksi.tgl_transaksi",
            "transaksi_det.id_det_transaksi",
            "transaksi_det.id_transaksi",
            "transaksi_det.id_barang",
            "transaksi_det.qty",
            "transaksi_det.det_harga",
            "transaksi_det.keterangan",
            "transaksi_det.total_harga",
            "pelanggan.nama_pelanggan",
            "pelanggan.id_pelanggan",
            "barang.id_barang",
            "barang.nama_barang"
        );

        $this->db->select($select_column);
        $this->db->from($table);

        $i = 0;

        $this->db->join('transaksi_det', 'transaksi_det.id_transaksi = transaksi.id_transaksi');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan');
        $this->db->join('barang', 'transaksi_det.id_barang = barang.id_barang');
        // $this->db->join('villages', 'villages.id = m_aset_baru.id_villages');
        $this->db->where('transaksi.id_transaksi', $id);

        $query = $this->db->get();
        // $a = $this->db->last_query($query);
        // print_r($a);
        // exit();

        return $query->row_array();
    }

    
    function update_stok($data, $id)
    {
        $exe = $this->db->where('id_barang', $id);
        $exe = $this->db->update('barang', $data);
// $a = $this->db->last_query($exe);
//         print_r($a);
//         exit();
        if ($exe) {
            return '1';
        } else {
            return '0';
        }
    }
}
