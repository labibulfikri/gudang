<div class="main-content">
    <div class="main-content-inner">
        <!-- #section:basics/content.breadcrumbs -->
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try {
                    ace.settings.check('breadcrumbs', 'fixed')
                } catch (e) {}
            </script>

            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="<?php echo base_url('admin/dashboard'); ?>">Beranda</a>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/penjualan/daftar') ?>">Penjualan Barang</a>
                </li>
                <li class="active">Tambah Penjualan Barang</li>
            </ul><!-- /.breadcrumb -->

            <!-- #section:basics/content.searchbox -->


            <!-- /section:basics/content.searchbox -->
        </div>

        <!-- /section:basics/content.breadcrumbs -->
        <div class="page-content">
            <!-- #section:settings.box -->
            <div class="ace-settings-container" id="ace-settings-container">
                <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                    <i class="ace-icon fa fa-cog bigger-130"></i>
                </div>

                <div class="ace-settings-box clearfix" id="ace-settings-box">
                    <div class="pull-left width-50">
                        <!-- #section:settings.skins -->
                        <div class="ace-settings-item">
                            <div class="pull-left">
                                <select id="skin-colorpicker" class="hide">
                                    <option data-skin="no-skin" value="#438EB9">#438EB9</option>
                                    <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                                    <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                                    <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                                </select>
                            </div>
                            <span>&nbsp; Choose Skin</span>
                        </div>

                        <!-- /section:settings.skins -->

                        <!-- #section:settings.navbar -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
                            <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
                        </div>

                        <!-- /section:settings.navbar -->

                        <!-- #section:settings.sidebar -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
                            <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
                        </div>

                        <!-- /section:settings.sidebar -->

                        <!-- #section:settings.breadcrumbs -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
                            <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                        </div>

                        <!-- /section:settings.breadcrumbs -->

                        <!-- #section:settings.rtl -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
                            <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
                        </div>

                        <!-- /section:settings.rtl -->

                        <!-- #section:settings.container -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
                            <label class="lbl" for="ace-settings-add-container">
                                Inside
                                <b>.container</b>
                            </label>
                        </div>

                        <!-- /section:settings.container -->
                    </div><!-- /.pull-left -->

                    <div class="pull-left width-50">
                        <!-- #section:basics/sidebar.options -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" />
                            <label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
                        </div>

                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" />
                            <label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
                        </div>

                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" />
                            <label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
                        </div>

                        <!-- /section:basics/sidebar.options -->
                    </div><!-- /.pull-left -->
                </div><!-- /.ace-settings-box -->
            </div><!-- /.ace-settings-container -->

            <!-- /section:settings.box -->
            <div class="page-header">
                <h1>
                    Form Tambah Penjualan Barang
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'distributor/order/doAdd' ?>" role="form">
                        <?php
                        $dataOld = $this->session->flashdata('oldPost');
                        echo $this->session->flashdata('msgbox'); ?>
                        <!-- #section:elements.form -->
                        <div class="form-group">
                            <div class="col-sm-2" style="border-bottom: 2px solid #6EBACC;">
                                Harap isi isian di bawah ini:
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Pelanggan</label>
                            <div class="col-sm-9">
                                <input type="hidden" class="col-xs-10 col-sm-5" name="idPelanggan" value="<?php echo $DistributorID ?>">
                                <input type="hidden" class="col-xs-10 col-sm-5" name="poinReward" value="<?php echo $PoinReward + 10; ?>">
                                <input type="text" class="col-xs-10 col-sm-5" name="namaPelanggan" value="<?php echo $NamaDistributor ?>" readonly required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tanggal Jual</label>
                            <div class="col-sm-4">
                                <input type="date" id="form-field-1" name="tglJual" class="col-xs-10 col-sm-5" style="height:32px;" value="<?php echo date("Y-m-d"); ?>" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Keterangan</label>
                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" name="keterangan" placeholder="Isi Keterangan" class="col-xs-10 col-sm-5" required />
                            </div>
                        </div>
                        <div>
                            <table class="table table-bordered table-hover" style="margin-bottom:30px;">
                                <thead>
                                    <tr>
                                        <th width="3%">No</th>
                                        <th width="30%">Nama Barang</th>
                                        <th width="20%">Harga Jual</th>
                                        <th width="11.5%">Jumlah Jual</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody id="dt2"></tbody>
                            </table>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Total</label>
                            <div class="col-sm-5">
                                <input type="text" id="form-field-1" name="totalBiaya" style="text-align:right;" placeholder="000,000,000" class="totalBiaya col-xs-10 col-sm-5" required readonly />
                            </div>
                        </div>
                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button id="addText" class="btn btn-success" type="button">
                                    <i class="ace-icon fa fa-plus bigger-110"></i>
                                    Tambah Row
                                </button>

                                &nbsp;
                                <button class="btn btn-info" type="submit">
                                    <i class="ace-icon fa fa-check bigger-110"></i>
                                    Simpan
                                </button>

                                &nbsp;
                                <button class="btn" type="reset">
                                    <i class="ace-icon fa fa-undo bigger-110"></i>
                                    Reset
                                </button>
                            </div>
                        </div>
                        <div class="hr hr-24"></div>
                    </form>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
