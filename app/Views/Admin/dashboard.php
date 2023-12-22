<?= $this->extend('Layout/header'); ?>
<?= $this->section('content'); ?>
<!-- Main content -->
<section class="content">
  <?php
  if (session()->get('user')['namaRole'] == "admin") :
  ?>
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $jumlahCustomer ?></h3>

              <p>Kustomer</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?=$jumlahServis?></h3>

              <p>Service</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?=$jumlahKritik?></h3>

              <p>Kritik</p>
            </div>
            <div class="icon">
              <i class="ion ion-alert"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?=$jumlahBarang?></h3>

              <p>Barang</p>
            </div>
            <div class="icon">
              <i class="ion ion-briefcase"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-6">
        <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Kategori Berdasarkan Tipe</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
        <div class="col-6"></div>
      </div>
      <!-- /.row -->
      <!-- /.row -->
    </div><!--/. container-fluid -->
  <?php endif; ?>

  <?php
  if (session()->get('user')['namaRole'] == "user") :
  ?>
    <div class="container-fluid">
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-body p-0">
              <!-- THE CALENDAR -->
              <div id="calendar"></div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  <?php endif; ?>
</section>
<!-- /.content -->
<?= $this->endsection(); ?>

<?= $this->section('script'); ?>
<script>
  $(function() {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------
    // Get context with jQuery - using jQuery's .get() method.
    $.ajax({
  url: "<?= base_url() ?>Home/tipeMotor",
  type: 'GET',
  success: function(response) {
    let jumlah =[];
    let jenis = [];
    response.forEach(function(data, index) {
      jumlah.push(parseInt(data.total));
      jenis.push(data.jenis);
    });

    var donutChartCanvas = $('#donutChart').get(0).getContext('2d');
    var donutData = {
      labels: jenis,
      datasets: [{
        data: jumlah,
        backgroundColor: ['#f56954', '#00a65a'],
      }]
    }
    var donutOptions = {
      maintainAspectRatio: false,
      responsive: true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })
  },
  error: function(err) {
    // Handle error if needed
    console.error(err);
  }
});
    

  })



  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var today = new Date();
    // Dapatkan tahun, bulan, dan tanggal
    var year = today.getFullYear();
    var month = (today.getMonth() + 1).toString().padStart(2, '0'); // Tambah 1 karena Januari dimulai dari indeks 0
    var day = today.getDate().toString().padStart(2, '0');
    var formattedDate = year + '-' + month + '-' + day;

    $.ajax({
      url: "<?= base_url() ?>Home/jadwalService",
      type: 'GET',
      success: function(response) {
        var dataJadwal = [];
        var dataServis = [];
        response.forEach(function(data) {
          dataJadwal.push(data.date);
          dataServis.push(data.tNama);
        });

        console.log(dataJadwal);
        console.log(dataServis)
        var eventsArray = [];

        for (var i = 0; i < dataJadwal.length; i++) {
          eventsArray.push({
            title: dataServis[i],
            start: dataJadwal[i]
          });
        }
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          initialDate: formattedDate,
          headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
          },
          events: eventsArray
        });

        calendar.render();
      },
      error: function(err) {
        console.log(err);
      }
    })

  });
</script>
<?= $this->endsection(); ?>