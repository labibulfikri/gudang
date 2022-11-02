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
                            <select id='searchByMap'>
                                <option value=''> Semua Data</option>
                                <option value='1'>Peta Bidang</option>
                                <option value='2'>Permohonan Hak</option>
                                <option value='3'>Pendaftaran Hak</option>
                            </select>
                            <table class="display expandable-table laporan_aset" style="width:100%">
                                <!-- <caption>List of users</caption> -->
                                <thead>
                                    <tr>
                                        <th style="width: 1%">No </th>
                                        <th style="width: 10%">Nomor Register </th>
                                        <th style="width: 30%">Alamat </th>
                                        <th style="width: 10%">Status Saat Ini </th>
                                    </tr>
                                </thead>
                            </table>
                            <button onclick="cetak()">cetak</button>
                            <form action="<?php echo base_url('aset/export') ?>" method="post">
                                <input type="text" id='id' name="q" />
                                <button type="submit"> cetak 2</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script>
    $(document).ready(function() {
        var dataAsetLaporan = $('.laporan_aset').DataTable({
            "processing": true,
            "serverSide": true,
            "responsive": false,
            "order": [],
            "lengthMenu": [
                [10, 50, 100],
                [10, 50, 100]
            ],

            "ajax": {
                url: "<?php echo base_url() . 'aset/laporan_aset'; ?>",
                type: "POST",
                data: function(data) {
                    var searchByMap = $('#searchByMap').val();
                    $('#id').val(searchByMap)


                    // Append to data
                    data.searchByMap = searchByMap;
                }
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
            },
        });
        $('#searchByMap').change(function() {
            dataAsetLaporan.draw();
        });
    });
</script>

<script>
    // $('#excel').on('click', function() {

    //     var searchByMap = $('#searchByMap').val();
    //     console.log(searchByMap);

    //     $.ajax({
    //         type: 'post',
    //         url: "<?php echo base_url() . 'aset/export'; ?>",
    //         data: {
    //             q = searchByMap
    //         },
    //         success: function(data) {
    //             alert('success excel downloaded');
    //         }
    //     });

    // });

    function cetak() {

        var searchByMap = $('#searchByMap').val();
        // $('#id').val(searchByMap)
        console.log(searchByMap);

        $.ajax({
            type: 'post',
            url: "<?php echo base_url() . 'aset/export'; ?>",
            data: {
                q: searchByMap
            },
            success: function(data) {
                alert('success excel downloaded');
            }
        });

    }
</script>