@extends('layout.app')

@section('title', 'Detail Role Akses')
@section('content')

<style>
    .select2-container .select2-selection--single {
        box-sizing: border-box;
        cursor: pointer;
        display: block;
        height: 38px;
        user-select: none;
        -webkit-user-select: none;
    }
</style>

<!-- Main content -->
<section class="content">
    <div class="container-fluid col-sm-6 ">
      <div class="row">

        {{-- <div class="card-header">
            <h3>Form Input Data Master</h3>
        </div>
        <div class="card-body">
            <form action="{{url()->current()}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" placeholder="Nama" name="nama" value="{{isset($model) ? $model->nama : ''}}"></input>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">File Surat</label>
                    <input type="file" class="form-control" placeholder="File Surat" onchange="loadFile(event)" name="file">{{isset($model) ? $model->file : ''}}</input>
                </div>

                <embed type="application/pdf" width="600" height="400" id="output"/>

                <div class="">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div> --}}
         <!-- Horizontal Form -->
         <div class="card card-info" style="width: 100%">
            <div class="card-header">
              <h3 class="card-title">Detail Role Akses</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{url()->current()}}" method="POST">
              @csrf
              <div class="card-body">
                <div class="form-group row">
                  <label for="JudulSurat" class="col-sm-2 col-form-label">User</label>
                  <div class="col-sm-10">
                    <input class="form-control" value="{{isset($model) && $model->karyawan ? $model->karyawan->nama_karyawan : ''}}" readonly/>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Role" class="col-sm-2 col-form-label">Role</label>
                  <div class="col-sm-10">
                      <input class="form-control" value="{{isset($model) && $model->role ? $model->role->role : ''}}" readonly/>
                </div>
              <!-- /.card-footer -->
            </form>
          </div>
          <!-- /.card -->

        </div>
        <!-- /.card-body -->
    </div>

            
  </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->

@endsection