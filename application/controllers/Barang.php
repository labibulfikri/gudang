<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_barang');
        // $this->load->model('m_home');
    }
    public function index()
    {

        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {
            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar',
                'sidebar' => 'layout/sidebar',
                'content' => 'data_barang',
                'footer' => 'layout/footer',
                'title' => ' Selamat Datang Di aplikasi Gudang'
            );
            $this->load->view($data['masterpage'], $data);
        }
    }

    function fetch_barang()
    {

        $fetch_data = $this->m_barang->make_datatables();

        $data = array();
        $no = $_POST['start'];
        foreach ($fetch_data as $row) {
            $no++;
            $sub_array = array();

            $sub_array[] = $no;
            $sub_array[] = $row->nama_barang;
            $sub_array[] = $row->stok;
            $sub_array[] = $row->harga;
            $sub_array[] = '<a href="' . base_url('aset/detail2/' . $row->id_barang . '') . ' "" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="tombolEdit" data-id="' . $row->id_barang . '" data-nama_barang="' . $row->nama_barang . '" data-harga="' . $row->harga . '" data-stok="' . $row->stok . '"> <i class="far fa-edit"> Edit Data</i> </a> | <button role="button" class="tombol_delete btn btn-danger " id="' . $row->id_barang . '"> Hapus </button>';

            // <a  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="tombolEdit" data-id="' .  $row->idnya . '" data-lokasi="' .  $row->lokasi_pencatatan . '" data-toggle="modal" data-registerbaru="' .  $row->register_baru . '" data-registerlama="' .  $row->register_lama . '" data-alamat="' .  $row->alamat . '" data-masalah="' .  $row->masalah . '" data-luas="' .  $row->luas . '"  data-luas="' .  $row->luas . '" data-tahun="' .  $row->tahun_pengadaan . '"  data-penggunaan="' .  $row->penggunaan . '" data-masalah="' .  $row->masalah . '" >Lihat Data</a> 
            $data[] = $sub_array;
        }
        $output = array(
            "draw"                      =>     intval($_POST["draw"]),
            "recordsTotal"              =>     $this->m_barang->get_all_data(),
            "recordsFiltered"           =>     $this->m_barang->get_filtered_data(),
            "data"                      =>     $data
        );
        echo json_encode($output);
    }

    function tambah()
    {
        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {
            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar',
                'sidebar' => 'layout/sidebar',
                'content' => 'tambah_barang',
                'footer' => 'layout/footer',
                'title' => ' Selamat Datang Di aplikasi Gudang'
            );
            $this->load->view($data['masterpage'], $data);
        }
    }


    function form_add()
    {

        $data = array(
            'nama_barang' => $this->input->post('nama_barang'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
        );
        $exe = $this->m_barang->insertdata($data);

        if ($exe > 0) {
            echo "<script type='text/javascript'>
        alert(' BERHASIL DITAMBAHKAN ');
        window.location.href ='" . base_url('barang') . "';
        </script>";
        }
    }


    function update()
    {
        $id = $this->input->post('id_barang');

        $data = array(
            'nama_barang' => $this->input->post('nama_barang'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok')
        );
        $exe =  $this->m_barang->update($data, $id);


        if ($exe > 0) {
            echo "<script type='text/javascript'>
        alert('UPDATE BERHASIL');
        window.location.href ='" . base_url('barang') . "';
        </script>";
        }
    }

    function delete()
    {
        $id_barang = $this->input->post('id_barang');
        $del = $this->m_barang->hapus_data($id_barang, 'barang');
    }

    function detail_brg()
    {
        $id = $this->input->post('id');
        $data = $this->m_barang->get_detail($id);
        echo json_encode($data);
    }
}
