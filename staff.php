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
                        <h4 class="text-uppercase admin-page-heading"><i class="fas fa-edit"></i> Staff Information &nbsp;&nbsp;<button class="btn btn-light d-print-none" onclick="goDashboard();"><i class="fas fa-chevron-circle-left"></i>&nbsp;Back</button></h4>                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-7 col-12 pb-4">
                        <form id="instituteform" novalidate>
                            <input type="hidden" class="form-control" id="stf_id">
                            <div class="form-row">                                
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="cmbDistrict">Choose District</label>
                                        <select class="col-12 form-control cmbDistrict form-control-chosen" data-placeholder="Choose a District..." required>
                                            <option value="" disabled selected>Loading...</option>
                                        </select>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please choose district
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="cmbDSOffice">Choose DS Office</label>
                                        <select class="col-12 form-control cmbDSOffice form-control-chosen" data-placeholder="Choose a DS Office..." required>
                                            <option value="" disabled selected>Loading...</option>
                                        </select>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please choose DS Office
                                        </div>
                                    </div>
                                </div>                                

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="cmbGNDivision">Choose GN Division</label>
                                        <select class="col-12 form-control cmbGNDivision form-control-chosen" data-placeholder="Choose a GN Division..." required>
                                            <option value="" disabled selected>Loading...</option>
                                        </select>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please choose GN Division
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                            <div class="form-row"> 
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="stf_name_full">Full Name</label>
                                        <input type="text" class="form-control" id="stf_name_full" placeholder="Full Name" autocomplete="off" required>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please enter full name
                                        </div>
                                    </div>  
                                </div>                               

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="stf_name_initial">Name With Initials</label>
                                        <input type="text" class="form-control" id="stf_name_initial" placeholder="Name With Initials" autocomplete="off" required>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please enter Name With Initials
                                        </div>
                                    </div>  
                                </div>                               
                            </div>
                            <div class="form-row"> 
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="stf_nic">NIC</label>
                                        <input type="text" class="form-control" id="stf_nic" placeholder="NIC" autocomplete="off" required>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please enter NIC
                                        </div>
                                    </div>  
                                </div>                              

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="stf_passport">Passport No</label>
                                        <input type="text" class="form-control" id="stf_passport" placeholder="Passport No" autocomplete="off" required>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please enter Passport No
                                        </div>
                                    </div>  
                                </div> 
								<div class="col-4">
                                    <div class="form-group">
                                        <label for="stf_dob">Date Of Birth</label>
                                        <input type="text" class="form-control datepicker" id="stf_dob" placeholder="Date Of Birth" autocomplete="off" required>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please enter Date Of Birth
                                        </div>
                                    </div>   
                                </div>
                            </div>
							<div class="form-row"> 
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="cmbGender">Choose Gender</label>
                                        <select class="col-12 form-control cmbGender form-control-chosen" data-placeholder="Choose a Gender..." required>
                                            <option value="" disabled selected>Loading...</option>
                                        </select>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please choose Gender
                                        </div>
                                    </div>
                                </div>                                

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="cmbReligion">Choose Religion</label>
                                        <select class="col-12 form-control cmbReligion form-control-chosen" data-placeholder="Choose a Religion..." required>
                                            <option value="" disabled selected>Loading...</option>
                                        </select>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please choose Religion
                                        </div>
                                    </div>
                                </div> 
								<div class="col-4">
                                    <div class="form-group">
                                        <label for="cmbCivilStatus">Choose Civil Status</label>
                                        <select class="col-12 form-control cmbCivilStatus form-control-chosen" data-placeholder="Choose a Civil Status..." required>
                                            <option value="" disabled selected>Loading...</option>
                                        </select>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please choose Civil Status
                                        </div>
                                    </div>
                                </div> 
                            </div>
							<div class="form-row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="stf_contact_resident">Contact No Resident</label>
                                        <input type="text" class="form-control" id="stf_contact_resident" placeholder="Contact No Resident" autocomplete="off" required>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please enter Contact No Resident
                                        </div>
                                    </div>        
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="stf_contact_mobile">Contact No Mobile</label>
                                        <input type="text" class="form-control" id="stf_contact_mobile" placeholder="Contact No Mobile" autocomplete="off" required>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please enter Contact No Mobile
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="form-row"> 
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="stf_official_tel">Official Telephone No</label>
                                        <input type="text" class="form-control" id="stf_official_tel" placeholder="Official Telephone No" autocomplete="off" required>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please enter Official Telephone No
                                        </div>
                                    </div> 
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="stf_official_fax">Official Fax No</label>
                                        <input type="text" class="form-control" id="stf_official_fax" placeholder="Official Fax No" autocomplete="off" required>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please enter Official Fax No
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="form-row"> 
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="stf_email">Email</label>
                                        <input type="text" class="form-control" id="stf_email" placeholder="Email" autocomplete="off">
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please enter Email
                                        </div>
                                    </div> 
                                </div>
                            </div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-row"> 
										<div class="col-12">
											<div class="form-group">
												<label for="stf_p_add1">Permanent Address Line 1</label>
												<input type="text" class="form-control" id="stf_p_add1" placeholder="Address Line 1" autocomplete="off" required>
												<div class="valid-feedback">
													<i class="fas fa-lg fa-check-circle"></i> Looks good! 
												</div>
												<div class="invalid-feedback">
													<i class="fas fa-lg fa-exclamation-circle"></i> Please enter Address Line 1
												</div>
											</div> 
										</div>
									</div>
									<div class="form-row"> 
										<div class="col-12">
											<div class="form-group">
												<label for="stf_p_add2">Permanent Address Line 2</label>
												<input type="text" class="form-control" id="stf_p_add2" placeholder="Address Line 2" autocomplete="off" required>
												<div class="valid-feedback">
													<i class="fas fa-lg fa-check-circle"></i> Looks good! 
												</div>
												<div class="invalid-feedback">
													<i class="fas fa-lg fa-exclamation-circle"></i> Please enter Address Line 2
												</div>
											</div> 
										</div>
									</div>
									<div class="form-row"> 
										<div class="col-12">
											<div class="form-group">
												<label for="stf_p_add3">Permanent Address Line 3</label>
												<input type="text" class="form-control" id="stf_p_add3" placeholder="Address Line 3" autocomplete="off" required>
												<div class="valid-feedback">
													<i class="fas fa-lg fa-check-circle"></i> Looks good! 
												</div>
												<div class="invalid-feedback">
													<i class="fas fa-lg fa-exclamation-circle"></i> Please enter Address Line 3
												</div>
											</div> 
										</div>
									</div>
									<div class="form-row"> 
										<div class="col-12">
											<div class="form-group">
												<label for="stf_p_postalcode">Permanent Address Postal Code</label>
												<input type="text" class="form-control" id="stf_p_postalcode" placeholder="Postal Code" autocomplete="off" required>
												<div class="valid-feedback">
													<i class="fas fa-lg fa-check-circle"></i> Looks good! 
												</div>
												<div class="invalid-feedback">
													<i class="fas fa-lg fa-exclamation-circle"></i> Please enter Postal Code
												</div>
											</div> 
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-row"> 
										<div class="col-12">
											<div class="form-group">
												<label for="stf_t_add1">Temporary Address Line 1</label>
												<input type="text" class="form-control" id="stf_t_add1" placeholder="Address Line 1" autocomplete="off" >
												<div class="valid-feedback">
													<i class="fas fa-lg fa-check-circle"></i> Looks good! 
												</div>
												<div class="invalid-feedback">
													<i class="fas fa-lg fa-exclamation-circle"></i> Please enter Address Line 1
												</div>
											</div> 
										</div>
									</div>
									<div class="form-row"> 
										<div class="col-12">
											<div class="form-group">
												<label for="stf_t_add2">Temporary Address Line 2</label>
												<input type="text" class="form-control" id="stf_t_add2" placeholder="Address Line 2" autocomplete="off" >
												<div class="valid-feedback">
													<i class="fas fa-lg fa-check-circle"></i> Looks good! 
												</div>
												<div class="invalid-feedback">
													<i class="fas fa-lg fa-exclamation-circle"></i> Please enter Address Line 2
												</div>
											</div> 
										</div>
									</div>
									<div class="form-row"> 
										<div class="col-12">
											<div class="form-group">
												<label for="stf_t_add3">Temporary Address Line 3</label>
												<input type="text" class="form-control" id="stf_t_add3" placeholder="Address Line 3" autocomplete="off" >
												<div class="valid-feedback">
													<i class="fas fa-lg fa-check-circle"></i> Looks good! 
												</div>
												<div class="invalid-feedback">
													<i class="fas fa-lg fa-exclamation-circle"></i> Please enter Address Line 3
												</div>
											</div> 
										</div>
									</div>
									<div class="form-row"> 
										<div class="col-12">
											<div class="form-group">
												<label for="stf_t_postalcode">Temporary Address Postal Code</label>
												<input type="text" class="form-control" id="stf_t_postalcode" placeholder="Postal Code" autocomplete="off" >
												<div class="valid-feedback">
													<i class="fas fa-lg fa-check-circle"></i> Looks good! 
												</div>
												<div class="invalid-feedback">
													<i class="fas fa-lg fa-exclamation-circle"></i> Please enter Postal Code
												</div>
											</div> 
										</div>
									</div>

								</div>
							</div>



							<div class="form-row"> 
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="stf_wop_number">W & OP No</label>
                                        <input type="text" class="form-control" id="stf_wop_number" placeholder="W & OP No" autocomplete="off" required>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please enter W & OP No
                                        </div>
                                    </div> 
                                </div>
								<div class="col-4">									
                                    <div class="form-group">
                                        <label for="stf_first_appoinment_date">First Appointment Date</label>
                                        <input type="text" class="form-control datepicker" id="stf_first_appoinment_date" placeholder="First Appointment Date" autocomplete="off" required>
                                        <div class="valid-feedback">
                                            <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fas fa-lg fa-exclamation-circle"></i> Please enter First Appointment Date
                                        </div>
                                    </div> 
                                </div>

                                <div class="col-5">
									<div class="form-group">
										<label for="stf_salary_increment_month">Salary Increment Date</label>
										<div class="row">
											<div class="col-6">
												<input type="number" class="form-control" id="stf_salary_increment_month" maxlength="2" max="12" min="1" autocomplete="off" value="<?php echo date("m"); ?>" required>
												<div class="valid-feedback">
													<i class="fas fa-lg fa-check-circle"></i> Looks good! 
												</div>
												<div class="invalid-feedback">
													<i class="fas fa-lg fa-exclamation-circle"></i> Please enter Salary Increment Date
												</div>
											</div>
											<div class="col-6">
												<input type="number" class="form-control" id="stf_salary_increment_day" maxlength="2" max="31" min="1" autocomplete="off" value="<?php echo date("d"); ?>" required>
												<div class="valid-feedback">
													<i class="fas fa-lg fa-check-circle"></i> Looks good! 
												</div>
												<div class="invalid-feedback">
													<i class="fas fa-lg fa-exclamation-circle"></i> Please enter Salary Increment Date
												</div>
											</div>											
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
                            <table id="tblStaff" class="table table-bordered table-hover" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>                                                       

                                        <th></th>                                
                                        <th></th>
										<th>Staff Member</th>                                       
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
		function cmbSubCombo(mcmb_id, className, selected, callback) {
			var cmbdata = "";
			var dataAvailable = 0;
			$.post('controllers/subComboController.php', {action: 'cmbSubCombo', mcmb_id: mcmb_id}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					cmbdata += '<option value="0"> Data not available! </option>';
				} else {
					dataAvailable = 1;
					$.each(e, function (index, qdt) {
						if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
							if (parseInt(selected) === parseInt(qdt.scmb_id)) {
								cmbdata += '<option value="' + qdt.scmb_id + '" selected>' + qdt.scmb_name + '</option>';
							} else {
								cmbdata += '<option value="' + qdt.scmb_id + '">' + qdt.scmb_name + '</option>';
							}
						} else {
							cmbdata += '<option value="' + qdt.scmb_id + '">' + qdt.scmb_name + '</option>';
						}
					});
				}
				$(className).html('').append(cmbdata);
				chosenRefresh();

				if (callback !== undefined) {
					if (typeof callback === 'function') {
						callback(dataAvailable);
					}
				}
			}, "json");
		}

		function tblStaff(callback) {
			var tbldata = "";
			$.post('controllers/staffController.php', {action: 'getAllStaff'}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					tbldata += '<tr>';
					tbldata += '<td colspan="4" class="bg-danger text-center"> -- Staff Information not available -- </td>';
					tbldata += '</tr>';
					$('#tblStaff tbody').html('').append(tbldata);
				} else {
					$.each(e, function (index, qdt) {
						index++;
						tbldata += '<tr>';
						tbldata += '<td>';
						tbldata += '<div class="btn-group btn-group-sm">';
						tbldata += '<button class="btn btn-info btn_select" value="' + qdt.stf_id + '"><i class="fas fa-edit"></i></button>';
						tbldata += '<button class="btn btn-danger btn_delete" value="' + qdt.stf_id + '"><i class="fas fa-trash-alt"></i></button>&nbsp;&nbsp';
						tbldata += '<button class="btn btn-success btn-block btn_q" data-toggle="tooltip" title="Add Qualification" value="' + qdt.stf_id + '"><i class="fas fa-plus"></i></button>';
						tbldata += '<button class="btn btn-secondary btn_ch" data-toggle="tooltip" title="Add Children" value="' + qdt.stf_id + '"><i class="fas fa-plus"></i></button>';
						tbldata += '<button class="btn btn-secondary btn_sp" data-toggle="tooltip" title="Add Spouse" value="' + qdt.stf_id + '"><i class="fas fa-plus"></i></button>';
						tbldata += '<button class="btn btn-success btn_sev" data-toggle="tooltip" title="Add Service Information" value="' + qdt.stf_id + '"><i class="fas fa-plus"></i></button>&nbsp;';
						if (parseInt(qdt.stf_pension_status) != 1) {
							tbldata += '<button class="btn btn-warning btn_pension" data-toggle="tooltip" title="Pension Status" value="' + qdt.stf_id + '"><i class="fas fa-question-circle"></i></button>';
						}
					
						if (parseInt(qdt.stf_pension_status) == 1) {
							tbldata += '<span class="badge badge-success pl-2 mt-1" style="font-size:0.75rem">Pension Activated<br>'+qdt.stf_pension_date+'</span>';
						}
						tbldata += '</div>';

						tbldata += '</td>';
						tbldata += '<td></td>';
						tbldata += '<td>' + qdt.stf_name_initial + '</td>';
						tbldata += '<td>' + qdt.stf_nic + '</td>';
						tbldata += '</tr>';
					});


					if ($.fn.DataTable.isDataTable('#tblStaff')) {
						//re initialize 
						$('#tblStaff').DataTable().destroy();
						$('#tblStaff tbody').empty();
						$('#tblStaff tbody').html('').append(tbldata);
						$('#tblStaff').DataTable({
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
						$('#tblStaff tbody').html('').append(tbldata);
						$('#tblStaff').DataTable({
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



				$('.btn_pension').click(function () {
					var stf_id = $(this).val();
					var pensionModalStr = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
							'<div class="modal-dialog modal-sm" role="document">' +
							'<div class="modal-content">' +
							'<div class="modal-header">' +
							'<h5 class="modal-title" id="exampleModalLabel">Pension Status </h5>' +
							'<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
							'<span aria-hidden="true">&times;</span>' +
							'</button>' +
							'</div>' +
							'<div class="modal-body">' +
							//here is model body start                        
							'<div class="row">' +
							'<div class="col-lg-12">' +
							'<form id="default-form" novalidate>' +
							'<div class="form-group">' +
							'<label for="stf_pension_date" class="col-form-label">Date</label>' +
							'<input type="text" class="form-control datepicker" id="stf_pension_date" required>' +
							'</div>' +
							'</form>' +
							'</div>' +
							'</div>' +
							//here is model body end
							'</div>' +
							//start model footer
							'<div class="modal-footer">' +
							'<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>' +
							'<button type="button" class="btn btn-primary" id="btn_pen">Activate Pension</button>' +
							'</div>' +
							//end modal footer
							'</div>' +
							'</div>' +
							'</div>';

					var pensionModal = $(pensionModalStr);
					pensionModal.modal('show');

					pensionModal.find(".datepicker").datetimepicker({
						viewMode: 'days',
						format: 'YYYY-MM-DD'
					});

					pensionModal.find('#btn_pen').click(function (event) {
						var stf_pension_date = pensionModal.find('#stf_pension_date').val();
						var stf_pension_status = 1;
						var postData = {
							stf_pension_date: stf_pension_date,
							stf_pension_status: stf_pension_status,
							stf_id: stf_id,
							action: "savePensionStatus"
						}
						var form = pensionModal.find('#default-form');
						form.submit(false);
						form.addClass('was-validated');
						if (form[0].checkValidity() === false) {
							event.preventDefault();
							event.stopPropagation();
						} else {
							$.post('controllers/staffController.php', postData, function (e) {
								if (parseInt(e.msgType) == 1) {
									tblStaff();
									swal("PENSION STATUS !", e.msg, "success");
									pensionModal.modal('hide');
								} else {
									swal("PENSION STATUS !", e.msg, "warning");
								}
							}, "json");
						}
					});
				});

				$('.btn_select').click(function () {
					$('#btn_save').prop('hidden', true);
					$('#btn_edit').prop('hidden', false);
					var stf_id = $(this).val();
					$.post('controllers/staffController.php', {action: 'getStaffByID', stf_id: stf_id}, function (e) {
						$.each(e, function (index, qdt) {
							cmbDistrict(qdt.stf_district);
							cmbDSOffice(qdt.stf_district, qdt.stf_dsoffice);
							cmbGNDivision(qdt.stf_dsoffice, qdt.stf_gndivision, function (dataAvailable) {
								if (parseInt(dataAvailable) == 0) {
									var controlMsg = '<div class="alert bg-warning"><strong>NOTE</strong> Data saving restricted! becasue of GN Division not available.</div>';
									$('.controlMsg').html('').append(controlMsg);
									$('.form-controllers-div').prop('hidden', true);
								} else {
									$('.controlMsg').html('').append("");
									$('.form-controllers-div').prop('hidden', false);
								}
							});
							$('#stf_name_full').val(qdt.stf_name_full);
							$('#stf_name_initial').val(qdt.stf_name_initial);
							$('#stf_nic').val(qdt.stf_nic);
							$('#stf_passport').val(qdt.stf_passport);
							cmbSubCombo(1, '.cmbGender', qdt.stf_gender);
							$('#stf_dob').val(qdt.stf_dob);
							cmbSubCombo(2, '.cmbReligion', qdt.stf_religion);
							$('#stf_contact_resident').val(qdt.stf_contact_resident);
							$('#stf_contact_mobile').val(qdt.stf_contact_mobile);
							$('#stf_official_tel').val(qdt.stf_official_tel);
							$('#stf_official_fax').val(qdt.stf_official_fax);
							$('#stf_email').val(qdt.stf_email);
							cmbSubCombo(3, '.cmbCivilStatus', qdt.stf_civil_status);
							$('#stf_p_add1').val(qdt.stf_p_add1);
							$('#stf_p_add2').val(qdt.stf_p_add2);
							$('#stf_p_add3').val(qdt.stf_p_add3);
							$('#stf_p_postalcode').val(qdt.stf_p_postalcode);
							$('#stf_t_add1').val(qdt.stf_t_add1);
							$('#stf_t_add2').val(qdt.stf_t_add2);
							$('#stf_t_add3').val(qdt.stf_t_add3);
							$('#stf_t_postalcode').val(qdt.stf_t_postalcode);
							$('#stf_wop_number').val(qdt.stf_wop_number);
							$('#stf_salary_increment_month').val(qdt.stf_salary_increment_month);
							$('#stf_salary_increment_day').val(qdt.stf_salary_increment_day);
							$('#stf_first_appoinment_date').val(qdt.stf_first_appoinment_date);
							$('#stf_id').val(qdt.stf_id);
						});
					}, "json");
				});

				$('.btn_delete').click(function () {
					var stf_id = $(this).val();
					swal({
						title: "Are you sure?",
						text: "Do you want to delete this staff member ?",
						type: "warning",
						showCancelButton: true,
						confirmButtonClass: "btn-danger",
						cancelButtonClass: "btn-light",
						confirmButtonText: "Yes, delete it!",
						closeOnConfirm: false
					}, function () {
						$.post('controllers/staffController.php', {action: 'deleteStaff', stf_id: stf_id}, function (e) {
							if (parseInt(e.msgType) == 1) {
								swal("Good Job!", e.msg, "success");
								clearStaff();
							} else {
								swal("Error!", e.msg, "error");
							}
						}, "json");
					});
				});

				$('.btn_q').click(function () {
					var stf_id = $(this).val();
					window.location.href = 'qualification.php?stf_id=' + stf_id;
				});
				$('.btn_ch').click(function () {
					var stf_id = $(this).val();
					window.location.href = 'children.php?stf_id=' + stf_id;
				});
				$('.btn_sp').click(function () {
					var stf_id = $(this).val();
					window.location.href = 'spouse.php?stf_id=' + stf_id;
				});
				$('.btn_sev').click(function () {
					var stf_id = $(this).val();
					window.location.href = 'service.php?stf_id=' + stf_id;
				});

				if (callback !== undefined) {
					if (typeof callback === 'function') {
						callback();
					}
				}


			}, "json");
		}

		function saveStaff() {
			var stf_district = $('.cmbDistrict').val();
			var stf_dsoffice = $('.cmbDSOffice').val();
			var stf_gndivision = $('.cmbGNDivision').val();
			var stf_name_full = $('#stf_name_full').val();
			var stf_name_initial = $('#stf_name_initial').val();
			var stf_nic = $('#stf_nic').val();
			var stf_passport = $('#stf_passport').val();
			var stf_gender = $('.cmbGender').val();
			var stf_dob = $('#stf_dob').val();
			var stf_religion = $('.cmbReligion').val();
			var stf_contact_resident = $('#stf_contact_resident').val();
			var stf_contact_mobile = $('#stf_contact_mobile').val();
			var stf_official_tel = $('#stf_official_tel').val();
			var stf_official_fax = $('#stf_official_fax').val();
			var stf_email = $('#stf_email').val();
			var stf_civil_status = $('.cmbCivilStatus').val();
			var stf_p_add1 = $('#stf_p_add1').val();
			var stf_p_add2 = $('#stf_p_add2').val();
			var stf_p_add3 = $('#stf_p_add3').val();
			var stf_p_postalcode = $('#stf_p_postalcode').val();
			var stf_t_add1 = $('#stf_t_add1').val();
			var stf_t_add2 = $('#stf_t_add2').val();
			var stf_t_add3 = $('#stf_t_add3').val();
			var stf_t_postalcode = $('#stf_t_postalcode').val();
			var stf_wop_number = $('#stf_wop_number').val();
			var stf_salary_increment_month = $('#stf_salary_increment_month').val();
			var stf_salary_increment_day = $('#stf_salary_increment_day').val();
			var stf_first_appoinment_date = $('#stf_first_appoinment_date').val();
			var postdata = {
				action: "saveStaff",
				stf_district: stf_district,
				stf_dsoffice: stf_dsoffice,
				stf_gndivision: stf_gndivision,
				stf_name_full: stf_name_full,
				stf_name_initial: stf_name_initial,
				stf_nic: stf_nic,
				stf_passport: stf_passport,
				stf_gender: stf_gender,
				stf_dob: stf_dob,
				stf_religion: stf_religion,
				stf_contact_resident: stf_contact_resident,
				stf_contact_mobile: stf_contact_mobile,
				stf_official_tel: stf_official_tel,
				stf_official_fax: stf_official_fax,
				stf_email: stf_email,
				stf_civil_status: stf_civil_status,
				stf_p_add1: stf_p_add1,
				stf_p_add2: stf_p_add2,
				stf_p_add3: stf_p_add3,
				stf_p_postalcode: stf_p_postalcode,
				stf_t_add1: stf_t_add1,
				stf_t_add2: stf_t_add2,
				stf_t_add3: stf_t_add3,
				stf_t_postalcode: stf_t_postalcode,
				stf_wop_number: stf_wop_number,
				stf_salary_increment_month: stf_salary_increment_month,
				stf_salary_increment_day: stf_salary_increment_day,
				stf_first_appoinment_date: stf_first_appoinment_date
			}
			$.post('controllers/staffController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good Job!", e.msg, "success");
					clearStaff();
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function editStaff() {
			var stf_id = $('#stf_id').val();
			var stf_district = $('.cmbDistrict').val();
			var stf_dsoffice = $('.cmbDSOffice').val();
			var stf_gndivision = $('.cmbGNDivision').val();
			var stf_name_full = $('#stf_name_full').val();
			var stf_name_initial = $('#stf_name_initial').val();
			var stf_nic = $('#stf_nic').val();
			var stf_passport = $('#stf_passport').val();
			var stf_gender = $('.cmbGender').val();
			var stf_dob = $('#stf_dob').val();
			var stf_religion = $('.cmbReligion').val();
			var stf_contact_resident = $('#stf_contact_resident').val();
			var stf_contact_mobile = $('#stf_contact_mobile').val();
			var stf_official_tel = $('#stf_official_tel').val();
			var stf_official_fax = $('#stf_official_fax').val();
			var stf_email = $('#stf_email').val();
			var stf_civil_status = $('.cmbCivilStatus').val();
			var stf_p_add1 = $('#stf_p_add1').val();
			var stf_p_add2 = $('#stf_p_add2').val();
			var stf_p_add3 = $('#stf_p_add3').val();
			var stf_p_postalcode = $('#stf_p_postalcode').val();
			var stf_t_add1 = $('#stf_t_add1').val();
			var stf_t_add2 = $('#stf_t_add2').val();
			var stf_t_add3 = $('#stf_t_add3').val();
			var stf_t_postalcode = $('#stf_t_postalcode').val();
			var stf_wop_number = $('#stf_wop_number').val();
			var stf_salary_increment_month = $('#stf_salary_increment_month').val();
			var stf_salary_increment_day = $('#stf_salary_increment_day').val();
			var stf_first_appoinment_date = $('#stf_first_appoinment_date').val();
			var postdata = {
				action: "editStaff",
				stf_district: stf_district,
				stf_dsoffice: stf_dsoffice,
				stf_gndivision: stf_gndivision,
				stf_name_full: stf_name_full,
				stf_name_initial: stf_name_initial,
				stf_nic: stf_nic,
				stf_passport: stf_passport,
				stf_gender: stf_gender,
				stf_dob: stf_dob,
				stf_religion: stf_religion,
				stf_contact_resident: stf_contact_resident,
				stf_contact_mobile: stf_contact_mobile,
				stf_official_tel: stf_official_tel,
				stf_official_fax: stf_official_fax,
				stf_email: stf_email,
				stf_civil_status: stf_civil_status,
				stf_p_add1: stf_p_add1,
				stf_p_add2: stf_p_add2,
				stf_p_add3: stf_p_add3,
				stf_p_postalcode: stf_p_postalcode,
				stf_t_add1: stf_t_add1,
				stf_t_add2: stf_t_add2,
				stf_t_add3: stf_t_add3,
				stf_t_postalcode: stf_t_postalcode,
				stf_wop_number: stf_wop_number,
				stf_salary_increment_month: stf_salary_increment_month,
				stf_salary_increment_day: stf_salary_increment_day,
				stf_first_appoinment_date: stf_first_appoinment_date,
				stf_id: stf_id
			}
			$.post('controllers/staffController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good Job!", e.msg, "success");
					clearStaff();
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function clearStaff() {
			$('#stf_name_full').val('');
			$('#stf_name_initial').val('');
			$('#stf_nic').val('');
			$('#stf_passport').val('');
			$('#stf_dob').val('');
			$('#stf_contact_resident').val('');
			$('#stf_contact_mobile').val('');
			$('#stf_official_tel').val('');
			$('#stf_official_fax').val('');
			$('#stf_email').val('');
			$('#stf_p_add1').val('');
			$('#stf_p_add2').val('');
			$('#stf_p_add3').val('');
			$('#stf_p_postalcode').val('');
			$('#stf_t_add1').val('');
			$('#stf_t_add2').val('');
			$('#stf_t_add3').val('');
			$('#stf_t_postalcode').val('');
			$('#stf_wop_number').val('');
			$('#stf_first_appoinment_date').val('');
			$('#btn_save').prop('hidden', false);
			$('#btn_edit').prop('hidden', true);
			$('#instituteform').removeClass('was-validated');
			tblStaff();
		}

		$(document).ready(function () {
			// Executes when the HTML document is loaded and the DOM is ready

			$(".datepicker").datetimepicker({
				viewMode: 'days',
				format: 'YYYY-MM-DD'
			});

			cmbSubCombo(1, '.cmbGender');
			cmbSubCombo(2, '.cmbReligion');
			cmbSubCombo(3, '.cmbCivilStatus');
			tblStaff();


			cmbDistrict(false, function () {
				var dsof_district = $('.cmbDistrict').val();
				cmbDSOffice(dsof_district, false, function () {
					var gnd_dsoffice = $('.cmbDSOffice').val();
					cmbGNDivision(gnd_dsoffice, false, function (dataAvailable) {
						if (parseInt(dataAvailable) == 0) {
							var controlMsg = '<div class="alert bg-warning"><strong>NOTE</strong> Data saving restricted! becasue of GN Division not available.</div>';
							$('.controlMsg').html('').append(controlMsg);
							$('.form-controllers-div').prop('hidden', true);
						} else {
							$('.controlMsg').html('').append("");
							$('.form-controllers-div').prop('hidden', false);
						}
					});
				});
			});

			$('.cmbDistrict').change(function () {
				var dsof_district = $(this).val();
				cmbDSOffice(dsof_district, false, function () {
					var gnd_dsoffice = $('.cmbDSOffice').val();
					cmbGNDivision(gnd_dsoffice, false, function (dataAvailable) {
						if (parseInt(dataAvailable) == 0) {
							var controlMsg = '<div class="alert bg-warning"><strong>NOTE</strong> Data saving restricted! becasue of GN Division not available.</div>';
							$('.controlMsg').html('').append(controlMsg);
							$('.form-controllers-div').prop('hidden', true);
						} else {
							$('.controlMsg').html('').append("");
							$('.form-controllers-div').prop('hidden', false);
						}
					});
				});
			});

			$('.cmbDSOffice').change(function () {
				var gnd_dsoffice = $('.cmbDSOffice').val();
				cmbGNDivision(gnd_dsoffice, false, function (dataAvailable) {
					if (parseInt(dataAvailable) == 0) {
						var controlMsg = '<div class="alert bg-warning"><strong>NOTE</strong> Data saving restricted! becasue of GN Division not available.</div>';
						$('.controlMsg').html('').append(controlMsg);
						$('.form-controllers-div').prop('hidden', true);
					} else {
						$('.controlMsg').html('').append("");
						$('.form-controllers-div').prop('hidden', false);
					}
				});
			});

			const form = $('#instituteform');

			$('#btn_save').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					saveStaff();
				}
			});

			$('#btn_edit').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					editStaff();
				}
			});

			$('#btn_clear').click(function (event) {
				form.submit(false);
				clearStaff();
			});


		});
    </script>
</body>
</html>