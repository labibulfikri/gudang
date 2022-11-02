
<div class="col-12 grid-margin">
    <div class="card">

        <div class="card-body">
            <!-- <h4 class="card-title"> Preview Transaksi </h4> -->
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">

                            <img src="<?php echo base_url('assets2/logojamil.png') ?>" />
                        </div>
                    </div>
                </div>
                </div>
                <hr />
                <hr />
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3"> Nama Pelanggan</label>
                            <div class="col-sm-9"> 
                                <label class="col-sm-3">: <?php echo $detail_hed['nama_pelanggan'] ?> </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3">Surat Jalan</label>
                            <div class="col-sm-9">
                                <label class="col-sm-3">: <?php echo $detail_hed['surat_jalan'] ?> </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3  ">Tanggal</label>
                            <div class="col-sm-9">
                                <label class="col-sm-3  ">: <?php echo $detail_hed['tgl_transaksi'] ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 "> Jenis Transaksi </label>
                            <div class="col-sm-9">
                                <label class="col-sm-3 ">: <?php echo $detail_hed['jenis_transaksi']  ?> </label>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3"> Jenis Bayar </label>
                            <div class="col-sm-9">
                                <label class="col-sm-3">: <?php echo $detail_hed['jenis_bayar']  ?> </label>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3">Keterangan </label>
                            <div class="col-sm-9">
                                <textarea name="keterangan" disabled class="form-control" rows="5" cols="50"> <?php echo $detail_hed['keterangan'] ?></textarea>

                            </div>
                        </div>
                    </div>

                    <table class="table expandable-table" style="margin-bottom:30px;">
                        <thead>
                            <tr>
                                <th width="3%">No</th>
                                <th width="30%">Nama Barang</th>
                                <th width="20%">Harga </th>
                                <th width="10%">Stok </th>
                                <th width="11.5%"> Qty</th>
                                <th width="11.5%"> Sisa</th>
                                <th>Total</th>
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
                                        <?php echo $list->stok_det; ?>
                                    </td>
                                    <td>
                                        <?php echo $list->qty; ?>
                                    </td>
                                    <td>
                                        <?php echo $list->sisa; ?>
                                    </td>
                                    <td>
                                        <?php echo "Rp " . number_format($list->total_harga, 2, ',', '.'); ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            <td colspan="6" style="text-align: center;"> <b> Grand Total </b> </td>
                            <td> <b> <?php echo "Rp " . number_format($detail_hed['grand_total'], 2, ',', '.'); ?></b></td>
                        </tbody>
                    </table>
                    <div class="form-group">

                    </div>
                    <!-- <div class="form-actions"> -->
                        <div class="col-md-2">

                            <a target="_blank" class="btn btn-primary" href="<?php echo base_url()?>transaksi/print2/<?php echo $detail_hed['id_transaksi'] ?>"> Print</a>
                        </div>
                </div>
                <hr />

            </div>
        </div>
    </div>