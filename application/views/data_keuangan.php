<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <form action="<?php echo base_url('keuangan/uang')?>" method="post">

                    <p class="card-title"> Laporan Keuangan </p>
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
                    BANK BRI
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Surat Jalan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Barang</th>
                            <th scope="col">Dari / Kepada </th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Masuk</th>
                            <th scope="col">Keluar</th>
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
                        if (is_array($bri) && count($bri) > 0) {
                             foreach ($bri as $key) { ?>
                            <?php if ($jum <= 1) { ?>
                                <tr>
                                <td rowspan="<?php echo $key->jumlah;?>" > <?php echo $no++; ?> </td>
                                <td rowspan="<?php echo $key->jumlah;?>" > <?php echo $key->surat_jalan?> </td>
                               
                                        <?php $jum = $key->jumlah;  } else {  $jum = $jum - 1; } ?>
                                        <td > <?php echo $key->tgl_transaksi?> </td>
                                <td > <?php echo $key->nama_barang?> </td>
                                <td > <?php echo $key->nama_pelanggan?> </td>
                                <td > <?php echo $key->jenis_transaksi?> </td>
                                <?php if ($key->jenis_transaksi == "masuk"){ ?>
                                    <td > <?php echo $key->total_harga; $totalmasuk += $key->total_harga;  ?> </td>
                                    <td > 0 </td>
                                    <?php } else { ?>
                                        <td > 0 </td>
                                        <td > <?php echo $key->total_harga; $totalkeluar += $key->total_harga;?> </td>
                                        
                                        <?php } ?> 
                                        <td> </td>
                                       
                            </tr>
                            
                            <?php    }   ?> 
                            <tr>
                                 <td colspan="6"> TOtal</td> 
                                 <td >  <?php echo $totalmasuk?> </td> 
                                 <td >  <?php echo $totalkeluar?> </td> 
                                 <td >  <?php echo $sisa = $totalmasuk - $totalkeluar  ?> </td> 
                            </tr>
                    
                    <?php }else { ?>
                            
                        <?php } ?>
                    </tbody>
                </table>

                <br/>
                
                <br/>
                <table class="table table-sm table-dark">
                    BANK BCA GOLD
                    <thead>
                        <tr>
                            <th scope="col">#</th>                            
                            <th scope="col">Surat Jalan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Barang</th>
                            <th scope="col">Dari / Kepada </th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Masuk</th>
                            <th scope="col">Keluar</th>
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
                        if (is_array($bcagold) && count($bcagold) > 0) {
                             foreach ($bcagold as $key) { ?>
                            <?php if ($jum <= 1) { ?>
                                <tr>
                                <td rowspan="<?php echo $key->jumlah;?>" > <?php echo $no++; ?> </td>
                                <td rowspan="<?php echo $key->jumlah;?>" > <?php echo $key->surat_jalan?> </td>
                               
                                        <?php $jum = $key->jumlah;  } else {  $jum = $jum - 1; } ?>
                                        <td > <?php echo $key->tgl_transaksi?> </td>
                                <td > <?php echo $key->nama_barang?> </td>
                                <td > <?php echo $key->nama_pelanggan?> </td>
                                <td > <?php echo $key->jenis_transaksi?> </td>
                                <?php if ($key->jenis_transaksi == "masuk"){ ?>
                                    <td > <?php echo $key->total_harga; $totalmasuk += $key->total_harga;  ?> </td>
                                    <td > 0 </td>
                                    <?php } else { ?>
                                        <td > 0 </td>
                                        <td > <?php echo $key->total_harga; $totalkeluar += $key->total_harga;?> </td>
                                        
                                        <?php } ?> 
                                        <td> </td>
                                       
                            </tr>
                            
                            <?php    }   ?> 
                            <tr>
                                 <td colspan="6"> TOtal</td> 
                                 <td >  <?php echo $totalmasuk?> </td> 
                                 <td >  <?php echo $totalkeluar?> </td> 
                                 <td >  <?php echo $sisa = $totalmasuk - $totalkeluar  ?> </td> 
                            </tr>
                    
                    <?php }else { ?>
                            
                        <?php } ?>
                    </tbody>
                </table>
                <br/>
                <table class="table table-sm table-dark">
                    BANK BCA PLATINUM
                    <thead>
                        <tr>
                            <th scope="col">#</th>                            
                            <th scope="col">Surat Jalan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Barang</th>
                            <th scope="col">Dari / Kepada </th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Masuk</th>
                            <th scope="col">Keluar</th>
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
                        if (is_array($bcaplatinum) && count($bcaplatinum) > 0) {
                             foreach ($bcaplatinum as $key) { ?>
                            <?php if ($jum <= 1) { ?>
                                <tr>
                                <td rowspan="<?php echo $key->jumlah;?>" > <?php echo $no++; ?> </td>
                                <td rowspan="<?php echo $key->jumlah;?>" > <?php echo $key->surat_jalan?> </td>
                               
                                        <?php $jum = $key->jumlah;  } else {  $jum = $jum - 1; } ?>
                                        <td > <?php echo $key->tgl_transaksi?> </td>
                                <td > <?php echo $key->nama_barang?> </td>
                                <td > <?php echo $key->nama_pelanggan?> </td>
                                <td > <?php echo $key->jenis_transaksi?> </td>
                                <?php if ($key->jenis_transaksi == "masuk"){ ?>
                                    <td > <?php echo $key->total_harga; $totalmasuk += $key->total_harga;  ?> </td>
                                    <td > 0 </td>
                                    <?php } else { ?>
                                        <td > 0 </td>
                                        <td > <?php echo $key->total_harga; $totalkeluar += $key->total_harga;?> </td>
                                        
                                        <?php } ?> 
                                        <td> </td>
                                       
                            </tr>
                            
                            <?php    }   ?> 
                            <tr>
                                 <td colspan="6"> TOtal</td> 
                                 <td >  <?php echo $totalmasuk?> </td> 
                                 <td >  <?php echo $totalkeluar?> </td> 
                                 <td >  <?php echo $sisa = $totalmasuk - $totalkeluar  ?> </td> 
                            </tr>
                    
                    <?php }else { ?>
                            
                        <?php } ?>
                    </tbody>
                </table>
                <br/>
                <table class="table table-sm table-dark">
                    TUNAI
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Surat Jalan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Barang</th>
                            <th scope="col">Dari / Kepada </th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Masuk</th>
                            <th scope="col">Keluar</th>
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
                        if (is_array($tunai) && count($tunai) > 0) {
                             foreach ($tunai as $key) { ?>
                            <?php if ($jum <= 1) { ?>
                                <tr>
                                <td rowspan="<?php echo $key->jumlah;?>" > <?php echo $no++; ?> </td>
                                <td rowspan="<?php echo $key->jumlah;?>" > <?php echo $key->surat_jalan?> </td>
                               
                                        <?php $jum = $key->jumlah;  } else {  $jum = $jum - 1; } ?>
                                        <td > <?php echo $key->tgl_transaksi?> </td>
                                <td > <?php echo $key->nama_barang?> </td>
                                <td > <?php echo $key->nama_pelanggan?> </td>
                                <td > <?php echo $key->jenis_transaksi?> </td>
                                <?php if ($key->jenis_transaksi == "masuk"){ ?>
                                    <td > <?php echo $key->total_harga; $totalmasuk += $key->total_harga;  ?> </td>
                                    <td > 0 </td>
                                    <?php } else { ?>
                                        <td > 0 </td>
                                        <td > <?php echo $key->total_harga; $totalkeluar += $key->total_harga;?> </td>
                                        
                                        <?php } ?> 
                                        <td> </td>
                                       
                            </tr>
                            
                            <?php    }   ?> 
                            <tr>
                                 <td colspan="6"> TOtal</td> 
                                 <td >  <?php echo $totalmasuk?> </td> 
                                 <td >  <?php echo $totalkeluar?> </td> 
                                 <td >  <?php echo $sisa = $totalmasuk - $totalkeluar  ?> </td> 
                            </tr>
                    
                    <?php }else { ?>
                            
                        <?php } ?>
                    </tbody>
                </table>
                 

            </div>
        </div>
    </div>
</div>