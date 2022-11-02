<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_pelanggan');
        $this->load->model('m_barang');
        $this->load->model('m_transaksi');
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
                'content' => 'data_transaksi',
                'footer' => 'layout/footer',
                'title' => ' Selamat Datang Di aplikasi Gudang'
            );
            $this->load->view($data['masterpage'], $data);
        }
    }

    function fetch_transaksi()
    {

        $fetch_data = $this->m_transaksi->make_datatables();

        $data = array();
        $no = $_POST['start'];
        foreach ($fetch_data as $row) {
            $no++;
            $sub_array = array();

            $sub_array[] = $no;
            $sub_array[] = $row->surat_jalan;
            $sub_array[] = $row->nama_pelanggan;
            $sub_array[] = $row->tgl_transaksi;
            $sub_array[] = $row->jenis_transaksi;
            $sub_array[] = $row->jenis_bayar;
            $sub_array[] = "Rp. " . number_format($row->grand_total);
            $sub_array[] = '<a class="btn btn-warning" href="' . base_url('transaksi/preview_print/' . $row->id_transaksi) . '"> Lihat </a> | <a class="btn btn-primary" href="' . base_url('transaksi/edit/' . $row->id_transaksi) . '"> Edit </a> |<button role="button" class="tombol_delete btn btn-danger " id="' . $row->id_transaksi . '"> Hapus </button>';
            // $sub_array[] = '<a href="' . base_url('aset/detail2/' . $row->id_pelanggan . '') . ' "" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="tombolEdit" data-id="' . $row->id_pelanggan . '" data-nama_pelanggan="' . $row->nama_pelanggan . '"> <i class="far fa-edit"> Edit Data</i> </a> | <button role="button" class="tombol_delete btn btn-danger " id="' . $row->id_pelanggan . '"> Hapus </button>';

            // <a  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="tombolEdit" data-id="' .  $row->idnya . '" data-lokasi="' .  $row->lokasi_pencatatan . '" data-toggle="modal" data-registerbaru="' .  $row->register_baru . '" data-registerlama="' .  $row->register_lama . '" data-alamat="' .  $row->alamat . '" data-masalah="' .  $row->masalah . '" data-luas="' .  $row->luas . '"  data-luas="' .  $row->luas . '" data-tahun="' .  $row->tahun_pengadaan . '"  data-penggunaan="' .  $row->penggunaan . '" data-masalah="' .  $row->masalah . '" >Lihat Data</a> 
            $data[] = $sub_array;
        }
        $output = array(
            "draw"                      =>     intval($_POST["draw"]),
            "recordsTotal"              =>     $this->m_transaksi->get_all_data(),
            "recordsFiltered"           =>     $this->m_transaksi->get_filtered_data(),
            "data"                      =>     $data
        );
        echo json_encode($output);
    }

    function tambah()
    {
        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {


            $kode = $this->m_transaksi->buat_kode_agenda();

            $pelanggan = $this->m_pelanggan->alldata();
            $barang = $this->m_barang->alldata();
            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar',
                'sidebar' => 'layout/sidebar',
                'pelanggan' => $pelanggan,
                'barang' => $barang,
                'kode' => $kode,
                'content' => 'tambah_transaksi',
                'footer' => 'layout/footer',
                'title' => ' Selamat Datang Di aplikasi Gudang'
            );
            $this->load->view($data['masterpage'], $data);
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


    function form_add()
    {
        $data = array(
            'surat_jalan' => $this->input->post('surat_jalan'),
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'tgl_transaksi' => $this->input->post('tgl_transaksi'),
            'keterangan' => $this->input->post('keterangan'),
            'jenis_bayar' => $this->input->post('jenis_bayar'),
            'jenis_transaksi' => $this->input->post('jenis_transaksi'),
            'grand_total' => $this->input->post('grand_total')
        );
        $exe = $this->m_transaksi->insertdata($data);

        if ($exe) {
            $post = $this->input->post();
            if ($post['id_barang'] == NULL) {
                echo "<script type='text/javascript'>
                alert(' Gagal DITAMBAHKAN ');
                window.location.href ='" . base_url('transaksi') . "';
                </script>";
            } else {

                foreach (array_filter($post['id_barang']) as $key => $value) {
                    $subDataArray = array(
                        'id_barang' => $post['id_barang'][$key],
                        'det_harga' => $post['harga'][$key],
                        'qty' => $post['qty'][$key],
                        'stok_det' => $post['stok'][$key],
                        'sisa' => $post['sisa'][$key],
                        'total_harga' => $post['total_harga'][$key],
                        'id_transaksi' => $exe

                    );

                    $brgmasuk= array(
                        'id_barang' => $post['id_barang'][$key],
                        'stok' => $post['qty'][$key]);

                    $insert2 = $this->db->insert('transaksi_det', $subDataArray);
 
                    $brg =  $this->db->get_where('barang', array('id_barang' => $post['id_barang'][$key]))->row_array();
                    $stok = $brg['stok'];
                    
                    $jenis_transaksi = $this->input->post('jenis_transaksi');

                    if ($jenis_transaksi == 'keluar'){
                        $hasil = $stok - $post['qty'][$key]; 
                        
                    }else{
                        $hasil = $stok + $post['qty'][$key]; 
                         
                    }

                    $data_brg = array ('stok' => $hasil, 'id_barang' => $post['id_barang'][$key]); 
                    $update_stok = $this->db->update('barang', $data_brg, array('id_barang' => $data_brg['id_barang']));
       
                } 
 
            }
        }
        echo "<script type='text/javascript'>
        alert(' BERHASIL DITAMBAHKAN ');
        window.location.href ='" . base_url('transaksi') . "';
        </script>";
    }

    function edit($id)
    {

        $detail_hed = $this->m_transaksi->detail_hed($id);
        $detail = $this->m_transaksi->detail($id);

        $det =  $this->db->get_where('transaksi_det', array('id_transaksi' => $id))->num_rows();
 

        $pelanggan = $this->m_pelanggan->alldata();
        $barang = $this->m_barang->alldata();

        $data = array(
            'masterpage' => 'layout/layout',
            'navbar' => 'layout/navbar',
            'sidebar' => 'layout/sidebar',
            'barang' => $barang,
            'pelanggan' => $pelanggan,
            'detail' => $detail,
            'detail_hed' => $detail_hed,
            'det' => $det,
            'content' => 'edit_transaksi',
            'footer' => 'layout/footer',
            'title' => ' Selamat Datang Di aplikasi Gudang'
        );
        $this->load->view($data['masterpage'], $data);
    }

    function preview_print($id)
    {

        $detail_hed = $this->m_transaksi->detail_hed($id);
        $detail = $this->m_transaksi->detail($id);

        $det =  $this->db->get_where('transaksi_det', array('id_transaksi' => $id))->num_rows();
 

        $pelanggan = $this->m_pelanggan->alldata();
        $barang = $this->m_barang->alldata();

        $data = array(
            'masterpage' => 'layout/layout',
            'navbar' => 'layout/navbar',
            'sidebar' => 'layout/sidebar',
            'barang' => $barang,
            'pelanggan' => $pelanggan,
            'detail' => $detail,
            'detail_hed' => $detail_hed,
            'det' => $det,
            'content' => 'lihat_print',
            'footer' => 'layout/footer',
            'title' => ' Selamat Datang Di aplikasi Gudang'
        );
        $this->load->view($data['masterpage'], $data);
    }


    public function print2($id)
	{ 
		$this->load->library('pdf');

        
		$this->pdf->setPaper('A4', 'landscape');
        // $this->pdf->setPaper('isRemoteEnabled', true);
		$this->pdf->filename = "laporan-data-siswa.pdf";
        $this->pdf->set_option('isRemoteEnabled', true);

        $data['data'] = $this->m_transaksi->detail_hed($id);
        $data['detail_hed'] = $this->m_transaksi->detail_hed($id);
        $data['detail'] = $this->m_transaksi->detail($id);
        $data['det'] =  $this->db->get_where('transaksi_det', array('id_transaksi' => $id))->num_rows(); 
        $data['pelanggan'] = $this->m_pelanggan->alldata();
        $data['barang'] = $this->m_barang->alldata();

		$this->pdf->load_view('print', $data);
	}

    function print($id)
    {

        
        $this->load->library('Pdf');

        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('Contoh');
        $pdf->SetTopMargin(20);
        $pdf->setFooterMargin(20);
        $pdf->SetAutoPageBreak(true);
        $pdf->SetAuthor('Author');
        $pdf->SetDisplayMode('real', 'default');
        $pdf->AddPage();

        $data['data'] = $this->m_transaksi->detail_hed($id);
        $data['detail_hed'] = $this->m_transaksi->detail_hed($id);
        $data['detail'] = $this->m_transaksi->detail($id);

        $data['det'] =  $this->db->get_where('transaksi_det', array('id_transaksi' => $id))->num_rows();
 

        $data['pelanggan'] = $this->m_pelanggan->alldata();
        $data['barang'] = $this->m_barang->alldata();
        $content = $this->load->view('print', $data, true); 

        // $pdf->Write(5,  $this->load->view($data['masterpage'], $data));
        $pdf->Write(5, '', '', 0, 'L', true, 0, false, false, 0);
        $pdf->writeHTML($content, true, false, true, false, '');
        $pdf->Output('print.pdf', 'I'); 
        
    }

    
    function form_edit($id)
    {
        $data = array(
            'surat_jalan' => $this->input->post('surat_jalan'),
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'tgl_transaksi' => $this->input->post('tgl_transaksi'),
            'keterangan' => $this->input->post('keterangan'),
            'grand_total' => $this->input->post('grand_total')
        );
        // $exe = $this->m_transaksi->insertdata($data);
        $update = $this->db->update("transaksi",$data,array("id_transaksi" => $id));
		

        if ($update) {
            $post = $this->input->post();
            if ($post['id_barang'] == NULL) {
                echo "<script type='text/javascript'>
                alert(' Gagal DITAMBAHKAN ');
                window.location.href ='" . base_url('transaksi') . "';
                </script>";
            } else {
                $this->db->delete('transaksi_det',array("id_transaksi" => $id));

                foreach (array_filter($post['id_barang']) as $key => $value) {
                    $subDataArray = array(
                        'id_barang' => $post['id_barang'][$key],
                        'det_harga' => $post['harga'][$key],
                        'qty' => $post['qty'][$key],
                        'total_harga' => $post['total_harga'][$key],
                        'id_transaksi' => $id
                    );
 
                    
                    $insert2 = $this->db->insert('transaksi_det', $subDataArray);
                    $brg =  $this->db->get_where('barang', array('id_barang' => $post['id_barang'][$key]))->row_array();
                    $stok = $brg['stok'];
                    
                    $hasil = $stok - $post['qty'][$key];
                    
                    $data = array ('stok' => $hasil );
                    $update = $this->m_transaksi->update_stok($data, $post['id_barang'][$key]); 
                    
                } 
                
            }
            
        }
        echo "<script type='text/javascript'>
        alert(' BERHASIL DITAMBAHKAN ');
        window.location.href ='" . base_url('transaksi') . "';
        </script>";
    }


    public function doDelete(){

		// $data = $this->M_penjualan->getListDetPenjualan($id);
		// $dataArray = array("status"	=> 4);	
		// $delete['penjualan'] 	= $this->db->update("penjualan",$dataArray,array("idPenjualan" => $id));
		// $delete['detPenjualan'] = $this->db->update("detPenjualan",$dataArray,array("idPenjualan" => $id));
		// foreach($data as $cek){
			// $dataList = $this->M_penjualan->getListSubDetPenjualan($cek->idDetPenjualan);
			// $delete['detPenjualan'] = $this->db->update("subDetPenjualan",$dataArray,array("idDetPenjualan" => $cek->idDetPenjualan));
		// }
        $id = $this->input->post('id_transaksi');
		$delete = $this->db->delete("transaksi",array("id_transaksi" => $id));
		if($delete){
			$this->db->delete("transaksi_det",array("id_transaksi" => $id));
			// $kriteria = $this->kriteria_plg($id2);
			// $this->m_umum->generatePesan("Berhasil hapus data","berhasil");
            echo "<script type='text/javascript'>
            alert(' BERHASIL DIHAPUS ');
            window.location.href ='" . base_url('transaksi') . "';
            </script>";
		}else{
			// $this->m_umum->generatePesan("Gagal hapus data","gagal");

            echo "<script type='text/javascript'>
            alert(' BERHASIL DIHAPUS ');
            window.location.href ='" . base_url('transaksi') . "';
            </script>";
		}
	}
}
