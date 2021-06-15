{{-- @extends('layout.app')
@section('title', 'Dashboard')
@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>150</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>44</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

@endsection --}}
{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
<style>
    td.no-wrap {
        white-space: nowrap !important;
    }
    .pl-6, .px-6 {
      padding-left: -0.5rem!important;
      align-content: center;
      text-align: center;
      align-items: center;
    }
    .card-custom-header{
      background:linear-gradient(135deg, #0FF0B3 0%,#036ED9 100%);
    }
    .card-custom-in{
      background:linear-gradient(135deg, #11998e 0%,#38ef7d 100%);
    }
    .card-custom-out{
      background:linear-gradient(135deg, #EECDA3 0%,#EF629F 100%);
    }
    .card-custom-all{
      background:linear-gradient(135deg, #0cebeb 0%,#20e3b2 100%, #29ffc6 100%);
    }
    .card-img-absolute {
    position: absolute;
    top: 0;
    right: 0;
    height: 100%;
}
</style>
  <!--begin::Container-->
  <div class="container">
    <!--begin::Card-->
    <div class="card card-custom-header gutter-b">
      <div class="card-body">
        <div class="col">
          <h3 class="px-6" style="color: white">Selamat datang di Dashboard Sistem Peneglolaan <br>Surat Dinas Kesehatan
              Melawi.</h3>
          <h5 class="px-6" style="color: white">Jika ada kesulitan, silahkan hubungi admin. Gunakan aplikasi ini sebijak
              mungkin</h5>

      </div>
    <!--end::Row-->
    </div>
  </div>
  				<!--begin::Row-->
          <div class="row">
            <div class="col-lg-4">
              <!--begin::Card-->
              <div class="card card-custom-in card-stretch">
                <img src="{{url('/svg/circle.svg')}}" class="card-img-absolute" alt="circle-image">
                <div class="card-body" style="color: white">
                  <h4 class="font-weight-normal mb-3">Surat Masuk <i class="fa fa-inbox icon-xl float-right white" style="color: white"></i>
                  </h4>
                  <h2 class="mb-7">0 <span>surat</span></h2>
                </div>
              </div>
              <!--end::Card-->
            </div>
            <div class="col-lg-4">
              <!--begin::Card-->
              <div class="card card-custom-out card-stretch">
                <img src="{{url('/svg/circle.svg')}}" class="card-img-absolute" alt="circle-image">
                <div class="card-body" style="color: white">
                  <h4 class="font-weight-normal mb-3">Surat Keluar <i class="far fa-paper-plane icon-xl float-right white" style="color: white"></i>
                  </h4>
                  <h2 class="mb-7">0 <span>surat</span></h2>
                </div>
              </div>
              <!--end::Card-->
            </div>
            <div class="col-lg-4">
              <!--begin::Card-->
              <div class="card card-custom-all card-stretch">
                <img src="{{url('/svg/circle.svg')}}" class="card-img-absolute" alt="circle-image">
                <div class="card-body" style="color: white">
                  <h4 class="font-weight-normal mb-3">Seluruh Surat <i class="fas fa-archive icon-xl float-right white" style="color: white"></i>
                  </h4>
                  <h2 class="mb-7">0 <span>surat</span></h2>
                </div>
              </div>
              <!--end::Card-->
            </div>
          </div>
          <!--end::Row-->
</div>

@endsection
