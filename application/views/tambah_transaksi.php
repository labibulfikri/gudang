<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"> Transaksi </h4>
            <form class="form-sample" action="<?= base_url('transaksi/form_add') ?>" method="post">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Nama Pelanggan</label>
                            <div class="col-sm-9">
                                <!-- <input type="text" class="form-control" name="nama_pelanggan" /> -->
                                <select class="form-control" required name="id_pelanggan">
                                    <option value="" selected disabled> - Silahkan Pilih - </option>
                                    <?php foreach ($pelanggan as $gan) { ?>
                                        <option value="<?php echo $gan->id_pelanggan ?>"> <?php echo $gan->nama_pelanggan ?> </option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Surat Jalan</label>
                            <div class="col-sm-9">
                                <input type="text" required readonly class="form-control" value="<?php echo $kode ?>" name="surat_jalan" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3  col-form-label">Tanggal</label>
                            <div class="col-sm-9">
                                <input type="date" required class="form-control" name="tgl_transaksi" />
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3  col-form-label"> Jenis </label>
                            <div class="col-sm-9">
                                <select name="jenis_transaksi" id="jenis_transaksi" required class="form-control">
                                    <option value="" disabled selected> Silahkan Pilih </option>
                                    <option value="keluar"> Keluar </option>
                                    <option value="masuk"> Masuk </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Jenis Bayar </label>
                            <div class="col-sm-9">
                            <select name="jenis_bayar" required class="form-control">
                                    <option value="" disabled selected> Silahkan Pilih </option>
                                    <option value="tunai"> Tunai </option>
                                    <option value="bri"> BRI  </option>
                                    <option value="bcaplatinum"> BCA Platinum   </option>
                                    <option value="bcagold"> BCA GOLD  </option>
                                </select>
                            </div>
                        </div>
                    </div>  
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Ketrangan </label>
                            <div class="col-sm-9">
                                <textarea name="keterangan" class="form-control" rows="5" cols="50"> </textarea>

                            </div>
                        </div>
                    </div>

                   

                    <!-- <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <textarea name="keterangan" class="form-control" rows="5" cols="50"> </textarea>

                                <button type="button" class="btn btn-sm btn-primary" onclick="addRow('tbody2')">Tambah Baris</button>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-warning" onclick="InsertRow('tbody2')">Sisip Baris</button>
                                <button type="button" class="btn btn-sm btn-danger" onclick="deleteRow('tbody2')">Hapus Baris</button>
                            </div>
                        </div>
                    </div> -->


                    <!-- <div class="col-md-12">
                        <div class="form-group row">
                            <table class="display table table-striped expandable-table">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Nama Barang
                                        </th>
                                        <th>
                                            Qty
                                        </th>
                                        <th>
                                            Harga
                                        </th>
                                        <th>
                                            Stok
                                        </th>
                                        <th>
                                            Sisa
                                        </th>
                                        <th>
                                            Total
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="tbody2">
                                    <tr>
                                        <td><input name="chk_a[]" type="checkbox" class="checkall_a" value="" /></td>
                                        <td>
                                            <select class="form-control" id="selectBox" onchange="changeFunc();" name="id_barang[]">
                                                <option value="" selected disabled> -Silahkan Pilih- </option>
                                                <?php foreach ($barang as $brg) { ?>
                                                    <option value="<?php echo $brg->id_barang ?>"> <?php echo $brg->nama_barang ?> </option>

                                                <?php } ?>
                                            </select>
                                        </td>

                                        <td>
                                            <input type="text" id="qty" name="qty[]" onkeyup="hitung()" class="form-control" />
                                        </td>

                                        <td>
                                            <input class="form-control" type="text" id="harga" name="harga[]" readonly />
                                        </td>

                                        <td>
                                            <input class="form-control" type="text" name="stok[]" id="stok" readonly />
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" name="sisa[]" id="sisa" readonly />
                                        </td>

                                        <td>
                                            <input type="text" readonly id="hasil" class="form-control" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> -->



                    <table class="display table table-striped expandable-table" style="margin-bottom:30px;">
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
                        <tbody id="dt2"></tbody>
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
                                    <input type="text" id="form-field-1" name="grand_total" style="text-align:right;" placeholder="000,000,000" class="totalBiaya form-control" required readonly />
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
                <!-- <button type="submit" class="btn btn-primary"> Save </button>
                <button type="reset" class="btn btn-danger"> Reset </button> -->





            </form>
        </div>
    </div>
</div>


<script>
    function hitung() {
        var qty = 0;
        var qty = document.getElementById("qty").value;
        var stok = document.getElementById("stok").value;
        var harga = document.getElementById("harga").value;
        var hasil = stok - qty

        var hasil2 = harga * qty;

        $('#sisa').val(hasil);
        $('#hasil').val(hasil2);
    }

    function changeFunc() {
        var selectBox = document.getElementById("selectBox");
        var id = selectBox.options[selectBox.selectedIndex].value;
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>barang/detail_brg',
            data: {
                id: id
            },
            dataType: "json",
            success: function(data) {

                $('#sisa').val("");
                $('#hasil').val("");
                $('#stok').val(data.stok);
                $('#harga').val(data.harga);


            },
            error: function(result) {
                alert('error');
            }
        });
    }
    // JavaScript Document
    function addRow(tableID) {
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);
        var colCount = table.rows[0].cells.length;
        for (var i = 0; i < colCount; i++) {
            var newcell = row.insertCell(i);
            newcell.innerHTML = table.rows[0].cells[i].innerHTML;
            var child = newcell.children;
            for (var i2 = 0; i2 < child.length; i2++) {
                var test = newcell.children[i2].tagName;
                switch (test) {
                    case "INPUT":
                        if (newcell.children[i2].type == 'checkbox') {
                            newcell.children[i2].value = "";
                            newcell.children[i2].checked = false;
                        } else {

                            newcell.children[i2].value = "";
                        }
                        break;
                    case "SELECT":
                        newcell.children[i2].value = "";
                        break;
                    default:
                        break;
                }
            }
        }
    }


    function deleteRow(tableID) {
        try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
            for (var i = 0; i < rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if (null != chkbox && true == chkbox.checked) {
                    if (rowCount <= 1) {
                        alert("Tidak dapat menghapus semua baris.");
                        break;
                    }
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
            }
        } catch (e) {
            alert(e);
        }
    }

    // function InsertRow(tableID) {
    //     try {
    //         var table = document.getElementById(tableID);
    //         var rowCount = table.rows.length;
    //         for (var i = 0; i < rowCount; i++) {
    //             var row = table.rows[i];
    //             var chkbox = row.cells[0].childNodes[0];
    //             if (null != chkbox && true == chkbox.checked) {
    //                 var newRow = table.insertRow(i + 1);
    //                 var colCount = table.rows[0].cells.length;
    //                 for (h = 0; h < colCount; h++) {
    //                     var newCell = newRow.insertCell(h);
    //                     newCell.innerHTML = table.rows[0].cells[h].innerHTML;
    //                     var child = newCell.children;
    //                     for (var i2 = 0; i2 < child.length; i2++) {
    //                         var test = newCell.children[i2].tagName;
    //                         switch (test) {
    //                             case "INPUT":
    //                                 if (newCell.children[i2].type == 'checkbox') {
    //                                     newCell.children[i2].value = "";
    //                                     newCell.children[i2].checked = false;
    //                                 } else {
    //                                     newCell.children[i2].value = "";
    //                                 }
    //                                 break;
    //                             case "SELECT":
    //                                 newCell.children[i2].value = "";
    //                                 break;
    //                             default:
    //                                 break;
    //                         }
    //                     }
    //                 }
    //             }

    //         }
    //     } catch (e) {
    //         alert(e);
    //     }
    // }
