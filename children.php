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
                        <h4 class="text-uppercase admin-page-heading"><i class="fas fa-edit"></i> <span class="stf_name_initial"></span> Children &nbsp;&nbsp;<button class="btn btn-light d-print-none" onclick="window.history.back(-1)"><i class="fas fa-chevron-circle-left"></i>&nbsp;Back</button></h4>                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-sm-6 col-xs-12 pb-4">
                        <form id="childrenform" novalidate>
                            <input type="hidden" class="form-control" id="ch_id">                                                    

							<div class="col">
								<div class="form-group">
									<label for="ch_name">Children Name</label>
									<input type="text" class="form-control" id="ch_name" placeholder="Children Name" autocomplete="off" required>
									<div class="valid-feedback">
										<i class="fas fa-lg fa-check-circle"></i> Looks good! 
									</div>
									<div class="invalid-feedback">
										<i class="fas fa-lg fa-exclamation-circle"></i> Please enter Children Name
									</div>
								</div>  
							</div> 
							<div class="col">
								<div class="form-group">
									<label for="ch_dob">Date of Birth</label>
									<input type="text" class="form-control datepicker" id="ch_dob" autocomplete="off" required>
									<div class="valid-feedback">
										<i class="fas fa-lg fa-check-circle"></i> Looks good! 
									</div>
									<div class="invalid-feedback">
										<i class="fas fa-lg fa-exclamation-circle"></i> Please enter Date of Birth
									</div>
								</div>  
							</div> 
							<div class="col">
								<div class="form-group">
									<label for="cmbGender">Gender</label>
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
                            <table id="tblChildren" class="table table-bordered table-hover" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>                                                       

                                        <th></th>                                
                                        <th></th>
										<th>Children Name</th>                                       
										<th>Date of Birth</th>                                       
										<th>Gender</th>                                     


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
		function tblChildren(callback) {
			var stf_id = $('#stf_id').val();
			var tbldata = "";
			$.post('controllers/staffController.php', {action: 'getAllChildrenByStaffID', stf_id: stf_id}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					tbldata += '<tr>';
					tbldata += '<td colspan="5" class="bg-danger text-center"> -- Childrens not available -- </td>';
					tbldata += '</tr>';
					$('#tblChildren tbody').html('').append(tbldata);
				} else {
					$.each(e, function (index, qdt) {
						index++;
						tbldata += '<tr>';
						tbldata += '<td>';
						tbldata += '<div class="btn-group btn-group-sm">';
						tbldata += '<button class="btn btn-info btn_select" value="' + qdt.ch_id + '"><i class="fas fa-edit"></i></button>';
						tbldata += '<button class="btn btn-danger btn_delete" value="' + qdt.ch_id + '"><i class="fas fa-trash-alt"></i></button>&nbsp;&nbsp';
						tbldata += '</div>';

						tbldata += '</td>';
						tbldata += '<td></td>';
						tbldata += '<td>' + qdt.ch_name + '</td>';
						tbldata += '<td>' + qdt.ch_dob + '</td>';
						tbldata += '<td>' + qdt.scmb_name + '</td>';
						tbldata += '</tr>';
					});


					if ($.fn.DataTable.isDataTable('#tblChildren')) {
						//re initialize 
						$('#tblChildren').DataTable().destroy();
						$('#tblChildren tbody').empty();
						$('#tblChildren tbody').html('').append(tbldata);
						$('#tblChildren').DataTable({
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
						$('#tblChildren tbody').html('').append(tbldata);
						$('#tblChildren').DataTable({
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
					var ch_id = $(this).val();
					$.post('controllers/staffController.php', {action: 'getChildrenByID', ch_id: ch_id}, function (e) {
						$.each(e, function (index, qdt) {
							cmbSubCombo(1, '.cmbGender', qdt.ch_gender);
							$('#ch_name').val(qdt.ch_name);
							$('#ch_dob').val(qdt.ch_dob);
							$('#ch_id').val(qdt.ch_id);
						});
					}, "json");
				});

				$('.btn_delete').click(function () {
					var ch_id = $(this).val();
					swal({
						title: "Are you sure?",
						text: "Do you want to delete this children ?",
						type: "warning",
						showCancelButton: true,
						confirmButtonClass: "btn-danger",
						cancelButtonClass: "btn-light",
						confirmButtonText: "Yes, delete it!",
						closeOnConfirm: false
					}, function () {
						$.post('controllers/staffController.php', {action: 'deleteChildren', ch_id: ch_id}, function (e) {
							if (parseInt(e.msgType) == 1) {
								swal("Good Job!", e.msg, "success");
								clearChildren();
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

		function saveChildren() {
			var ch_gender = $('.cmbGender').val();
			var ch_name = $('#ch_name').val();
			var ch_dob = $('#ch_dob').val();
			var stf_id = $('#stf_id').val();

			var postdata = {
				action: "saveChildren",
				ch_gender: ch_gender,
				ch_name: ch_name,
				ch_dob: ch_dob,
				stf_id: stf_id
			}
			$.post('controllers/staffController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good Job!", e.msg, "success");
					clearChildren();
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function editChildren() {
			var ch_gender = $('.cmbGender').val();
			var ch_name = $('#ch_name').val();
			var ch_dob = $('#ch_dob').val();
			var stf_id = $('#stf_id').val();
			var ch_id = $('#ch_id').val();

			var postdata = {
				action: "editChildren",
				ch_gender: ch_gender,
				ch_name: ch_name,
				ch_dob: ch_dob,
				stf_id: stf_id,
				ch_id: ch_id
			}
			$.post('controllers/staffController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good Job!", e.msg, "success");
					clearChildren();
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

		function clearChildren() {
			$('#ch_name').val('');
			$('#ch_dob').val('');
			$('#ch_id').val('');
			$('#btn_save').prop('hidden', false);
			$('#btn_edit').prop('hidden', true);
			$('#childrenform').removeClass('was-validated');
			tblChildren();
		}

		$(document).ready(function () {
			// Executes when the HTML document is loaded and the DOM is ready

			$(".datepicker").datetimepicker({
				viewMode: 'days',
				format: 'YYYY-MM-DD'
			});

			cmbSubCombo(1, '.cmbGender', false, function (dataAvailable) {
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
			tblChildren();
			loadStaffDataByID();



			const form = $('#childrenform');

			$('#btn_save').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					saveChildren();
				}
			});

			$('#btn_edit').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					editChildren();
				}
			});

			$('#btn_clear').click(function (event) {
				form.submit(false);
				clearChildren();
			});


		});
    </script>
</body>
</html>