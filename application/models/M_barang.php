<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_barang extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    function make_query()
    {

        $table = "barang";
        $select_column = "*";

        $this->db->from($table);

        $this->db->select($select_column);
        $i = 0;
        $order = array('id_barang' => 'asc');
        $column_search = array('nama_barang');
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
        // $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.

        $this->db->order_by('nama_barang', 'ASC');
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
        $column_search = array('nama_barang');
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

    function alldata()
    {
        $this->make_query();
        $query = $this->db->get();
        // $a = $this->db->last_query($query);
        // print_r($a);
        // exit();

        return $query->result();
    }

    function get_all_data()
    {

        $table = "barang";
        $select_column = "*";

        $this->db->select($select_column);

        $this->db->from($table);
        $i = 0;
        $column_search = array('nama_barang');
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

        return $this->db->count_all_results();
    }

    function insertdata($data)
    {
        $exe = $this->db->insert('barang', $data);
        $id_det_aset = $this->db->insert_id();

        if ($exe) {
            return '1';
        } else {
            return '0';
        }
    }

    function update($data, $id)
    {
        $exe = $this->db->where('id_barang', $id);
        $exe = $this->db->update('barang', $data);

        if ($exe) {
            return '1';
        } else {
            return '0';
        }
    }

    function hapus_data($id, $table)
    {
        $this->db->where('id_barang', $id);
        $this->db->delete($table);
    }


    function get_detail($id)
    {
        $id = $id;
        $table = "barang";
        $select_column = array("*");
        $this->db->select($select_column);
        $this->db->from($table);
        $this->db->where('id_barang', $id);
        $query = $this->db->get();

        return $query->row_array();
    }
}
