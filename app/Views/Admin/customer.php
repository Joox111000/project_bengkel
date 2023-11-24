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
            <h3 class="card-title"></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
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
                    foreach ($customer as $data) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['email'] ?></td>
                            <td><?= $data['plat'] ?></td>
                            <td><?= $data['jenis'] ?></td>
                            <td><?= $data['cc'] ?></td>
                            <td></td>
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
                    <form method="POST" action="<?=base_url()?>/Admin/addCustomer">

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Plat</label>
                                    <div class="row">
                                        <diw class="col-3 grup-plat">
                                            <input type="text" name="plat1" class="form-control" maxlength="2" required placeholder="B">
                                        </diw>
                                        <diw class="col-5 grup-plat">
                                            <input type="number" name="plat2" class="form-control" maxlength="4" required placeholder="1234">
                                        </diw>
                                        <diw class="col-4 grup-plat">
                                            <input type="text" name="plat3" class="form-control" maxlength="3" required placeholder="ABC">
                                        </diw>
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
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Enter Nama" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                                </div>
                            </div>
                            <div class="col-4">
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