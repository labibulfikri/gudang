<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_laporan');
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
                'data' => null,
                'content' => 'data_laporan',
                'footer' => 'layout/footer',
                'title' => ' Selamat Datang Di aplikasi Gudang'
            );
            $this->load->view($data['masterpage'], $data);
        }
    }


    public function brg(){
        $tgldari = $this->input->post('tgldari');
        $tglsampai = $this->input->post('tglsampai');

        $data = $this->m_laporan->barang($tgldari,$tglsampai);
        $data = array(
            'masterpage' => 'layout/layout',
            'navbar' => 'layout/navbar',
            'sidebar' => 'layout/sidebar',
            'data' =>$data,
            'content' => 'data_laporan',
            'footer' => 'layout/footer',
            'title' => ' Selamat Datang Di aplikasi Gudang'
        );
        $this->load->view($data['masterpage'], $data);
    }


    } 
