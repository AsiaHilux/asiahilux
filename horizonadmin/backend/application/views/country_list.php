<div class="row">
	<div class="col-md-12">
		<div class="card card-underline">
			<div class="card-head">
				<header>
					<h4>View Country Names</h4>
				</header>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="form-group">
						<div class="col-md-4">
							<input type="text" id="search" class="form-control" placeholder="Enter your keyword">
						</div>
					</div>
				</div>

				<div class="table-responsive">
					<table id="example3" class="table table-hover">
						<thead>
							<tr>
								<th>SN#.</th>
								<th> Country Names</th>
								<th>Country Image</th>
								<th>Banner 1</th>
								<th>Banner 4</th>
								<th class="text-center">Active</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody id="tblbody">
						</tbody>
					</table>
				</div>
				<div id="page_links" class="text-left">

				</div>
			</div>
			<!--end .card-body -->
		</div>
		<!--end .card -->
	</div>
	<!--end .col -->

	<div class="modal fade" id="myModal-del" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Delete Country Name</h4>
				</div>
				<div class="modal-body">

					<div id="msg-error" class="alert alert-danger fade in" style="display: none;">
						<a href="#" class="close" onclick='javascript:$("#msg-error").hide();' aria-label="close">&times;</a>
						<div></div>
					</div>

					<div class="form-group">
						<input type="hidden" id="flag_del" value="" class="form-control" placeholder="flag" required>
					</div>

					<div class="form-group">
						<input type="hidden" id="country_id_del" value="" class="form-control" placeholder="country_id_del" required>
					</div>

					<div class="alert alert-danger" role="alert">
						Are you sure you want to delete this record?
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

					<button id="btn_delete" type="button" class="btn btn-danger btn-raised btn-loading-state" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Deleting...">Delete</button>

				</div>
			</div>
		</div>
	</div>


	<div class="modal fade" id="myModal-files" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Upload Image (Image Size should be Width: 30 PX and Height: 30 PX)</h4>
				</div>
				<div class="modal-body">

					<div id="msg-error3" class="alert alert-danger fade in" style="display: none;">
						<a href="#" class="close" onclick='javascript:$("#msg-error3").hide();' aria-label="close">&times;</a>
						<div></div>
					</div>
					<div class="row">
						<div class="col-md-12">

							<form class="form" id="myform_upload_attachment" enctype="multipart/form-data" accept-charset="utf-8" action="">
								<input type="hidden" id="carfeaturedid_forupload" name="carfeaturedid_forupload" value="" />

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<em>(Max file size allowed is 3MB and Image format is 'png', 'gif', 'jpg', 'jpeg'.)</em>
											<br>
											<em>Image Size should be Width: 30 PX and Height: 30 PX</em>
											<input type="file" id="myfile" name="myfile" class="form-control" required>
											<div id="progress_container" class="progress" style="display: none;">
												<div id="pregressbar" class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:0"></div>
											</div>
										</div>
									</div>
								</div>
							</form>
							<div class="row">
								<div class="col-md-12">
									<button id="btn_upload" type="button" class="btn btn-primary btn-raised btn-md btn-loading-state" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Uploading...">Upload</button>
								</div>
							</div>
							<br />
							<div class="row">

							</div>
						</div> <!-- col-md-12 second col -->
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>


	<script type="text/javascript">
		var url = "<?= base_url() . 'index.php/'; ?>country/select";

		$("#search").keyup(function() {
			var value = this.value.toLowerCase().trim();
			var url = "<?= base_url() . 'index.php/'; ?>country/select?search_term=" + value;

			loadCarBodytype(url);
		});


		loadCarBodytype(url);

		function loadCarBodytype(url) {
			$("#tblbody").empty();
			$.getJSON(url, function(result) {
				var sn = 1;
				$.each(result, function(i, field) {
					if (i == "offset") {
						sn = parseInt(field) + 1;
					}
					if (i == "deptype") {

						var status = text = img1_url = img2_url = "";
						if (field.length == 0) {
							$('#tblbody').append('<tr><td style="width: 15%;">No record found</td></tr>');
						} else {
							var rowtags = "";
							for (j = 0; j < field.length; j++) {
								if (field[j].active == "1") {
									status = "btn btn-success";
									text = "Active";
								} else {
									status = "btn btn-danger";
									text = "De Active";
								}
								if (field[j].banner_1) {
									img1_url = '../../../../assets/country_assets/' + field[j].banner_1;
								} else {
									img1_url = '../../../../uploads/car_avatar_no_image.png';
								}
								if (field[j].banner_4) {
									img2_url = '../../../../assets/country_assets/' + field[j].banner_4;
								} else {
									img2_url = '../../../../uploads/car_avatar_no_image.png';
								}
								if (field[j].stored_file_name) {
									img3_url = '../../../../assets/images/' + field[j].stored_file_name;
								} else {
									img3_url = '../../../../uploads/car_avatar_no_image.png';
								}
								rowtags += '<tr><td>' + sn + '</td><td>' + field[j].country_name + '</td><td><img src="' + img3_url + '" style="cursor: pointer;" class="img-circle width-1 showpic"></td><td><img src="' + img1_url + '" style="cursor: pointer; border: 2px solid #9a9a9a;" class="img-circle width-2 showpic"></td><td><img src="' + img2_url + '" style="cursor: pointer; border: 2px solid #9a9a9a;" class="img-circle width-2 showpic"></td><td style="text-align:center;"><span class="' + status + '">' + text + '</span></td><td style="text-align:center;"><button name="btn_edit" data="' + field[j].country_id + '" class="btn btn-primary glyphicon btn-responsive glyphicon-edit margin-2px"></button></td></tr>';
								sn += 1;
							}
							$('#tblbody').html(rowtags);
						}
					}
					if (i == "page_links") {

						$('#page_links').html(field);
					}
				});
			}).fail(function(xhr) {

				if (xhr.status == "404") {
					alert("Your login session has been expired. Please login again.");
					location.reload();
				} else if (xhr.status == "0") {

					alert("No connection available.");
				} else {

					alert(xhr.responseText);
				}
			});
		}

		$("#page_links").on("click", ".pagination a", function() {

			var url = $(this).attr("href");

			if (url != "#") {
				var value = $("#search").val().toLowerCase().trim();
				url += "?search_term=" + value;
				loadCarBodytype(url);
				return false;
			}
		});


		$('#example3').on('click', 'button[name=btn_edit]', function() {
			var id = $(this).attr("data");

			$("#page_content").load("<?= base_url() . 'index.php/'; ?>country/load_edit?id=" + id, function(responseTxt, statusTxt, xhr) {
				if (xhr.status == "200" || xhr.status == "204") {
					if (xhr.status == "204") {
						alert("No data available for edit.");
					} else {
						$("#btn_show_new").hide();
						$("#btn_show_view").show();
					}
				}
				if (statusTxt == "error") {
					alert("Error: " + xhr.status + ": " + xhr.statusText);
					$btn.button('reset');
					if (xhr.status == "404") {
						$btn.button('reset');
						alert("Your login session has been expired. Please login again.");
						location.reload();
					}
					if (xhr.status == "403") {
						$btn.button('reset');
						alert("You don't have permission to perform this action.");
					}
					if (xhr.status == "500") {
						$btn.button('reset');
						alert("Required data not available.");
					}
				}
			});


		});

		$('#example3').on('click', 'button[name=btn_delete]', function() {
			var id = $(this).attr("data");
			$('#country_id_del').val(id);
			$('#flag_del').val('Delete');
			$("#btn_delete").show();
			$('#myModal-del').modal('show');
		});

		$("#btn_delete").click(function() {
			if ($('#flag_del').val() == "Delete") {
				var formdata_d = {
					'country_id': $("#country_id_del").val()
				}
				url = "<?= base_url() . 'index.php/'; ?>country/delete";


				$(this).button('loading');

				SendDataByAjax3(
					url, formdata_d,
					function(result) {

						var result_array = JSON.parse(result);

						$("#btn_delete").button('reset');
						$("#btn_delete").hide();

						if (result_array.res) {
							toastr.success('Record Deleted', 'Successful');
						} else {
							if (result_array.status == "404") {
								alert("Your login session has been expired. Please login again.");
								location.reload();
							} else if (result_array.status == "403") {
								alert("You don't have permission to perform this action.");
								location.reload();
							} else if (result_array.status == "500") {
								$("#msg-error").children('div').html(result_array.msg);
								$("#msg-error").show();
							} else {
								$("#msg-error").children('div').html(result_array.msg);
								$("#msg-error").show();
							}
						}
					}
				);
			}
			$('#flag_del').val('');
			$('#country_id_del').val('');
		});


		$('#myModal-del').on('hidden.bs.modal', function(e) {
			$("#country_id_del").val('');
			$("#flag_del").val('');
			var url = "<?= base_url() . 'index.php/'; ?>country/select";
			loadCarBodytype(url);
		});


		$('#example3').on('click', 'button[id=btn_upload_pic]', function() {
			$('#myModal-files').modal('show');
			var upload_id = $(this).attr("data");
			$("#carfeaturedid_forupload").val(upload_id);


		});

		$('#myModal-files').on('hidden.bs.modal', function(e) {
			location.reload(true);

		});

		$("#btn_upload").click(function() {

			$("#msg-error3").hide();

			var input_file = $("#myfile");
			var upload_url = "<?= base_url() . 'index.php/'; ?>country/upload_attachment_for_featured_Image";

			var file_to_upload = input_file[0].files[0];

			var server_response = [];
			var url = "<?= base_url() . 'index.php/'; ?>country/validate_upload_attanchment?file_name=" + file_to_upload.name + "&file_size=" + file_to_upload.size;
			$.getJSON(url, function(result) {

				if (file_to_upload != "undefined") {
					if (result['result'].res) {
						$(this).button('loading');
						$("#progress_container").show();

						var fromdata = new FormData();
						fromdata.append("file", file_to_upload);
						fromdata.append("car_featured_id_for_upload", $("#carfeaturedid_forupload").val());


						$.ajax({
							url: upload_url,
							type: "POST",
							data: fromdata,
							processData: false,
							contentType: false,
							success: function() {
								$("#pregressbar").text("Uploaded.");
								$("#btn_upload").button('reset');
								$("#myfile").val('');

							},
							error: function(xhr) {

								$("#msg-error3").children('div').html(xhr.responseText);
								$("#msg-error3").show();
								$("#btn_upload").button('reset');
								$("#progress_container").hide();
							},
							complete: function() {
								setTimeout(function() {
									$("#progress_container").hide();
									$("#btn_upload").button('reset');
								}, 1000);
							},
							xhr: function() {
								var xhr = new XMLHttpRequest();
								xhr.upload.addEventListener("progress", function(event) {
									if (event.lengthComputable) {
										var percentComplete = Math.round((event.loaded / event.total) * 100);

										$("#pregressbar").css({
											width: percentComplete + "%"
										});
										$("#pregressbar").text(percentComplete + "%");
									}
								}, false);
								return xhr;
							}
						});
					} else {
						alert("File size or type is note permitted.");
					}
				} else {
					alert("There is no file to upload.");
				}

				////////////////////////////////////////////////////
			}).fail(function(xhr) {

				if (xhr.status == "404") {
					alert("Your login session hase been expired. Please login again.");
					location.reload();
				} else if (xhr.status == "0") {

					alert("No connection available.");
				} else {

					alert(xhr.responseText);
				}
			});
		});
	</script>
