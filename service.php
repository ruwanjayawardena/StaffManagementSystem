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
                        <h4 class="text-uppercase admin-page-heading"><i class="fas fa-edit"></i> <span class="stf_name_initial"></span> Service &nbsp;&nbsp;<button class="btn btn-light d-print-none" onclick="window.history.back(-1)"><i class="fas fa-chevron-circle-left"></i>&nbsp;Back</button></h4>                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-sm-6 col-xs-12 pb-4">
                        <form id="serviceform" novalidate>
                            <input type="hidden" class="form-control" id="sev_id">                                                    
							<div class="col">
								<div class="form-group">
									<label for="cmbProvince">Choose Province</label>
									<select class="col-12 form-control cmbProvince form-control-chosen" data-placeholder="Choose a Province..." required>
										<option value="" disabled selected>Loading...</option>
									</select>
									<div class="valid-feedback">
										<i class="fas fa-lg fa-check-circle"></i> Looks good! 
									</div>
									<div class="invalid-feedback">
										<i class="fas fa-lg fa-exclamation-circle"></i> Please choose province
									</div>
								</div>
							</div>
							<div class="col">
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
							<div class="col">
								<div class="form-group">
									<label for="cmbBranch">Choose Branch</label>
									<select class="col-12 form-control cmbBranch form-control-chosen" data-placeholder="Choose a division..." required>
										<option value="" disabled selected>Loading...</option>
									</select>
									<div class="valid-feedback">
										<i class="fas fa-lg fa-check-circle"></i> Looks good! 
									</div>
									<div class="invalid-feedback">
										<i class="fas fa-lg fa-exclamation-circle"></i> Please choose Branch
									</div>
								</div>
							</div> 
							<div class="col">
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
							<div class="form-row">
								<div class="col">
									<div class="form-group">
										<label for="cmbInstituteWithoutType">Choose Institute</label>
										<select class="col-12 form-control cmbInstituteWithoutType form-control-chosen" data-placeholder="Choose a Institute..." required>
											<option value="" disabled selected>Loading...</option>
										</select>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please choose Institute
										</div>
									</div>
								</div> 
								<div class="col">
									<div class="form-group">
										<label for="cmbServiceType">Choose Service Type</label>
										<select class="col-12 form-control cmbServiceType form-control-chosen" data-placeholder="Choose a Institute..." required>
											<option value="" disabled selected>Loading...</option>
										</select>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please choose Service Type
										</div>
									</div>
								</div> 
							</div>
							<div class="form-row">
								<div class="col">
									<div class="form-group">
										<label for="cmbService">Choose Service</label>
										<select class="col-12 form-control cmbService form-control-chosen" data-placeholder="Choose a Service..." required>
											<option value="" disabled selected>Loading...</option>
										</select>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please choose Service
										</div>
									</div>
								</div> 
								<div class="col">
									<div class="form-group">
										<label for="cmbClassGrade">Choose Class/Grade</label>
										<select class="col-12 form-control cmbClassGrade form-control-chosen" data-placeholder="Choose a Class/Grade..." required>
											<option value="" disabled selected>Loading...</option>
										</select>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please choose Class/Grade
										</div>
									</div>
								</div> 
							</div>
							<div class="form-row">
								<div class="col">
									<div class="form-group">
										<label for="cmbDesignation">Choose Designation</label>
										<select class="col-12 form-control cmbDesignation form-control-chosen" data-placeholder="Choose a Designation..." required>
											<option value="" disabled selected>Loading...</option>
										</select>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please choose Designation
										</div>
									</div>
								</div> 
								<div class="col">
									<div class="form-group">
										<label for="cmbServiceCategory">Choose Service Category</label>
										<select class="col-12 form-control cmbServiceCategory form-control-chosen" data-placeholder="Choose a Service Category..." required>
											<option value="" disabled selected>Loading...</option>
										</select>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please choose Service Category
										</div>
									</div>
								</div> 
							</div>
							<div class="form-row">
								<div class="col">
									<div class="form-group">
										<label for="sev_ap_pre_sevdate">Reported Date to current workplace</label>
										<input type="text" class="form-control datepicker" id="sev_ap_pre_sevdate" placeholder="Reported Date to current workplace" autocomplete="off" required>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please enter Reported Date to current workplace
										</div>
									</div>  
								</div> 
								<div class="col">
									<div class="form-group">
										<label for="sev_pre_sevfileno">Present Service File no</label>
										<input type="text" class="form-control" id="sev_pre_sevfileno" placeholder="Present Service File no" autocomplete="off" required>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please enter Present Service File no
										</div>
									</div>  
								</div> 
							</div>
							<div class="form-row">
								<div class="col">
									<div class="form-group">
										<label for="sev_apo_date_cw">Appointed Date to current workplace</label>
										<input type="text" class="form-control datepicker" id="sev_apo_date_cw" placeholder="Appointed Date to current workplace" autocomplete="off" required>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please enter Appointed Date to current workplace
										</div>
									</div>  
								</div> 
								<div class="col">
									<div class="form-group">
										<label for="sev_apo_date_pc">Appointed Date to Present Class</label>
										<input type="text" class="form-control datepicker" id="sev_apo_date_pc" placeholder="Appointed Date to Present Class" autocomplete="off" required>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please enter Appointed Date to Present Class
										</div>
									</div>  
								</div> 
							</div>
							<div class="form-row">
								<div class="col">
									<div class="form-group">
										<label for="cmbAppointmentMode">Choose Mode Of Appointment</label>
										<select class="col-12 form-control cmbAppointmentMode form-control-chosen" data-placeholder="Choose a Mode Of Appointment..." required>
											<option value="" disabled selected>Loading...</option>
										</select>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please choose Mode Of Appointment
										</div>
									</div>
								</div> 
								<div class="col">
									<div class="form-group">
										<label for="cmbSalaryCode">Choose Salary Code</label>
										<select class="col-12 form-control cmbSalaryCode form-control-chosen" data-placeholder="Choose a Salary Code..." required>
											<option value="" disabled selected>Loading...</option>
										</select>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please choose Salary Code
										</div>
									</div>
								</div> 
							</div>
							<div class="form-row">
								<div class="col">
									<div class="form-group">
										<label for="sev_pre_salary">Present Salary</label>
										<input type="text" class="form-control" id="sev_pre_salary" placeholder="Present Salary" autocomplete="off" required>
										<div class="valid-feedback">
											<i class="fas fa-lg fa-check-circle"></i> Looks good! 
										</div>
										<div class="invalid-feedback">
											<i class="fas fa-lg fa-exclamation-circle"></i> Please enter Present Salary
										</div>
									</div>  
								</div> 
							</div>

							<div class="form-row">
								<div class="col">
									<div class="form-group form-controllers-div">
										<button class="btn btn-success" id="btn_save"><i class="fas fa-save"></i> Save</button>
										<button class="btn btn-warning" id="btn_edit" hidden><i class="fas fa-edit"></i> Update</button>
										<button class="btn btn-light" id="btn_clear"><i class="fas fa-undo"></i> Clear</button>
									</div>
									<div class="form-group controlMsg"></div>
								</div>
							</div>
                        </form>
                    </div>
                    <div class="col">
                        <div class="table-responsive">
                            <table id="tblService" class="table table-bordered table-hover" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>
										<th></th>                                
                                        <th></th>
										<th>Location</th>                                       
										<th>Description</th>
										<th>Reported Date</th>
										<th>File No</th>
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
		function tblService(callback) {
			var stf_id = $('#stf_id').val();
			var tbldata = "";
			$.post('controllers/staffController.php', {action: 'getAllServiceByStaffID', stf_id: stf_id}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					tbldata += '<tr>';
					tbldata += '<td colspan="6" class="bg-danger text-center"> -- Services not available -- </td>';
					tbldata += '</tr>';
					$('#tblService tbody').html('').append(tbldata);
				} else {
					$.each(e, function (index, qdt) {
						index++;
						tbldata += '<tr>';
						tbldata += '<td>';
						tbldata += '<div class="btn-group btn-group-sm">';
						tbldata += '<button class="btn btn-info btn_select" value="' + qdt.sev_id + '"><i class="fas fa-edit"></i></button>';
						tbldata += '<button class="btn btn-danger btn_delete" value="' + qdt.sev_id + '"><i class="fas fa-trash-alt"></i></button>&nbsp;&nbsp';
						tbldata += '<button class="btn btn-warning btn_eb" value="' + qdt.sev_id + '-' + qdt.sev_service_id + '"><i class="fas fa-file"></i> EB Details </button>&nbsp;&nbsp';
						tbldata += '</div>';
						tbldata += '</td>';
						tbldata += '<td></td>';
						tbldata += '<td>' + qdt.zol_name + '<br>' + qdt.br_name + '<br>' + qdt.div_name + '<br>' + qdt.inst_name + '</td>';
						tbldata += '<td>';
						tbldata += qdt.sev_servicetype + '<br>';
						tbldata += qdt.sev_service + '<br>';
						tbldata += qdt.sev_classgrade + '<br>';
						tbldata += qdt.sev_desig + '<br>';
						tbldata += qdt.sev_servicecategory + '<br>';
						tbldata += '</td>';
						tbldata += '<td>' + qdt.sev_ap_pre_sevdate + '</td>';
						tbldata += '<td>' + qdt.sev_pre_sevfileno + '</td>';
						tbldata += '</tr>';
					});
					if ($.fn.DataTable.isDataTable('#tblService')) {
						//re initialize 
						$('#tblService').DataTable().destroy();
						$('#tblService tbody').empty();
						$('#tblService tbody').html('').append(tbldata);
						$('#tblService').DataTable({
							responsive: {
								details: {
									type: 'column',
									target: 'tr'
								}
							},
							columnDefs: [
								{className: 'control text-right', orderable: false, targets: 1},
								{orderable: false, targets: 0}
							]
						});
					} else {
						//initilized                    
						$('#tblService tbody').html('').append(tbldata);
						$('#tblService').DataTable({
							responsive: {
								details: {
									type: 'column',
									target: 'tr'
								}
							},
							columnDefs: [
								{className: 'control text-right', orderable: false, targets: 1},
								{orderable: false, targets: 0}
							]
						});
					}

					$('[data-toggle="tooltip"]').tooltip();
				}

				$('[data-toggle="tooltip"]').tooltip();
				$('.btn_select').click(function () {
					$('#btn_save').prop('hidden', true);
					$('#btn_edit').prop('hidden', false);
					var sev_id = $(this).val();
					$.post('controllers/staffController.php', {action: 'getServiceByID', sev_id: sev_id}, function (e) {
						$.each(e, function (index, qdt) {
							cmbProvince(qdt.prov_id, function (dataAvailable) {
								validateForm(dataAvailable);
							});
							cmbZonal(qdt.prov_id, qdt.sev_zonal, function (dataAvailable) {
								validateForm(dataAvailable);
							});
							cmbBranch(qdt.sev_zonal, qdt.sev_branch, function (dataAvailable) {
								validateForm(dataAvailable);
							});
							cmbDivision(qdt.sev_zonal, qdt.sev_division, function (dataAvailable) {
								validateForm(dataAvailable);
							});
							cmbInstituteWithoutType(qdt.sev_division, qdt.sev_institute, function (dataAvailable) {
								validateForm(dataAvailable);
							});
							$('#sev_id').val(qdt.sev_id);
							$('#sev_ap_pre_sevdate').val(qdt.sev_ap_pre_sevdate);
							$('#sev_pre_sevfileno').val(qdt.sev_pre_sevfileno);
							$('#sev_pre_salary').val(qdt.sev_pre_salary);
							$('#sev_apo_date_cw').val(qdt.sev_apo_date_cw);
							$('#sev_apo_date_pc').val(qdt.sev_apo_date_pc);
							cmbSubCombo(6, '.cmbServiceType', qdt.sev_servicetype);
							cmbSubCombo(12, '.cmbAppointmentMode', qdt.sev_app_mode);
							cmbSubCombo(10, '.cmbServiceCategory', qdt.sev_servicecategory);
							cmbRelateCombo(7, '.cmbService', qdt.sev_service);
							cmbRelateSubCombo(8, qdt.sev_service, '.cmbClassGrade', qdt.sev_classgrade);
							cmbRelateSubCombo(9, qdt.sev_service, '.cmbDesignation', qdt.sev_desig);
							cmbRelateSubCombo(13, qdt.sev_service, '.cmbSalaryCode', qdt.sev_salarycode);
						});
					}, "json");
				});
				$('.btn_delete').click(function () {
					var sev_id = $(this).val();
					swal({
						title: "Are you sure?",
						text: "Do you want to delete this service ?",
						type: "warning",
						showCancelButton: true,
						confirmButtonClass: "btn-danger",
						cancelButtonClass: "btn-light",
						confirmButtonText: "Yes, delete it!",
						closeOnConfirm: false
					}, function () {
						$.post('controllers/staffController.php', {action: 'deleteService', sev_id: sev_id}, function (e) {
							if (parseInt(e.msgType) == 1) {
								swal("Good Job!", e.msg, "success");
								clearService();
							} else {
								swal("Error!", e.msg, "error");
							}
						}, "json");
					});
				});
				$('.btn_eb').click(function () {
					var sevStr = $(this).val();
					var sevAr = sevStr.split('-');
					var sev_id = sevAr[0];
					var sev_sv = sevAr[1];
					var stf_id = $('#stf_id').val();
					window.location.href = 'ebexam.php?stf_id=' + stf_id + '&sev_id=' + sev_id + '&sev_sv=' + sev_sv;
				})

				if (callback !== undefined) {
					if (typeof callback === 'function') {
						callback();
					}
				}
			}, "json");
		}

		function saveService() {
			var sev_zonal = $('.cmbZonal').val();
			var sev_branch = $('.cmbBranch').val();
			var sev_division = $('.cmbDivision').val();
			var sev_institute = $('.cmbInstituteWithoutType').val();
			var sev_servicetype = $('.cmbServiceType').val();
			var sev_service = $('.cmbService').val();
			var sev_classgrade = $('.cmbClassGrade').val();
			var sev_desig = $('.cmbDesignation').val();
			var sev_servicecategory = $('.cmbServiceCategory').val();
			var sev_ap_pre_sevdate = $('#sev_ap_pre_sevdate').val();
			var sev_pre_sevfileno = $('#sev_pre_sevfileno').val();
			var sev_app_mode = $('.cmbAppointmentMode').val();
			var sev_salarycode = $('.cmbSalaryCode').val();
			var sev_pre_salary = $('#sev_pre_salary').val();
			var stf_id = $('#stf_id').val();
			var sev_apo_date_cw = $('#sev_apo_date_cw').val();
			var sev_apo_date_pc = $('#sev_apo_date_pc').val();
			var postdata = {
				action: "saveService",
				sev_zonal: sev_zonal,
				sev_branch: sev_branch,
				sev_division: sev_division,
				sev_institute: sev_institute,
				sev_servicetype: sev_servicetype,
				sev_service: sev_service,
				sev_classgrade: sev_classgrade,
				sev_desig: sev_desig,
				sev_servicecategory: sev_servicecategory,
				sev_ap_pre_sevdate: sev_ap_pre_sevdate,
				sev_pre_sevfileno: sev_pre_sevfileno,
				sev_ap_pre_sevdate: sev_ap_pre_sevdate,
				sev_app_mode: sev_app_mode,
				sev_salarycode: sev_salarycode,
				sev_pre_salary: sev_pre_salary,
				stf_id: stf_id,
				sev_apo_date_cw: sev_apo_date_cw,
				sev_apo_date_pc: sev_apo_date_pc
			}
			$.post('controllers/staffController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good Job!", e.msg, "success");
					clearService();
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function editService() {
			var sev_zonal = $('.cmbZonal').val();
			var sev_branch = $('.cmbBranch').val();
			var sev_division = $('.cmbDivision').val();
			var sev_institute = $('.cmbInstituteWithoutType').val();
			var sev_servicetype = $('.cmbServiceType').val();
			var sev_service = $('.cmbService').val();
			var sev_classgrade = $('.cmbClassGrade').val();
			var sev_desig = $('.cmbDesignation').val();
			var sev_servicecategory = $('.cmbServiceCategory').val();
			var sev_ap_pre_sevdate = $('#sev_ap_pre_sevdate').val();
			var sev_pre_sevfileno = $('#sev_pre_sevfileno').val();
			var sev_app_mode = $('.cmbAppointmentMode').val();
			var sev_salarycode = $('.cmbSalaryCode').val();
			var sev_pre_salary = $('#sev_pre_salary').val();
			var sev_id = $('#sev_id').val();
			var sev_apo_date_cw = $('#sev_apo_date_cw').val();
			var sev_apo_date_pc = $('#sev_apo_date_pc').val();
			var postdata = {
				action: "editService",
				sev_zonal: sev_zonal,
				sev_branch: sev_branch,
				sev_division: sev_division,
				sev_institute: sev_institute,
				sev_servicetype: sev_servicetype,
				sev_service: sev_service,
				sev_classgrade: sev_classgrade,
				sev_desig: sev_desig,
				sev_servicecategory: sev_servicecategory,
				sev_ap_pre_sevdate: sev_ap_pre_sevdate,
				sev_pre_sevfileno: sev_pre_sevfileno,
				sev_ap_pre_sevdate: sev_ap_pre_sevdate,
				sev_app_mode: sev_app_mode,
				sev_salarycode: sev_salarycode,
				sev_pre_salary: sev_pre_salary,
				sev_id: sev_id,
				sev_apo_date_cw: sev_apo_date_cw,
				sev_apo_date_pc: sev_apo_date_pc
			}
			$.post('controllers/staffController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good Job!", e.msg, "success");
					clearService();
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function loadStaffDataByID() {
			var stf_id = $('#stf_id').val();
			$.post('controllers/staffController.php', {action: 'getStaffByID', stf_id: stf_id}, function (e) {
				$.each(e, function (index, qdt) {
					$('.stf_name_initial').html('').append(qdt.stf_name_initial + ' <small>(' + qdt.stf_nic + ')</small>');
				});
			}, "json");
		}

		function clearService() {
			$('#sev_ap_pre_sevdate').val('');
			$('#sev_pre_sevfileno').val('');
			$('#sev_pre_salary').val('');
			$('#sev_id').val('');
			$('#btn_save').prop('hidden', false);
			$('#btn_edit').prop('hidden', true);
			$('#serviceform').removeClass('was-validated');
			tblService();
		}

		function validateForm(dataAvailable) {
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
		}

		$(document).ready(function () {
			// Executes when the HTML document is loaded and the DOM is ready
			$(".datepicker").datetimepicker({
				viewMode: 'days',
				format: 'YYYY-MM-DD'
			});
			tblService();
			cmbProvince(false, function () {
				var inst_province = $('.cmbProvince').val();
				cmbZonal(inst_province, false, function (dataAvailable) {
					validateForm(dataAvailable);
					var inst_zonal = $('.cmbZonal').val();
					cmbBranch(inst_zonal, false, function (dataAvailable) {
						validateForm(dataAvailable);
					});
					cmbDivision(inst_zonal, false, function (dataAvailable) {
						validateForm(dataAvailable);
						var inst_division = $('.cmbDivision').val();
						cmbInstituteWithoutType(inst_division);
					});
				});
			});
			$('.cmbProvince').change(function () {
				var inst_province = $(this).val();
				cmbZonal(inst_province, false, function (dataAvailable) {
					validateForm(dataAvailable);
					var inst_zonal = $('.cmbZonal').val();
					cmbBranch(inst_zonal, false, function (dataAvailable) {
						validateForm(dataAvailable);
					});
					cmbDivision(inst_zonal, false, function (dataAvailable) {
						validateForm(dataAvailable);
						var inst_division = $('.cmbDivision').val();
						cmbInstituteWithoutType(inst_division);
					});
				});
			});
			$('.cmbZonal').change(function () {
				var inst_zonal = $(this).val();
				cmbBranch(inst_zonal, false, function (dataAvailable) {
					validateForm(dataAvailable);
				});
				cmbDivision(inst_zonal, false, function (dataAvailable) {
					validateForm(dataAvailable);
					var inst_division = $('.cmbDivision').val();
					cmbInstituteWithoutType(inst_division);
				});
			});
			$('.cmbDivision').change(function () {
				var inst_division = $(this).val();
				cmbInstituteWithoutType(inst_division, false, function (dataAvailable) {
					validateForm(dataAvailable);
				});
			});
			cmbSubCombo(6, '.cmbServiceType', false, function (dataAvailable) {
				validateForm(dataAvailable);
			});
			cmbRelateCombo(7, '.cmbService', false, function (dataAvailable) {
				validateForm(dataAvailable);
				var rlcmb_id = $('.cmbService').val();
				cmbRelateSubCombo(8, rlcmb_id, '.cmbClassGrade', false, function (dataAvailable) {
					validateForm(dataAvailable);
				});
				cmbRelateSubCombo(9, rlcmb_id, '.cmbDesignation', false, function (dataAvailable) {
					validateForm(dataAvailable);
				});
				cmbRelateSubCombo(13, rlcmb_id, '.cmbSalaryCode', false, function (dataAvailable) {
					validateForm(dataAvailable);
				});
			});
			cmbSubCombo(10, '.cmbServiceCategory', false, function (dataAvailable) {
				validateForm(dataAvailable);
			});
			cmbSubCombo(12, '.cmbAppointmentMode', false, function (dataAvailable) {
				validateForm(dataAvailable);
			});
			$('.cmbService').change(function () {
				var rlcmb_id = $(this).val();
				cmbRelateSubCombo(8, rlcmb_id, '.cmbClassGrade', false, function (dataAvailable) {
					validateForm(dataAvailable);
				});
				cmbRelateSubCombo(9, rlcmb_id, '.cmbDesignation', false, function (dataAvailable) {
					validateForm(dataAvailable);
				});
				cmbRelateSubCombo(13, rlcmb_id, '.cmbSalaryCode', false, function (dataAvailable) {
					validateForm(dataAvailable);
				});
			});
			loadStaffDataByID();
			const form = $('#serviceform');
			$('#btn_save').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					saveService();
				}
			});
			$('#btn_edit').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					editService();
				}
			});
			$('#btn_clear').click(function (event) {
				form.submit(false);
				clearService();
			});
		});
    </script>
</body>
</html>