<script>
    $(function() {
        var no = 0;
        $('#addText').click(function(event) {
            event.preventDefault();
            no++;
            var newRow = $('<tr id="item' + no + '">' +
                '<td><label class="form-label" for="exampleInputReadonly"><button style="height:30px;width:25px;padding:2px;" class="btn btn-danger" onclick="remove(' + no + ')"><span ><i class="ace-icon fa fa-trash"></i></span></button></label></td>' +
                '<td>' +
                '<select class="col-xs-12" id="idBarang' + no + '" onchange="retrieve(' + no + ')" name="idBarang[]">' +
                '<option value="">Pilih Barang ...</option>' +
                <?php foreach ($listBarang as $brg) { ?> '<option value="<?php echo $brg->idBarang ?>"><?php echo $brg->namaBarang; ?></option>' +
                <?php } ?> '</select>' +
                '</td>' +
                '<td>' +
                '<input type="text" id="hargaBarang' + no + '" name="hargaBarang[]" style="text-align:right;" placeholder="000,000,000" class="hargaBarang col-xs-12 tbl" onchange="calculate1(this);" readonly required/>' +
                '</td>' +
                '<td>' +
                '<input type="text" id="jumlahJual' + no + '" name="jumlahJual[]" placeholder="Isi Jumlah Jual" class="jumlahJual col-xs-12 tbl" min="1" onchange="calculate2(this);" required/>' +
                '</td>' +
                '<td>' +
                '<input type="text" name="totalHarga[]" style="text-align:right;" placeholder="000,000,000" class="totalHarga col-xs-12 tbl value_cr" required readonly/>' +
                '</td>' +
                '</tr>');
            $('#dt2').append(newRow);
            $(".hargaBarang").autoNumeric("init");
            $(".totalHarga").autoNumeric("init");
            $(".jumlahJual").autoNumeric("init");
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

    function calculate2(obj) {
        var index = $(obj).index('.hargaBarang');
        var hargaBarang = $('.hargaBarang').eq(index).val() || 0;
        hargaBarang = hargaBarang.replace(/\,/g, '');
        var jumlahJual = $('.jumlahJual').eq(index).val() || 0;
        jumlahJual = jumlahJual.replace(/\,/g, '');
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
            url: "<?php echo base_url("admin/penjualan/getBarang/") ?>" + id_barang,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('#stok' + no).val(data.stok);
                $('#hargaBarang' + no).val(data.hargaBarang);
                $('#hpp' + no).val(data.hpp);
            }
        });
    }
</script>