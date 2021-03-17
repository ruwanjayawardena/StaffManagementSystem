<?php include './access_control/session_controler.php'; ?> 
<!doctype html>
<html lang="en">
    <head>
		<?php include './includes/head-block.php'; ?>        
    </head>
    <body>
        <!--navbar-->
		<?php include 'includes/backend-navbar.php'; ?>       
		<input type="hidden" id="stf_id" value="<?php
		if (isset($_REQUEST['stf_id']) && !empty($_REQUEST['stf_id'])) {
			echo $_REQUEST['stf_id'];
		}
		?>">  
        <!--body content-->
        <section class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <h4 class="text-uppercase admin-page-heading"><i class="fas fa-edit"></i> <span class="stf_name_initial"></span> Qualifications &nbsp;&nbsp;<button class="btn btn-light d-print-none" onclick="window.history.back(-1)"><i class="fas fa-chevron-circle-left"></i>&nbsp;Back</button></h4>                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-sm-6 col-xs-12 pb-4">
                        <form id="qualificationform" novalidate>
                            <input type="hidden" class="form-control" id="qu_id">                                                     
							<div class="col">
								<div class="form-group">
									<label for="cmbQualification">Gender</label>
									<select class="col-12 form-control cmbQualification form-control-chosen" data-placeholder="Choose a Qualification..." required>
										<option value="" disabled selected>Loading...</option>
									</select>
									<div class="valid-feedback">
										<i class="fas fa-lg fa-check-circle"></i> Looks good! 
									</div>
									<div class="invalid-feedback">
										<i class="fas fa-lg fa-exclamation-circle"></i> Please choose qualification
									</div>
								</div>
							</div> 
							<div class="col">
								<div class="form-group">
									<label for="qu_institute">Institute</label>
									<input type="text" class="form-control" id="qu_institute" placeholder="Institute" autocomplete="off" required>
									<div class="valid-feedback">
										<i class="fas fa-lg fa-check-circle"></i> Looks good! 
									</div>
									<div class="invalid-feedback">
										<i class="fas fa-lg fa-exclamation-circle"></i> Please enter institute
									</div>
								</div>  
							</div> 
							<div class="col">
								<div class="form-group">
									<label for="qu_year">Year</label>
									<input type="text" minlength="4" maxlength="4" class="form-control yearpicker" id="qu_year" placeholder="Year" autocomplete="off" required>
									<div class="valid-feedback">
										<i class="fas fa-lg fa-check-circle"></i> Looks good! 
									</div>
									<div class="invalid-feedback">
										<i class="fas fa-lg fa-exclamation-circle"></i> Please enter year
									</div>
								</div>  
							</div>   

							<div class="col">
								<div class="form-group">
									<label for="qu_desc">Description</label>
									<textarea class="form-control" rows="4" id="qu_desc" placeholder="Enter Description" required></textarea>
									<div class="valid-feedback">
										<i class="fas fa-lg fa-check-circle"></i> Looks good! 
									</div>
									<div class="invalid-feedback">
										<i class="fas fa-lg fa-exclamation-circle"></i> Please enter description
									</div>
								</div>  
							</div>
							<div class="col">
								<div class="form-group form-controllers-div">
									<button class="btn btn-success" id="btn_save"><i class="fas fa-save"></i> Save</button>
									<button class="btn btn-warning" id="btn_edit" hidden><i class="fas fa-edit"></i> Update</button>
									<button class="btn btn-light" id="btn_clear"><i class="fas fa-undo"></i> Clear</button>
								</div>
								<div class="form-group controlMsg"></div>
							</div>
                        </form>
                    </div>
                    <div class="col">
                        <div class="table-responsive">
                            <table id="tblQualification" class="table table-bordered table-hover" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>                                                       

                                        <th></th>                                
                                        <th></th>
										<th>Qualification</th>                                       
										<th>Year</th>                                       
										<th>Institute</th>                                       
										<!--<th>Description</th>-->                                       

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
    </section>
	<?php
	include './includes/end-block.php';
	include './includes/comboboxJS.php';
	include './includes/commonJS.php';
	?>  
    <script>
		function loadStaffDataByID() {
			var stf_id = $('#stf_id').val();
			$.post('controllers/staffController.php', {action: 'getStaffByID', stf_id: stf_id}, function (e) {
				$.each(e, function (index, qdt) {
					$('.stf_name_initial').html('').append(qdt.stf_name_initial + ' <small>(' + qdt.stf_nic + ')</small>');
				});
			}, "json");
		}

		function tblQualification(callback) {
			var stf_id = $('#stf_id').val();
			var tbldata = "";
			$.post('controllers/staffController.php', {action: 'getAllQualificationByStaffID', stf_id: stf_id}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					tbldata += '<tr>';
					tbldata += '<td colspan="5" class="bg-danger text-center"> -- Qualifications not available -- </td>';
					tbldata += '</tr>';
					$('#tblQualification tbody').html('').append(tbldata);
				} else {
					$.each(e, function (index, qdt) {
						index++;
						tbldata += '<tr>';
						tbldata += '<td>';
						tbldata += '<div class="btn-group btn-group-sm">';
						tbldata += '<button class="btn btn-info btn_select" value="' + qdt.qu_id + '"><i class="fas fa-edit"></i></button>';
						tbldata += '<button class="btn btn-danger btn_delete" value="' + qdt.qu_id + '"><i class="fas fa-trash-alt"></i></button>&nbsp;&nbsp';
						tbldata += '</div>';

						tbldata += '</td>';
						tbldata += '<td></td>';
						tbldata += '<td>' + qdt.scmb_name + '</td>';
						tbldata += '<td>' + qdt.qu_year + '</td>';
						tbldata += '<td>' + qdt.qu_institute + '</td>';
						tbldata += '</tr>';
					});


					if ($.fn.DataTable.isDataTable('#tblQualification')) {
						//re initialize 
						$('#tblQualification').DataTable().destroy();
						$('#tblQualification tbody').empty();
						$('#tblQualification tbody').html('').append(tbldata);
						$('#tblQualification').DataTable({
							responsive: {
								details: {
									type: 'column',
									target: 'tr'
								}
							},
							columnDefs: [
								{className: 'control text-right', orderable: false, targets: 1},
								{orderable: false, targets: 0}
							],
							order: [2, 'asc']
						});
					} else {
						//initilized                    
						$('#tblQualification tbody').html('').append(tbldata);
						$('#tblQualification').DataTable({
							responsive: {
								details: {
									type: 'column',
									target: 'tr'
								}
							},
							columnDefs: [
								{className: 'control text-right', orderable: false, targets: 1},
								{orderable: false, targets: 0}
							],
							order: [2, 'asc']
						});
					}

					$('[data-toggle="tooltip"]').tooltip();
				}

				$('[data-toggle="tooltip"]').tooltip();



				$('.btn_select').click(function () {
					$('#btn_save').prop('hidden', true);
					$('#btn_edit').prop('hidden', false);
					var qu_id = $(this).val();
					$.post('controllers/staffController.php', {action: 'getQualificationByID', qu_id: qu_id}, function (e) {
						$.each(e, function (index, qdt) {
							cmbSubCombo(4, '.cmbQualification', qdt.qu_title);
							$('#qu_institute').val(qdt.qu_institute);
							$('#qu_year').val(qdt.qu_year);
							$('#qu_desc').val(qdt.qu_desc);
							$('#qu_id').val(qdt.qu_id);
						});
					}, "json");
				});

				$('.btn_delete').click(function () {
					var qu_id = $(this).val();
					swal({
						title: "Are you sure?",
						text: "Do you want to delete this qualification ?",
						type: "warning",
						showCancelButton: true,
						confirmButtonClass: "btn-danger",
						cancelButtonClass: "btn-light",
						confirmButtonText: "Yes, delete it!",
						closeOnConfirm: false
					}, function () {
						$.post('controllers/staffController.php', {action: 'deleteQualification', qu_id: qu_id}, function (e) {
							if (parseInt(e.msgType) == 1) {
								swal("Good Job!", e.msg, "success");
								clearQualification();
							} else {
								swal("Error!", e.msg, "error");
							}
						}, "json");
					});
				});

				if (callback !== undefined) {
					if (typeof callback === 'function') {
						callback();
					}
				}
			}, "json");
		}

		function saveQualification() {
			var qu_title = $('.cmbQualification').val();
			var qu_institute = $('#qu_institute').val();
			var qu_year = $('#qu_year').val();
			var qu_desc = $('#qu_desc').val();
			var stf_id = $('#stf_id').val();

			var postdata = {
				action: "saveQualification",
				qu_title: qu_title,
				qu_institute: qu_institute,
				qu_year: qu_year,
				qu_desc: qu_desc,
				stf_id: stf_id
			}
			$.post('controllers/staffController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good Job!", e.msg, "success");
					clearQualification();
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function editQualification() {
			var qu_title = $('.cmbQualification').val();
			var qu_institute = $('#qu_institute').val();
			var qu_year = $('#qu_year').val();
			var qu_desc = $('#qu_desc').val();
			var stf_id = $('#stf_id').val();
			var qu_id = $('#qu_id').val();

			var postdata = {
				action: "editQualification",
				qu_title: qu_title,
				qu_institute: qu_institute,
				qu_year: qu_year,
				qu_desc: qu_desc,
				stf_id: stf_id,
				qu_id: qu_id
			}
			$.post('controllers/staffController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good Job!", e.msg, "success");
					clearQualification();
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function clearQualification() {
			$('#qu_institute').val('');
			$('#qu_year').val('');
			$('#qu_desc').val('');
			$('#qu_id').val('');
			$('#btn_save').prop('hidden', false);
			$('#btn_edit').prop('hidden', true);
			$('#qualificationform').removeClass('was-validated');
			tblQualification();
		}

		$(document).ready(function () {
			// Executes when the HTML document is loaded and the DOM is ready

			$(".yearpicker").datetimepicker({
				viewMode: 'days',
				format: 'YYYY'
			});

			cmbSubCombo(4, '.cmbQualification', false, function (dataAvailable) {
				//check items availability.for validate data entry part                         
				if (parseInt(dataAvailable) == 0) {
					var controlMsg = '<div class="alert bg-warning"><strong>NOTE</strong> Data saving restricted! becasue of select box values are not available.add data into selectbox</div>';
					$('.controlMsg').html('').append(controlMsg);
					$('.form-controllers-div').prop('hidden', true);
				} else {
					$('.controlMsg').html('').append("");
					$('.form-controllers-div').prop('hidden', false);
				}
				//end of validation
			});
			tblQualification();
			loadStaffDataByID();


			const form = $('#qualificationform');

			$('#btn_save').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					saveQualification();
				}
			});

			$('#btn_edit').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					editQualification();
				}
			});

			$('#btn_clear').click(function (event) {
				form.submit(false);
				clearQualification();
			});


		});
    </script>
</body>
</html>