<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> Data Persil</h4>
                <hr />

                <div class="form-group">
                    <label> Register Baru</label>
                    <input type="text" class="form-control" readonly value="<?php echo $det['register_baru'] ?>">
                </div>
                <div class="form-group">
                    <label> Register Lama</label>
                    <input type="text" class="form-control" readonly value="<?php echo $det['register_lama'] ?>">
                </div>
                <div class="form-group">
                    <label> Alamat </label>
                    <input type="text" class="form-control" readonly value="<?php echo $det['alamat'] ?>">
                </div>
                <div class="form-group">
                    <label> Luas </label>
                    <input type="text" class="form-control" readonly value="<?php echo $det['luas'] ?>">
                </div>

                <div class="form-group">
                    <label> Penggunaan </label>
                    <input type="text" class="form-control" readonly value="<?php echo $det['penggunaan'] ?>">
                </div>
                <div class="form-group">
                    <label> Atas Nama </label>
                    <input type="text" class="form-control" readonly value="<?php echo $det['atas_nama'] ?>">
                </div>

                <div class="form-group">
                    <label> Tahun Pengadaan </label>
                    <input type="text" class="form-control" readonly value="<?php echo $det['tahun_pengadaan'] ?>">
                </div>
                <div class="form-group">
                    <label> Kategori </label>
                    <?php if ($det['masalah'] == '0') { ?><?php $det['masalah'] = " Kategori C";
                                                        } else {
                                                            $det['masalah'] = " Mandali ";
                                                        } ?>
                    <input type="text" class="form-control" readonly value="<?php echo $det['masalah'] ?>">
                </div>
                <div class="form-group">
                    <label> Lokasi BPN </label>

                    <?php if ($det['lokasi_bpn'] == 'bpn1') { ?><?php $det['lokasi_bpn'] = "BPN 1";
                                                            } else {
                                                                $det['lokasi_bpn'] = "BPN 2";
                                                            } ?>
                    <input type="text" class="form-control" readonly value="<?php echo $det['lokasi_bpn'] ?>">
                </div>

                <div class="form-group">
                    <label> Kota </label>
                    <input type="text" class="form-control" readonly value="<?php echo $det['nama_kota'] ?>">
                </div>
                <div class="form-group">
                    <label> Kecamatan </label>
                    <input type="text" class="form-control" readonly value="<?php echo $det['nama_kecamatan'] ?>">
                </div>
                <div class="form-group">
                    <label> Kelurahan </label>
                    <input type="text" class="form-control" readonly value="<?php echo $det['nama_kelurahan'] ?>">
                </div>


                <div class="form-group">
                    <label> Dokumen Tanah </label>
                    <input type="text" class="form-control" readonly value="<?php echo $det['dokumen_tanah'] ?>">
                </div>


                <div class="form-group">
                    <label> Keterangan </label>
                    <textarea rows="7" cols="80" class="form-control" readonly> <?php echo $det['keterangan'] ?></textarea>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <hr style="border-color: #2c3e50;" />
                <h4 class="card-title">Peta Bidang</h4>
                <p class="card-description">
                </p>
                <div class="form-group row">
                    <div class="col">

                        <?php if ($id_set_peta == null) { ?>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_peta" id="tombol_peta" data-idpeta="<?= $id_set_peta ?>" data-id="<?= $id_aset ?>" data-toggle="modal" data-reg="<?= $noreg ?>"> Tambah Data </button>
                        <?php } ?>

                        <table class="display expandable-table petas" style="width:100%">
                            <!-- <caption>List of users</caption> -->
                            <thead>
                                <tr>
                                    <th style="width: 10px">Detail </th>
                                    <th style="width: 20px">Status</th>
                                    <th style="width: 20px">Keterangan </th>
                                    <th style="width: 20px">Aksi </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>


                                    <?php foreach ($peta as $petanya) { ?>

                                        <td> <b> No Register : </b><?= $petanya->register_baru ?>
                                            <hr style="border-width: 2px;" />
                                            <b> No SPS : </b><?= $petanya->no_sps ?>
                                            <hr style="border-width: 2px;" />
                                            <b> Tanggal SPS : </b><?= $petanya->tgl_sps ?>
                                            <hr style="border-width: 2px;" />
                                            <b> No. NIB : </b><?= $petanya->no_nib ?>
                                            <hr style="border-width: 2px;" />
                                            <b> Tanggal NIB : </b><?= $petanya->tgl_nib ?>
                                        </td>

                                        <td> <?= $petanya->status ?> </td>
                                        <td> <?= $petanya->keterangan ?> </td>
                                        <td> <button data-bs-target="#edit_modal_peta" data-iddet="<?= $petanya->id_det_aset ?>" data-reg="<?= $petanya->register_baru ?>" data-keteranganpeta="<?= $petanya->keterangan ?>" data-id="<?= $id_aset ?>" data-status="<?= $petanya->status ?>" data-nib="<?= $petanya->no_nib ?>" data-sps="<?= $petanya->no_sps ?>" data-tglsps="<?= $petanya->tgl_sps ?>" data-tglnib="<?= $petanya->tgl_nib ?>" id="tombol_edit_peta" class="btn btn-warning btn-sm" data-bs-toggle="modal"> Update </button> | <button class="btn btn-danger btn-sm" id="tombol_delete_peta" data-iddet="<?= $petanya->id_det_aset ?>" data-id="<?= $id_aset ?>"> Hapus </button> </td>

                                    <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr style="border-color: #2c3e50;" />
                <h4 class="card-title">Permohonan Hak</h4>
                <?php if ($id_set_permohonan == null) { ?>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_permohonan" id="tombol_permohonan" data-idpermohonan="<?= $id_set_permohonan ?>" data-idmohon="<?= $id_aset ?>" data-toggle="modal" data-mohonreg="<?= $noreg ?>"> Tambah Data </button>
                <?php } ?>
                <div class="form-group row">
                    <div class="col">
                        <table class="display expandable-table mohon" style="width:100%">
                            <!-- <caption>List of users</caption> -->
                            <thead>
                                <tr>
                                    <th style="width: 10px">Detail </th>
                                    <th style="width: 20px">Status</th>
                                    <th style="width: 20px">Keterangan </th>
                                    <th style="width: 20px">Aksi </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>


                                    <?php foreach ($permohonan_hak as $mohon) { ?>

                                        <td> <b> No Register : </b><?= $mohon->register_baru ?>
                                            <hr style="border-width: 2px;" />
                                            <b> No SPS : </b><?= $mohon->no_sps_permohonan ?>
                                            <hr style="border-width: 2px;" />
                                            <b> Tanggal SPS : </b><?= $mohon->tgl_sps_permohonan ?>
                                            <hr style="border-width: 2px;" />
                                            <b> Tanggal Penelitian : </b><?= $mohon->tgl_penelitian ?>
                                            <hr style="border-width: 2px;" />
                                            <b> No. SK BPN: </b><?= $mohon->no_sk_bpn ?>
                                            <hr style="border-width: 2px;" />
                                            <b> Tgl. SK BPN: </b><?= $mohon->tgl_sk_bpn ?>
                                        </td>


                                        <td> <?= $mohon->status_permohonan ?> </td>
                                        <td> <?= $mohon->keterangan_permohonan ?> </td>
                                        <td>

                                            <button data-bs-target="#edit_modal_permohonan" data-idpermohonan="<?= $mohon->id_det_aset ?>" data-permohonanregbaru="<?= $mohon->register_baru ?>" data-permohonanketerangan="<?= $mohon->keterangan_permohonan ?>" data-idasetpermohonan="<?= $id_aset ?>" data-nospspermohonan="<?= $mohon->no_sps_permohonan ?>" data-biaya="<?= $mohon->biaya_permohonan ?>" data-statuspermohonan="<?= $mohon->status_permohonan ?>" data-nospspermohnan="<?= $mohon->no_sps_permohonan ?>" data-nosksbpn="<?= $mohon->no_sk_bpn ?>" data-tglsksbpn="<?= $mohon->tgl_sk_bpn ?>" data-tglspspermohonan="<?= $mohon->tgl_sps_permohonan ?>" data-tglskbpn="<?= $mohon->tgl_sk_bpn ?>" data-tglpenelitian="<?= $mohon->tgl_penelitian ?>" id="tombol_edit_mohon" class="btn btn-warning btn-sm" data-bs-toggle="modal"> Update
                                            </button>
                                            | <button class="btn btn-danger btn-sm" id="tombol_delete_permohonan" data-iddet="<?= $mohon->id_det_aset ?>" data-id="<?= $id_aset ?>"> Hapus </button>
                                        </td>

                                    <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <hr style="border-color: #2c3e50;" />
                <h4 class="card-title">Pendaftaran Hak</h4>
                <?php if ($id_set_pendaftaran == null) { ?>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_pendaftaran" data-idasetdaftar="<?= $id_aset ?>" data-registerdaftar="<?= $noreg ?>" id="tombol_pendaftaran"> Tambah Data </button>
                <?php } ?>
                <div class="form-group row">
                    <div class="col">
                        <table class="display expandable-table mohon" style="width:100%">
                            <!-- <caption>List of users</caption> -->
                            <thead>
                                <tr>
                                    <th style="width: 10px">Detail </th>
                                    <th style="width: 20px">Status</th>
                                    <th style="width: 20px">Keterangan </th>
                                    <th style="width: 20px">Aksi </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php foreach ($pendaftaran_hak as $daftar) { ?>

                                        <td> <b> No Register : </b><?= $daftar->register_baru ?>
                                            <hr style="border-width: 2px;" />
                                            <b> No SPS : </b><?= $daftar->no_sps_pendaftaran ?>
                                            <hr style="border-width: 2px;" />
                                            <b> Tanggal SPS : </b><?= $daftar->tgl_sps_pendaftaran ?>
                                            <hr style="border-width: 2px;" />
                                            <b> No. Sertifikat: </b><?= $daftar->no_sertifikat ?>
                                            <hr style="border-width: 2px;" />
                                            <b> Tgl. Sertifikat </b><?= $daftar->tgl_sertifikat ?>
                                        </td>


                                        <td> <?= $daftar->status_pendaftaran ?> </td>
                                        <td> <?= $daftar->keterangan_pendaftaran ?> </td>
                                        <td>
                                            <button data-bs-target="#edit_modal_pendaftaran" data-tglsertifikat="<?= $daftar->tgl_sertifikat ?>" data-nosertifikat="<?= $daftar->no_sertifikat ?>" data-iddaftar="<?= $daftar->id_det_aset ?>" data-daftarreg="<?= $daftar->register_baru ?>" data-daftarketerangan="<?= $daftar->keterangan_pendaftaran ?>" data-idasetdaftar="<?= $id_aset ?>" data-nospsdaftar="<?= $daftar->no_sps_pendaftaran ?>" data-biayapendaftaran="<?= $daftar->biaya_pendaftaran ?>" data-statuspendaftaran="<?= $daftar->status_pendaftaran ?>" data-tglspspendaftaran="<?= $daftar->tgl_sps_pendaftaran ?>" id="tombol_edit_daftar" class="btn btn-warning btn-sm" data-bs-toggle="modal"> Update
                                            </button>
                                            | <button class="btn btn-danger btn-sm" id="tombol_delete_pendaftaran" data-iddet="<?= $daftar->id_det_aset ?>" data-id="<?= $id_aset ?>"> Hapus </button>
                                        </td>
                                    <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Modal peta-->
    <div class="modal fade" id="modal_peta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Peta Bidang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('aset/insert_det') ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label> Nomor Register Baru </label>
                            <input type="text" class="form-control" id="id_aset" readonly hidden name="id_aset">
                            <input type="text" class="form-control" id="status_map" value="1" hidden name="status_map">
                            <input type="text" class="form-control" id="register_baru" readonly name="register_baru">
                        </div>

                        <div class="form-group">
                            <label> Nomor SPS </label>
                            <input type="text" class="form-control" required id="no_sps" name="no_sps">
                        </div>
                        <div class="form-group">
                            <label> Tanggal SPS </label>
                            <input type="date" class="form-control" required id="tgl_sps" name="tgl_sps">
                        </div>

                        <div class="form-group">
                            <label> Nomor NIB </label>
                            <input type="text" class="form-control" required id="no_nib" name="no_nib">
                        </div>
                        <div class="form-group">
                            <label> Tanggal NIB </label>
                            <input type="date" class="form-control" required id="tgl_nib" name="tgl_nib">
                        </div>


                        <label> Status </label>
                        <select class="form-control" id="status" required name='status'>"
                            <option value="" disabled> Silahkan Pilih</option>
                            <option value="proses_ukur">Proses Ukur </option>
                            <option value="sudah_ukur"> Sudah Di Ukur </option>
                        </select>
                        <br>

                        <label> Keterangan </label>
                        <textarea rows="7" cols="80" class="form-control" name="keterangan" id="keterangan_peta"> </textarea>

                        <br>


                        <div class=" modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal edit peta-->
    <div class="modal fade" id="edit_modal_peta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Peta Hak</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('aset/update_det') ?>" method="POST">
                    <div class="modal-body">

                        <div class="form-group">
                            <label> Nomor Register Baru </label>
                            <!-- <input type="text" id="edit_id_aset" readonly name="id_aset"> -->
                            <input type="text" class="form-control" id="edit_id_aset" readonly hidden name="id_aset">
                            <input type="text" class="form-control" id="edit_id_det_aset" readonly hidden name="id_det_aset">
                            <input type="text" class="form-control" id="edit_status_map" value="1" hidden name="status_map">
                            <input type="text" class="form-control" id="edit_register_baru" readonly hidden name="register_baru">
                        </div>

                        <div class="form-group">
                            <label> Nomor SPS </label>
                            <input type="text" class="form-control" id="edit_no_sps" name="no_sps">
                        </div>
                        <div class="form-group">
                            <label> Tanggal SPS </label>
                            <input type="date" class="form-control" id="edit_tgl_sps" name="tgl_sps">
                        </div>

                        <div class="form-group">
                            <label> Nomor NIB </label>
                            <input type="text" class="form-control" id="edit_no_nib" name="no_nib">
                        </div>
                        <div class="form-group">
                            <label> Tanggal NIB </label>
                            <input type="date" class="form-control" id="edit_tgl_nib" name="tgl_nib">
                        </div>



                        <label> Status </label>
                        <select class="form-control" id="edit_status" name='status'>"
                            <option value="" disabled> Silahkan Pilih</option>
                            <option value="proses_ukur">Proses Ukur </option>
                            <option value="sudah_ukur"> Sudah Di Ukur </option>
                        </select>
                        <br>

                        <label> Ketrangan </label>
                        <textarea rows="7" cols="80" class="form-control" name="keterangan" id="edit_keterangan_peta"> </textarea>

                        <br>

                        <div class=" modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal    EDIT PERMHONAN-->
    <div class="modal fade" id="edit_modal_permohonan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Permohonan Hak</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('aset/update_det') ?>" method="POST">
                    <div class="modal-body">
                        <!-- <div class="form-group">
                            <label> Nomor Register Baru </label>
                            <input type="text" class="form-control" id="edit_mohon_register_baru" hidden readonly name="register_baru">
                        </div> -->
                        <input type="text" class="form-control" id="edit_mohon_id_aset" hidden readonly name="id_aset">
                        <input type="text" class="form-control" id="edit_mohon_id_det_aset" readonly hidden name="id_det_aset">
                        <input type="text" class="form-control" id="edit_mohon_status_map" value="2" hidden name="status_map">

                        <div class="form-group">
                            <label> No SPS </label>
                            <input type="text" class="form-control" id="edit_no_sps_permohonan" name="no_sps_permohonan">
                        </div>

                        <div class="form-group">
                            <label>Tanggal SPS </label>
                            <input type="date" class="form-control" id="edit_tgl_sps_permohonan" name="tgl_sps_permohonan">
                        </div>
                        <div class="form-group">
                            <label>Biaya </label>
                            <input type="text" class="form-control" id="edit_biaya_permohonan" name="biaya_permohonan">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Penelitian Tanah </label>
                            <input type="date" class="form-control" id="edit_tgl_penelitian" name="tgl_penelitian">
                        </div>

                        <div class="form-group">
                            <label> No. SK BPN </label>
                            <input type="text" class="form-control" id="edit_sk_bpn" name="no_sk_bpn">
                        </div>

                        <div class="form-group">
                            <label> TGL SK BPN </label>
                            <input type="date" class="form-control" id="edit_tgl_sk_bpn" name="tgl_sk_bpn">
                        </div>

                        <label> Status </label>
                        <select class="form-control" id="edit_status_permohonan" name='status_permohonan'>"
                            <option value="" disabled> Silahkan Pilih</option>
                            <option value="proses"> Proses </option>
                            <option value="sk_jadi"> SK Jadi </option>
                        </select>
                        <br>
                        <label> Keterangan </label>
                        <textarea rows="7" cols="80" class="form-control" name="keterangan_permohonan" id="edit_keterangan_permohonan">  </textarea>
                        <br>
                        <div class=" modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal    EDIT PERMHONAN-->
    <div class="modal fade" id="edit_modal_pendaftaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Pendaftaran Hak</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('aset/update_det') ?>" method="POST">
                    <div class="modal-body">
                        <!-- <div class="form-group">
                            <label> Nomor Register Baru </label>
                        </div> -->
                        <input type="text" class="form-control" id="edit_daftar_register_baru" hidden readonly name="register_baru">
                        <input type="text" class="form-control" id="edit_daftar_id_aset" hidden readonly name="id_aset">
                        <input type="text" class="form-control" id="edit_daftar_id_det_aset" readonly hidden name="id_det_aset">
                        <input type="text" class="form-control" id="edit_daftar_status_map" value="3" hidden name="status_map">

                        <div class="form-group">
                            <label> No SPS </label>
                            <input type="text" class="form-control" id="edit_no_sps_pendaftaran" name="no_sps_pendaftaran">
                        </div>

                        <div class="form-group">
                            <label>Tanggal SPS </label>
                            <input type="date" class="form-control" id="edit_tgl_sps_pendaftaran" name="tgl_sps_pendaftaran">
                        </div>
                        <div class="form-group">
                            <label>Biaya </label>
                            <input type="text" class="form-control" id="edit_biaya_pendaftaran" name="biaya_pendaftaran">
                        </div>


                        <div class="form-group">
                            <label> No. Sertifikat </label>
                            <input type="text" class="form-control" id="edit_no_sertifikat" name="no_sertifikat">
                        </div>

                        <div class="form-group">
                            <label> TGL Sertifikat </label>
                            <input type="date" class="form-control" id="edit_tgl_sertifikat" name="tgl_sertifikat">
                        </div>

                        <label> Status </label>
                        <select class="form-control" id="edit_status_pendaftaran" name='status_pendaftaran'>"
                            <option value="" disabled> Silahkan Pilih</option>
                            <option value="proses"> Proses </option>
                            <option value="terbit_sertifikat"> Terbit Sertifikat </option>
                        </select>
                        <br>
                        <label> Keterangan </label>
                        <textarea rows="7" cols="80" class="form-control" name="keterangan_pendaftaran" id="edit_keterangan_pendaftaran">  </textarea>
                        <br>
                        <div class=" modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal permohonan-->
    <div class="modal fade" id="modal_permohonan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Permohonan Hak</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('aset/insert_det') ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <!-- <label> Nomor Register Baru </label> -->
                            <input type="text" class="form-control" id="mohon_id_aset" hidden readonly name="id_aset">
                            <input type="text" class="form-control" id="mohon_status_map" value="2" hidden name="status_map">
                            <input type="text" class="form-control" id="mohon_register_baru" hidden readonly name="register_baru">
                        </div>

                        <div class="form-group">
                            <label> No SPS </label>
                            <input type="text" class="form-control" required id="no_sps_permohonan" name="no_sps_permohonan">
                        </div>

                        <div class="form-group">
                            <label>Tanggal SPS </label>
                            <input type="date" class="form-control" required id="tgl_sps_permohonan" name="tgl_sps_permohonan">
                        </div>
                        <div class="form-group">
                            <label>Biaya </label>
                            <input type="text" class="form-control" required id="biaya_permohonan_hak" name="biaya_permohonan">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Penelitian Tanah </label>
                            <input type="date" class="form-control" required id="tgl_penelitian_tanah" name="tgl_penelitian">
                        </div>

                        <div class="form-group">
                            <label> No. SK BPN </label>
                            <input type="text" class="form-control" required id="sk_bpn" name="no_sk_bpn">
                        </div>

                        <div class="form-group">
                            <label> TGL SK BPN </label>
                            <input type="date" class="form-control" required id="tgl_sk_bpn" name="tgl_sk_bpn">
                        </div>

                        <label> Status </label>
                        <select class="form-control" id="status_permohonan" required name='status_permohonan'>"
                            <option value="" disabled> Silahkan Pilih</option>
                            <option value="proses"> Proses </option>
                            <option value="sk_jadi"> SK Jadi </option>
                        </select>
                        <br>
                        <label> Ketrangan </label>
                        <textarea rows="7" cols="80" class="form-control" name="keterangan_permohonan" id="keterangan_permohonan"> </textarea>

                        <br>



                        <div class=" modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal permohonan-->
    <div class="modal fade" id="modal_pendaftaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pendaftaran Hak</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('aset/insert_det') ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <!-- <label> Nomor Register Baru </label> -->
                            <input type="text" class="form-control" id="daftar_id_aset" hidden readonly name="id_aset">
                            <input type="text" class="form-control" id="daftar_status_map" value="3" hidden name="status_map">
                            <input type="text" class="form-control" id="daftar_register_baru" hidden readonly name="register_baru">
                        </div>

                        <div class="form-group">
                            <label> No SPS </label>
                            <input type="text" class="form-control" required id="no_sps_pendaftaran" name="no_sps_pendaftaran">
                        </div>

                        <div class="form-group">
                            <label>Tanggal SPS </label>
                            <input type="date" class="form-control" required id="tgl_sps_pendaftaran" name="tgl_sps_pendaftaran">
                        </div>
                        <div class="form-group">
                            <label>Biaya </label>
                            <input type="text" class="form-control" required id="biaya_pendaftaran" name="biaya_pendaftaran">
                        </div>
                        <div class="form-group">
                            <label> No. Sertifikat </label>
                            <input type="text" class="form-control" required id="no_sertifikat" name="no_sertifikat">
                        </div>

                        <div class="form-group">
                            <label> TGL Sertifikat </label>
                            <input type="date" class="form-control" required id="tgl_sertifikat" name="tgl_sertifikat">
                        </div>

                        <label> Status </label>
                        <select class="form-control" id="status_pendaftaran" required name='status_pendaftaran'>"
                            <option value="" disabled> Silahkan Pilih</option>
                            <option value="proses"> Proses </option>
                            <option value="terbit_sertifikat"> Terbit Sertifikat</option>
                        </select>
                        <br>
                        <label> Keterangan </label>
                        <textarea rows="7" cols="80" class="form-control" name="keterangan_pendaftaran" id="keterangan_pendaftaran"> </textarea>

                        <br>



                        <div class=" modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                </form>
            </div>
        </div>
    </div>




</div>







<!-- Button trigger modal -->


<script>
    $(document).ready(function() {
        $('.petas').DataTable();
    });

    $(document).ready(function() {
        $('.daftar').DataTable();
    });

    $(document).ready(function() {
        $('.mohon').DataTable();
    });
</script>

<script>
    $(document).on('click', '#tombol_peta', function() {
        var id_aset = $(this).data("id");
        var noreg = $(this).data("reg");

        $('#id_aset').val(id_aset);
        $('#register_baru').val(noreg);


        $('#modal_peta').appendTo("body").modal({
            backdrop: 'static'

        })

    });

    $(document).on('click', '#tombol_edit_peta', function() {
        var id_aset = $(this).data("id");
        var id_det_aset = $(this).data("iddet");
        var noreg = $(this).data("reg");
        var no_sps = $(this).data("sps");
        var tgl_sps = $(this).data("tglsps");
        var tgl_nib = $(this).data("tglnib");
        var no_nib = $(this).data("nib");
        var status = $(this).data("status");
        var keterangan = $(this).data("keteranganpeta");

        $('#edit_id_aset').val(id_aset);
        $('#edit_id_det_aset').val(id_det_aset);
        $('#edit_register_baru').val(noreg);
        $('#edit_no_sps').val(no_sps);
        $('#edit_tgl_sps').val(tgl_sps);
        $('#edit_tgl_nib').val(tgl_nib);
        $('#edit_no_nib').val(no_nib);
        $('#edit_status').val(status);
        $('#edit_keterangan_peta').val(keterangan);

        $('#edit_modal_peta').appendTo("body").modal({
            backdrop: 'static'
        })

    });

    //tedit permhonan
    $(document).on('click', '#tombol_edit_mohon', function() {
        var id_aset = $(this).data("idasetpermohonan");
        var id_det_aset_mohon = $(this).data("idpermohonan");
        var reg = $(this).data("permohonanregbaru");
        var no_sps_permohonan = $(this).data("nospspermohonan");
        var biaya = $(this).data("biaya");
        var tgl_sps_permohonan = $(this).data("tglspspermohonan");
        var tgl_penelitian = $(this).data("tglpenelitian");
        var no_sk_bpn = $(this).data("nosksbpn");
        var tgl_sk_bpn = $(this).data("tglskbpn");
        var status_permohonan = $(this).data("statuspermohonan");
        var keterangan = $(this).data("permohonanketerangan");

        $('#edit_mohon_id_aset').val(id_aset);
        $('#edit_mohon_id_det_aset').val(id_det_aset_mohon);
        $('#edit_mohon_register_baru').val(reg);
        $('#edit_no_sps_permohonan').val(no_sps_permohonan);
        $('#edit_tgl_sps_permohonan').val(tgl_sps_permohonan);
        $('#edit_biaya_permohonan').val(biaya);
        $('#edit_tgl_penelitian').val(tgl_penelitian);
        $('#edit_sk_bpn').val(no_sk_bpn);
        $('#edit_tgl_sk_bpn').val(tgl_sk_bpn);
        $('#edit_status_permohonan').val(status_permohonan);
        $('#edit_keterangan_permohonan').val(keterangan);


        $('#edit_modal_permohonan').appendTo("body").modal({
            backdrop: 'static'
        })
    });


    //edit pendaftaran
    $(document).on('click', '#tombol_edit_daftar', function() {

        var reg = $(this).data("daftarreg");
        var id_aset = $(this).data("idasetdaftar");
        var id_det_aset_mohon = $(this).data("iddaftar");
        var no_sps_pendaftaran = $(this).data("nospsdaftar");
        var tgl_sps_pendaftaran = $(this).data("tglspspendaftaran");
        var biaya = $(this).data("biayapendaftaran");
        var no_sertifikat = $(this).data("nosertifikat");
        var keterangan = $(this).data("daftarketerangan");
        var status_pendaftaran = $(this).data("statuspendaftaran");
        var tgl_sertifikat = $(this).data("tglsertifikat");



        $('#edit_daftar_id_aset').val(id_aset);
        $('#edit_daftar_register_baru').val(reg);
        $('#edit_daftar_id_det_aset').val(id_det_aset_mohon);
        $('#edit_no_sps_pendaftaran').val(no_sps_pendaftaran);
        $('#edit_tgl_sps_pendaftaran').val(tgl_sps_pendaftaran);
        $('#edit_biaya_pendaftaran').val(biaya);
        $('#edit_no_sertifikat').val(no_sertifikat);
        $('#edit_tgl_sertifikat').val(tgl_sertifikat);
        $('#edit_status_pendaftaran').val(status_pendaftaran);
        $('#edit_keterangan_pendaftaran').val(keterangan);

        $('#edit_modal_pendaftaran').appendTo("body").modal({
            backdrop: 'static'
        })
    });

    $(document).on('click', '#tombol_permohonan', function() {
        var id_aset = $(this).data("idmohon");
        var mohon_register_baru = $(this).data("mohonreg");
        // var status_map = $(this).data("mohon_status_map");

        $('#mohon_id_aset').val(id_aset);
        $('#mohon_register_baru').val(mohon_register_baru);
        // $('#modal_permohonan').modal({
        //     backdrop: 'static'
        // });
        $('#modal_permohonan').appendTo("body").modal({
            backdrop: 'static'
        })

    });

    $(document).on('click', '#tombol_pendaftaran', function() {
        var id_aset = $(this).data("idasetdaftar");
        var register = $(this).data("registerdaftar");

        $('#daftar_id_aset').val(id_aset);
        $('#daftar_register_baru').val(register);


        $('#modal_pendaftaran').appendTo("body").modal({
            backdrop: 'static'
        })
    });
</script>


<script>
    //fungsi delete
    $(document).on('click', '#tombol_delete_peta', function() {
        // var id_aset = $(this).attr("id");

        var id_det_aset = $(this).data("iddet");

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
                    url: "<?php echo base_url(); ?>aset/delete_det",
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
                        id_det_aset: id_det_aset,
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



<script>
    //fungsi delete
    $(document).on('click', '#tombol_delete_permohonan', function() {
        // var id_aset = $(this).attr("id");

        var id_det_aset = $(this).data("iddet");

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
                    url: "<?php echo base_url(); ?>aset/delete_det",
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
                        id_det_aset: id_det_aset,
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




<script>
    //fungsi delete
    $(document).on('click', '#tombol_delete_pendaftaran', function() {
        // var id_aset = $(this).attr("id");

        var id_det_aset = $(this).data("iddet");

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
                    url: "<?php echo base_url(); ?>aset/delete_det",
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
                        id_det_aset: id_det_aset,
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