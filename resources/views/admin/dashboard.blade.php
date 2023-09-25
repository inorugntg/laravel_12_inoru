@extends('admin.admin')

@section('title', 'dashboard')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div>
                <h4 class="card-title">Siswa</h4>
                <h2 class="text-primary mb-0">4</h2>
              </div>
              <div class="ml-auto">
                <div class="icon-box bg-primary">
                  <i class="mdi mdi-calendar-text"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div>
                <h4 class="card-title">Project</h4>
                <h2 class="text-success mb-0">8</h2>
              </div>
              <div class="ml-auto">
                <div class="icon-box bg-success">
                  <i class="mdi mdi-check"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Tempatkan div untuk grafik di sini -->
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <!-- Tempatkan grafik di sini -->
            <canvas id="line-chart" class="transaction-chart" width="700" height="365"></canvas>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <style>
     
    </style>
    <!-- partial -->
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<script>
  // Data untuk grafik garis
  var lineChartData = {
    labels: ['Jul', 'Aug', 'Sep', 'Oct', 'Nov'],
    datasets: [{
        label: 'Siswa',
        borderColor: '#007bff',
        backgroundColor: 'transparent',
        data: [2, 4, 6, 8, 10],
      },
      {
        label: 'Project',
        borderColor: '#28a745',
        backgroundColor: 'transparent',
        data: [3, 5, 7, 9, 11],
      },
    ],
  };

  // Konfigurasi grafik garis
  var lineChartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    legend: {
      display: true,
    },
    scales: {
      x: {
        beginAtZero: true,
      },
      y: {
        beginAtZero: true,
      },
    },
    plugins: {
      legend: {
        display: true,
        position: 'top', // Ubah posisi legenda ke atas
      },
    },
  };
  // Mendapatkan elemen canvas dan menginisialisasi grafik
  var ctx = document.getElementById('line-chart').getContext('2d');
  var lineChart = new Chart(ctx, {
    type: 'line',
    data: lineChartData,
    options: lineChartOptions,
  });
</script>
@endsection