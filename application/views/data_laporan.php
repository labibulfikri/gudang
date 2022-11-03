<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <form action="<?php echo base_url('laporan/brg')?>" method="post">

                    <p class="card-title"> Laporan Barang </p>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Dari Tanggal</label>
                            <input type="date" name="tgldari" class="form-control" id="inputEmail4">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Samapi Tanggal</label>
                            <input type="date" class="form-control" name="tglsampai" id="inputPassword4">
                        </div>
                    </div>
                    <br/>
                    <button class="btn btn-primary btn-sm" type="submit"> laporan</button>
                </form>
                <br/>
                <table class="table table-sm table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Surat Jalan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Barang</th>
                            <th scope="col">Dari / Kepada </th>
                            <th scope="col">Masuk / Keluar</th>
                            <th scope="col">Stok Awal</th>
                            <th scope="col">Jumlah Barang</th>
                            <th scope="col">Sisa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $totalmasuk = 0;
                        $totalkeluar = 0;
                        $jum = 1;
                         $no = 1; ?> 
                        <?php
                        if (is_array($data) && count($data) > 0) {
                             foreach ($data as $key) { ?>
                            <?php if ($jum <= 1) { ?>
                                <tr>
                                <td rowspan="<?php echo $key->jumlah;?>" > <?php echo $no++; ?> </td>
                                <td rowspan="<?php echo $key->jumlah;?>" > <?php echo $key->surat_jalan?> </td>
                               
                                        <?php $jum = $key->jumlah;  } else {  $jum = $jum - 1; } ?>
                                        <td > <?php echo $key->tgl_transaksi?> </td>
                                <td > <?php echo $key->nama_barang?> </td>
                                <td > <?php echo $key->nama_pelanggan?> </td>
                                <td > <?php echo $key->jenis_transaksi?> </td>
                                <td > <?php echo $key->stok_det; ?> </td>
                                <?php if ($key->jenis_transaksi == "masuk"){ ?>
                                    <td > <?php echo $key->qty; ?> </td>                                    
                                    <td > <?php echo $key->sisa;?></td>
                                    
                                    <?php } else { ?> 
                                        <td > <?php echo $key->qty;?></td>
                                        <td > <?php echo $key->sisa;?></td>
                                        
                                        <?php } ?>  
                                       
                            </tr>
                            
                            <?php    }   ?> 
                             
                    <?php }else { ?>
                            
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>