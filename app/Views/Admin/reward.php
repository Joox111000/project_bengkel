<?php

use CodeIgniter\I18n\Time;
?>
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
            History Penukaran Reward
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
                        <th>Reward</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $no = 1;
                    foreach ($data as $data) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?=$data['nama']?></td>
                            <td><?=$data['reward']?></td>
                            <td><?= Time::parse(date('d F Y h:i:s', strtotime($data['created_at'])))->toLocalizedString('d MMMM yyyy') ?>
                            <td>
                            <?php
                                if ($data['status'] == 0) {
                                    echo '<button type="button" class="btn btn-block bg-gradient-danger">Pending</button>';
                                } else {
                                    echo '<button type="button" class="btn btn-block bg-gradient-success">Berhasil</button>';

                                }
                                ?>
  
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                    
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</section>
<div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Redeem</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= base_url() ?>/Admin/redeem">

                        <div class="row">
                        <div class="col-3">
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">KODE</label>
                                    <input type="text" class="form-control" name="token" placeholder="Enter Kode" required autocomplete="off" autofocus style="text-transform: uppercase;" minlength="10" maxlength="10">
                                </div>
                            </div>
                            
                            <div class="col-3">
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
                "text": "Redeem Reward",
                "className": "btn btn-primary btn-info",
                "action": function() {
                    $('#modal-lg').modal('show');
                }
            }]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
<?= $this->endsection(); ?>