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
                        <h4 class="text-uppercase admin-page-heading"><i class="fas fa-map-marked-alt"></i> Branch  &nbsp;&nbsp;<button class="btn btn-light d-print-none" onclick="window.history.back(-1);"><i class="fas fa-chevron-circle-left"></i>&nbsp;Back</button></h4>                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-sm-6 pb-4">
                        <form id="branchform" novalidate>
                            <input type="hidden" class="form-control" id="br_id">  
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
                            <div class="form-group">
                                <label for="br_name">Branch</label>
                                <input type="text" class="form-control" id="br_name" placeholder="Branch" autocomplete="off" required>
                                <div class="valid-feedback">
                                    <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                </div>
                                <div class="invalid-feedback">
                                    <i class="fas fa-lg fa-exclamation-circle"></i> Please enter branch
                                </div>
                            </div>                           
                            <br>
                            <div class="form-group">
                                <button class="btn btn-success" id="btn_save"><i class="fas fa-save"></i> Save</button>
                                <button class="btn btn-warning" id="btn_edit" hidden><i class="fas fa-edit"></i> Update</button>
                                <button class="btn btn-light" id="btn_clear"><i class="fas fa-undo"></i> Clear</button>
                            </div>
                        </form>
                    </div>
                    <div class="col">
                        <div class="table-responsive">
                            <table id="tblBranch" class="table table-bordered table-hover" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>                                                       

                                        <th></th>                                
                                        <th></th>                                
                                        <th>Branch</th>                                        
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
		function tblBranch(br_zone, callback) {
			var tbldata = "";
			$.post('controllers/branchController.php', {action: 'getAllBranch', br_zone: br_zone}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					tbldata += '<tr>';
					tbldata += '<td colspan="3" class="bg-danger text-center"> -- Branches not available -- </td>';
					tbldata += '</tr>';
					$('#tblBranch tbody').html('').append(tbldata);
				} else {
					$.each(e, function (index, qdt) {
						index++;
						tbldata += '<tr>';
						tbldata += '<td>';
						tbldata += '<div class="btn-group btn-group-sm">';
						tbldata += '<button class="btn btn-info btn_select" value="' + qdt.br_id + '"><i class="fas fa-edit"></i></button>';
						tbldata += '<button class="btn btn-danger btn_delete" value="' + qdt.br_id + '"><i class="fas fa-trash-alt"></i></button>';
						tbldata += '</div>';
						tbldata += '</td>';
						tbldata += '<td></td>';
						tbldata += '<td>' + qdt.br_name + '</td>';
						tbldata += '</tr>';
					});


					if ($.fn.DataTable.isDataTable('#tblBranch')) {
						//re initialize 
						$('#tblBranch').DataTable().destroy();
						$('#tblBranch tbody').empty();
						$('#tblBranch tbody').html('').append(tbldata);
						$('#tblBranch').DataTable({
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
						$('#tblBranch tbody').html('').append(tbldata);
						$('#tblBranch').DataTable({
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
					var br_id = $(this).val();
					$.post('controllers/branchController.php', {action: 'getBranchByID', br_id: br_id}, function (e) {
						$.each(e, function (index, qdt) {
							$('#br_id').val(qdt.br_id);
							$('#br_name').val(qdt.br_name);
							cmbProvince(qdt.prov_id);
							cmbZonal(qdt.prov_id,qdt.br_zone);
						});
					}, "json");
				});

				$('.btn_delete').click(function () {
					var br_id = $(this).val();
					swal({
						title: "Are you sure?",
						text: "Do you want to delete this branch ?",
						type: "warning",
						showCancelButton: true,
						confirmButtonClass: "btn-danger",
						cancelButtonClass: "btn-light",
						confirmButtonText: "Yes, delete it!",
						closeOnConfirm: false
					}, function () {
						$.post('controllers/branchController.php', {action: 'deleteBranch', br_id: br_id}, function (e) {
							if (parseInt(e.msgType) == 1) {
								swal("Good Job!", e.msg, "success");
								clearBranch();
								tblBranch(br_zone);
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

		function saveDivision() {
			var br_zone = $('.cmbZonal').val();
			var br_name = $('#br_name').val();
			var postdata = {
				action: "saveBranch",
				br_name: br_name,
				br_zone: br_zone
			}
			$.post('controllers/branchController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good job!", e.msg, "success");
					clearBranch();
					tblBranch(br_zone);
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function editDivision() {
			var br_id = $('#br_id').val();
			var br_zone = $('.cmbZonal').val();
			var br_name = $('#br_name').val();
			var postdata = {
				action: "editBranch",
				br_id: br_id,
				br_name: br_name,
				br_zone: br_zone
			}
			$.post('controllers/branchController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good job!", e.msg, "success");
					clearBranch();
					tblBranch(br_zone);
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function clearBranch() {
			$('#br_id').val('');
			$('#br_name').val('');
			$('#btn_save').prop('hidden', false);
			$('#btn_edit').prop('hidden', true);
			$('#branchform').removeClass('was-validated');
		}

		$(document).ready(function () {
			// Executes when the HTML document is loaded and the DOM is ready
			cmbProvince(false, function () {
				var inst_province = $('.cmbProvince').val();
				cmbZonal(inst_province, false, function () {
					var br_zone = $('.cmbZonal').val();
					tblBranch(br_zone);
				});
			});

			$('.cmbProvince').change(function () {
				var inst_province = $(this).val();
				cmbZonal(inst_province, false, function () {
					var br_zone = $('.cmbZonal').val();
					tblBranch(br_zone);
				});
			});

			cmbZonal(false, function () {
				var br_zone = $('.cmbZonal').val();
				tblBranch(br_zone);
			});


			$('.cmbZonal').change(function () {
				var br_zone = $(this).val();
				tblBranch(br_zone);
			});

			const form = $('#branchform');

			$('#btn_save').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					saveDivision();
				}
			});

			$('#btn_edit').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					editDivision();
				}
			});

			$('#btn_clear').click(function (event) {
				form.submit(false);
				clearBranch();
			});


		});
    </script>
</body>
</html>