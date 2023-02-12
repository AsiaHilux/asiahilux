<div class="row">
	<div class="col-md-12">
		<div class="card card-underline">
			<div class="card-head">
				<header>
					<h4>View Car Details</h4>
				</header>
			</div>
			<!--end .card-head -->
			<div class="card-body">

				<div id="test"></div>
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
								<th style="width: 5%;">Image</th>
								<th style="width: 15%;">Make</th>
								<th style="width: 15%;">Model</th>
								<th style="width: 20%;">Car Name</th>
								<th style="width: 10%;">Car Price</th>
								<th style="width: 10%;">Status</th>
								<th style="width: 30%; text-align:center;">Actions</th>
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
</div> <!-- end .row-->

<div class="modal fade" id="myModal-del" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Delete Car Details</h4>
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
					<input type="hidden" id="car_d_id_del" value="" class="form-control" placeholder="car_d_id_del" required>
				</div>
				<div class="alert alert-danger" role="alert">
					Are you sure you want to delete this record?.
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button id="btn_delete" type="button" class="btn btn-danger btn-raised btn-loading-state" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Deleting...">Delete</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="myModal-activate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="activate_label">...</h4>
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
					<input type="hidden" id="car_d_id_del" value="" class="form-control" placeholder="car_d_id_del" required>
				</div>
				<div class="alert" role="alert" id="activate_msg">
					...
				</div>
			</div>
			<div class="modal-footer">
				<form action="<?= base_url('index.php/car_detail/activate_deactivate_car'); ?>" method="post">
					<input type="hidden" name="car_d_id" id="activate_id">
					<input type="hidden" name="action" id="activate_action">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" id="activate_btn" class="btn btn-raised btn-loading-state" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Deleting...">Delete</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="myModal-picshow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Car Image</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<input type="hidden" id="book_id_view" value="" class="form-control">
					<input type="hidden" id="book_img_src" value="" class="form-control">
				</div>
				<div class="row">
					<div class="col-md-12 text-center">
						<img class="img-responsive img-thumbnail text-center img_show" id="book_image" src="" alt="">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="myModal-showdetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">More Detail</h4>
			</div>
			<div class="modal-body">

				<form class="form">


					<div class="row">

						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" id="CDPlayer" class="form-control" value="">
								<label for="CD Player">CD Player</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="SunRoof" value="">
								<label for="Sun Roof">
									Sun Roof
								</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="LeatherSeat">
								<label for="Leather Seat">Leather Seat</label>
							</div>
						</div>

						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="AlloyWheels" value="">
								<label for="Alloy Wheels">
									Alloy Wheels
								</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="PowerSteering" value="">
								<label for="Power Steering">
									P Steering
								</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="PowerWindow" value="">
								<label for="PowerWindow">
									P Window
								</label>
							</div>
						</div>

					</div>

					<div class="row">
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="AC" value="">
								<label for="AC">
									AC
								</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="ABS" value="">
								<label for="ABS">
									ABS
								</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="Airbag" value="">
								<label for="Airbag">
									Air bag
								</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="Radio" value="">
								<label for="Radio">
									Radio
								</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="CDChanger" value="">
								<label for="CDChanger">
									CD Changer
								</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="DVD" value="">
								<label for="DVD">
									DVD
								</label>
							</div>
						</div>

					</div>
					<div class="row">
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="TV" value="">
								<label for="TV">
									TV
								</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="PoweSeat" value="">
								<label for="PoweSeat">
									Power Seat
								</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="BackTire" value="">
								<label for="BackTire">
									Back Tire
								</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="GrillGuard" value="">
								<label for="GrillGuard">
									Grill Guard
								</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="RearSpoiler" value="">
								<label for="RearSpoiler">
									Rear Spoiler
								</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="CentralLocking" value="">
								<label for="CentralLocking">
									C Locking
								</label>
							</div>
						</div>

					</div>
					<div class="row">
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="Jack" value="">
								<label for="Jack">
									Jack
								</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="SpareTire" value="">
								<label for="SpareTire">
									Spare Tire
								</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="WheelSpanner" value="">
								<label for="WheelSpanner">
									W Spanner
								</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="VehicleNo" value="">
								<label for="VehicleNo">
									Vehicle No.
								</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="Chassis" value="">
								<label for="Chassis">
									Chassis
								</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="ModelCode" value="">
								<label for="ModelCode">
									Model Code
								</label>
							</div>
						</div>


					</div>
					<div class="row">
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="VersionClass" value="">
								<label for="VersionClass">
									Version Class
								</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="EngineCode" value="">
								<label for="EngineCode">
									Engine Code
								</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="Mileage" value="">
								<label for="Mileage">
									Mileage
								</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="EngineSize" value="">
								<label for="EngineSize">
									Engine Size
								</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="RegistrationYear" value="">
								<label for="RegistrationYear">
									Reg Year
								</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="RegistrationMonth" value="">
								<label for="RegistrationMonth">
									Reg Month
								</label>
							</div>
						</div>

					</div>
					<div class="row">
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="ManufactureYear" value="">
								<label for="ManufactureYear">
									M Year
								</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="ManufactureMonth" value="">
								<label for="ManufactureMonth">
									M Month
								</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="Ext_Color" value="">
								<label for="Ext_Color">
									Ext. Color
								</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="WheelDrive" value="">
								<label for="WheelDrive">
									Wheel Drive
								</label>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<input type="text" class="form-control" id="Location" value="">
								<label for="Location">
									Location
								</label>
							</div>
						</div>


					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<input type="text" class="form-control" id="Dimension" value="">
								<label for="Dimension">
									Dimension
								</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="Doors" value="">
								<label for="Doors">
									Doors
								</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="M3" value="">
								<label for="M3">
									M3
								</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="Seats" value="">
								<label for="Seats">
									Seats
								</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<input type="text" class="form-control" id="Weight" value="">
								<label for="Weight">
									Weight
								</label>
							</div>
						</div>

					</div>

				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>

