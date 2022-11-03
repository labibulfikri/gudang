<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function barang($tgldari,$tglsampai)
    {
        $this->db->select('transaksi.id_transaksi, transaksi.jenis_transaksi,transaksi.tgl_transaksi,transaksi_det.id_barang,transaksi_det.qty,barang.nama_barang,transaksi_det.stok_det,transaksi_det.sisa,pelanggan.nama_pelanggan');
        $this->db->from('transaksi');
        
        
        $this->db->join('transaksi_det', 'transaksi_det.id_transaksi = transaksi.id_transaksi');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan');
        $this->db->join('barang', 'transaksi_det.id_barang = barang.id_barang');

        $this->db->where('transaksi.tgl_transaksi >=', $tgldari);
        $this->db->where('transaksi.tgl_transaksi <=', $tglsampai);

        $this->db->order_by('transaksi.tgl_transaksi', 'ASC');
        $query = $this->db->get();

        // $a = $this->db->last_query($query);
        // print_r($a);
        // exit();

        return $query->result();
    }


    public function keuangan($tgldari,$tglsampai,$jenis)
    {
        $this->db->select('transaksi.id_transaksi,transaksi.surat_jalan, transaksi.jenis_transaksi,transaksi.tgl_transaksi,transaksi_det.id_barang,transaksi_det.qty,barang.nama_barang,transaksi_det.stok_det,transaksi_det.sisa,pelanggan.nama_pelanggan,transaksi.grand_total,transaksi_det.total_harga, ( SELECT COUNT( transaksi_det.id_transaksi ) FROM transaksi_det WHERE transaksi_det.id_transaksi = transaksi.id_transaksi )as jumlah ');
        $this->db->from('transaksi');
        
        
        $this->db->join('transaksi_det', 'transaksi_det.id_transaksi = transaksi.id_transaksi');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan');
        $this->db->join('barang', 'transaksi_det.id_barang = barang.id_barang');

        $this->db->where('transaksi.tgl_transaksi >=', $tgldari);
        $this->db->where('transaksi.tgl_transaksi <=', $tglsampai);
        if($jenis == "bri"){
            $this->db->where('jenis_bayar', $jenis);
        }else if($jenis == "bcaplatinum"){
            $this->db->where('jenis_bayar', $jenis);
        }else if($jenis == "bcagold"){
            $this->db->where('jenis_bayar', $jenis);
        }else{
            $this->db->where('jenis_bayar', $jenis);
        }

        $this->db->order_by('transaksi.tgl_transaksi', 'ASC');


        $query = $this->db->get();
 
        // $a = $this->db->last_query($query);
        // print_r($a);
        // exit();

        return $query->result();
    }

}