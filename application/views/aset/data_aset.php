 <div class="row">
     <div class="col-md-12 grid-margin stretch-card">

         <div class="card">
             <div class="row">

                 <div class="col-md-3 stretch-card transparent">
                     <div class="card card-light-blue">
                         <div class="card-body">
                             <h3 class="mb-3">Total Aset</h3>
                             <p class="fs-30 mb-2"><?= $total['total'] ?></p>
                             <!-- <p>0.22% (30 days)</p> -->
                         </div>
                     </div>
                 </div>
                 <div class="col-md-3 stretch-card transparent">
                     <div class="card card-light-danger">
                         <div class="card-body">
                             <h3 class="mb-3">Mandali</h3>
                             <p class="fs-30 mb-2"><?= $mandali['mandali'] ?></p>
                             <!-- <p>0.22% (30 days)</p> -->
                         </div>
                     </div>
                 </div>
                 <div class="col-md-3 stretch-card transparent">
                     <div class="card card-light-danger">
                         <div class="card-body">
                             <h3 class="mb-3">Terbit Sertifikat </h3>
                             <p class="fs-30 mb-2"><?= $terbit['terbit'] ?></p>
                             <!-- <p>0.22% (30 days)</p> -->
                         </div>
                     </div>
                 </div>
                 <div class="col-md-3 stretch-card transparent">
                     <div class="card card-light-danger">
                         <div class="card-body">
                             <h3 class="mb-3">Kategory C</h3>
                             <p class="fs-30 mb-2"><?= $c['kategory_c'] ?></p>
                             <!-- <p>0.22% (30 days)</p> -->
                         </div>
                     </div>
                 </div>
             </div>
             <hr />
             <div class="card-body">

                 <p class="card-title"> Master Data </p>
                 <div class="row">
                     <div class="col-12">
                         <div class="table-responsive">

                             <table class="display expandable-table aset" style="width:100%">
                                 <!-- <caption>List of users</caption> -->
                                 <thead>
                                     <tr>
                                         <th style="width: 1%">No </th>
                                         <th style="width: 10%">Nomor Register </th>
                                         <th style="width: 30%">Alamat </th>
                                         <th style="width: 10%">Status Saat Ini </th>
                                         <th style="width: 10%">Detail </th>
                                         <th style="width: 10%">Aksi</th>
                                         <!-- <th style="width: 80%">Detail Udangan </th>
            <th>Cetak Disposisi</th>
            <th>Aksi</th> -->
                                     </tr>
                                 </thead>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>




 <!-- Modal -->
 <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" tabindex="-1" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-xl">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="staticBackdropLabel">Edit Master Data</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form action="<?= base_url('aset/update') ?>" method="POST">
                 <div class="modal-body">
                     <div class="form-group">
                         <label> Nomor Register Baru </label>
                         <input type="text" class="form-control" id="id_aset" hidden name="id_aset">
                         <input type="text" class="form-control" id="register_baru" name="register_baru">
                     </div>

                     <div class="form-group">
                         <label> Nomor Register Lama </label>
                         <input type="text" class="form-control" id="register_lama" name="register_lama">
                     </div>
                     <div class="form-group">
                         <label> Lokasi Pencatatan</label>
                         <input type="text" class="form-control" id="lokasi" name="lokasi_pencatatan">
                     </div>

                     <div class="form-group">
                         <label> Alamat </label>
                         <input type="text" class="form-control" id="alamat" name="alamat">
                     </div>
                     <div class="form-group">
                         <label> Penggunaan </label>
                         <input type="text" class="form-control" id="penggunaan" name="penggunaan">
                     </div>
                     <div class="form-group">
                         <label> Luas </label>
                         <input type="text" class="form-control" id="luas" name="luas">
                     </div>

                     <label> Kategory </label>
                     <select class="form-control" id="masalah" name='masalah'>"
                         <option value="" disabled> Silahkan Pilih</option>
                         <option value="0">Kategory C </option>
                         <option value="1"> Mandali </option>
                     </select>
                     <br>

                     <label> Lokasi BPN. </label>
                     <select class="form-control" id="lokasi_bpn" name='lokasi_bpn'>"
                         <option value="" disabled> Silahkan Pilih</option>
                         <option value="bpn1">BPN 1 </option>
                         <option value="bpn2"> BPN 2 </option>
                     </select>
                     <br>

                     <label>Kota / Kabupaten </label>
                     <select class="form-control" id="kab" name="id_regencie" required ">  
                       <option></option>
                     </select>
                     <br>
                     <label> Kecamatan </label>
                     <select class=" form-control" id="kecamatan" name="id_district" required>

                     </select>
                     <br>
                     <label> Kelurahan </label>
                     <select class="form-control" required id="kelurahan" name="id_village">
                     </select>
                     <div class=" modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary">Save</button>
                     </div>
             </form>
         </div>
     </div>
 </div>


 <script>
     $(document).ready(function() {
         var dataAset = $('.aset').DataTable({
             "processing": true,
             "serverSide": true,
             "responsive": false,
             "order": [],
             "lengthMenu": [
                 [10, 50, 100],
                 [10, 50, 100]
             ],


             "ajax": {
                 url: "<?php echo base_url() . 'aset/fetch_aset'; ?>",
                 type: "POST"
             },
             "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                 // console.log(nRow);
                 // console.log(aData['masalah']);
                 // console.log(iDisplayIndex);
                 // console.log(iDisplayIndexFull);
                 if (aData['masalah'] == 0) {
                     $('td', nRow).css('background-color', 'Red');
                 }
                 if (aData['map'] == 3) {
                     $('td', nRow).css('background-color', 'Green');
                 } else if (aData['map'] == 2) {
                     $('td', nRow).css('background-color', 'Yellow');
                 } else {
                     $('td', nRow).css('background-color', 'Blue');

                 }
             }
         });
         // new $.fn.dataTable.FixedHeader(dataAset);
     });
 </script>




 <script>
     $(document).on('click', '#tombolEdit', function() {
         $('#staticBackdrop').modal({
             backdrop: 'static'
         });
         var id_aset = $(this).data("id");
         // var register_baru = $(this).data('registerbaru');
         // var register_lama = $(this).data('registerlama');
         // var lokasi = $(this).data('lokasi');
         // var alamat = $(this).data('alamat');
         // var luas = $(this).data('luas');
         // var penggunaan = $(this).data('penggunaan');
         // var masalah = $(this).data('masalah');

         // $('#id_aset').val(id_aset);
         // $('#register_baru').val(register_baru);
         // $('#register_lama').val(register_lama);
         // $('#lokasi').val(lokasi);
         // $('#alamat').val(alamat);
         // $('#penggunaan').val(penggunaan);
         // $('#luas').val(luas);
         // $('#masalah').val(masalah);


         $.ajax({
             type: "POST",
             url: '<?php echo base_url(); ?>aset/detail_aset',
             data: {
                 id: id_aset
             },
             dataType: "json",
             success: function(data) {
                 console.log(data.nama_kota);
                 $('#id_aset').val(data.id_aset);
                 $('#register_baru').val(data.register_baru);
                 $('#register_lama').val(data.register_lama);
                 $('#lokasi').val(data.lokasi);
                 $('#alamat').val(data.alamat);
                 $('#penggunaan').val(data.penggunaan);
                 $('#luas').val(data.luas);
                 $('#masalah').val(data.masalah);
                 $('#lokasi_bpn').val(data.lokasi_bpn);
                 $('#kab').val(data.nama_kota);
                 // $('#kota').val();
                 // getAjaxKecamatan();
                 // }

                 // if (data.id_districts != null) {
                 // $('#kecamatan').html(data.id_districts);
                 // }
                 // if (data.id_villages != null) {

                 //     $('#kelurahan').val(data.id_villages);
                 // }


             },
             error: function(result) {
                 alert('error');
             }
         });



     });
 </script>



 <script>
     $(document).ready(function() {

         $('#kota').select2({
             placeholder: 'Pilih Kota/Kabupaten',
             language: "id",
             dropdownParent: $('#staticBackdrop'),
         });
         $('#kecamatan').select2({
             placeholder: 'Pilih Kecamatan',
             language: "id",
             dropdownParent: $('#staticBackdrop'),
         });
         $('#kelurahan').select2({
             placeholder: 'Pilih Kelurahan',
             language: "id",
             dropdownParent: $('#staticBackdrop'),
         });
         //saat pilihan provinsi di pilih, maka akan mengambil data kota
         //di data-wilayah.php menggunakan ajax

         $("#kota").change(getAjaxKota);

         function getAjaxKota() {
             // $("img#load2").show();
             var id_regencies = $("#kota").val();
             $.ajax({
                 type: "POST",
                 dataType: "html",
                 url: "<?php echo base_url('aset/get_kec') ?>",
                 data: {
                     id: id_regencies
                 },
                 success: function(msg) {
                     $("select#kecamatan").html(msg);
                     // $("img#load2").hide();
                     getAjaxKecamatan();
                 }
             });
         }

         //saat pilihan kecamatan di pilih, maka akan mengambil data kelurahan
         //di data-wilayah.php menggunakan ajax
         $("#kecamatan").change(getAjaxKecamatan);

         function getAjaxKecamatan() {
             var id_district = $("#kecamatan").val();

             $.ajax({
                 type: "POST",
                 dataType: "html",
                 url: "<?php echo base_url('aset/get_kelurahan') ?>",
                 data: {
                     id: id_district
                 },
                 success: function(msg) {
                     $("select#kelurahan").html(msg);
                 }
             });
         }
     });
 </script>
 <script>
     //fungsi delete
     $(document).on('click', '.tombol_delete', function() {
         var id_aset = $(this).attr("id");
         Swal.fire({
             title: 'Konfirmasi',
             text: "Anda ingin menghapus ",
             type: 'warning',
             showCancelButton: true,
             confirmButtonText: 'ya',
             confirmButtonColor: '#d33',
             cancelButtonColor: '#3085d6',
             cancelButtonText: 'Tidak',
             reverseButtons: true
         }).then((result) => {
             if (result.value) {
                 $.ajax({
                     url: "<?php echo base_url(); ?>aset/delete",
                     method: "POST",
                     onBeforeOpen: function() {
                         Swal.fire({
                             title: 'Menunggu',
                             html: 'Memproses data',
                             onOpen: () => {
                                 swal.showLoading()
                             }
                         })
                     },
                     data: {
                         id_aset: id_aset,
                     },
                     success: function(data) {
                         Swal.fire(
                             'Hapus',
                             'Berhasil Terhapus',
                             'success'
                         )
                         location.reload();
                     }
                 })
             } else if (result.dismiss === Swal.DismissReason.cancel) {
                 Swal.fire(
                     'Batal',
                     'Anda membatalkan penghapusan',
                     'error'
                 )
             }
         })
     });
 </script>


 <!-- <script> 


    $(function() {
        $('#kotanya').select2({
            minimumInputLength: 3,
            allowClear: true,
            dropdownParent: $('#staticBackdrop'),
            placeholder: 'masukkan nama propinsi',
            ajax: {
                dataType: 'json',
                url: '<?php echo base_url('c_profil/get_kota') ?>',
                delay: 250,
                data: function(params) {
                    return {
                        search: params.term
                    }
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {

                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
    });
</script>

<script> 
    function getKecamatan(el) {
        var value = $(el).val();

        field = $("#kecamatan");
        field.html("<option class='form-control select2'  value='0'>Loading.....</option>");

        $('#kecamatan').select2({
            minimumInputLength: 3,
            // allowClear: true,
            dropdownParent: $('#staticBackdrop'),
            placeholder: 'masukkan nama Kecamatan',
            ajax: {
                dataType: 'json',
                url: '<?php echo base_url('aset/get_kec') ?>',
                delay: 250,
                data: function(params) {
                    return {
                        search: params.term,
                        id: value
                    }
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            console.log(data);
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });

    }
</script>

<script> 
    function getKelurahan(el) {
        var value = $(el).val();
        field = $("#kelurahan");
        field.html("<option class='form-control select2' value='0'>Loading.....</option>");

        $('#kelurahan').select2({
            minimumInputLength: 3,
            allowClear: true,
            dropdownParent: $('#staticBackdrop'),
            placeholder: 'masukkan nama kelurahan',
            ajax: {
                dataType: 'json',
                url: '<?php echo base_url('aset/get_kelurahan') ?>',
                delay: 250,
                data: function(params) {
                    return {
                        search: params.term,
                        id: value
                    }
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });

    }
</script> -->