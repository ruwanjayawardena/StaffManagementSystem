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
                        <h4 class="text-uppercase admin-page-heading"><i class="fas fa-map-marked-alt"></i> District  &nbsp;&nbsp;<button class="btn btn-light d-print-none" onclick="window.history.back(-1)"><i class="fas fa-chevron-circle-left"></i>&nbsp;Back</button></h4>                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-sm-6 pb-4">
                        <form id="districtform" novalidate>
                            <input type="hidden" class="form-control" id="dtr_id">                           
                            <div class="form-group">
                                <label for="dtr_name">District</label>
                                <input type="text" class="form-control" id="dtr_name" placeholder="District" autocomplete="off" required>
                                <div class="valid-feedback">
                                    <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                </div>
                                <div class="invalid-feedback">
                                    <i class="fas fa-lg fa-exclamation-circle"></i> Please enter district
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
                            <table id="tblDistrict" class="table table-bordered table-hover" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>                                                       

                                        <th></th>                                
                                        <th></th>                                
                                        <th>District</th>                                        
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
		function tblDistrict(callback) {
			var tbldata = "";
			$.post('controllers/districtController.php', {action: 'getAllDistrict'}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					tbldata += '<tr>';
					tbldata += '<td colspan="3" class="bg-danger text-center"> -- District not available -- </td>';
					tbldata += '</tr>';
					$('#tblDistrict tbody').html('').append(tbldata);
				} else {
					$.each(e, function (index, qdt) {
						index++;
						tbldata += '<tr>';
						tbldata += '<td>';
						tbldata += '<div class="btn-group btn-group-sm">';
						tbldata += '<button class="btn btn-info btn_select" value="' + qdt.dtr_id + '"><i class="fas fa-edit"></i></button>';
						tbldata += '<button class="btn btn-danger btn_delete" value="' + qdt.dtr_id + '"><i class="fas fa-trash-alt"></i></button>';
						tbldata += '</div>';
						tbldata += '</td>';
						tbldata += '<td></td>';
						tbldata += '<td>' + qdt.dtr_name + '</td>';
						tbldata += '</tr>';
					});


					if ($.fn.DataTable.isDataTable('#tblDistrict')) {
						//re initialize 
						$('#tblDistrict').DataTable().destroy();
						$('#tblDistrict tbody').empty();
						$('#tblDistrict tbody').html('').append(tbldata);
						$('#tblDistrict').DataTable({
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
						$('#tblDistrict tbody').html('').append(tbldata);
						$('#tblDistrict').DataTable({
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
					var dtr_id = $(this).val();
					$.post('controllers/districtController.php', {action: 'getDistrictByID', dtr_id: dtr_id}, function (e) {
						$.each(e, function (index, qdt) {
							$('#dtr_id').val(qdt.dtr_id);
							$('#dtr_name').val(qdt.dtr_name);
						});
					}, "json");
				});

				$('.btn_delete').click(function () {
					var dtr_id = $(this).val();
					swal({
						title: "Are you sure?",
						text: "Do you want to delete this district ?",
						type: "warning",
						showCancelButton: true,
						confirmButtonClass: "btn-danger",
						cancelButtonClass: "btn-light",
						confirmButtonText: "Yes, delete it!",
						closeOnConfirm: false
					}, function () {
						$.post('controllers/districtController.php', {action: 'deleteDistrict', dtr_id: dtr_id}, function (e) {
							if (parseInt(e.msgType) == 1) {
								swal("Good Job!", e.msg, "success");
								clearDistrict();
								tblDistrict();
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

		function saveDistrict() {
			var dtr_name = $('#dtr_name').val();
			var postdata = {
				action: "saveDistrict",
				dtr_name: dtr_name
			}
			$.post('controllers/districtController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good job!", e.msg, "success");
					clearDistrict();
					tblDistrict();
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function editDistrict() {
			var dtr_id = $('#dtr_id').val();
			var dtr_name = $('#dtr_name').val();
			var postdata = {
				action: "editDistrict",
				dtr_id: dtr_id,
				dtr_name: dtr_name
			}
			$.post('controllers/districtController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good job!", e.msg, "success");
					clearDistrict();
					tblDistrict();
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function clearDistrict() {
			$('#dtr_id').val('');
			$('#dtr_name').val('');
			$('#btn_save').prop('hidden', false);
			$('#btn_edit').prop('hidden', true);
			$('#districtform').removeClass('was-validated');
		}

		$(document).ready(function () {
			// Executes when the HTML document is loaded and the DOM is ready
			tblDistrict();			

			const form = $('#districtform');

			$('#btn_save').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					saveDistrict();
				}
			});

			$('#btn_edit').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					editDistrict();
				}
			});

			$('#btn_clear').click(function (event) {
				form.submit(false);
				clearDistrict();
			});


		});
    </script>
</body>
</html>