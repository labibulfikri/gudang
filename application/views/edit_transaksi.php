<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"> Transaksi Masuk </h4>
            <form class="form-sample" action="<?= base_url('transaksi/form_edit/') . $this->uri->segment(3); ?>" method="post">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Nama Pelanggan</label>
                            <div class="col-sm-9">
                                <!-- <input type="text" class="form-control" name="nama_pelanggan" /> -->
                                <select class="form-control" required name="id_pelanggan">

                                    <?php foreach ($pelanggan as $gan) { ?>
                                        <?php if ($gan->id_pelanggan == $detail_hed['id_pelanggan']) { ?>
                                            <option value="<?php echo $detail_hed['id_pelanggan'] ?>" selected> <?php echo $gan->nama_pelanggan ?> </option>
                                        <?php } else { ?>
                                            <option value="<?php echo $gan->id_pelanggan ?>"> <?php echo $gan->nama_pelanggan ?> </option>
                                    <?php }
                                    } ?>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Surat Jalan</label>
                            <div class="col-sm-9">
                                <input type="text" required readonly class="form-control" value="<?php echo $detail_hed['surat_jalan'] ?>" name="surat_jalan" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3  col-form-label">Tanggal</label>
                            <div class="col-sm-9">
                                <input type="date" required class="form-control" name="tgl_transaksi" value="<?php echo $detail_hed['tgl_transaksi'] ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3  col-form-label"> Jenis </label>
                            <div class="col-sm-9">
                                <select name="jenis_transaksi" id="jenis_transaksi" required class="form-control">
                                    <?php if ($detail_hed['jenis_transaksi'] == null || $detail_hed['jenis_transaksi'] == "") { ?>
                                        <option value="" disabled selected> Silahkan Pilih </option>
                                        <option value="keluar"> Keluar </option>
                                        <option value="masuk"> Masuk </option>

                                    <?php } else { ?>
                                        <option value="<?php echo $detail_hed['jenis_transaksi'] ?>" selected> <?php echo $detail_hed['jenis_transaksi'] ?></option>
                                        <option value="keluar"> Keluar </option>
                                        <option value="masuk"> Masuk </option>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Jenis Bayar </label>
                            <div class="col-sm-9">
                                <select name="jenis_bayar" required class="form-control">
                                    <?php if ($detail_hed['jenis_bayar'] == null || $detail_hed['jenis_bayar'] == "") { ?>

                                        <option value="" disabled selected> Silahkan Pilih </option>
                                        <option value="tunai"> Tunai </option>
                                        <option value="bri"> BRI </option>
                                        <option value="bcaplatinum"> BCA Platinum </option>
                                        <option value="bcagold"> BCA GOLD </option>
                                    <?php } else { ?>
                                        <option value="<?php echo $detail_hed['jenis_bayar'] ?>" selected> <?php echo $detail_hed['jenis_bayar'] ?></option>
                                        <option value="tunai"> Tunai </option>
                                        <option value="bri"> BRI </option>
                                        <option value="bcaplatinum"> BCA Platinum </option>
                                        <option value="bcagold"> BCA GOLD </option>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Ketrangan </label>
                            <div class="col-sm-9">
                                <textarea name="keterangan" class="form-control" rows="5" cols="50"> <?php echo $detail_hed['keterangan'] ?></textarea>

                            </div>
                        </div>
                    </div>

                    <table class="display table expandable-table" style="margin-bottom:30px;">
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
                            foreach ($detail as $list) {
                                $no++;
                            ?>
                                <tr id="divnya<?php echo $no ?>">
                                    <td>

                                        <label class="form-label" for="exampleInputReadonly"><button style="height:30px;width:25px;padding:2px;" class="btn btn-danger" onclick="hapus(<?php echo $no ?>)"><span>-</span></button></label>
                                        <input type="hidden" name="id_det_transaksi[]" value="<?php echo $list->id_det_transaksi; ?>">
                                    </td>
                                    <td>
                                        <select class="col-xs-12 form-control" name="id_barang[]" id="idBarang<?php echo $no; ?>" onchange="retrieve(<?php echo $no; ?>)">
                                            <option value="">Pilih Barang ...</option>
                                            <?php foreach ($barang as $brg) { ?>
                                                <option value="<?php echo $brg->id_barang ?>" <?php if ($brg->id_barang == $list->id_barang) {
                                                                                                    echo "selected";
                                                                                                } ?>><?php echo $brg->nama_barang; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" id="hargaBarang<?php echo $no; ?>" name="harga[]" style="text-align:right;" placeholder="Isi Harga Barang" class="hargaBarang form-control col-xs-12 tbl" onchange="calculate1(this);" value="<?php echo $list->det_harga; ?>" readonly required />
                                    </td>
                                    <td>
                                        <input type="text" id="stokBarang<?php echo $no; ?>" name="stok[]" style="text-align:right;" placeholder="Isi Stok" class="stokBarang form-control col-xs-12 tbl"   value="<?php echo $list->stok_det; ?>" readonly required />
                                    </td>
                                    <td>
                                        <input type="number" id="jumlahJual<?php echo $no; ?>" name="qty[]" placeholder="Isi qty" class="jumlahJual col-xs-12 form-control tbl" min="1" onchange="calculate2(this,<?php echo $no; ?>);" value="<?php echo $list->qty; ?>" required />
                                    </td>
                                    <td>
                                    <input type="text" id="sisaBarang<?php echo $no ?>" name="sisa[]" style="text-align:right;" placeholder="000,000,000" class="sisaBarang col-xs-12 tbl form-control" readonly value="<?php echo $list->sisa; ?>" required/>
                                    </td>
                                    <td>
                                        <input type="text" id="totalHarga<?php echo $no; ?>" name="total_harga[]" style="text-align:right;" placeholder="Total Harga" class="totalHarga col-xs-12 form-control tbl value_cr" value="<?php echo $list->total_harga; ?>" required readonly />
                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                    <div class="form-group">

                    </div>
                    <!-- <div class="form-actions"> -->
                    <div class="row ">
                        <div class="col-md-6">
                            <div class="form-group row">

                            </div>
                        </div>
                        <div class="col-md-6" style=" justify-content: left;">
                            <div class=" form-group row">
                                <label class="col-sm-4 control-label no-padding-right" for="form-field-1">Grand Total</label>
                                <div class="col-sm-8">
                                    <input type="text" id="form-field-1" value="<?php echo $detail_hed['grand_total'] ?>" name="grand_total" style="text-align:right;" placeholder="000,000,000" class="totalBiaya form-control" required readonly />
                                    <hr />
                                </div>
                                <div class="col-sm-2">
                                    <button id="addText" class="btn btn-sm btn-success" type="button">
                                        Tambah
                                    </button>
                                </div>
                                &nbsp;

                                <div class="col-sm-2">
                                    <button class="btn btn-sm btn-info" type="submit">
                                        <i class="ace-icon fa fa-check bigger-110"></i>
                                        Simpan
                                    </button>
                                </div>

                                &nbsp;
                                <div class="col-sm-2">
                                    <button class="btn btn-sm btn-danger" type="reset">
                                        <i class="ace-icon fa fa-undo bigger-110"></i>
                                        Reset
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />

                <script>
                    // $(".hargaBarang").autoNumeric("init");
                    // $(".totalHarga").autoNumeric("init");
                    // $(".jumlahJual").autoNumeric("init");
                    // $(".totalBiaya").autoNumeric("init");
                </script>
            </form>
        </div>
    </div>
</div>

<script>
    $(function() {
        var no = <?php echo $det ?>;
        $('#addText').click(function(event) {
            event.preventDefault();
            no++;
            var newRow = $('<tr id="item' + no + '">' +
                '<td><label class="form-label" for="exampleInputReadonly"><button style="height:30px;width:25px;padding:2px;" class="btn btn-danger" onclick="remove(' + no + ')"><span ><i class="ace-icon fa fa-trash"></i></span></button></label></td>' +
                '<td>' +
                '<select class="col-xs-12 form-control" id="idBarang' + no + '" onchange="retrieve(' + no + ')" name="id_barang[]">' +
                '<option value="">Pilih Barang ...</option>' +
                <?php foreach ($barang as $brg) { ?> '<option value="<?php echo $brg->id_barang ?>"><?php echo $brg->nama_barang; ?></option>' +
                <?php } ?> '</select>' +
                '</td>' +
                '<td>' +
                '<input type="text" id="hargaBarang' + no + '" name="harga[]" style="text-align:right;" placeholder="000,000,000" class="hargaBarang form-control col-xs-12 tbl" onchange="calculate1(this);" readonly required/>' +
                '</td>' +
                '<td>' +
                '<input type="text" id="stokBarang' + no + '" name="stok[]" style="text-align:right;" placeholder="000,000,000" class="stokBarang col-xs-12 tbl form-control" readonly required/>' +
                '</td>' +
                '<td>' +
                '<input type="number" id="jumlahJual' + no + '" name="qty[]" placeholder="Isi Rim" class="jumlahJual form-control col-xs-12 tbl" min="1" onkeyup="calculate2(this,' + no + ');" required/>' +
                '</td>' +
                '<td>' +
                '<input type="text" id="sisaBarang' + no + '" name="sisa[]" style="text-align:right;" placeholder="000,000,000" class="sisaBarang col-xs-12 tbl form-control" readonly required/>' +
                '</td>' +
                '<td>' +
                '<input type="text" id="totalHarga' + no + '"  name="total_harga[]" style="text-align:right;" placeholder="000,000,000" class="totalHarga form-control col-xs-12 tbl value_cr" required readonly/>' +
                '</td>' +
                '</tr>');
            $('#dt2').append(newRow);

            // $(".hargaBarang").autoNumeric("init");
            // $(".totalHarga").autoNumeric("init");
            // $(".jumlahJual").autoNumeric("init");
            // $(".totalBiaya").autoNumeric("init");
        });
    });

    function remove(no) {
        $('#item' + no).remove();
        calculate1();
    }

    function total() {
        var _totalHarga = 0;
        var _subTotal = 0;
        $('.totalHarga').each(function(i, obj) {
            if ($('.totalHarga').val().length > 0) {
                var _totalHarga = $('.totalHarga').eq(i).val();
                _totalHarga = _totalHarga.replace(/\,/g, '');
                _subTotal += parseFloat(_totalHarga);
            }

            $(".totalBiaya").val(_subTotal);
        });
    }

    function calculate1(obj) {
        /* var index = $(obj).index('.hargaBarang');
        var hargaBarang = $('.hargaBarang').eq( index ).val() || 0;
        hargaBarang = hargaBarang.replace(/\,/g, '');
        var jumlahJual = $('.jumlahJual').eq( index ).val() || 0;
        jumlahJual = jumlahJual.replace(/\,/g, '');
        var nilai = parseFloat(hargaBarang) * parseFloat(jumlahJual);
        $('.totalHarga').eq( index ).val(nilai);
        total(); */
        var total = 0;
        $($('.value_cr')).each(function(index) {
            value = parseFloat($(this).val().replace(/\,/g, ''));
            total = total + value;
        });
        $(".totalBiaya").val(total);
    }

    function calculate2(obj, no) {
        var jenis = $('#jenis_transaksi').val();
        var stok = $('#stokBarang'+no).val();
       
        var hargaBarang = $('#hargaBarang' + no).val();
        hargaBarang = hargaBarang.replace(/\,/g, '');
        var jumlahJual = $('#jumlahJual' + no).val();
        jumlahJual = jumlahJual.replace(/\,/g, '');
        var nilai = parseFloat(hargaBarang) * parseFloat(jumlahJual);

        if (jenis === "masuk"){
            var sisa =  parseInt(stok)+parseInt(jumlahJual) ; 
        }else{            
            var sisa =  parseInt(stok)-parseInt(jumlahJual) ; 
        }
        $('#sisaBarang' +no).val(sisa);
       
        $('#totalHarga' + no).val(nilai);
        total();
        /* var total = 0;
        $($('.value_cr')).each(function(index){
        	value = parseFloat($(this).val().replace(/\,/g, ''));
        	total = total + value;
        });
        $(".totalBiaya").val(total); */
    }


    function retrieve(no) {
        var id_barang = $('#idBarang' + no).val();
        $.ajax({
            url: "<?php echo base_url("barang/detail_brg/") ?>",
            type: "post",
            data: {
                id: id_barang
            },
            dataType: "JSON",
            success: function(data) {
                $('#stokBarang' + no).val(data.stok);
                $('#hargaBarang' + no).val(data.harga);
                // $('#stok' + no).val(data.stok);
            }
        });
    }


    function hapus(no) {
        $('#divnya' + no).remove();
        calculate1();
    }
</script>