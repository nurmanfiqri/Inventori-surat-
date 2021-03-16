@extends('layout.app')
@section('content')
<!-- /.content -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{isset($title) ? $title : 'Master Data Karyawan'}}</h1>
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
                  <a href="{{ url('master/karyawan/create')}}" class="btn btn-primary">Tambah Karyawan</a>
                </div>
              </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>No</th>
                <th>Nama Karyawan</th>
                <th>Divisi</th>
                <th>Jabatan</th>
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
      function hapus(param){
          $.confirm({
            title: 'Perhatian',
            content: 'Apakah Anda Yakin akan menghapus data ini?',
            type: 'red',
            typeAnimated: true,
            buttons: {
                Hapus: function () {
                  $.ajax({
                    url: `{{url('master/karyawan/delete/${param}')}}`, //route
                    type: 'POST',
                    data: {
                      "_token": "{{ csrf_token() }}",
                    },
                    success: function (res) {
                        // toastr.info(res.message);
                        $.alert(res.message);
                        $("#example1").DataTable().ajax.reload();
                    }
                  });
                },
                Batalkan: function () {
                    $.alert('Dibatalkan');
                },
            }
        });
        }

      $(document).ready(function(){
        $('#example1').dataTable({
          processing: true,
          serverside: true,
          responsive: true,
          bDestroy: true,

          ajax: {
            url: "{{url('api/master/karyawan')}}",
            type: "GET",
            dataType: "JSON"
          },
          columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama_karyawan', name: 'nama_karyawan'},
            {data: 'divisi', name: 'divisi'},
            {data: 'jabatan', name: 'jabatan'},
            {data: 'aksi', name: 'aksi'}
          ],
          order: [
            [0, 'asc']
          ]
        })
      })
    </script>
@endsection