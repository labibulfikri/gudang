<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <a href="<?= base_url('barang/tambah') ?>" class="btn btn-primary"> Tambah Data </a>
                <p class="card-title"> Master Data barang </p>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">

                            <table class="display expandable-table barang" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 1%">No </th>
                                        <th style="width: 30%">Nama </th>
                                        <th style="width: 10%">Stok </th>
                                        <th style="width: 10%">Harga</th>
                                        <th style="width: 10%">Aksi</th>
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
                <h5 class="modal-title" id="staticBackdropLabel">UPDATE DATA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('barang/update') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label> Nama barang </label>
                        <input type="text" class="form-control" hidden id="id_barang" name="id_barang">
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                    </div>

                    <div class="form-group">
                        <label> Harga </label>
                        <input type="text" class="form-control" id="harga" name="harga">
                    </div>


                    <div class="form-group">
                        <label> Stok </label>
                        <input type="text" class="form-control" id="stok" name="stok">
                    </div>
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
        var databarang = $('.barang').DataTable({
            "processing": true,
            "serverSide": true,
            "responsive": false,
            "order": [],
            "lengthMenu": [
                [10, 50, 100],
                [10, 50, 100]
            ],


            "ajax": {
                url: "<?php echo base_url() . 'barang/fetch_barang'; ?>",
                type: "POST"
            },
            "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                // console.log(nRow);
                // console.log(aData['masalah']);
                // console.log(iDisplayIndex);
                // console.log(iDisplayIndexFull);
                // if (aData['masalah'] == 0) {
                //     $('td', nRow).css('background-color', 'Red');
                // }
                // if (aData['map'] == 3) {
                //     $('td', nRow).css('background-color', 'Green');
                // } else if (aData['map'] == 2) {
                //     $('td', nRow).css('background-color', 'Yellow');
                // } else {
                //     $('td', nRow).css('background-color', 'Blue');

                // }
            }
        });
        // new $.fn.dataTable.FixedHeader(databarang);
    });
</script>


<script>
    $(document).on('click', '#tombolEdit', function() {
        $('#staticBackdrop').modal({
            backdrop: 'static'
        });
        var id_barang = $(this).data("id");
        var nama_barang = $(this).data("nama_barang");
        var harga = $(this).data("harga");
        var stok = $(this).data("stok");

        $('#id_barang').val(id_barang);
        $('#nama_barang').val(nama_barang);
        $('#harga').val(harga);
        $('#stok').val(stok);

    });
</script>


<script>
    //fungsi delete
    $(document).on('click', '.tombol_delete', function() {
        var id_barang = $(this).attr("id");
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
                    url: "<?php echo base_url(); ?>barang/delete",
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
                        id_barang: id_barang,
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