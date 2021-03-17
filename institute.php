<?php include './access_control/session_controler.php'; ?> 
<!doctype html>
<html lang="en">
    <head>
		<?php include './includes/head-block.php'; ?>        
    </head>
    <body>
        <!--navbar-->
		<?php include 'includes/backend-navbar.php'; ?>       

        <!--body content-->
        <section class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <h4 class="text-uppercase admin-page-heading"><i class="fas fa-warehouse"></i> Institute  &nbsp;&nbsp;<button class="btn btn-light d-print-none" onclick="goDashboard();"><i class="fas fa-chevron-circle-left"></i>&nbsp;Back</button></h4>                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-sm-12 col-xs-12 pb-4">
                        <form id="instituteform" novalidate>
                            <input type="hidden" class="form-control" id="inst_id">
                            <div class="form-row">                                
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="cmbZonal">Choose Zonal</label>
                                        <select class="col-12 form-control cmbZonal form-control-chosen" data-placeholder="Choose a Zonal..." required>
                                            <option value="" disabled selected>Loading...</option>
                                        </select>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please choose zonal
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row"> 
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="cmbDivision">Choose Division</label>
                                        <select class="col-12 form-control cmbDivision form-control-chosen" data-placeholder="Choose a division..." required>
                                            <option value="" disabled selected>Loading...</option>
                                        </select>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please choose division
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                            <div class="form-row"> 
                                <div class="col-9">
                                    <div class="form-group">
                                        <label for="inst_name">Name</label>
                                        <input type="text" class="form-control" id="inst_name" placeholder="Name" autocomplete="off" required>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please enter name
                                        </div>
                                    </div>  
                                </div>                               
                            </div>
							<div class="form-row"> 
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="inst_phone">Phone</label>
                                        <input type="tel" class="form-control" id="inst_phone" placeholder="Phone" autocomplete="off" required>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please enter phone
                                        </div>
                                    </div>   
                                </div>
                                <div class="col-7">
                                    <div class="form-group">
                                        <label for="inst_email">Email</label>
                                        <input type="email" class="form-control" id="inst_email" placeholder="Email" autocomplete="off" required>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please enter email
                                        </div>
                                    </div>        
                                </div>
                            </div>
                            <div class="form-row"> 
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="inst_address">Address</label>
                                        <textarea class="form-control" id="inst_address" placeholder="Address" rows="3" autocomplete="off" required></textarea>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please enter address
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="form-group form-controllers-div">
                                <button class="btn btn-success" id="btn_save"><i class="fas fa-save"></i> Save</button>
                                <button class="btn btn-warning" id="btn_edit" hidden><i class="fas fa-edit"></i> Update</button>
                                <button class="btn btn-light" id="btn_clear"><i class="fas fa-undo"></i> Clear</button>
                            </div>
                            <div class="form-group controlMsg"></div>
                        </form>
                    </div>
                    <div class="col">
                        <div class="table-responsive">
                            <table id="tblInstitute" class="table table-bordered table-hover" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>                                                       

                                        <th></th>                                
                                        <th></th>
										<th>Institute</th>                                        
                                        <th>Phone</th>                                        
                                        <th>Email</th>                                        
                                        <th>Address</th>                                        
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
		function tblInstitute(inst_division, callback) {
			var tbldata = "";
			$.post('controllers/instituteController.php', {action: 'getAllInstitute', inst_division: inst_division}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					tbldata += '<tr>';
					tbldata += '<td colspan="6" class="bg-danger text-center"> -- Institute not available -- </td>';
					tbldata += '</tr>';
					$('#tblInstitute tbody').html('').append(tbldata);
				} else {
					$.each(e, function (index, qdt) {
						index++;
						tbldata += '<tr>';
						tbldata += '<td>';
						tbldata += '<div class="btn-group btn-group-sm">';
						tbldata += '<button class="btn btn-info btn_select" value="' + qdt.inst_id + '"><i class="fas fa-edit"></i></button>';
						tbldata += '<button class="btn btn-danger btn_delete" value="' + qdt.inst_id + '"><i class="fas fa-trash-alt"></i></button>';
						tbldata += '</div>';
						tbldata += '</td>';
						tbldata += '<td></td>';
						tbldata += '<td>' + qdt.inst_name + '</td>';
						tbldata += '<td>' + qdt.inst_phone + '</td>';
						tbldata += '<td>' + qdt.inst_email + '</td>';
						tbldata += '<td>' + qdt.inst_address + '</td>';
						tbldata += '</tr>';
					});


					if ($.fn.DataTable.isDataTable('#tblInstitute')) {
						//re initialize 
						$('#tblInstitute').DataTable().destroy();
						$('#tblInstitute tbody').empty();
						$('#tblInstitute tbody').html('').append(tbldata);
						$('#tblInstitute').DataTable({
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
						$('#tblInstitute tbody').html('').append(tbldata);
						$('#tblInstitute').DataTable({
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



				$('.btn_select').click(function () {
					$('#btn_save').prop('hidden', true);
					$('#btn_edit').prop('hidden', false);
					var inst_id = $(this).val();
					$.post('controllers/instituteController.php', {action: 'getInstituteByID', inst_id: inst_id}, function (e) {
						$.each(e, function (index, qdt) {
							$('#inst_id').val(qdt.inst_id);
							$('#inst_name').val(qdt.inst_name);
							$('#inst_address').val(qdt.inst_address);
							$('#inst_phone').val(qdt.inst_phone);
							$('#inst_email').val(qdt.inst_email);
							cmbZonal(qdt.inst_zonal)
							cmbDivision(qdt.inst_zonal, qdt.inst_division);
						});
					}, "json");
				});

				$('.btn_delete').click(function () {
					var inst_id = $(this).val();
					swal({
						title: "Are you sure?",
						text: "Do you want to delete this institute ?",
						type: "warning",
						showCancelButton: true,
						confirmButtonClass: "btn-danger",
						cancelButtonClass: "btn-light",
						confirmButtonText: "Yes, delete it!",
						closeOnConfirm: false
					}, function () {
						$.post('controllers/instituteController.php', {action: 'deleteInstitute', inst_id: inst_id}, function (e) {
							if (parseInt(e.msgType) == 1) {
								swal("Good Job!", e.msg, "success");
								clearInstitute();
								tblInstitute(inst_division);
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

		function saveInstitute() {
			var inst_name = $('#inst_name').val();
			var inst_address = $('#inst_address').val();
			var inst_phone = $('#inst_phone').val();
			var inst_email = $('#inst_email').val();
			var inst_zonal = $('.cmbZonal').val();
			var inst_division = $('.cmbDivision').val();
			var postdata = {
				action: "saveInstitute",
				inst_name: inst_name,
				inst_address: inst_address,
				inst_phone: inst_phone,
				inst_email: inst_email,
				inst_zonal: inst_zonal,
				inst_division: inst_division
			}
			$.post('controllers/instituteController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good Job!", e.msg, "success");
					clearInstitute();
					tblInstitute(inst_division);
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function editInstitute() {
			var inst_id = $('#inst_id').val();
			var inst_name = $('#inst_name').val();
			var inst_address = $('#inst_address').val();
			var inst_phone = $('#inst_phone').val();
			var inst_email = $('#inst_email').val();
			var inst_zonal = $('.cmbZonal').val();
			var inst_division = $('.cmbDivision').val();
			var postdata = {
				action: "editInstitute",
				inst_id: inst_id,
				inst_name: inst_name,
				inst_address: inst_address,
				inst_phone: inst_phone,
				inst_email: inst_email,
				inst_zonal: inst_zonal,
				inst_division: inst_division
			}
			$.post('controllers/instituteController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good Job!", e.msg, "success");
					clearInstitute();
					tblInstitute(inst_division);
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function clearInstitute() {
			$('#inst_id').val('');
			$('#inst_name').val('');
			$('#inst_address').val('');
			$('#inst_phone').val('');
			$('#inst_email').val('');
			$('#btn_save').prop('hidden', false);
			$('#btn_edit').prop('hidden', true);
			$('#instituteform').removeClass('was-validated');
		}

		$(document).ready(function () {
			// Executes when the HTML document is loaded and the DOM is ready

			cmbZonal(false, function () {
				var inst_zonal = $('.cmbZonal').val();
				cmbDivision(inst_zonal, false, function (dataAvailable) {
					//check items availability.for validate data entry part                         
					if (parseInt(dataAvailable) == 0) {
						var controlMsg = '<div class="alert bg-warning"><strong>NOTE</strong> Data saving restricted! becasue of divisions not available.choose another data available one and try to add new institutes</div>';
						$('.controlMsg').html('').append(controlMsg);
						$('.form-controllers-div').prop('hidden', true);
					} else {
						$('.controlMsg').html('').append("");
						$('.form-controllers-div').prop('hidden', false);
					}
					//end of validation
					var inst_division = $('.cmbDivision').val();
					tblInstitute(inst_division);
				});
			});

			$('.cmbZonal').change(function () {
				var inst_zonal = $(this).val();
				cmbDivision(inst_zonal, false, function (dataAvailable) {
					//check items availability.for validate data entry part                         
					if (parseInt(dataAvailable) == 0) {
						var controlMsg = '<div class="alert bg-warning"><strong>NOTE</strong> Data saving restricted! becasue of divisions not available.choose another data available one and try to add new institutes</div>';
						$('.controlMsg').html('').append(controlMsg);
						$('.form-controllers-div').prop('hidden', true);
					} else {
						$('.controlMsg').html('').append("");
						$('.form-controllers-div').prop('hidden', false);
					}
					var inst_division = $('.cmbDivision').val();
					tblInstitute(inst_division);
				});
			});

			$('.cmbDivision').change(function () {
				var inst_division = $(this).val();
				tblInstitute(inst_division);
			});

			const form = $('#instituteform');

			$('#btn_save').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					saveInstitute();
				}
			});

			$('#btn_edit').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					editInstitute();
				}
			});

			$('#btn_clear').click(function (event) {
				form.submit(false);
				clearInstitute();
			});


		});
    </script>
</body>
</html>