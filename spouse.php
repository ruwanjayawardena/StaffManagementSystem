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
                        <h4 class="text-uppercase admin-page-heading"><i class="fas fa-edit"></i> <span class="stf_name_initial"></span> Spouse &nbsp;&nbsp;<button class="btn btn-light d-print-none" onclick="window.history.back(-1)"><i class="fas fa-chevron-circle-left"></i>&nbsp;Back</button></h4>                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-sm-6 col-xs-12 pb-4">
                        <form id="spouseform" novalidate>
                            <input type="hidden" class="form-control" id="sp_id">                                                    

							<div class="col">
								<div class="form-group">
									<label for="sp_name_full">Full Name</label>
									<input type="text" class="form-control" id="sp_name_full" placeholder="Full Name" autocomplete="off" required>
									<div class="valid-feedback">
										<i class="fas fa-lg fa-check-circle"></i> Looks good! 
									</div>
									<div class="invalid-feedback">
										<i class="fas fa-lg fa-exclamation-circle"></i> Please enter Full Name
									</div>
								</div>  
							</div> 
							<div class="col">
								<div class="form-group">
									<label for="sp_name_initial">Name with Initials</label>
									<input type="text" class="form-control" id="sp_name_initial" placeholder="Name with Initials" autocomplete="off" required>
									<div class="valid-feedback">
										<i class="fas fa-lg fa-check-circle"></i> Looks good! 
									</div>
									<div class="invalid-feedback">
										<i class="fas fa-lg fa-exclamation-circle"></i> Please enter Name with Initials
									</div>
								</div>  
							</div> 
							<div class="col">
								<div class="form-group">
									<label for="sp_nic">NIC</label>
									<input type="text" class="form-control" id="sp_nic" placeholder="NIC" autocomplete="off" required>
									<div class="valid-feedback">
										<i class="fas fa-lg fa-check-circle"></i> Looks good! 
									</div>
									<div class="invalid-feedback">
										<i class="fas fa-lg fa-exclamation-circle"></i> Please enter NIC
									</div>
								</div>  
							</div> 
							<div class="col">
								<div class="form-group">
									<label for="sp_occup">Occupation</label>
									<input type="text" class="form-control" id="sp_occup" placeholder="Occupation" autocomplete="off" required>
									<div class="valid-feedback">
										<i class="fas fa-lg fa-check-circle"></i> Looks good! 
									</div>
									<div class="invalid-feedback">
										<i class="fas fa-lg fa-exclamation-circle"></i> Please enter Occupation
									</div>
								</div>  
							</div> 

							<div class="col">
								<div class="form-group">
									<label for="cmbOccupationType">Occupation Type</label>
									<select class="col-12 form-control cmbOccupationType form-control-chosen" data-placeholder="Choose a Gender..." required>
										<option value="" disabled selected>Loading...</option>
									</select>
									<div class="valid-feedback">
										<i class="fas fa-lg fa-check-circle"></i> Looks good! 
									</div>
									<div class="invalid-feedback">
										<i class="fas fa-lg fa-exclamation-circle"></i> Please choose Occupation Type								</div>
								</div>
							</div>
							<div class="col">
								<div class="form-group">
									<label for="sp_desig">Designation</label>
									<input type="text" class="form-control" id="sp_desig" placeholder="Designation" autocomplete="off" required>
									<div class="valid-feedback">
										<i class="fas fa-lg fa-check-circle"></i> Looks good! 
									</div>
									<div class="invalid-feedback">
										<i class="fas fa-lg fa-exclamation-circle"></i> Please enter Designation
									</div>
								</div>  
							</div> 
							<div class="col">
								<div class="form-group">
									<label for="sp_office_address">Office Address</label>
									<textarea rows="3" class="form-control" id="sp_office_address" placeholder="Office Address" autocomplete="off" required></textarea>
									<div class="valid-feedback">
										<i class="fas fa-lg fa-check-circle"></i> Looks good! 
									</div>
									<div class="invalid-feedback">
										<i class="fas fa-lg fa-exclamation-circle"></i> Please enter Office Address
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
                            <table id="tblSpouse" class="table table-bordered table-hover" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>
										<th></th>                                
                                        <th></th>
										<th>Spouse Name</th>                                       
										<th>NIC</th>
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
		
		function tblSpouse(callback) {
			var stf_id = $('#stf_id').val();
			var tbldata = "";
			$.post('controllers/staffController.php', {action: 'getAllSpouseByStaffID', stf_id: stf_id}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					tbldata += '<tr>';
					tbldata += '<td colspan="4" class="bg-danger text-center"> -- Spouses not available -- </td>';
					tbldata += '</tr>';
					$('#tblSpouse tbody').html('').append(tbldata);
				} else {
					$.each(e, function (index, qdt) {
						index++;
						tbldata += '<tr>';
						tbldata += '<td>';
						tbldata += '<div class="btn-group btn-group-sm">';
						tbldata += '<button class="btn btn-info btn_select" value="' + qdt.sp_id + '"><i class="fas fa-edit"></i></button>';
						tbldata += '<button class="btn btn-danger btn_delete" value="' + qdt.sp_id + '"><i class="fas fa-trash-alt"></i></button>&nbsp;&nbsp';
						tbldata += '</div>';

						tbldata += '</td>';
						tbldata += '<td></td>';
						tbldata += '<td>' + qdt.sp_name_initial + '</td>';
						tbldata += '<td>' + qdt.sp_nic + '</td>';
						tbldata += '</tr>';
					});


					if ($.fn.DataTable.isDataTable('#tblSpouse')) {
						//re initialize 
						$('#tblSpouse').DataTable().destroy();
						$('#tblSpouse tbody').empty();
						$('#tblSpouse tbody').html('').append(tbldata);
						$('#tblSpouse').DataTable({
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
						$('#tblSpouse tbody').html('').append(tbldata);
						$('#tblSpouse').DataTable({
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
					var sp_id = $(this).val();
					$.post('controllers/staffController.php', {action: 'getSpouseByID', sp_id: sp_id}, function (e) {
						$.each(e, function (index, qdt) {
							cmbSubCombo(5, '.cmbOccupationType', qdt.sp_occup_type);
							$('#sp_occup').val(qdt.sp_occup);
							$('#sp_desig').val(qdt.sp_desig);
							$('#sp_id').val(qdt.sp_id);
							$('#sp_office_address').val(qdt.sp_office_address);
							$('#sp_nic').val(qdt.sp_nic);
							$('#sp_name_initial').val(qdt.sp_name_initial);
							$('#sp_name_full').val(qdt.sp_name_full);
							$('#sp_name_full').val(qdt.sp_name_full);
						});
					}, "json");
				});

				$('.btn_delete').click(function () {
					var sp_id = $(this).val();
					swal({
						title: "Are you sure?",
						text: "Do you want to delete this spouse ?",
						type: "warning",
						showCancelButton: true,
						confirmButtonClass: "btn-danger",
						cancelButtonClass: "btn-light",
						confirmButtonText: "Yes, delete it!",
						closeOnConfirm: false
					}, function () {
						$.post('controllers/staffController.php', {action: 'deleteSpouse', sp_id: sp_id}, function (e) {
							if (parseInt(e.msgType) == 1) {
								swal("Good Job!", e.msg, "success");
								clearSpouse();
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

		function saveSpouse() {
			var sp_occup_type = $('.cmbOccupationType').val();
			var sp_name_full = $('#sp_name_full').val();
			var sp_name_initial = $('#sp_name_initial').val();
			var sp_nic = $('#sp_nic').val();
			var sp_occup = $('#sp_occup').val();
			var sp_desig = $('#sp_desig').val();
			var sp_office_address = $('#sp_office_address').val();
			var stf_id = $('#stf_id').val();
			var postdata = {
				action: "saveSpouse",
				sp_occup_type: sp_occup_type,
				sp_name_full: sp_name_full,
				sp_name_initial: sp_name_initial,
				sp_nic: sp_nic,
				sp_occup: sp_occup,
				sp_desig: sp_desig,
				sp_office_address: sp_office_address,
				stf_id: stf_id
			}
			$.post('controllers/staffController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good Job!", e.msg, "success");
					clearSpouse();
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function editSpouse() {
			var sp_occup_type = $('.cmbOccupationType').val();
			var sp_name_full = $('#sp_name_full').val();
			var sp_name_initial = $('#sp_name_initial').val();
			var sp_nic = $('#sp_nic').val();
			var sp_occup = $('#sp_occup').val();
			var sp_desig = $('#sp_desig').val();
			var sp_office_address = $('#sp_office_address').val();
			var sp_id = $('#sp_id').val();
			var postdata = {
				action: "editSpouse",
				sp_occup_type: sp_occup_type,
				sp_name_full: sp_name_full,
				sp_name_initial: sp_name_initial,
				sp_nic: sp_nic,
				sp_occup: sp_occup,
				sp_desig: sp_desig,
				sp_office_address: sp_office_address,
				sp_id: sp_id
			}
			$.post('controllers/staffController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good Job!", e.msg, "success");
					clearSpouse();
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function clearSpouse() {
			$('#sp_name_full').val('');
			$('#sp_name_initial').val('');
			$('#sp_nic').val('');
			$('#sp_occup').val('');
			$('#sp_desig').val('');
			$('#sp_office_address').val('');
			$('#sp_id').val('');
			$('#btn_save').prop('hidden', false);
			$('#btn_edit').prop('hidden', true);
			$('#spouseform').removeClass('was-validated');
			tblSpouse();
		}

		$(document).ready(function () {
			// Executes when the HTML document is loaded and the DOM is ready			

			cmbSubCombo(5, '.cmbOccupationType', false, function (dataAvailable) {
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
			tblSpouse();
			loadStaffDataByID();



			const form = $('#spouseform');

			$('#btn_save').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					saveSpouse();
				}
			});

			$('#btn_edit').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					editSpouse();
				}
			});

			$('#btn_clear').click(function (event) {
				form.submit(false);
				clearSpouse();
			});


		});
    </script>
</body>
</html>