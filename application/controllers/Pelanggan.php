<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_pelanggan');
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
                'content' => 'data_pelanggan',
                'footer' => 'layout/footer',
                'title' => ' Selamat Datang Di aplikasi Gudang'
            );
            $this->load->view($data['masterpage'], $data);
        }
    }

    function fetch_pelanggan()
    {

        $fetch_data = $this->m_pelanggan->make_datatables();

        $data = array();
        $no = $_POST['start'];
        foreach ($fetch_data as $row) {
            $no++;
            $sub_array = array();

            $sub_array[] = $no;
            $sub_array[] = $row->nama_pelanggan;
            $sub_array[] = $row->alamat_pelanggan;
            $sub_array[] = '<a href="' . base_url('aset/detail2/' . $row->id_pelanggan . '') . ' "" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="tombolEdit" data-id="' . $row->id_pelanggan . '" data-nama_pelanggan="' . $row->nama_pelanggan . '" data-alamat_pelanggan="' . $row->alamat_pelanggan . '"> <i class="far fa-edit"> Edit Data</i> </a> | <button role="button" class="tombol_delete btn btn-danger " id="' . $row->id_pelanggan . '"> Hapus </button>';

            // <a  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="tombolEdit" data-id="' .  $row->idnya . '" data-lokasi="' .  $row->lokasi_pencatatan . '" data-toggle="modal" data-registerbaru="' .  $row->register_baru . '" data-registerlama="' .  $row->register_lama . '" data-alamat="' .  $row->alamat . '" data-masalah="' .  $row->masalah . '" data-luas="' .  $row->luas . '"  data-luas="' .  $row->luas . '" data-tahun="' .  $row->tahun_pengadaan . '"  data-penggunaan="' .  $row->penggunaan . '" data-masalah="' .  $row->masalah . '" >Lihat Data</a> 
            $data[] = $sub_array;
        }
        $output = array(
            "draw"                      =>     intval($_POST["draw"]),
            "recordsTotal"              =>     $this->m_pelanggan->get_all_data(),
            "recordsFiltered"           =>     $this->m_pelanggan->get_filtered_data(),
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
                'content' => 'tambah_pelanggan',
                'footer' => 'layout/footer',
                'title' => ' Selamat Datang Di aplikasi Gudang'
            );
            $this->load->view($data['masterpage'], $data);
        }
    }


    function form_add()
    {

        $data = array(
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
            'alamat_pelanggan' => $this->input->post('alamat_pelanggan')
        );
        $exe = $this->m_pelanggan->insertdata($data);
     
        if ($exe > 0) {
            echo "<script type='text/javascript'>
        alert(' BERHASIL DITAMBAHKAN ');
        window.location.href ='" . base_url('pelanggan') . "';
        </script>";
        }
    }


    function update()
    {
        $id = $this->input->post('id_pelanggan');

        $data = array(
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
            'alamat_pelanggan' => $this->input->post('alamat_pelanggan')
        );
        $exe =  $this->m_pelanggan->update($data, $id);


        if ($exe > 0) {
            echo "<script type='text/javascript'>
        alert('UPDATE BERHASIL');
        window.location.href ='" . base_url('pelanggan') . "';
        </script>";
        }
    }

    function delete()
    {
        $id_pelanggan = $this->input->post('id_pelanggan');
        $del = $this->m_pelanggan->hapus_data($id_pelanggan, 'pelanggan');
    }
}
