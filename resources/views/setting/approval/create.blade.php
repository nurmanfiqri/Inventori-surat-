@extends('layout.app')

@section('title', 'Create WorkFLow')
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
                    <label for="exampleInputEmail1">Unit</label>
                    <input type="text" class="form-control" placeholder="Unit" name="unit" value="{{isset($model) ? $model->unit : ''}}"></input>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <input type="text" class="form-control" placeholder="Status" name="status" value="{{isset($model) ? $model->status : ''}}"></input>
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