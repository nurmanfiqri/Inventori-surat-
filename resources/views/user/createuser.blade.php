@extends('layout.app')

@section('title', 'Create User')
@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card-header">
            <h3>Form Input Data User</h3>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" placeholder="Nama" name="deskripsi"></input>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" placeholder="Email" name="deskripsi"></input>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->

@endsection
