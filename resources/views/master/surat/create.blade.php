@extends('layout.app')

@section('title', 'Form Input Surat')
@section('content')

<style>
    .select2-container .select2-selection--single {
        box-sizing: border-box;
        cursor: pointer;
        display: block;
        height: 38px;
        user-select: none;
        -webkit-user-select: none;
    }
</style>

<!-- Main content -->
<section class="content">
    <div class="container-fluid col-sm-6 ">
      <div class="row">

        {{-- <div class="card-header">
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
                    <label for="exampleInputEmail1">File Surat</label>
                    <input type="file" class="form-control" placeholder="File Surat" onchange="loadFile(event)" name="file">{{isset($model) ? $model->file : ''}}</input>
                </div>

                <embed type="application/pdf" width="600" height="400" id="output"/>

                <div class="">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div> --}}
         <!-- Horizontal Form -->
         <div class="card card-info" style="width: 100%">
            <div class="card-header">
              <h3 class="card-title">Form Input Surat</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{url()->current()}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body col-sm-10">
                <div class="form-group row">
                  <label for="JudulSurat" class="col-sm-2 col-form-label">Nama Surat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="surat" name="nama" value="{{isset($model) ? $model->nama : ''}}" placeholder="Contoh: Surat Undangan Acara ...">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="FileSurat" class="col-sm-2 col-form-label">File Surat</label>
                  <div class="col-sm-10">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file" id="customFile">
                        <label class="custom-file-label" for="customFile">Pilih File</label>
                      </div>
                      <span style="color: crimson">Format/Maks File : (pdf, jpg, jpeg, png/Maksimal 2MB)</span>
                      <div class="imgPreview" style="display: none">
                        <img id="preview" src="#" alt="your image" style="width: 200px; height: 200px" />
                      </div>
                      <canvas id="pdfViewer" style="display: none"></canvas>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="FileSurat" class="col-sm-2 col-form-label">File Terupload</label>
                  <div class="col-sm-10">
                    <span>
                      <a href="{{isset($model) && $model->url_file ? $model->url_file : '#'}}" target="_blank">{{isset($model) && $model->file ? $model->file : ''}}</a>
                    </span>
                    
                  </div>
                  
                </div>
                <div class="form-group row">
                    <label for="UniteKerja" class="col-sm-2 col-form-label">Unit Kerja</label>
                    <div class="col-sm-10">
                        <select class="form-control select2bs4" id="unit" name="unit" style="width: 100%;">
                          <option value="{{isset($model) ? $model->unit : ''}}" selected="selected">{{isset($model) && $model->approver ? $model->workflow->nama_workflow : ''}}</option>
                        </select>
                  </div>
                {{-- <div class="form-group row">
                  <div class="offset-sm-2 col-sm-10">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck2">
                      <label class="form-check-label" for="exampleCheck2">Remember me</label>
                    </div>
                  </div>
                </div> --}}
              </div>
              <!-- /.card-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
                <button type="submit" class="btn btn-default"><i class="fa fa-arrow-left"></i> Batal</button>
              </div>
              <!-- /.card-footer -->
            </form>
          </div>
          <!-- /.card -->

        </div>
        <!-- /.card-body -->
    </div>

            
  </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->

@endsection

@section('script')
    <script>

    function getFileExtension(filename) {
        /*TODO*/
        return filename.split('.').pop();
    }

    function readURL(input) {
      var extension = getFileExtension($('#customFile').val());
      if(extension != 'pdf'){
        if (input.files && input.files[0]) {
          var reader = new FileReader();
        
          reader.onload = function(e) {
            $('.imgPreview').show();
            $('#preview').attr('src', e.target.result);
          }
        
          reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
      } else{
        var fileReader = new FileReader();
        fileReader.onload = function(){
          var pdfData = new Uint8Array(this.result);

          var loadingTask = pdfjsLib.getDocument({data: pdfData});
          loadingTask.promise.then(function(pdf){
            console.log('PDF Loaded');

            var pageNumber = 1;
            pdf.getPage(pageNumber).then(function(page){
              console.log('Page Loaded');

              var scale = 1.5;
              var viewport = page.getViewport({scale: scale});
              $('#pdfViewer').show();
              var canvas = $('#pdfViewer')[0];
              var context = canvas.getContext('2d');
              // canvas.height = viewport.height;
              // canvas.width = viewport.width;
              canvas.height = 400;
              canvas.width = 300;

              // Render PDF page into canvas context
              var renderContext = {
                canvasContext: context,
                viewport: viewport
              };
              var renderTask = page.render(renderContext);
				        renderTask.promise.then(function () {
				        console.log('Page rendered');
				      });
            });
          }, function(reason){
            // PDF loading error
			      console.error(reason);
          });
        };
        fileReader.readAsArrayBuffer(input.files[0]);
      }
  
    } 


        $(document).ready(function(){
            var loadFile = function(event) {
                var output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0]);
            }

            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });

            $('#unit').select2({
                placeholder: 'Silahkan Pilih Unit ...',
                ajax: {
                    url: "{{url('api/select2/unit')}}",
                    dataType: "JSON",
                    type: "GET",
                    delay: "250",
                    data: function(params){
                        return {
                            q: params.term,
                        }
                    },
                    processResults: function(data){
                        return {
                            results: $.map(data, function(results){
                                return{
                                    text: results.nama_workflow,
                                    id: results.id,
                                }
                            })
                        }
                    },
                    cache: true,
                }
            });

            $('#customFile').change(function(){
              readURL(this);
            })
        })
   
    </script>
@endsection