</script>

<script>
    $(function() {
        var no = 0;
        $('#addText').click(function(event) {
            event.preventDefault();
            no++;
            var newRow = $('<tr id="item' + no + '">' +
                '<td><label class="form-label" for="exampleInputReadonly"><button style="height:30px;width:25px;padding:2px;" class="btn btn-danger" onclick="remove(' + no + ')"><span ><i class="ace-icon fa fa-trash">-</i></span></button></label></td>' +
                '<td>' +
                '<select required class="col-xs-12 form-control" id="idBarang' + no + '" onchange="retrieve(' + no + ')" name="id_barang[]">' +
                '<option value="" disabled selected>Pilih Barang ...</option>' +
                <?php foreach ($barang as $brg) { ?> '<option value="<?php echo $brg->id_barang ?>"><?php echo $brg->nama_barang; ?> - STOK [ <?php echo $brg->stok; ?> ]  </option>' +
                <?php } ?> '</select>' +
                '</td>' +
                '<td>' +
                '<input type="text" id="hargaBarang' + no + '" name="harga[]" style="text-align:right;" placeholder="000,000,000" class="hargaBarang col-xs-12 tbl form-control" onchange="calculate1(this);" readonly required/>' +
                '</td>' +
                '<td>' +
                '<input type="text" id="stokBarang' + no + '" name="stok[]" style="text-align:right;" placeholder="000,000,000" class="stokBarang col-xs-12 tbl form-control" readonly required/>' +
                '</td>' +
                '<td>' +
                '<input type="text" id="jumlahJual' + no + '" name="qty[]" placeholder="Isi Jumlah Jual" class="jumlahJual col-xs-12 tbl form-control" min="1" onkeyup="calculate2(this, '+no+');" required/>' +
                '</td>' +
                '<td>' +
                '<input type="text" id="sisaBarang' + no + '" name="sisa[]" style="text-align:right;" placeholder="000,000,000" class="sisaBarang col-xs-12 tbl form-control" readonly required/>' +
                '</td>' +
                '<td>' +
                '<input type="text" name="total_harga[]" style="text-align:right;" placeholder="000,000,000" class="totalHarga col-xs-12 tbl value_cr form-control" required readonly/>' +
                '</td>' +
                '</tr>');
            $('#dt2').append(newRow);
            $(".hargaBarang").autoNumeric("init");
            $(".stokBarang").autoNumeric("init");
            $(".totalHarga").autoNumeric("init");
            // $(".jumlahJual").autoNumeric("init");
            $(".jumlahJual");
            $(".totalBiaya").autoNumeric("init");
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
 
    function calculate2(obj,no) {
        var jenis = $('#jenis_transaksi').val();
        var stok = $('#stokBarang'+no).val();
       
 
        var index = $(obj).index('.hargaBarang');
        var hargaBarang = $('.hargaBarang').eq(index).val() || 0;
        hargaBarang = hargaBarang.replace(/\,/g, '');
        var jumlahJual = $('.jumlahJual').eq(index).val() || 0;
        jumlahJual = jumlahJual.replace(/\,/g, '');
        
        if (jenis === "masuk"){
            var sisa =  parseInt(stok)+parseInt(jumlahJual) ; 
        }else{            
            var sisa =  parseInt(stok)-parseInt(jumlahJual) ; 
        }
        
        $('#sisaBarang' +no).val(sisa);
        
        var nilai = parseFloat(hargaBarang) * parseFloat(jumlahJual);
        $('.totalHarga').eq(index).val(nilai);
        //total(); 
        var total = 0;
        $($('.value_cr')).each(function(index) {
            value = parseFloat($(this).val().replace(/\,/g, ''));
            total = total + value;
        });
        $(".totalBiaya").val(total);
    }

    function retrieve(no) {
        var id_barang = $('#idBarang' + no).val();
        $.ajax({
            // url: "<?php echo base_url("barang/detail_brg") ?>" + id_barang,
            url: "<?php echo base_url("barang/detail_brg/") ?>",
            type: "post",
            data: {
                id: id_barang
            },
            dataType: "JSON",
            success: function(data) {
                // console.log(data.stok);

                $('#stokBarang' + no).val(data.stok);
                $('#hargaBarang' + no).val(data.harga); 
            }
        });
    }
</script>