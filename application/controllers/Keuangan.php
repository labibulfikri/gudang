<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan extends CI_Controller
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
                'bri' => null,
                'bcaplatinum' => null,
                'bcagold' => null,
                'tunai' => null,
                'content' => 'data_keuangan',
                'footer' => 'layout/footer',
                'title' => ' Selamat Datang Di aplikasi Gudang'
            );
            $this->load->view($data['masterpage'], $data);
        }
    }


     

    public function uang(){
        $tgldari = $this->input->post('tgldari');
        $tglsampai = $this->input->post('tglsampai');





        $bri = $this->m_laporan->keuangan($tgldari,$tglsampai,"bri");
        $bcaplatinum = $this->m_laporan->keuangan($tgldari,$tglsampai,"bcaplatinum");
        $bcagold = $this->m_laporan->keuangan($tgldari,$tglsampai,"bcagold");
        $tunai = $this->m_laporan->keuangan($tgldari,$tglsampai,"tunai");
        $data = array(
            'masterpage' => 'layout/layout',
            'navbar' => 'layout/navbar',
            'sidebar' => 'layout/sidebar',
            'bri' =>$bri,
            'bcagold' =>$bcagold,
            'bcaplatinum' =>$bcaplatinum,
            'tunai' =>$tunai,
            'content' => 'data_keuangan',
            'footer' => 'layout/footer',
            'title' => ' Selamat Datang Di aplikasi Gudang'
        );
        $this->load->view($data['masterpage'], $data);
    }


    } 
