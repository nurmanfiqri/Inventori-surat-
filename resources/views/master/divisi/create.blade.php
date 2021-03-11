@extends('layout.app')

@section('title', 'Create Divisi & Jabatan')
@section('content')

<!-- Main content -->
<section class="content">
    {{-- <div class="container-fluid">
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
            <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                <h3 class="card-title">Form Pengisian Divisi</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{url()->current()}}">
                    @csrf
                    <div class="card-body">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Divisi</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="nama" name="nama_divisi" value="{{isset($model) ? $model->nama_divisi : ''}}" placeholder="Nama Divisi">
                            </div>
                    </div>

                    <div class="card-body operasional">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-1" data-toggle="tab" href="#tab-budgetBelanja" role="tab"
                                    aria-controls="tab-budgetBelanja" aria-selected="true">Jabatan Divisi</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent" style="padding: 10px">
                           <div class="tab-pane fade show active" id="tab-budgetBelanja" role="tabpanel" aria-labelledby="tab-1">
                            <template class="tmpl-line">@include('master.divisi.multiline', [
                                'i' => '__INDEX__',
                                'model' => new \App\Models\Master\Divisi,
                                'name' =>  'jabatan'
                             ])</template>
             
                             <button type="button" class="btn btn-success" id="add" onclick="addJabatan()"><ion-icon name="add-outline"></ion-icon> Add Jabatan</button>
                             <div class="table-responsive mt-4">
                                 <table class="table table-bordered" id="tabel-jabatan" width="100%" cellspacing="0">
                                     <thead>
                                         <tr>
                                             <th class="text-center">No</th>
                                             <th class="text-center">Nama Jabatan</th>
                                             <th class="text-center">Aksi</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         @foreach ($model->jabatan as $i => $item)
                                         @include('master.divisi.multiline', ['i' => $i, 'model' => $item, 'name' => 'jabatan'])   
                                         @endforeach
                                     </tbody>
                                 </table>
                                 <div id="deleteJabatan"></div>
                             </div>
                            </div> 
                        </div>
                    </div>
                    

                </div>

       
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" id="btn-reset"><i class="fa fa-undo"></i>
                        Reset</button>
                    <button type="submit" class="btn btn-primary" id="btn-simpan"><i class="fa fa-save"></i>
                        Simpan</button>
                </div>
                </form>
            </div>
            <!-- /.card -->

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

@section('script')
    <script>
        var index = {{$model->jabatan->count()-1}};
        
        function addJabatan(){
            var tpl = $('template.tmpl-line');

            index++;
            var template = tpl.html().replace(/__INDEX__/g, index);    
            $('#tabel-jabatan > tbody').append(template);
            renumberLine();
        }

        function renumberLine(){
            var index = 1;
            $('#tabel-jabatan tbody tr').each(function(){
                $(this).find('[data-id="line_no"]').val(index);
                index++;
            })
        }

        function removeLine(index){
            var $tr = $('[data-index="' + index + '"]');
            var line_id = $tr.find('[data-id="id"]').val();
            if(line_id !== ''){
                $('<input>').attr({
                    type: 'hidden',
                    name: 'deleteLineJabatan[]',
                    value: line_id
                }).appendTo('#deleteJabatan');
            }
            $tr.remove();
            renumberLine();
        }
    </script>
@endsection