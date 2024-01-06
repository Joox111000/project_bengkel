<?php

use CodeIgniter\I18n\Time;
?>

<?= $this->extend('Layout/header'); ?>
<?= $this->section('content'); ?>

<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <section class="content">
                <div class="container-fluid">
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
                                                                                            <?php 
                                                                                            $se = explode(',',$h['table_service_id'] );
                                                                                            if(count($se)>1) :
                                                                                            for($i =0;$i<count($se);$i++):
                                                                                            ?>
                                                                                        <tr>

                                                                                                <td><?=$se[$i]?></td>
                                                                                        </tr>
                                                                                            <?php endfor;?>
                                                                                            <?php else:?>
                                                                                        <tr>

                                                                                                <td><?=$h['table_service_id']?></td>
                                                                                        </tr>
                                                                                                <?php endif;?>
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
                                                                    <div class="callout " style="border-left: 5px solid red;">
                                                                        <p>Keluhan: <?= $h['keluhan'] ?></p>
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
       

    });
</script>
<?= $this->endsection(); ?>