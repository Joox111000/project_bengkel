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
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <form action="<?= base_url() ?>Admin/cari" method="POST">
                                <div class="input-group input-group-lg">
                                    <input type="text" class="form-control form-control-lg" style="border-right: none; text-transform:uppercase" placeholder="B" required maxlength="2" name="cari1">
                                    <input type="text" pattern="\d*" class="form-control form-control-lg" style="border-left: none;border-right: none;" placeholder="1234" required maxlength="4" oninput="this.value=this.value.replace(/[^0-9]/g,'');" name="cari2">
                                    <input type="text" class="form-control form-control-lg" style="border-left: none; text-transform:uppercase" placeholder="CDE" required maxlength="3" name="cari3">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-lg btn-default" title="Cari">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        <button type="button" class="btn btn-lg btn-danger" id="reset">
                                            Reset
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <form action="<?= base_url() ?>Admin/resetPencarian" method="post" id="formreset"></form>
                        </div>
                    </div>
                    <?php
                    if ($hasil != null) :
                    ?>
                        <div class="row mt-3">
                            <div class="col-md-10 offset-md-1">
                                <section class="content">
                                    <div class="container-fluid">

                                        <!-- Timelime example  -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- The time line -->
                                                <?php

                                                foreach ($hasil as $h) : ?>
                                                    <div class="timeline">
                                                        <!-- timeline time label -->
                                                        <div class="time-label">
                                                            <span class="bg-red"><?= Time::parse(date('d F Y h:i:s', strtotime($h['created_at'])))->toLocalizedString('d MMMM yyyy') ?></span>
                                                        </div>
                                                        <!-- /.timeline-label -->
                                                        <!-- timeline item -->
                                                        <div>
                                                            <i class="fas fa-tools bg-yellow"></i>
                                                            <div class="timeline-item">
                                                                <span class="time"><i class="fas fa-users-cog"></i> <?= $h['nama_mekanik'] ?></span>
                                                                <h3 class="timeline-header"><a href="#"><?= $h['nama'] ?></a></h3>
                                                                <div class="timeline-body">
                                                                    <div class="col-12">
                                                                        <div class="card">
                                                                            <!-- /.card-header -->
                                                                            <div class="card-body table-responsive p-0" style="height: 150px;">
                                                                                <table class="table table-head-fixed text-nowrap">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Nama Servis</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>183</td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <!-- /.card-body -->
                                                                        </div>
                                                                        <!-- /.card -->
                                                                    </div>
                                                                </div>
                                                                <div class="timeline-footer">
                                                                    <div class="callout">
                                                                        <p>Total Biaya: <?= $h['total_biaya'] ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END timeline item -->
                                                        <!-- timeline time label -->


                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                    </div>
                                    <!-- /.timeline -->

                                </section>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        </div>
        <!-- /.card-body -->
    </div>

</section>
<!-- /.content -->

<?= $this->endsection(); ?>

<?= $this->section('script'); ?>
<script>
    $(function() {
        var url = window.location.href;
        var segments = url.split('/');
        var lastSegment = segments[segments.length - 1];
        if (lastSegment === 'cari') {
            $('#reset').show();
        } else {
            $('#reset').hide();

        }

        $('#reset').click(function() {
            $('#formreset').submit();
        })
    });
</script>
<?= $this->endsection(); ?>