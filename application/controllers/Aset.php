<?php
defined('BASEPATH') or exit('No direct script access allowed');


// Load library phpspreadsheet
require('./excel/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// End load library phpspreadsheet

class Aset extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_aset');
        $this->load->model('m_home');
    }
    public function index()
    {

        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {

            $kat_c = $this->m_home->kategory_c();
            $total = $this->m_home->total();
            $mandali = $this->m_home->mandali();
            $terbit = $this->m_home->terbit_sertifikat();
            $get_kota = $this->get_kota();
            // $kecamatan = $this->get_kecamatan();


            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar',
                'sidebar' => 'layout/sidebar',
                'content' => 'aset/data_aset',
                'footer' => 'layout/footer',
                'c' => $kat_c,
                'mandali' => $mandali,
                'get_kota' => $get_kota,
                'total' => $total,
                'terbit' => $terbit,
                'title' => ' Selamat Datang Di aplikasi Sertifikasi BPKAD'
            );
            $this->load->view($data['masterpage'], $data);
        }
    }

    function fetch_aset()
    {

        $fetch_data = $this->m_aset->make_datatables();

        $data = array();
        $no = $_POST['start'];
        foreach ($fetch_data as $row) {
            $no++;
            $sub_array = array();

            $sub_array['masalah'] = $row->masalah;
            $sub_array['map'] = $row->status_map;
            $sub_array[] = $no;
            $sub_array[] = $row->register_baru;
            $sub_array[] = $row->alamat;


            if ($row->status_map == 3) {
                $sub_array[] = "Pendaftaran Hak";
            } else if ($row->status_map == 2) {
                $sub_array[] = "Permohonan Hak";
            } else {
                $sub_array[] = "Peta Bidang";
            }

            $sub_array[] = '<a href="' . base_url('aset/detail/' . $row->idnya . '') . ' "" class="btn btn-success btn-sm"> <i class="far fa-edit"> Detail</i> </a> | ';
            $sub_array[] = '<a href="' . base_url('aset/detail2/' . $row->idnya . '') . ' "" class="btn btn-success btn-sm"> <i class="far fa-edit"> Edit Data</i> </a> | <button role="button" class="tombol_delete btn btn-danger " id="' . $row->idnya . '"> Hapus </button>';

            // <a  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="tombolEdit" data-id="' .  $row->idnya . '" data-lokasi="' .  $row->lokasi_pencatatan . '" data-toggle="modal" data-registerbaru="' .  $row->register_baru . '" data-registerlama="' .  $row->register_lama . '" data-alamat="' .  $row->alamat . '" data-masalah="' .  $row->masalah . '" data-luas="' .  $row->luas . '"  data-luas="' .  $row->luas . '" data-tahun="' .  $row->tahun_pengadaan . '"  data-penggunaan="' .  $row->penggunaan . '" data-masalah="' .  $row->masalah . '" >Lihat Data</a> 
            $data[] = $sub_array;
        }
        $output = array(
            "draw"                      =>     intval($_POST["draw"]),
            "recordsTotal"              =>     $this->m_aset->get_all_data(),
            "recordsFiltered"           =>     $this->m_aset->get_filtered_data(),
            "data"                      =>     $data
        );
        echo json_encode($output);
    }


    public function laporan()
    {

        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {

            $kat_c = $this->m_home->kategory_c();
            $total = $this->m_home->total();
            $mandali = $this->m_home->mandali();
            $terbit = $this->m_home->terbit_sertifikat();
            $get_kota = $this->get_kota();
            // $kecamatan = $this->get_kecamatan();


            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar',
                'sidebar' => 'layout/sidebar',
                'content' => 'aset/laporan_aset',
                'footer' => 'layout/footer',
                'c' => $kat_c,
                'mandali' => $mandali,
                'get_kota' => $get_kota,
                'total' => $total,
                'terbit' => $terbit,
                'title' => ' Selamat Datang Di aplikasi Sertifikasi BPKAD'
            );
            $this->load->view($data['masterpage'], $data);
        }
    }

    function laporan_aset()
    {

        ## Custom Field value
        $searchByMap  = $this->input->post('searchByMap');
        $fetch_data = $this->m_aset->make_datatables_lap($searchByMap);

        $data = array();
        $no = $_POST['start'];
        foreach ($fetch_data as $row) {
            $no++;
            $sub_array = array();

            $sub_array['masalah'] = $row->masalah;
            $sub_array['map'] = $row->status_map;
            $sub_array[] = $no;
            $sub_array[] = $row->register_baru;
            $sub_array[] = $row->alamat;


            if ($row->status_map == 3) {
                $sub_array[] = "Pendaftaran Hak";
            } else if ($row->status_map == 2) {
                $sub_array[] = "Permohonan Hak";
            } else {
                $sub_array[] = "Peta Bidang";
            }

            // $sub_array[] = '<a href="' . base_url('aset/detail/' . $row->idnya . '') . ' "" class="btn btn-success btn-sm"> <i class="far fa-edit"> Detail</i> </a> | ';
            // $sub_array[] = '<a href="' . base_url('aset/detail2/' . $row->idnya . '') . ' "" class="btn btn-success btn-sm"> <i class="far fa-edit"> Edit Data</i> </a> | <button role="button" class="tombol_delete btn btn-danger " id="' . $row->idnya . '"> Hapus </button>';

            // <a  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="tombolEdit" data-id="' .  $row->idnya . '" data-lokasi="' .  $row->lokasi_pencatatan . '" data-toggle="modal" data-registerbaru="' .  $row->register_baru . '" data-registerlama="' .  $row->register_lama . '" data-alamat="' .  $row->alamat . '" data-masalah="' .  $row->masalah . '" data-luas="' .  $row->luas . '"  data-luas="' .  $row->luas . '" data-tahun="' .  $row->tahun_pengadaan . '"  data-penggunaan="' .  $row->penggunaan . '" data-masalah="' .  $row->masalah . '" >Lihat Data</a> 
            $data[] = $sub_array;
        }
        $output = array(
            "draw"                      =>     intval($_POST["draw"]),
            "recordsTotal"              =>     $this->m_aset->get_all_data_lap($searchByMap),
            "recordsFiltered"           =>     $this->m_aset->get_filtered_data_lap($searchByMap),
            "data"                      =>     $data
        );
        echo json_encode($output);
    }

    public function detail($id_aset)
    {

        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {

            $id_aset = $id_aset;

            $detail = $this->m_aset->get_detail($id_aset);
            $noreg = $detail['register_baru'];

            $peta = $this->m_aset->peta_bidang($id_aset);

            if ($peta) {
                $id_set_peta = $peta[0]->id_det_aset;
            } else {
                $id_set_peta = null;
            }

            $permohonan_hak = $this->m_aset->permohonan_hak($id_aset);
            if ($permohonan_hak) {
                $id_set_permohonan = $permohonan_hak[0]->id_det_aset;
            } else {
                $id_set_permohonan = null;
            }

            $pendaftaran_hak = $this->m_aset->pendaftaran_hak($id_aset);

            if ($pendaftaran_hak) {
                $id_set_pendaftaran  = $pendaftaran_hak[0]->id_det_aset;
            } else {
                $id_set_pendaftaran = null;
            }

            $get_kota = $this->get_kota();
            $kecamatan = $this->get_kecamatan();

            if ($detail['id_districts'] == null) {

                $id_districts = null;
            } else {
                $id_districts = $detail['id_districts'];
            }

            $lurah = $this->get_kelurahan($id_districts);

            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar',
                'sidebar' => 'layout/sidebar',
                'det' => $detail,
                'noreg' => $noreg,
                'peta' => $peta,
                'id_aset' => $id_aset,
                'id_set_peta' => $id_set_peta,
                'id_set_permohonan' => $id_set_permohonan,
                'id_set_pendaftaran' => $id_set_pendaftaran,
                'pendaftaran_hak' => $pendaftaran_hak,
                'permohonan_hak' => $permohonan_hak,
                'get_kota' => $get_kota,
                'lurah' => $lurah,
                'kecamatan' => $kecamatan,
                'content' => 'aset/detail',
                'footer' => 'layout/footer',
            );
            $this->load->view($data['masterpage'], $data);
        }
    }

    public function detail2($id_aset)
    {

        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {

            $id_aset = $id_aset;

            $detail = $this->m_aset->get_detail($id_aset);


            $noreg = $detail['register_baru'];

            $peta = $this->m_aset->peta_bidang($id_aset);

            if ($peta) {
                $id_set_peta = $peta[0]->id_det_aset;
            } else {
                $id_set_peta = null;
            }

            $permohonan_hak = $this->m_aset->permohonan_hak($id_aset);
            if ($permohonan_hak) {
                $id_set_permohonan = $permohonan_hak[0]->id_det_aset;
            } else {
                $id_set_permohonan = null;
            }

            $pendaftaran_hak = $this->m_aset->pendaftaran_hak($id_aset);

            if ($pendaftaran_hak) {
                $id_set_pendaftaran  = $pendaftaran_hak[0]->id_det_aset;
            } else {
                $id_set_pendaftaran = null;
            }


            $get_kota = $this->get_kota();
            $kecamatan = $this->get_kecamatan();

            if ($detail['id_districts'] == null) {

                $id_districts = null;
            } else {
                $id_districts = $detail['id_districts'];
            }

            $lurah = $this->get_kelurahan($id_districts);

            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar',
                'sidebar' => 'layout/sidebar',
                'det' => $detail,
                'noreg' => $noreg,
                'peta' => $peta,
                'id_aset' => $id_aset,
                'id_set_peta' => $id_set_peta,
                'id_set_permohonan' => $id_set_permohonan,
                'id_set_pendaftaran' => $id_set_pendaftaran,
                'pendaftaran_hak' => $pendaftaran_hak,
                'permohonan_hak' => $permohonan_hak,
                'get_kota' => $get_kota,
                'lurah' => $lurah,
                'kecamatan' => $kecamatan,
                'content' => 'aset/detail2',
                'footer' => 'layout/footer',
            );
            $this->load->view($data['masterpage'], $data);
        }
    }


    function update()
    {

        $id_aset = $this->input->post('id_aset');



        $data = array(
            "register_lama" => $this->input->post('register_lama'),
            "register_baru" => $this->input->post('register_baru'),
            "lokasi_pencatatan" => $this->input->post('lokasi_pencatatan'),
            "luas" => $this->input->post('luas'),
            "tahun_pengadaan" => $this->input->post('tahun_pengadaan'),
            "penggunaan" => $this->input->post('penggunaan'),
            "alamat" => $this->input->post('alamat'),
            "masalah" => $this->input->post('masalah'),
            "id_regencies" => $this->input->post('id_regencie'),
            "id_districts" => $this->input->post('id_district'),
            "id_villages" => $this->input->post('id_village'),
            "lokasi_bpn" => $this->input->post('lokasi_bpn'),
            "atas_nama" => $this->input->post('atas_nama'),
            "dokumen_tanah" => $this->input->post('dokumen_tanah'),
            "keterangan" => $this->input->post('keterangan'),
        );


        $exe = $this->m_aset->update($data, $id_aset);

        if ($exe > 0) {
            echo "<script type='text/javascript'>
        alert(' Update Berhasil ');
        window.location.href ='" . base_url('aset') . "';
        </script>";
        }
    }

    function update_det()
    {

        $id_aset = $this->input->post('id_aset');

        $id_det_aset = $this->input->post('id_det_aset');

        $status_map =  $this->input->post('status_map');

        if ($status_map == 1) {

            $data = array(
                "register_baru" => $this->input->post('register_baru'),
                "no_sps" => $this->input->post('no_sps'),
                "tgl_sps" => $this->input->post('tgl_sps'),
                "no_nib" => $this->input->post('no_nib'),
                "tgl_nib" => $this->input->post('tgl_nib'),
                "status" => $this->input->post('status'),
                "keterangan" => $this->input->post('keterangan')

            );
        } else if ($status_map == 2) {

            $data = array(
                "status_permohonan" => $this->input->post('status_permohonan'),
                "keterangan_permohonan" => $this->input->post('keterangan_permohonan'),
                "tgl_sk_bpn" => $this->input->post('tgl_sk_bpn'),
                "no_sk_bpn" => $this->input->post('no_sk_bpn'),
                "tgl_penelitian" => $this->input->post('tgl_penelitian'),
                "biaya_permohonan" => $this->input->post('biaya_permohonan'),
                "tgl_sps_permohonan" => $this->input->post('tgl_sps_permohonan'),
                "no_sps_permohonan" => $this->input->post('no_sps_permohonan')
            );
        } else {
            $data = array(
                "register_baru" => $this->input->post('register_baru'),
                "no_sps_pendaftaran" => $this->input->post('no_sps_pendaftaran'),
                "tgl_sps_pendaftaran" => $this->input->post('tgl_sps_pendaftaran'),
                "status_pendaftaran" => $this->input->post('status_pendaftaran'),
                "no_sertifikat" =>  $this->input->post('no_sertifikat'),
                "tgl_sertifikat" =>  $this->input->post('tgl_sertifikat'),
                "keterangan_pendaftaran" => $this->input->post('keterangan_pendaftaran'),
            );
        }

        $exe = $this->m_aset->update_det($data, $id_det_aset);

        if ($exe > 0) {

            echo "<script type='text/javascript'>
        alert(' Update Berhasil ');
        window.location.href ='" . base_url('aset/detail/' . $id_aset) . "';
        </script>";
        }
    }

    function delete()
    {
        $id_aset = $this->input->post('id_aset');
        $del = $this->m_aset->hapus_data($id_aset, 'm_aset_baru');
    }

    function delete_det()
    {
        $id_det_aset = $this->input->post('id_det_aset');

        $del = $this->m_aset->hapus_data_det($id_det_aset);
    }

    function insert_det()
    {
        $id_aset = $this->input->post('id_aset');

        $status_map = $this->input->post('status_map');

        if ($status_map == 1) {

            $data  = array(
                "status_map" => $status_map,
                "status" => $this->input->post('status'),
                "keterangan" => $this->input->post('keterangan'),
                "register_baru" => $this->input->post('register_baru'),
                "id_aset" => $this->input->post('id_aset'),
                "no_sps" => $this->input->post('no_sps'),
                "tgl_sps" => $this->input->post('tgl_sps'),
                "tgl_nib" => $this->input->post('tgl_nib'),
                "no_nib" => $this->input->post('no_nib'),
            );
        } else if ($status_map == 2) {
            $data  = array(
                "status_map" => $status_map,
                "register_baru" => $this->input->post('register_baru'),
                "status_permohonan" => $this->input->post('status_permohonan'),
                "no_sk_bpn" => $this->input->post('no_sk_bpn'),
                "tgl_sk_bpn" => $this->input->post('tgl_sk_bpn'),
                "id_aset" => $this->input->post('id_aset'),
                "no_sps_permohonan" => $this->input->post('no_sps_permohonan'),
                "tgl_sps_permohonan" => $this->input->post('tgl_sps_permohonan'),
                "biaya_permohonan" => $this->input->post('biaya_permohonan'),
                "tgl_penelitian" => $this->input->post('tgl_penelitian'),
                "keterangan_permohonan" => $this->input->post('keterangan_permohonan'),
            );
        } else {

            $data  = array(
                "register_baru" => $this->input->post('register_baru'),
                "id_aset" => $this->input->post('id_aset'),
                "status_map" => $status_map,
                "status_pendaftaran" => $this->input->post('status_pendaftaran'),
                "no_sertifikat" => $this->input->post('no_sertifikat'),
                "tgl_sertifikat" => $this->input->post('tgl_sertifikat'),
                "biaya_pendaftaran" => $this->input->post('biaya_pendaftaran'),
                "no_sps_pendaftaran" => $this->input->post('no_sps_pendaftaran'),
            );
        }


        $exe = $this->m_aset->insertdata($data);
        if ($exe > 0) {
            echo "<script type='text/javascript'>
        alert(' Update Berhasil ');
        window.location.href ='" . base_url('aset/detail/' . $id_aset) . "';
        </script>";
        }
    }

    function get_kota()
    {
        $a = $this->input->post('search');
        $kota = $this->m_aset->datakota($a);
        // foreach ($kota as $key) {

        //     echo '<option value="' . $key['id'] . '">' . $key['name'] . '</option>';
        // }
        return $kota;
    }

    function get_kecamatan()
    {
        // $a = $this->input->get('search');
        $kecamatan = $this->m_aset->kecamatan();

        return $kecamatan;
    }


    function get_kelurahan($id)
    {
        // $a = $this->input->get('search');
        $id = $id;

        $lurah = $this->m_aset->datakelurahan($id);
        return $lurah;
    }


    function get_kec()
    {
        $id = $this->input->post('id');
        $search = $this->input->get('search');

        $kec = $this->m_aset->datakecamatan($id, $search);
        // echo json_encode($kec);
        foreach ($kec as $key) {

            echo '<option value="' . $key['id'] . '">' . $key['name'] . '</option>';
        }
    }


    // function get_kelurahan()
    // {
    //     $id = $this->input->post('id');

    //     $search = $this->input->get('search');

    //     $lurah = $this->m_aset->datakelurahan($id, $search);

    //     foreach ($lurah as $key) {
    //         echo '<option value="' . $key->id . '">' . $key->name . '</option>';
    //     }
    // }

    function detail_aset()
    {
        $id_aset = $this->input->post('id');
        $data = $this->m_aset->get_detail($id_aset);
        echo json_encode($data);
    }

    // Export ke excel
    public function export()
    {

        $q = $this->input->post('q');

        $aset = $this->m_aset->make_datatables_export($q);

        // Create new Spreadsheet object
        $fileName = 'students.xlsx';
        $spreadsheet = new Spreadsheet();

        // Set document properties
        $spreadsheet->getProperties()->setCreator('ASSIST SERTIFIKASI BPKAD')
            ->setLastModifiedBy('Andoyo - Java Web Medi')
            ->setTitle('Office 2007 XLSX Test Document')
            ->setSubject('Office 2007 XLSX Test Document')
            ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
            ->setKeywords('office 2007 openxml php')
            ->setCategory('Test result file');

        // Add some data
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'NO')
            ->setCellValue('B1', 'REGISTER BARU')
            ->setCellValue('C1', 'ALAMAT')
            ->setCellValue('D1', 'LOKASI BPN');


        // Miscellaneous glyphs, UTF-8


        // $writer = new Xlsx($spreadsheet);
        // $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        // Rename worksheet
        $filepath = $fileName;

        // Set document properties
        // $spreadsheet->getProperties()->setCreator('ASSIST SERTIFIKASI BPKAD')
        //     ->setLastModifiedBy('Andoyo - Java Web Medi')
        //     ->setTitle('Office 2007 XLSX Test Document')
        //     ->setSubject('Office 2007 XLSX Test Document')
        //     ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
        //     ->setKeywords('office 2007 openxml php')
        //     ->setCategory('Test result file');

        // Add some data
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'NO')
            ->setCellValue('B1', 'REGISTER BARU')
            ->setCellValue('C1', 'ALAMAT')
            ->setCellValue('D1', 'LOKASI BPN');
        $i = 2;
        $a = 1;
        foreach ($aset as $as) {

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $i, $a++)
                ->setCellValue('B' . $i, $as->register_baru)
                ->setCellValue('C' . $i, $as->alamat)
                ->setCellValue('D' . $i, $as->lokasi_bpn);
            $i++;
        }


        // $writer = new Xlsx($spreadsheet);

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        ob_end_clean();
        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');

        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        flush(); // Flush system output buffer

        $writer->save($filepath);
        readfile($filepath);

        exit;
    }

    // function cetak()
    // {
    //     $template = "./excel/output/template.xlsx";
    //     //https: //github.com/PHPOffice/PhpSpreadsheet/files/2365395/template.xlsx) - empty file
    //     $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($template);
    //     $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);

    //     $writer->save("output.xlsx");
    // }
}