<!-- Start file upload modal -->
<div class="modal fade" id="myModal-files" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Upload Image (Image Size should be Width: 174 PX and Height: 115 PX)</h4>
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
							<!-- <input type="hidden" id="carfeaturedid_forupload" name="carfeaturedid_forupload" value=""> -->
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<em>(Max file size allowed is 3MB and Image format is 'png', 'gif', 'jpg', 'jpeg'.)</em>
										<br>
										<em>Image Size should be Width: 174 PX and Height: 115 PX</em>
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
<!-- End file upload modal -->


<script type="text/javascript">
	var url = "<?= base_url() . 'index.php/'; ?>car_detail/select";
	$("#search").keyup(function() {
		var value = this.value.toLowerCase().trim();
		var url = "<?= base_url() . 'index.php/'; ?>car_detail/select?search_term=" + value;
		loadcar_detail(url);
	});
	loadcar_detail(url);

	function loadcar_detail(url) {
		var card = $("#card");
		materialadmin.AppCard.addCardLoader(card);
		$.getJSON(url, function(result) {
			var sn = 1;
			$.each(result, function(i, field) {
				if (i == "offset") {
					sn = parseInt(field) + 1;
				}
				if (i == "library") {
					var status = "";
					if (field.length == 0) {
						$('#tblbody').html('<tr><td colspan="7">No record found</td></tr>');
					} else {
						var rowtags = "";
						for (j = 0; j < field.length; j++) {
							rowtags +=
								'<tr><td>' + sn +
								'</td><td style="width: 5%;">' + ((field[j].stored_file_name != null) ? '<img  style="cursor: pointer; border: 2px solid #9a9a9a;" class="img-circle width-1 showpic" src="../../../../uploads/thumbnail/' + field[j].stored_file_name + '" /> ' : '' + '<img style="cursor: pointer; border: 2px solid #9a9a9a;" class="img-circle width-1 showpic" src="../../../../uploads/car_avatar_no_image.png' + '" /> ') +
								'<td style="width: 15%;">' + field[j].vm_name +
								'</td><td style="width: 15%;">' + ((field[j].model_name != null) ? field[j].model_name : '' + " -- ") +
								'</td><td style="width: 15%;">' + field[j].carname +
								'</td><td style="width: 10%;">' + "$ " + field[j].carprice +
								'</td><td style="width: 10%;">' + ((field[j].is_active == 0) ? 'Inactive' : 'Active') +
								'</td><td style="display: none;">' + ((field[j].CDPlayer == 1) ? 'Yes' : 'No') +
								'</td><td style="display: none;">' + ((field[j].LeatherSeat == 1) ? 'Yes' : 'No') +
								'</td><td style="display: none;">' + ((field[j].AlloyWheels == 1) ? 'Yes' : 'No') +
								'</td><td style="display: none;">' + ((field[j].PowerSteering == 1) ? 'Yes' : 'No') +
								'</td><td style="display: none;">' + ((field[j].PowerWindow == 1) ? 'Yes' : 'No') +
								'</td><td style="display: none;">' + ((field[j].AC == 1) ? 'Yes' : 'No') +
								'</td><td style="display: none;">' + ((field[j].ABS == 1) ? 'Yes' : 'No') +
								'</td><td style="display: none;">' + ((field[j].Airbag == 1) ? 'Yes' : 'No') +
								'</td><td style="display: none;">' + ((field[j].Radio == 1) ? 'Yes' : 'No') +
								'</td><td style="display: none;">' + ((field[j].CDChanger == 1) ? 'Yes' : 'No') +
								'</td><td style="display: none;">' + ((field[j].DVD == 1) ? 'Yes' : 'No') +
								'</td><td style="display: none;">' + ((field[j].TV == 1) ? 'Yes' : 'No') +
								'</td><td style="display: none;">' + ((field[j].PoweSeat == 1) ? 'Yes' : 'No') +
								'</td><td style="display: none;">' + ((field[j].BackTire == 1) ? 'Yes' : 'No') +
								'</td><td style="display: none;">' + ((field[j].GrillGuard == 1) ? 'Yes' : 'No') +
								'</td><td style="display: none;">' + ((field[j].RearSpoiler == 1) ? 'Yes' : 'No') +
								'</td><td style="display: none;">' + ((field[j].CentralLocking == 1) ? 'Yes' : 'No') +
								'</td><td style="display: none;">' + ((field[j].Jack == 1) ? 'Yes' : 'No') +
								'</td><td style="display: none;">' + ((field[j].SpareTire == 1) ? 'Yes' : 'No') +
								'</td><td style="display: none;">' + ((field[j].WheelSpanner == 1) ? 'Yes' : 'No') +
								'</td><td style="display: none;">' + field[j].VehicleNo +
								'</td><td style="display: none;">' + field[j].Chassis +
								'</td><td style="display: none;">' + field[j].ModelCode +
								'</td><td style="display: none;">' + field[j].VersionClass +
								'</td><td style="display: none;">' + field[j].EngineCode +
								'</td><td style="display: none;">' + field[j].Mileage +
								'</td><td style="display: none;">' + field[j].EngineSize +
								'</td><td style="display: none;">' + field[j].RegistrationYear +
								'</td><td style="display: none;">' + field[j].RegistrationMonth +
								'</td><td style="display: none;">' + field[j].ManufactureYear +
								'</td><td style="display: none;">' + field[j].ManufactureMonth +
								'</td><td style="display: none;">' + field[j].Ext_Color +
								'</td><td style="display: none;">' + field[j].WheelDrive +
								'</td><td style="display: none;">' + field[j].Location +
								'</td><td style="display: none;">' + field[j].Dimension +
								'</td><td style="display: none;">' + field[j].Doors +
								'</td><td style="display: none;">' + field[j].M3 +
								'</td><td style="display: none;">' + field[j].Seats +
								'</td><td style="display: none;">' + field[j].Weight +
								'</td><td style="width: 20%; text-align:center;">' +
								'<button id="btn_upload_pic" data="' + field[j].car_d_id + '" class="btn btn-xs btn-primary btn-responsive glyphicon glyphicon-upload" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Upload Car Featured Image">' +
								'</button>&nbsp;&nbsp;<button onclick="activate_deactivate_car(this)" data-id="' + field[j].car_d_id + '" data-action="' + ((field[j].is_active == 0) ? 1 : 0) + '" class="btn btn-xs ' + ((field[j].is_active == 0) ? 'btn-danger' : 'btn-primary') + ' btn-responsive glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="' + ((field[j].is_active == 0) ? 'Activate' : 'Deactivate') + ' Car">' +
								'</button>&nbsp;&nbsp;<button name="btn_view" data="' + field[j].car_d_id + '" class="btn btn-xs btn-primary btn-responsive  glyphicon glyphicon-eye-open" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="More Detail"></button>' +
								'&nbsp;&nbsp;<a href="<?= base_url() . 'index.php/car_detail/update_car/'; ?>' + field[j].car_d_id + '" class="btn btn-xs btn-primary btn-responsive glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Edit"></a>' +
								'&nbsp;&nbsp;<button name="btn_delete" data="' + field[j].car_d_id + '" class="btn btn-xs btn-danger btn-responsive glyphicon glyphicon-remove " data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Delete"></button></td></tr>';
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
			materialadmin.AppCard.removeCardLoader(card);
			if (xhr.status == "404") {
				alert("Your login session has been expired. Please login again.");
				location.reload();
			} else if (xhr.status == "0") {
				$("#loader_view").hide();
				alert("No connection available.");
			} else {
				$("#loader_view").hide();
				alert(xhr.responseText);
			}
		});
	}

	$("#page_links").on("click", ".pagination a", function() {
		var url = $(this).attr("href");
		if (url != "#") {
			var value = $("#search").val().toLowerCase().trim();
			url += "?search_term=" + value;
			loadcar_detail(url);
			return false;
		}
	});

	$('#example3').on('click', 'button[name=btn_edit]', function() {
		var car_d_id = $(this).attr("data");
		$("#page_content").load("<?= base_url() . 'index.php/'; ?>car_detail/load_edit?car_d_id=" + car_d_id, function(responseTxt, statusTxt, xhr) {
			if (xhr.status == "200" || xhr.status == "204") {
				if (xhr.status == "204") {
					alert("No data available for edit.");
				} else {
					$("#btn_show_new").hide();
					$("#btn_show_view").show();
				}
			}
			if (statusTxt == "error") {
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
		$('#flag').val('Edit');
		window.scroll(0, 0);
	});

	$('#example3').on('click', 'button[name=btn_delete]', function() {
		var car_d_id = $(this).attr("data");
		$('#car_d_id_del').val(car_d_id);
		$("#btn_delete").show();
		$('#flag_del').val('Delete');
		$('#myModal-del').modal('show');
	});

	function activate_deactivate_car(obj) {
		let id = $(obj).data('id');
		let action = $(obj).data('action');
		$('#activate_id').val(id);
		$('#activate_action').val(action);
		if(action == 0){
			$('#activate_label').html('Deactivate Car');
			$('#activate_msg').html('Are you sure? You want to deactivate this car. After this action this car will be no more visible on the frontend website.');
			$('#activate_msg').addClass('alert-danger');
			$('#activate_btn').html('Deactivate');
			$('#activate_btn').addClass('alert-danger');
		}else{
			$('#activate_msg').html('Are you sure? You want to activate this car. After this action this car will be visible on the frontend website.');
			$('#activate_label').html('Activate Car');
			$('#activate_msg').addClass('alert-success');
			$('#activate_btn').html('Activate');
			$('#activate_btn').addClass('alert-success');
		}
		$('#myModal-activate').modal('show');
	};

	$("#btn_delete").click(function() {
		if ($('#flag_del').val() == "Delete") {
			var formdata_d = {
				'car_d_id': $("#car_d_id_del").val()
			}
			url = "<?= base_url() . 'index.php/'; ?>car_detail/delete";
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
		$('#car_d_id_del').val('');
	});

	$('#myModal-del').on('hidden.bs.modal', function(e) {
		$("#car_d_id_del").val('');
		$("#flag_del").val('');
		$("#msg-error").hide();
		var url = "<?= base_url() . 'index.php/'; ?>car_detail/select";
		loadcar_detail(url);
	});

	$("#btn_print_report").click(function() {
		url = "<?= base_url() . 'index.php/'; ?>car_detail/generate_report";
		window.open(url, "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, top=5%, left=0%, width=600, height=800");
	});

	$('#example3').on('click', 'img.showpic', function() {
		var img_src = $(this).attr("src");
		$("#book_image").attr("src", img_src);
		$('#myModal-picshow').modal('show');
	});

	$('#example3').on('click', 'button[name=btn_view]', function() {
		var v1 = $(this).closest("tr").find('td:eq(7)').text();
		$("#CDPlayer").val(v1);
		var v2 = $(this).closest("tr").find('td:eq(8)').text();
		$("#SunRoof").val(v2);
		var v3 = $(this).closest("tr").find('td:eq(9)').text();
		$("#LeatherSeat").val(v3);
		var v4 = $(this).closest("tr").find('td:eq(10)').text();
		$("#AlloyWheels").val(v4);
		var v5 = $(this).closest("tr").find('td:eq(11)').text();
		$("#PowerSteering").val(v5);
		var v6 = $(this).closest("tr").find('td:eq(12)').text();
		$("#PowerWindow").val(v6);

		var v7 = $(this).closest("tr").find('td:eq(13)').text();
		$("#AC").val(v7);

		var v8 = $(this).closest("tr").find('td:eq(14)').text();
		$("#ABS").val(v8);
		var v9 = $(this).closest("tr").find('td:eq(15)').text();
		$("#Airbag").val(v9);

		var v10 = $(this).closest("tr").find('td:eq(16)').text();
		$("#Radio").val(v10);

		var v11 = $(this).closest("tr").find('td:eq(17)').text();
		$("#CDChanger").val(v11);

		var v12 = $(this).closest("tr").find('td:eq(18)').text();
		$("#DVD").val(v12);
		var v13 = $(this).closest("tr").find('td:eq(19)').text();
		$("#TV").val(v13);

		var v14 = $(this).closest("tr").find('td:eq(20)').text();
		$("#PoweSeat").val(v14);

		var v15 = $(this).closest("tr").find('td:eq(21)').text();
		$("#BackTire").val(v15);

		var v16 = $(this).closest("tr").find('td:eq(22)').text();
		$("#GrillGuard").val(v16);
		var v17 = $(this).closest("tr").find('td:eq(23)').text();
		$("#RearSpoiler").val(v17);

		var v18 = $(this).closest("tr").find('td:eq(24)').text();
		$("#CentralLocking").val(v18);

		var v19 = $(this).closest("tr").find('td:eq(25)').text();
		$("#Jack").val(v19);

		var v20 = $(this).closest("tr").find('td:eq(26)').text();
		$("#SpareTire").val(v20);

		var v21 = $(this).closest("tr").find('td:eq(26)').text();
		$("#WheelSpanner").val(v21);

		var v22 = $(this).closest("tr").find('td:eq(27)').text();
		$("#VehicleNo").val(v22);

		var v23 = $(this).closest("tr").find('td:eq(28)').text();
		$("#Chassis").val(v23);

		var v24 = $(this).closest("tr").find('td:eq(29)').text();
		$("#ModelCode").val(v24);

		var v25 = $(this).closest("tr").find('td:eq(30)').text();
		$("#VersionClass").val(v25);

		var v26 = $(this).closest("tr").find('td:eq(31)').text();
		$("#EngineCode").val(v26);

		var v27 = $(this).closest("tr").find('td:eq(32)').text();
		$("#Mileage").val(v27);

		var v28 = $(this).closest("tr").find('td:eq(33)').text();
		$("#EngineSize").val(v28);

		var v29 = $(this).closest("tr").find('td:eq(34)').text();
		$("#RegistrationYear").val(v29);
		var v30 = $(this).closest("tr").find('td:eq(35)').text();
		$("#RegistrationMonth").val(v30);

		var v31 = $(this).closest("tr").find('td:eq(36)').text();
		$("#ManufactureYear").val(v31);

		var v32 = $(this).closest("tr").find('td:eq(37)').text();
		$("#ManufactureMonth").val(v32);

		var v33 = $(this).closest("tr").find('td:eq(38)').text();
		$("#Ext_Color").val(v33);
		var v34 = $(this).closest("tr").find('td:eq(39)').text();
		$("#WheelDrive").val(v34);

		var v35 = $(this).closest("tr").find('td:eq(40)').text();
		$("#Location").val(v35);

		var v36 = $(this).closest("tr").find('td:eq(41)').text();
		$("#Dimension").val(v36);

		var v37 = $(this).closest("tr").find('td:eq(42)').text();
		$("#Doors").val(v37);
		var v38 = $(this).closest("tr").find('td:eq(43)').text();
		$("#M3").val(v38);

		var v39 = $(this).closest("tr").find('td:eq(44)').text();
		$("#Seats").val(v39);

		var v40 = $(this).closest("tr").find('td:eq(45)').text();
		$("#Weight").val(v40);

		$('#myModal-showdetail').modal('show');
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
		var upload_url = "<?= base_url() . 'index.php/'; ?>car_detail/upload_attachment_for_featured_Image";
		var file_to_upload = input_file[0].files[0];
		var server_response = [];
		var url = "<?= base_url() . 'index.php/'; ?>car_detail/validate_upload_attanchment?file_name=" + file_to_upload.name + "&file_size=" + file_to_upload.size;
		$.getJSON(url, function(result) {
			////////////////////////////////////////////////////

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
