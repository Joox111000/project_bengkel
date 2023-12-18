<?= $this->extend('Layout/header'); ?>

<?= $this->section('style'); ?>
<style>
    .grup-plat:nth-child(1) {
        padding-right: 0;
    }

    .grup-plat:nth-child(1) input {
        border-right: none;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .grup-plat:nth-child(2) {
        padding-right: 0;
        padding-left: 0;
    }

    .grup-plat:nth-child(2) input {
        border-radius: 0;
        border-right: 0;
        border-left: 0;
    }

    .grup-plat:nth-child(3) {
        padding-left: 0;
    }

    .grup-plat:nth-child(3) input {
        border-left: none;
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        /* display: none; <- Crashes Chrome on hover */
        -webkit-appearance: none;
        margin: 0;
        /* <-- Apparently some margin are still there even though it's hidden */
    }

    input[type=number] {
        -moz-appearance: textfield;
        /* Firefox */
    }
</style>
<?= $this->endsection(); ?>

<?= $this->section('content'); ?>

<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <?php if (session()->get('error')) : ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i> Gagal!</h5>
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
            <?php if (session()->get('success')) : ?>

                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Telepon</th>
                        <th>Email</th>
                        <th>Plat</th>
                        <th>Jenis</th>
                        <th>CC</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($customer as $data) :
                        $plat = str_replace(",", " ", $data['plat']);
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['telepon'] ?></td>
                            <td><?= $data['email'] ?></td>
                            <td><?= $plat ?></td>
                            <td><?= $data['jenis'] ?></td>
                            <td><?= $data['cc'] ?></td>
                            <td>
                                <div class="btn-toolbar w-100" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group mr-2 w-30" role="group" aria-label="First group">
                                        <button type="button" class="btn btn-warning" title="Edit" data-toggle="modal" data-target="#modal-edit-<?= $data['id'] ?>"><i class="fas fa-pen-square"></i></i></button>
                                    </div>
                                    <div class="btn-group mr-2 w-30" role="group" aria-label="Second group">
                                        <button type="button" class="btn btn-danger" title="Hapus" data-toggle="modal" data-target="#modal-delete-<?= $data['id'] ?>"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Customer</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= base_url() ?>/Admin/addCustomer">

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Plat</label>
                                    <div class="row">
                                        <div class="col-3 grup-plat">
                                            <input type="text" name="plat1" class="form-control" maxlength="2" required placeholder="B" style="text-transform: uppercase;">
                                        </div>
                                        <div class="col-5 grup-plat">
                                            <input type="text" pattern="\d*" name="plat2" class="form-control" maxlength="4" required placeholder="1234">
                                        </div>
                                        <div class="col-4 grup-plat">
                                            <input type="text" name="plat3" class="form-control" maxlength="3" required placeholder="ABC" style="text-transform: uppercase;">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Jenis</label>
                                    <select class="form-control select2" style="width: 100%;" name="jenis" required>
                                        <option selected="selected" disabled>-Jenis-</option>
                                        <option value="matic">Matic</option>
                                        <option value="manual">Manual</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">CC</label>
                                    <select class="form-control select2" style="width: 100%;" name="cc" required>
                                        <option selected="selected" disabled>-CC-</option>
                                        <option value="100">100</option>
                                        <option value="125">125</option>
                                        <option value="150">150</option>
                                        <option value="250">250</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Enter Nama" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Telepon</label>
                                    <input type="text" class="form-control" name="telepon" placeholder="Enter nomor telepon" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                </div>
                            </div>
                        </div>

                </div>
                <!-- /.card-body -->

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <?php foreach ($customer as $data) :
        $thePlat =  explode(',', $data['plat']);

    ?>
        <div class="modal fade" id="modal-edit-<?= $data['id'] ?>">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Data Customer</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="<?= base_url() ?>/Admin/editCustomer">
                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Enter Nama" required value="<?= $data['nama'] ?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Telepon</label>
                                        <input type="text" class="form-control" name="telepon" placeholder="Enter nomor telepon" required value="<?= $data['telepon'] ?>">
                                    </div>
                                </div>



                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Plat</label>
                                        <div class="row">
                                            <diw class="col-3 grup-plat">
                                                <input type="text" name="plat1" class="form-control" maxlength="2" required placeholder="B" value="<?= strtoupper($thePlat[0]) ?>">
                                            </diw>
                                            <diw class="col-5 grup-plat">
                                                <input type="text" pattern="\d*" name="plat2" class="form-control" maxlength="4" required placeholder="1234" value="<?= $thePlat[1] ?>">
                                            </diw>
                                            <diw class="col-4 grup-plat">
                                                <input type="text" name="plat3" class="form-control" maxlength="3" required placeholder="ABC" value="<?= strtoupper($thePlat[2]) ?>">
                                            </diw>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Jenis</label>
                                        <select class="form-control select2" style="width: 100%;" name="jenis" required>
                                            <option selected="selected" disabled>-Jenis-</option>
                                            <option value="matic" <?= strtolower($data['jenis']) == "matic" ? "selected" : "" ?>>Matic</option>
                                            <option value="manual" <?= strtolower($data['jenis']) == "manual" ? "selected" : "" ?>>Manual</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">CC</label>
                                        <select class="form-control select2" style="width: 100%;" name="cc" required>
                                            <option selected="selected" disabled>-CC-</option>
                                            <option value="100" <?= $data['cc'] == "100" ? "selected" : "" ?>>100</option>
                                            <option value="125" <?= $data['cc'] == "125" ? "selected" : "" ?>>125</option>
                                            <option value="150" <?= $data['cc'] == "150" ? "selected" : "" ?>>150</option>
                                            <option value="250" <?= $data['cc'] == "250" ? "selected" : "" ?>>250</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <div class="modal fade" id="modal-delete-<?= $data['id'] ?>">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                    <div class="modal-body">
                        <h3>

                            Apakah Kamu Yakin ?
                        </h3>
                        <form method="POST" action="<?= base_url() ?>/Admin/deleteCustomer">

                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                            <input type="hidden" name="accountId" value="<?= $data['id_akun'] ?>">

                    </div>
                    <!-- /.card-body -->

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Ya</button>
                    </div>
                    </form>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php endforeach; ?>
</section>
<!-- /.content -->

<?= $this->endsection(); ?>

<?= $this->section('script'); ?>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": [{
                "text": "Tambah Customer",
                "className": "btn btn-primary btn-info",
                "action": function() {
                    $('#modal-lg').modal('show');
                }
            }]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
<?= $this->endsection(); ?>