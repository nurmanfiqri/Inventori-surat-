@extends('layout.app')
@section('content')
<!-- /.content -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{isset($title) ? $title : 'Setting Role'}}</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
            <div class="card-header">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>	
                  <strong>{{ $message }}</strong>
                </div>
                @endif
                <div class="card-tools">
                  <a href="{{ url('setting/role/create')}}" class="btn btn-primary">Tambah Role</a>
                </div>
              </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>No</th>
                <th>Nama Role</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection