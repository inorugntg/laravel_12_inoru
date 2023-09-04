@extends('admin.admin')

@section('title', 'dashboard')

@section('content')
<!--About-->
<section id="dashboard">
  <div class="container-fluid">
    <div class="row">
      <main class="col-lg-10 pt-6 px-8">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2"><i class="fa fa-tachometer"></i> Dashboard</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
              <button class="btn btn-sm btn-primary">Share</button>
              <button class="btn btn-sm btn-primary">Export</button>
            </div>
            <button class="btn btn-sm btn-primary dropdown-toggle">
              <i class="fa fa-calendar"></i>
              This week
            </button>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 pr-0 mb-3">
            <div class="card text-white" style="background: linear-gradient(to bottom, #007bff, #8a2be2, #ff1493);">
              <div class="card-header"><i class="fa fa-shopping-bag"></i> New Orders</div>
              <div class="card-body">
                <h3 class="card-title">150</h3>
              </div>
              <a class="card-footer text-right" href="#">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 pr-0 mb-3">
            <div class="card text-white" style="background: linear-gradient(to bottom, #007bff, #8a2be2, #ff1493);">
              <div class="card-header"><i class="fa fa-bar-chart"></i> Bounce Rate</div>
              <div class="card-body">
                <h3 class="card-title">53%</h3>
              </div>
              <a class="card-footer text-right" href="#">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>

          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 pr-0 mb-3">
            <div class="card text-white" style="background: linear-gradient(to bottom, #007bff, #8a2be2, #ff1493);">
              <div class="card-header"><i class="fa fa-user-plus"></i> User Registrations</div>
              <div class="card-body">
                <h3 class="card-title">44</h3>
              </div>
              <a class="card-footer text-right" href="#">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>

          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 pr-0 mb-3">
            <div class="card text-white" style="background: linear-gradient(to bottom, #007bff, #8a2be2, #ff1493);">
              <div class="card-header"><i class="fa fa-pie-chart"></i> Unique Visitor</div>
              <div class="card-body">
                <h3 class="card-title">65</h3>
              </div>
              <a class="card-footer text-right" href="#">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>

          </div>
        </div>
        <!-- Pie chart using HTML and Bootstrap -->
        <div class="row">
          <div class="col-lg-6 offset-lg-3">
            <div class="text-center">
            <div class="pie-chart mb-4" style="background: linear-gradient(to bottom, #007bff, #8a2be2, #ff1493);">
                <div class="slice slice-blue" style="transform: rotate(0deg);"></div>
                <div class="slice slice-green" style="transform: rotate(30deg);"></div>
                <div class="slice slice-yellow" style="transform: rotate(75deg);"></div>
                <div class="slice slice-red" style="transform: rotate(120deg);"></div>
              </div>
              <div class="d-flex justify-content-between">
                <div>New Orders</div>
                <div>Bounce Rate</div>
                <div>User Registrations</div>
                <div>Unique Visitor</div>
              </div>
            </div>
          </div>
        </div>
        <style>
          .bg-gradient-dark {
            background: linear-gradient(to bottom, #007bff, #8a2be2, #ff1493);
            /* Ganti dengan warna yang Anda inginkan */
          }

          /* CSS untuk grafik lingkaran */
          .pie-chart {
            position: relative;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background-color: #f1f1f1;
            display: inline-block;
          }

          .slice {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            clip: rect(0, 100px, 200px, 0);
          }

          .slice-blue {
            background-color: #007bff;
          }

          .slice-green {
            background-color: #28a745;
          }

          .slice-yellow {
            background-color: #ffc107;
          }

          .slice-red {
            background-color: #dc3545;
          }
        </style>

    </div>
</section>
@endsection