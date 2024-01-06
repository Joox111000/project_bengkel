<?php

use CodeIgniter\I18n\Time;
?>

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
                        <th>Plat</th>
                        <th>Keluhan</th>
                        <th>Service</th>
                        <th>Biaya</th>
                        <th>Tanggal Service</th>
                        <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data as $data) :
                        $plat = strtoupper(str_replace(',', ' ', $data['cusPlat']));
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $plat ?></td>
                            <td><?= $data['keluhan']?></td>
                            <td><?= $data['table_service_id'] ?></td>
                            <td><?= $data['total_biaya'] ?></td>
                            <td><?= Time::parse(date('d F Y h:i:s', strtotime($data['created_at'])))->toLocalizedString('d MMMM yyyy') ?>
                            </td>
                            <!-- <td>
                                <div class="btn-toolbar w-100" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group mr-2 w-30" role="group" aria-label="First group">
                                        <button type="button" class="btn btn-warning" title="Edit" data-toggle="modal" data-target="#modal-edit-<?= $data['id'] ?>"><i class="fas fa-pen-square"></i></i></button>
                                    </div>
                                    <div class="btn-group mr-2 w-30" role="group" aria-label="Second group">
                                        <button type="button" class="btn btn-danger" title="Hapus" data-toggle="modal" data-target="#modal-delete-<?= $data['id'] ?>"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </td> -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Service</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= base_url() ?>/Admin/addCustomerService">

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Plat</label>
                                    <select name="plat" class="form-control select2" style="width: 100%;text-transform:uppercase">
                                        <option selected="selected" disabled>Pilih Plat</option>
                                        <?php foreach ($cust as $cu) :
                                            $da = strtoupper(str_replace(',', ' ', $cu['plat'])); ?>
                                            <option value="<?= $cu['id'] ?>"><?= $da ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Service</label>
                                    <select class="select2" name="service[]" multiple="multiple" data-placeholder="Pilih Service" style="width: 100%;">
                                        <?php foreach ($serv as $se) : ?>

                                            <option value="<?= $se['nama'] ?>"><?= $se['nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mekanik</label>
                                    <input type="text" class="form-control" name="mekanik" placeholder="Enter Mekanik" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Admin</label>
                                    <input type="text" class="form-control" name="admin" placeholder="Enter Admin" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Biaya</label>
                                    <input type="number" class="form-control" name="biaya" placeholder="Enter Biaya" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                            <div class="form-group">
                        <label>Keluhan</label>
                        <textarea class="form-control" rows="3" name="keluhan" placeholder="Masukkan Keluhan"></textarea>
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