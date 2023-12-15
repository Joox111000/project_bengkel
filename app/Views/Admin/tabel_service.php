<?= $this->extend('Layout/header'); ?>
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
                        <th>Frekuensi (bulan)</th>
                        <th>Barang yang diservis</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($item as $data) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['frekuensi'] ?>
                            <td><?= $data['bNama'] ?>
                            </td>
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
        <div class="modal-dialog modal-default">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Service</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= base_url() ?>/Admin/addItem">

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Enter Nama" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Frekuensi</label>
                                    <input type="number" class="form-control" name="frekuensi" placeholder="Enter Frekuensi" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Barang Servis</label>
                                    <select class="form-control select2" style="width: 100%;" name="barang" required>
                                        <option selected="selected" disabled>-Barang-</option>
                                        <?php foreach($barang as $b):?>
<option value="<?=$b['id']?>"><?=$b['nama']?></option>
                                            <?php endforeach;?>
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

    <?php foreach ($item as $data) : ?>
        <div class="modal fade" id="modal-edit-<?= $data['id'] ?>">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Data Barang</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="<?= base_url() ?>/Admin/editItem">
                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                            <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Enter Nama" required value="<?=$data['nama']?>">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Frekuensi</label>
                                    <input type="number" class="form-control" name="frekuensi" placeholder="Enter Frekuensi" required value="<?=$data['frekuensi']?>">
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
                        <form method="POST" action="<?= base_url() ?>/Admin/deleteItem">

                            <input type="hidden" name="id" value="<?= $data['id'] ?>">

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
                "text": "Tambah Data",
                "className": "btn btn-primary btn-info",
                "action": function() {
                    $('#modal-lg').modal('show');
                }
            }]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
<?= $this->endsection(); ?>