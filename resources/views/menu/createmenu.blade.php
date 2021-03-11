@extends('layout.app')

@section('title', 'Create Menu')
@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card-header">
            <h3>Form Input Data Menu</h3>
        </div>
        <div class="card-body">
            <form action="{{url()->current()}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Menu</label>
                    <input type="text" class="form-control" placeholder="Menu" name="menu" value="{{isset($model) ? $model->menu : ''}}"></input>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">URL Menu</label>
                    <input type="text" class="form-control" placeholder="URL Menu" name="url" value="{{isset($model) ? $model->url : ''}}"></input>
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
