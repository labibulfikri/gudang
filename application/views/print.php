<style>
    #table th {
        padding-top: 10px;
        padding-bottom: 10px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>

<div class="col-12 grid-margin">
    <div class="card">

        <div class="card-body">
            <!-- <h4 class="card-title"> Preview Transaksi </h4> -->
            <table style="height: 20px; width: 100%;">
            <tr>
                <td style="width: 70%;"></td>
                <td>

                    <img height="100px" style="align-content: center;" src="<?php echo base_url('assets2/logojamil.png') ?>" />
                </td>
            </tr>
            </table>
            <hr />
            <hr />

            <table style="height: 20px; width: 100%;">
                <tr>
                    <td> Nama Pelanggan : <?php echo $detail_hed['nama_pelanggan'] ?></td>
                    <td> Jenis Transaksi : <?php echo $detail_hed['jenis_transaksi'] ?></td>
                    <td> Tanggal : <?php echo $detail_hed['tgl_transaksi'] ?></td>
                </tr>
                <tr>
                    <td> Surat Jalan : <?php echo $detail_hed['surat_jalan'] ?></td>
                    <td> Jenis Bayar : <?php echo $detail_hed['jenis_bayar'] ?></td>
                </tr>
                <tr>
                    <td> Keterangan : <textarea name="keterangan" disabled class="form-control" rows="5" cols="50"> <?php echo $detail_hed['keterangan'] ?></textarea></td>
                </tr>


            </table>
            <br />

            <table border="1px" style="margin-bottom:30px; width: 100%;">
                <thead style="background-color: #FFBC0A;">
                    <tr>
                        <th width="3%">No</th>
                        <th width="30%">Nama Barang</th>
                        <th width="20%">Harga </th>
                        <!-- <th width="10%">Stok </th> -->
                        <th width="11.5%"> Qty</th>
                        <!-- <th width="11.5%"> Sisa</th> -->
                        <th width="20%">Total</th>
                    </tr>
                </thead>
                <tbody id="dt2">

                    <?php
                    $no = 0;
                    $nom = 1;
                    foreach ($detail as $list) {
                        $no++;
                    ?>
                        <tr id="divnya<?php echo $no ?>">
                            <td>
                                <?php echo $nom++ ?>
                                <!-- <label class="form-label" for="exampleInputReadonly"><button style="height:30px;width:25px;padding:2px;" class="btn btn-danger" onclick="hapus(<?php echo $no ?>)"><span>-</span></button></label> -->
                                <!-- <input type="hidden" name="id_det_transaksi[]" value="<?php echo $list->id_det_transaksi; ?>"> -->
                            </td>
                            <td>
                                <?php echo $list->nama_barang  ?>
                            </td>
                            <td>
                                <?php echo "Rp " . number_format($list->det_harga, 2, ',', '.'); ?>
                            </td>
                           
                            <td>
                                <?php echo $list->qty; ?>
                            </td>
                            
                            <td>
                                <?php echo "Rp " . number_format($list->total_harga, 2, ',', '.'); ?>
                            </td>
                        </tr>
                    <?php } ?>
                    <td colspan="4" style="text-align: center;"> <b> Grand Total </b> </td>
                    <td> <b> <?php echo "Rp " . number_format($detail_hed['grand_total'], 2, ',', '.'); ?></b></td>
                </tbody>
            </table>
            <div class="form-group">

            </div>
            <!-- <div class="form-actions"> -->
            <!-- <div class="col-md-2">

                            <a target="_blank" class="btn btn-primary" href="<?php echo base_url() ?>transaksi/print/<?php echo $detail_hed['id_transaksi'] ?>"> Print</a>
                        </div> -->
        </div>
        <hr />

    </div>
</div>
</div>