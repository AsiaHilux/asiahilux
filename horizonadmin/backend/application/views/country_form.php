<?php
if (isset($formdata)) {
	$tag = "Edit";
	$id = $formdata[0]['country_id'];
	$country_name = $formdata[0]['country_name'];
	$countries_description = $formdata[0]['countries_description'];
	$Title = $formdata[0]['Title'];
	$Keywords = $formdata[0]['Keywords'];
	$Description = $formdata[0]['Description'];
	$shipping = $formdata[0]['shipping'];
	$right_hand_drive = $formdata[0]['right_hand_drive'];
	$year_restriction = $formdata[0]['year_restriction'];
	$inspection = $formdata[0]['inspection'];
	$doc = json_decode($formdata[0]['doc']);
	$active = $formdata[0]['active'];
	$url = base_url("index.php/Country/update");
} else {
	$tag = $id = $country_name = $countries_description = $Title = $Keywords = $Description = $shipping = $right_hand_drive = $year_restriction = $inspection = $doc = "";
	$active = "1";
	$url = base_url("index.php/Country/create");
}


?>
<div class="row">
	<div class="col-md-12">
		<div class="card card-underline">
			<div class="card-head">
				<header>
					<h4><?php
						if ($tag == "Edit")
							echo "Edit Country Name";
						else
							echo "Add New Country Name"; ?></h4>
				</header>
			</div>

			<div class="card-body">
				<div id="msg-error" class="alert alert-danger fade in" style="display: none;">
					<a href="#" class="close" onclick='javascript:$("#msg-error").hide();' aria-label="close">&times;</a>
					<div></div>
				</div>

				<form id="myform1" action="<?= $url; ?>" method="post" enctype="multipart/form-data" class="form form-validate">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<input type="hidden" id="flag" value="<?= $tag ?>" class="form-control" placeholder="flag" required>
								<input type="hidden" class="form-control" id="country_id" name="country_id" value="<?= $id ?>">
								<input type="text" class="form-control" id="country_name" maxlength="100" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 100 characters allowed" name="country_name" value="<?php echo $country_name; ?>" required>
								<label for="group_name">
									Country Name *
								</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<textarea class="form-control" id="Title" name="Title" maxlength="60000" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 60,000 characters are allowed." rows="5"><?= $Title; ?></textarea>
								<label for="Title">
									Title
								</label>
							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<textarea class="form-control" id="Keywords" name="Keywords" maxlength="60000" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 60,000 characters are allowed." rows="5"><?= $Keywords; ?></textarea>
								<label for="Keywords">
									Keywords
								</label>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<textarea class="form-control" id="Description" name="Description" maxlength="60000" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 60,000 characters are allowed." rows="5"><?= $Description; ?></textarea>
								<label for="Description">
									Description
								</label>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<input type="file" class="form-control" name="flag_img" accept="image/*">
								<label for="Mileage">
									Attached Country Flag Image
								</label>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<input type="file" class="form-control" name="banner_1" accept="image/*">
								<label for="Mileage">
									Attached Country Banner 1 Image
								</label>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<input type="file" class="form-control" name="banner_4" accept="image/*">
								<label for="Mileage">
									Attached Country Banner 4 Image
								</label>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<textarea class="form-control" id="countries_description" name="countries_description" maxlength="60000" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 60,000 characters are allowed." rows="5"><?= $countries_description; ?></textarea>
								<label for="countries_description">
									Content
								</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<input type="text" class="form-control" id="shipping" name="shipping" value="<?= $shipping; ?>">
								<label for="shipping">
									The Shipping:
								</label>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<input type="text" class="form-control" id="right_hand_drive" name="right_hand_drive" value="<?= $right_hand_drive; ?>">
								<label for="right_hand_drive">
									Right-Hand Drive:
								</label>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<input type="text" class="form-control" id="year_restriction" name="year_restriction" value="<?= $year_restriction; ?>">
								<label for="group_name">
									Year Restriction:
								</label>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<input type="text" class="form-control" id="inspection" name="inspection" value="<?= $inspection; ?>">
								<label for="inspection">
									Mandatory Inspection Before Boarding:
								</label>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group" id="doc_div">
								<label for="doc">
									Documents Requested By Customs:
								</label>
								<?php if (!empty($doc)) {
									$count = 1;
									foreach ($doc as $d) {
								?>
										<div class="row">
											<div class="col-sm-10">
												<input type="text" class="form-control" id="doc" name="doc[]" value="<?= $d; ?>">
											</div>
											<?php if ($count == 1) { ?>
												<div class="col-sm-2">
													<button type="button" class="btn btn-info" onclick="addRow();">Add</button>
												</div>
											<?php } else { ?>
												<div class="col-sm-2">
													<button type="button" class="btn btn-danger" onclick="$(this).closest('.row').remove();">Remove</button>
												</div>
											<?php } ?>
										</div>
									<?php $count++;
									}
								} else { ?>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="doc" name="doc[]" value="">
									</div>
									<div class="col-sm-2">
										<button type="button" class="btn btn-info" onclick="addRow();">Add</button>
									</div>
								<?php } ?>

							</div>
						</div>
					</div>
					<script>
						function addRow() {
							let html = `
                                <div class="row">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="doc" name="doc[]" value="">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-danger" onclick="$(this).closest('.row').remove();">Remove</button>
                                    </div>
                                </div>
                            `;
							$('#doc_div').append(html);
						}
					</script>
					<div class="row">
						<div class="col-sm-12">
							<label class="checkbox-inline checkbox-styled">
								<input type="checkbox" id="active" name="active" <?php if ($active == "1") echo "checked";
																					else echo ""; ?>><span>Active</span>
							</label>
						</div>
					</div>
					<div class="card-actionbar">
						<div class="card-actionbar-row">
							<div class="btn-group">
								<button id="btn_save1" type="submit" class="btn btn-primary btn-raised btn-loading-state" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Saving...">Save</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$("#btn_save").click(function() {
		var form = $("#myform");
		var res = form.valid();
		if (res) {
			var status = "";
			if ($("#active").is(':checked')) {
				status = "1";
			} else {
				status = "0";
			}

			var doc = $('[name="doc[]"]').map(function(idx, elem) {
				return $(elem).val();
			}).get();

			var formdata = {
				'country_id': $("#country_id").val(),
				'country_name': $("#country_name").val(),
				'countries_description': $("#countries_description").val(),
				'Title': $("#Title").val(),
				'Keywords': $("#Keywords").val(),
				'Description': $("#Description").val(),
				'shipping': $("#shipping").val(),
				'right_hand_drive': $("#right_hand_drive").val(),
				'year_restriction': $("#year_restriction").val(),
				'inspection': $("#inspection").val(),
				'doc': doc,
				'active': status
			}
			if ($('#flag').val() == "") {
				url = "<?= base_url() . 'index.php/'; ?>Country/create";

			} else if ($('#flag').val() == "Edit") {
				url = "<?= base_url() . 'index.php/'; ?>Country/update";
			}

			$(this).button('loading');
			$("#msg-error").hide();
			SendDataByAjax3(
				url, formdata,
				function(result) {
					var result_array = JSON.parse(result);
					$("#btn_save").button('reset');
					window.scroll(0, 0);
					if (result_array.res) {
						toastr.success('Record Saved', 'Successful');
						if ($('#flag').val() == "Edit") {
							$("#btn_show_new").show();
							$("#btn_show_view").hide();
							load_view(null);
						}
						$("#flag").val('');
						$("#country_id").val('');
						$("#country_name").val('');
						$("#countries_description").val('');
						$("#Title").val('');
						$("#Keywords").val('');
						$("#Description").val('');
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
		} else {
			alert('fill out the required fields.!!');
		}
	});
</script>
