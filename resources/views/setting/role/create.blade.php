@extends('layout.app')

@section('title', 'Create Role & Menu Akses')
@section('content')

<!-- Main content -->
<section class="content">
    {{-- <div class="container-fluid">
        <div class="card-header">
            <h3>Form Role</h3>
        </div>
        <div class="card-body">
            <form action="{{url()->current()}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-5 mt-5">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label pr-0"><b>Role </b></label>
                            <div class="col-sm-8">
                                <input type="text" required class="form-control" name="role" id="role" placeholder="Role" value="{{isset($model) ? $model->role : ''}}">
                                <span id="pesan" style="display: none"></span>
                            </div>
                        </div>
                    </div>
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
                    <div class="row">
                        <div class="col-md-6 mb-5 mt-5">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label pr-0"><b>Role </b></label>
                                <div class="col-sm-8">
                                    <input type="text" required class="form-control" name="role" id="role" placeholder="Role" value="{{isset($model) ? $model->role : ''}}">
                                    <span id="pesan" style="display: none"></span>
                                </div>
                            </div>
                        </div>
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