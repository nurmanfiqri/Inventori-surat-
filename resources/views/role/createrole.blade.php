@extends('layout.app')

@section('title', 'Create Role')
@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card-header">
            <h3>Form Input Data Role</h3>
        </div>
        <div class="card-body">
            <form action="{{url()->current()}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Role</label>
                    <input type="text" class="form-control" placeholder="Role" name="role">{{isset($model) ? $model->role : ''}}</input>
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
