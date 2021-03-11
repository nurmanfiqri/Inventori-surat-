@extends('layout.app')
@section('content')
<!-- /.content -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{isset($title) ? $title : 'Master Data Divisi'}}</h1>
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
                  <a href="{{ url('master/divisi/create')}}" class="btn btn-primary">Tambah Divisi</a>
                </div>
              </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>No</th>
                <th>Nama Divisi</th>
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

@section('script')
    <script>
        $(document).ready(function(){
            $('#example1').dataTable({
                processing: true, 
                serverside: true,
                responsive: true,
                bDestroy: true,
                ajax: {
                    url: "{{url('api/master/divisi')}}",
                    method: "GET",
                    dataType: "JSON"
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'nama_divisi', name: 'nama_divisi'},
                    {data: 'aksi', name: 'aksi'}
                ],
                order: [
                    [0, 'asc']
                ]
            })
        })
    </script>
@endsection