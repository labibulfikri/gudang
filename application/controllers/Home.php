<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_home');
	}

	function gethari($hari)
	{
		$harinya = $hari;

		switch ($harinya) {
			case 'Sun':
				$getHari = "Minggu";
				break;
			case 'Mon':
				$getHari = "Senin";
				break;
			case 'Tue':
				$getHari = "Selasa";
				break;
			case 'Wed':
				$getHari = "Rabu";
				break;
			case 'Thu':
				$getHari = "Kamis";
				break;
			case 'Fri':
				$getHari = "Jumat";
				break;
			case 'Sat':
				$getHari = "Sabtu";
				break;
			default:
				$getHari = "Salah";
				break;
		}
		return $getHari;
	}
	public function index()
	{

		if ($this->session->userdata('status') != 'login') {

			redirect('auth/logout');
		} else {
			$hari = date('D');

			$h = $this->gethari($hari);

			$data = array(
				'masterpage' => 'layout/layout',
				'navbar' => 'layout/navbar',
				'sidebar' => 'layout/sidebar',
				'content' => 'home',
				'h' => $h,
				'footer' => 'layout/footer',
				'title' => ' Selamat Datang Di aplikasi Gudang'
			);
			$this->load->view($data['masterpage'], $data);
		}
	}
}
