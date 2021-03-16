@extends('layout.app')

@section('title', 'Create Unit Kerja')
@section('content')

<!-- Main content -->
<section class="content">
    {{-- <div class="container-fluid">
        <div class="card-header">
            <h3>Form Input Data Master</h3>
        </div>
        <div class="card-body">
            <form action="{{url()->current()}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" placeholder="Nama" name="nama" value="{{isset($model) ? $model->nama : ''}}"></input>
                </div>
                <div class="">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div> --}}
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->      
                <div class="card-body">
                    <form action="{{url()->current()}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Unit Kerja</label>
                            <input type="text" class="form-control" placeholder="Masukkan Unit Kerja" name="nama" value="{{isset($model) ? $model->nama : ''}}"></input>
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->

@endsection