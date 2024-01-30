<?php

use CodeIgniter\I18n\Time;
?>
<?= $this->extend('Layout/header'); ?>

<?= $this->section('style'); ?>
<style>
    .radio-inputs {
  display: flex;
  justify-content: center;
  align-items: center;
  max-width: 350px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.radio-inputs > * {
  margin: 6px;
}

.radio-input:checked + .radio-tile {
  border-color: #2260ff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  color: #2260ff;
}

.radio-input:checked + .radio-tile:before {
  transform: scale(1);
  opacity: 1;
  background-color: #2260ff;
  border-color: #2260ff;
}

.radio-input:checked + .radio-tile .radio-icon svg {
  fill: #2260ff;
}

.radio-input:checked + .radio-tile .radio-label {
  color: #2260ff;
}

.radio-input:focus + .radio-tile {
  border-color: #2260ff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1), 0 0 0 4px #b5c9fc;
}

.radio-input:focus + .radio-tile:before {
  transform: scale(1);
  opacity: 1;
}

.radio-tile {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 80px;
  min-height: 80px;
  border-radius: 0.5rem;
  border: 2px solid #b5bfd9;
  background-color: #fff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  transition: 0.15s ease;
  cursor: pointer;
  position: relative;
}

.radio-tile:before {
  content: "";
  position: absolute;
  display: block;
  width: 0.75rem;
  height: 0.75rem;
  border: 2px solid #b5bfd9;
  background-color: #fff;
  border-radius: 50%;
  top: 0.25rem;
  left: 0.25rem;
  opacity: 0;
  transform: scale(0);
  transition: 0.25s ease;
}

.radio-tile:hover {
  border-color: #2260ff;
}

.radio-tile:hover:before {
  transform: scale(1);
  opacity: 1;
}

.radio-icon svg {
  width: 2rem;
  height: 2rem;
  fill: #494949;
}

.radio-label {
  color: #707070;
  transition: 0.375s ease;
  text-align: center;
  font-size: 13px;
}

.radio-input {
  clip: rect(0 0 0 0);
  -webkit-clip-path: inset(100%);
  clip-path: inset(100%);
  height: 1px;
  overflow: hidden;
  position: absolute;
  white-space: nowrap;
  width: 1px;
}
.tooltip {
  position: relative;
  display: inline-block;
  cursor: pointer;
}

.tooltip button {
  background-color: #db3434;
  color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s, transform 0.2s ease-out;
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
                        <th>Reward</th>
                        <th>Tanggal</th>
                        <th>Token</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $no = 1;
                    foreach ($dataRedeem as $data) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?=$data['reward']?></td>
                            <td><?= Time::parse(date('d F Y h:i:s', strtotime($data['created_at'])))->toLocalizedString('d MMMM yyyy') ?>
                            <td><?=$data['token']?></td>
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
                    <form method="POST" action="<?= base_url() ?>/Customer/redeem">
                        <div class="row">
                            <div class="col-3">Point Anda : <b><?=$myPoint['poin'] ?? 0?></b></div>
                            <div class="col-9"></div>
                            <input type="hidden" name="myPoint" value="<?=$myPoint['poin'] ?? 0?>">
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-3">
                            </div>
                            <div class="col-6">
                                <div class="radio-inputs">
                                <label>
                                        <input checked="" class="radio-input" type="radio" name="reward" value="10">
                                        <span class="radio-tile">
                                            <span class="radio-icon">
                                            <img src="<?= base_url()?>reward/aqua.png" alt="aqua">
                                            
                                        </span>
                                            <span class="radio-label">Aqua <br> <b>10 Point</b></span>
                                        </span>
                                    </label>
                                    <label>
                                        <input class="radio-input" type="radio" name="reward" value="15">
                                            <span class="radio-tile">
                                                <span class="radio-icon">
                                                    <img src="<?= base_url()?>reward/tehbotol.png" alt="tehbotol">
                                                </span>
                                                <span class="radio-label">Teh Botol <br> <b>15 Point</b></span>
                                            </span>
                                    </label>
                                    <label>
                                        <input  class="radio-input" type="radio" name="reward" value="30">
                                        <span class="radio-tile">
                                            <span class="radio-icon" style="width: auto;">
                                            <img src="<?= base_url()?>reward/pocari.png" alt="pocari">
                                        </span>
                                            <span class="radio-label">Pocari <br> <b>30 Point</b></span>
                                        </span>
                                    </label>
                                    
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