<?= $this->extend('Layout/header'); ?>
<?= $this->section('content'); ?>

<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="card">
        <!-- /.card-header -->
        <div class="card-header">Bantu Kami Lebih Baik</div>
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
        <div class="card-body">
            <section class="content">
                <form action="<?= base_url() ?>Customer/kirim" method="post">
                    <div class="row">
                        <div class="col-12">
                        <div class="form-group">
                        <label>Kritik atau Saran</label>
                        <textarea class="form-control" rows="6" placeholder="Tambahkan Kritik dan Saran" name="aduan"></textarea>
                      </div>
                        </div>
                    </div>
            </section>
        </div>
        <div class="card-footer">
        <button type="submit" class="btn btn-info">Kirim</button>
        </form>

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