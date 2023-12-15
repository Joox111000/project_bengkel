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
            
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Pesan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data as $data) :
                    ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$data['nama']?></td>
                            <td><?= Time::parse(date('d F Y h:i:s', strtotime($data['created_at'])))->toLocalizedString('d MMMM yyyy') ?>
                            <td><?=$data['pesan']?></td>
                        </tr>
                    <?php endforeach; ?>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</section>
<!-- /.content -->

<?= $this->endsection(); ?>

<?= $this->section('script'); ?>
<script>
    
</script>
<?= $this->endsection(); ?>