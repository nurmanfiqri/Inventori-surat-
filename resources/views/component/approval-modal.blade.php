<!-- MODAL HISTORY -->
<div class="modal fade" id="modal-approver" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="title-modal">Daftar Approver Surat</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div id="table-approver" class="box-body table-responsive" style="padding:20px;">
					<table class="table table-bordered" id="tabel-approver" width="100%" cellspacing="0">
						<thead>
							<tr>
                                <th>Approver Level</th>
								<th>Nama Approver</th>
								<th>Divisi</th>
								<th>Jabatan</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-approverlog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="title-modal">Daftar Log Surat</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div id="table-approverlog" class="box-body table-responsive" style="padding:20px;">
					<table class="table table-bordered" id="tabel-approverlog" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>No.</th>
								<th>Nama</th>
								<th>Divisi</th>
								<th>Jabatan</th>
								<th>Doc. Status</th>
								<th>Keterangan</th>
								<th>Tanggal</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<script>

    var documentName = '{{$document}}';
	var url = '{{$url}}';
	var tabel = '{{$table}}';
	var kategori = '{{$kategori}}';


	function approverlog(id) {
		// $('#total, #keterangan').attr('readonly', true);
		$.ajax({
			url: `{{url('api/approver-log/list/${id}?document=${documentName}&kategori=${kategori}')}}`,
			type: "GET",
			dataType: "JSON",
			success: function (response) {
				$("#modal-approverlog").modal("show");

				var $table = $('#table-approverlog tbody');
				$table.html('');
				var no = 1;
				$.each(response, function (i, e) {
					$table.append('<tr></tr>');
					$table.find('tr:last').append('<td>' + no + '</td>');
					$table.find('tr:last').append('<td>' + e.profile.nama_karyawan + '</td>');
					$table.find('tr:last').append('<td>' + e.divisi.nama_divisi + '</td>');
					$table.find('tr:last').append('<td>' + e.jabatan.nama_jabatan + '</td>');
					$table.find('tr:last').append('<td>' + (e.status || '-') + '</td>');
					$table.find('tr:last').append('<td>' + (e.keterangan || '-') + '</td>');
					$table.find('tr:last').append('<td>' + (e.tanggal) + '</td>');
					no++;
				});

			}
		});
	}

    function approver(id) {
		// $('#total, #keterangan').attr('readonly', true);
		$.ajax({
			url: `{{url('api/approver/list/${id}?document=${documentName}&kategori=${kategori}')}}`,
			type: "GET",
			dataType: "JSON",
			success: function (response) {
				$("#modal-approver").modal("show");

				var $table = $('#table-approver tbody');
				$table.html('');
				$.each(response, function (i, e) {
					$table.append('<tr></tr>');
					$table.find('tr:last').append('<td>' + e.apv_level + '</td>');
					$table.find('tr:last').append('<td>' + e.profile.nama_karyawan + '</td>');
					$table.find('tr:last').append('<td>' + e.divisi.nama_divisi + '</td>');
					$table.find('tr:last').append('<td>' + e.jabatan.nama_jabatan + '</td>');
					$table.find('tr:last').append('<td>' + (e.status || '-') + '</td>');
				});

			}
		});
	}

	function submit(param){
          $.confirm({
            title: 'Perhatian',
            content: 'Apakah Anda Yakin Submit Document ini?',
            type: 'blue',
            typeAnimated: true,
            buttons: {
                Submit: function () {
                  $.ajax({
                    url: `{{url('master/${url}/submit/${param}')}}`, //route
                    type: 'POST',
                    data: {
                      "_token": "{{ csrf_token() }}",
                    },
                    success: function (res) {
                        // toastr.info(res.message);
                        $.alert(res.message);
                        $("#"+tabel).DataTable().ajax.reload();
                    },
					error: function(res, error){
						$.alert('Terjadi kesalahan, silahkan coba lagi nanti');
						console.log(error);
					}
                  });
                },
                Batalkan: function () {
                    $.alert('Dibatalkan');
                },
            }
        });
        }

	function approve(param){
		$.confirm({
            title: 'Perhatian',
            content: 'Apakah Anda Yakin Approve Document ini?',
            type: 'green',
            typeAnimated: true,
            buttons: {
                Approve: function () {
                  $.ajax({
                    url: `{{url('master/${url}/approve/${param}')}}`, //route
                    type: 'POST',
                    data: {
                      "_token": "{{ csrf_token() }}",
                    },
                    success: function (res) {
                        // toastr.info(res.message);
                        $.alert(res.message);
                        $("#"+tabel).DataTable().ajax.reload();
                    },
					error: function(res, error){
						$.alert('Terjadi kesalahan, silahkan coba lagi nanti');
						console.log(error);
					}
                  });
                },
                Batalkan: function () {
                    $.alert('Approve dibatalkan');
                },
            }
        });
	}

	function reject(param){
		$.confirm({
		title: 'Keterangan',
		content: '' +

		'<label>Masukan Alasan Penolakan</label>' +
		'<textarea placeholder="Contoh : Typo Judul Surat" class="name form-control" id="keterangan" required </textarea>'
		,
		buttons: {
			formSubmit: {
				text: 'Submit',
				btnClass: 'btn-blue',
				action: function () {
					var name = this.$content.find('textarea#keterangan').val();
					if(!name){
						$.alert('provide a valid name');
						return false;
					}
					$.ajax({
						url: `{{url('master/${url}/reject/${param}')}}`,
						type: "POST",
						dataType: "JSON",
						data: {
							keterangan : name,
							"_token": "{{ csrf_token() }}",
						},
						success: function(res){
							$.alert(res.message);
                        	$("#"+tabel).DataTable().ajax.reload();
						},
						error: function(res,err){
							$.alert('Terjadi kesalahan, silahkan coba lagi nanti');
							console.log(error);
						}
					});
				}
			},
			cancel: function () {
				//close
			},
		},
		onContentReady: function () {
			// bind to events
			var jc = this;
			this.$content.find('form').on('submit', function (e) {
				// if the user submits the form by pressing enter in the field.
				e.preventDefault();
				jc.$$formSubmit.trigger('click'); // reference the button and click it
			});
    	}
	});
	}


</script>

