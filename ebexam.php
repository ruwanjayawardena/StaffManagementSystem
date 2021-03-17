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
		<input type="hidden" id="sev_id" value="<?php
		if (isset($_REQUEST['sev_id']) && !empty($_REQUEST['sev_id'])) {
			echo $_REQUEST['sev_id'];
		}
		?>">  
		<input type="hidden" id="sev_sv" value="<?php
		if (isset($_REQUEST['sev_sv']) && !empty($_REQUEST['sev_sv'])) {
			echo $_REQUEST['sev_sv'];
		}
		?>">  
        <!--body content-->
        <section class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <h4 class="text-uppercase admin-page-heading"><i class="fas fa-edit"></i> <span class="stf_name_initial"></span> EB Examinations &nbsp;&nbsp;<button class="btn btn-light d-print-none" onclick="window.history.back(-1)"><i class="fas fa-chevron-circle-left"></i>&nbsp;Back</button></h4>                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-sm-6 col-xs-12 pb-4">
                        <form id="ebexamform" novalidate>
                            <input type="hidden" class="form-control" id="ex_id">                                                     
							<div class="col">
								<div class="form-group">
									<label for="cmbEbExam">EB</label>
									<select class="col-12 form-control cmbEbExam form-control-chosen" data-placeholder="Choose a EB..." required>
										<option value="" disabled selected>Loading...</option>
									</select>
									<div class="valid-feedback">
										<i class="fas fa-lg fa-check-circle"></i> Looks good! 
									</div>
									<div class="invalid-feedback">
										<i class="fas fa-lg fa-exclamation-circle"></i> Please choose EB
									</div>
								</div>
							</div>

							<div class="col">
								<div class="form-group">
									<label for="ex_year">Year</label>
									<input type="text" minlength="4" maxlength="4" class="form-control yearpicker" id="ex_year" placeholder="Year" autocomplete="off" required>
									<div class="valid-feedback">
										<i class="fas fa-lg fa-check-circle"></i> Looks good! 
									</div>
									<div class="invalid-feedback">
										<i class="fas fa-lg fa-exclamation-circle"></i> Please enter year
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
                            <table id="tblEbExam" class="table table-bordered table-hover" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>                                                       

                                        <th></th>                                
                                        <th></th>										                                  
										<th>Year</th>                                       
										<th>Eb Examination</th>                                      

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
		function tblEbExam(callback) {
			var stf_id = $('#stf_id').val();
			var sev_id = $('#sev_id').val();
			var sev_sv = $('#sev_sv').val();
			var tbldata = "";
			$.post('controllers/staffController.php', {action: 'getAllEbExamByStaffID', stf_id: stf_id, sev_id: sev_id}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					tbldata += '<tr>';
					tbldata += '<td colspan="4" class="bg-danger text-center"> -- Eb Exams not available -- </td>';
					tbldata += '</tr>';
					$('#tblEbExam tbody').html('').append(tbldata);
				} else {
					$.each(e, function (index, qdt) {
						index++;
						tbldata += '<tr>';
						tbldata += '<td>';
						tbldata += '<div class="btn-group btn-group-sm">';
						tbldata += '<button class="btn btn-info btn_select" value="' + qdt.ex_id + '"><i class="fas fa-edit"></i></button>';
						tbldata += '<button class="btn btn-danger btn_delete" value="' + qdt.ex_id + '"><i class="fas fa-trash-alt"></i></button>&nbsp;&nbsp';
						tbldata += '</div>';

						tbldata += '</td>';
						tbldata += '<td></td>';
						tbldata += '<td>' + qdt.ex_year + '</td>';
						tbldata += '<td>' + qdt.scmb_name + '</td>';
						tbldata += '</tr>';
					});


					if ($.fn.DataTable.isDataTable('#tblEbExam')) {
						//re initialize 
						$('#tblEbExam').DataTable().destroy();
						$('#tblEbExam tbody').empty();
						$('#tblEbExam tbody').html('').append(tbldata);
						$('#tblEbExam').DataTable({
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
						$('#tblEbExam tbody').html('').append(tbldata);
						$('#tblEbExam').DataTable({
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
					var ex_id = $(this).val();
					$.post('controllers/staffController.php', {action: 'getEbExamByID', ex_id: ex_id}, function (e) {
						$.each(e, function (index, qdt) {
							cmbRelateSubCombo(11, sev_sv, '.cmbEbExam', qdt.ex_ebexam);
							$('#ex_year').val(qdt.ex_year);
							$('#ex_id').val(qdt.ex_id);
						});
					}, "json");
				});

				$('.btn_delete').click(function () {
					var ex_id = $(this).val();
					swal({
						title: "Are you sure?",
						text: "Do you want to delete this eb exam ?",
						type: "warning",
						showCancelButton: true,
						confirmButtonClass: "btn-danger",
						cancelButtonClass: "btn-light",
						confirmButtonText: "Yes, delete it!",
						closeOnConfirm: false
					}, function () {
						$.post('controllers/staffController.php', {action: 'deleteEbExam', ex_id: ex_id}, function (e) {
							if (parseInt(e.msgType) == 1) {
								swal("Good Job!", e.msg, "success");
								clearEbExam();
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

		function saveEbExam() {
			var ex_ebexam = $('.cmbEbExam').val();
			var ex_year = $('#ex_year').val();
			var sev_id = $('#sev_id').val();
			var stf_id = $('#stf_id').val();
			var postdata = {
				action: "saveEbExam",
				ex_year: ex_year,
				ex_ebexam: ex_ebexam,
				stf_id: stf_id,
				sev_id: sev_id
			}
			$.post('controllers/staffController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good Job!", e.msg, "success");
					clearEbExam();
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function editEbExam() {
			var ex_ebexam = $('.cmbEbExam').val();
			var ex_year = $('#ex_year').val();
			var ex_id = $('#ex_id').val();
			var postdata = {
				action: "editEbExam",
				ex_year: ex_year,
				ex_ebexam: ex_ebexam,
				ex_id: ex_id
			}
			$.post('controllers/staffController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good Job!", e.msg, "success");
					clearEbExam();
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function loadStaffDataByID() {
			var stf_id = $('#stf_id').val();
			var sev_sv = $('#sev_sv').val();
			$.post('controllers/staffController.php', {action: 'getStaffByID', stf_id: stf_id}, function (e) {
				$.post('controllers/subComboController.php', {action: 'getRelateComboByID', rlcmb_id: sev_sv}, function (es) {
					$.each(e, function (index, qdt) {
						$.each(es, function (indexs, qdts) {
							$('.stf_name_initial').html('').append(qdt.stf_name_initial + ' <small>(' + qdt.stf_nic + ')</small> ' + qdts.rlcmb_name);
						});
					});
				}, "json");
			}, "json");
		}

		function clearEbExam() {
			$('#ex_year').val('');
			$('#ex_id').val('');
			$('#btn_save').prop('hidden', false);
			$('#btn_edit').prop('hidden', true);
			$('#ebexamform').removeClass('was-validated');
			tblEbExam();
		}

		$(document).ready(function () {
			// Executes when the HTML document is loaded and the DOM is ready
			var sev_sv = $('#sev_sv').val();
			loadStaffDataByID();

			$(".yearpicker").datetimepicker({
				viewMode: 'days',
				format: 'YYYY'
			});


			tblEbExam();
			cmbRelateSubCombo(11, sev_sv, '.cmbEbExam', false, function (dataAvailable) {
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



			const form = $('#ebexamform');

			$('#btn_save').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					saveEbExam();
				}
			});

			$('#btn_edit').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					editEbExam();
				}
			});

			$('#btn_clear').click(function (event) {
				form.submit(false);
				clearEbExam();
			});


		});
    </script>
</body>
</html>