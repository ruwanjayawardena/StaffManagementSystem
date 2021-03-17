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
                        <h4 class="text-uppercase admin-page-heading"><i class="fas fa-map-marked-alt"></i> DS Offices  &nbsp;&nbsp;<button class="btn btn-light d-print-none" onclick="window.history.back(-1);"><i class="fas fa-chevron-circle-left"></i>&nbsp;Back</button></h4>                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-sm-6 pb-4">
                        <form id="branchform" novalidate>
                            <input type="hidden" class="form-control" id="dsof_id">                           
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
                            <div class="form-group">
                                <label for="dsof_name">DS Office</label>
                                <input type="text" class="form-control" id="dsof_name" placeholder="DS Office" autocomplete="off" required>
                                <div class="valid-feedback">
                                    <i class="fas fa-lg fa-check-circle"></i> Looks good! 
                                </div>
                                <div class="invalid-feedback">
                                    <i class="fas fa-lg fa-exclamation-circle"></i> Please enter DS Office
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
                            <table id="tblDSOffice" class="table table-bordered table-hover" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>                                                       

                                        <th></th>                                
                                        <th></th>                                
                                        <th>DS Office</th>                                        
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
		function tblDSOffice(dsof_district, callback) {
			var tbldata = "";
			$.post('controllers/dsofficeController.php', {action: 'getAllDSOffice', dsof_district: dsof_district}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					tbldata += '<tr>';
					tbldata += '<td colspan="3" class="bg-danger text-center"> -- DS Offices not available -- </td>';
					tbldata += '</tr>';
					$('#tblDSOffice tbody').html('').append(tbldata);
				} else {
					$.each(e, function (index, qdt) {
						index++;
						tbldata += '<tr>';
						tbldata += '<td>';
						tbldata += '<div class="btn-group btn-group-sm">';
						tbldata += '<button class="btn btn-info btn_select" value="' + qdt.dsof_id + '"><i class="fas fa-edit"></i></button>';
						tbldata += '<button class="btn btn-danger btn_delete" value="' + qdt.dsof_id + '"><i class="fas fa-trash-alt"></i></button>';
						tbldata += '</div>';
						tbldata += '</td>';
						tbldata += '<td></td>';
						tbldata += '<td>' + qdt.dsof_name + '</td>';
						tbldata += '</tr>';
					});


					if ($.fn.DataTable.isDataTable('#tblDSOffice')) {
						//re initialize 
						$('#tblDSOffice').DataTable().destroy();
						$('#tblDSOffice tbody').empty();
						$('#tblDSOffice tbody').html('').append(tbldata);
						$('#tblDSOffice').DataTable({
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
						$('#tblDSOffice tbody').html('').append(tbldata);
						$('#tblDSOffice').DataTable({
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
					var dsof_id = $(this).val();
					$.post('controllers/dsofficeController.php', {action: 'getDSOfficeByID', dsof_id: dsof_id}, function (e) {
						$.each(e, function (index, qdt) {
							$('#dsof_id').val(qdt.dsof_id);
							$('#dsof_name').val(qdt.dsof_name);
						});
					}, "json");
				});

				$('.btn_delete').click(function () {
					var dsof_id = $(this).val();
					swal({
						title: "Are you sure?",
						text: "Do you want to delete this DS office ?",
						type: "warning",
						showCancelButton: true,
						confirmButtonClass: "btn-danger",
						cancelButtonClass: "btn-light",
						confirmButtonText: "Yes, delete it!",
						closeOnConfirm: false
					}, function () {
						$.post('controllers/dsofficeController.php', {action: 'deleteDSOffice', dsof_id: dsof_id}, function (e) {
							if (parseInt(e.msgType) == 1) {
								swal("Good Job!", e.msg, "success");
								clearDSOffice();
								tblDSOffice(dsof_district);
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
			var dsof_district = $('.cmbDistrict').val();
			var dsof_name = $('#dsof_name').val();
			var postdata = {
				action: "saveDSOffice",
				dsof_name: dsof_name,
				dsof_district: dsof_district
			}
			$.post('controllers/dsofficeController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good job!", e.msg, "success");
					clearDSOffice();
					tblDSOffice(dsof_district);
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function editDivision() {
			var dsof_id = $('#dsof_id').val();
			var dsof_district = $('.cmbDistrict').val();
			var dsof_name = $('#dsof_name').val();
			var postdata = {
				action: "editDSOffice",
				dsof_id: dsof_id,
				dsof_name: dsof_name,
				dsof_district: dsof_district
			}
			$.post('controllers/dsofficeController.php', postdata, function (e) {
				if (parseInt(e.msgType) == 1) {
					swal("Good job!", e.msg, "success");
					clearDSOffice();
					tblDSOffice(dsof_district);
				} else {
					swal("Alert !", e.msg, "error");
				}
			}, "json");
		}

		function clearDSOffice() {
			$('#dsof_id').val('');
			$('#dsof_name').val('');
			$('#btn_save').prop('hidden', false);
			$('#btn_edit').prop('hidden', true);
			$('#branchform').removeClass('was-validated');
		}

		$(document).ready(function () {
			// Executes when the HTML document is loaded and the DOM is ready
			cmbDistrict(false, function () {
				var dsof_district = $('.cmbDistrict').val();
				tblDSOffice(dsof_district);
			});
			

			$('.cmbDistrict').change(function () {
				var dsof_district = $(this).val();
				tblDSOffice(dsof_district);
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
				clearDSOffice();
			});


		});
    </script>
</body>
</html>