@extends('layout.app')

@section('title', 'Create Master')
@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
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
                <div class="form-group">
                    <label for="exampleInputEmail1">File Surat</label>
                    <input type="file" class="form-control" placeholder="File Surat" name="file">{{isset($model) ? $model->file : ''}}</input>
                </div>
                <div class="">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->

@endsection
