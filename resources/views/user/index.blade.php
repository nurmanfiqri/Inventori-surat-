@extends('layout.app')

@section('title', 'User')
@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="card-header">
        <div class="card-tools">
          <a href="{{ url('/user/create')}}" class="btn btn-primary">Tambah</a>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Level</th>
                      <th>Email</th>
                      <th>Create at</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                  
              </tbody>
          </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->

@endsection
