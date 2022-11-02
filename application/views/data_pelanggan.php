<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <a href="<?= base_url('pelanggan/tambah') ?>" class="btn btn-primary"> Tambah Data </a>
                <p class="card-title"> Master Data Pelanggan </p>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">

                            <table class="display expandable-table pelanggan" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 1%">No </th>
                                        <th style="width: 10%">Nama </th>
                                        <th style="width: 30%">Alamat </th>
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
            <form action="<?= base_url('pelanggan/update') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label> Nama Pelanggan </label>
                        <input type="text" class="form-control" hidden id="id_pelanggan" name="id_pelanggan">
                        <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan">
                    </div>

                    <div class="form-group">
                        <label> Alamat </label>
                        <input type="text" class="form-control" id="alamat_pelanggan" name="alamat_pelanggan">
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
        var dataPelanggan = $('.pelanggan').DataTable({
            "processing": true,
            "serverSide": true,
            "responsive": false,
            "order": [],
            "lengthMenu": [
                [10, 50, 100],
                [10, 50, 100]
            ],


            "ajax": {
                url: "<?php echo base_url() . 'pelanggan/fetch_pelanggan'; ?>",
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
        // new $.fn.dataTable.FixedHeader(datapelanggan);
    });
</script>


<script>
    $(document).on('click', '#tombolEdit', function() {
        $('#staticBackdrop').modal({
            backdrop: 'static'
        });
        var id_pelanggan = $(this).data("id");
        var nama_pelanggan = $(this).data("nama_pelanggan");
        var alamat_pelanggan = $(this).data("alamat_pelanggan");

        $('#id_pelanggan').val(id_pelanggan);
        $('#nama_pelanggan').val(nama_pelanggan);
        $('#alamat_pelanggan').val(alamat_pelanggan);

    });
</script>


<script>
    //fungsi delete
    $(document).on('click', '.tombol_delete', function() {
        var id_pelanggan = $(this).attr("id");
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
                    url: "<?php echo base_url(); ?>pelanggan/delete",
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
                        id_pelanggan: id_pelanggan,
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