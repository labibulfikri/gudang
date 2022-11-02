<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"> Data Master Pelanggan</h4>
            <form class="form-sample" action="<?= base_url('pelanggan/form_add') ?>" method="post">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Nama Pelanggan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama_pelanggan" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="alamat_pelanggan" />
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"> Save </button>
                <button type="reset" class="btn btn-danger"> Reset </button>
            </form>
        </div>
    </div>
</div>