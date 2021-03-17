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
                        <h4 class="text-uppercase admin-page-heading"><i class="fas fa-search"></i> Find Staff Member &nbsp;&nbsp;<button class="btn btn-light d-print-none" onclick="window.history.back(-1)"><i class="fas fa-chevron-circle-left"></i>&nbsp;Back</button></h4>                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-4 pb-4 bg-light">
                        <form id="findstaffform" novalidate>
							<div class="col">
								<div class="form-group">
									<label for="stf_nic">NIC</label>
									<input type="text" class="form-control" id="stf_nic" placeholder="Enter NIC here" autocomplete="off" required>
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
									<button class="btn btn-dark btn-block" id="btn_find"><i class="fas fa-search-plus"></i> Find</button>
								</div>
							</div>
                        </form>
						<hr>
						<div class="table-responsive">
                            <table id="tblFindStaff" class="table table-bordered table-hover" style="width:100%">
								<thead class="thead-dark">
                                    <tr>                                                       

                                        <th></th>                                
                                        <th></th>
										<th>Search Result</th>                                       



									</tr>									
                                </thead>
								<tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col">
                        <iframe  id="iframe_serviceupdate" height="800px" width="100%"></iframe>
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
		function tblFindStaff(callback) {
			$("#iframe_serviceupdate").attr("src", "");
			var stf_nic = $('#stf_nic').val();
			var tbldata = "";
			$.post('controllers/staffController.php', {action: 'findStaffByNIC', stf_nic: stf_nic}, function (e) {
				if (e === undefined || e.length === 0 || e === null) {
					tbldata += '<tr>';
					tbldata += '<td colspan="3" class="bg-danger text-center"> -- Not available -- </td>';
					tbldata += '</tr>';
					$('#tblFindStaff tbody').html('').append(tbldata);
				} else {
					$.each(e, function (index, qdt) {
						index++;
						tbldata += '<tr>';
						tbldata += '<td>';
						tbldata += '<button class="btn btn-primary btn_select" value="' + qdt.stf_id + '"><i class="fas fa-edit"></i> </button>';


						tbldata += '</td>';
						tbldata += '<td></td>';
						tbldata += '<td><strong>' + qdt.stf_name_initial + '</strong><br>(' + qdt.stf_nic + ') ' + qdt.stf_gender + '</td>';
						tbldata += '</tr>';
					});


					if ($.fn.DataTable.isDataTable('#tblFindStaff')) {
						//re initialize 
						$('#tblFindStaff').DataTable().destroy();
						$('#tblFindStaff tbody').empty();
						$('#tblFindStaff tbody').html('').append(tbldata);
						$('#tblFindStaff').DataTable({
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
						$('#tblFindStaff tbody').html('').append(tbldata);
						$('#tblFindStaff').DataTable({
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
					var stf_id = $(this).val();					
					$("#iframe_serviceupdate").attr("src", "iframe_staffservice.php?stf_id=" + stf_id);
				});


				if (callback !== undefined) {
					if (typeof callback === 'function') {
						callback();
					}
				}
			}, "json");
		}




		$(document).ready(function () {
			// Executes when the HTML document is loaded and the DOM is ready	



			const form = $('#findstaffform');

			$('#btn_find').click(function (event) {
				form.submit(false);
				form.addClass('was-validated');
				if (form[0].checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				} else {
					tblFindStaff();
				}
			});




		});
    </script>
</body>
</html>