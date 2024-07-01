<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<script type="text/javascript" id="debugbar_dynamic_script"></script>
	<style type="text/css" id="debugbar_dynamic_style"></style>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Smarthr - Codeigniter Admin Template">
	<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
	<meta name="author" content="Dreamguys - Codeigniter Admin Template">
	<meta name="robots" content="noindex, nofollow">
	<title> CRM Berakha</title>


	<link rel="shortcut icon" type="image/x-icon" href="../public/img/favicon.png">

	<link rel="stylesheet" href="../public/css/bootstrap.min.css">
	<link rel="stylesheet" href="../public/css/font-awesome.min.css">
	<link rel="stylesheet" href="../public/css/line-awesome.min.css">
	<link rel="stylesheet" href="../public/plugins/alertify/alertify.min.css">
	<link rel="stylesheet" href="../public/plugins/lightbox/glightbox.min.css">
	<link rel="stylesheet" href="../public/plugins/c3-chart/c3.min.css">
	<link rel="stylesheet" href="../public/plugins//toastr/toatr.css">
	<link rel="stylesheet" href="../public/css/select2.min.css">
	<link rel="stylesheet" href="../public/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" href="../public/css/fullcalendar.min.css">
	<link rel="stylesheet" href="../public/plugins/summernote/dist/summernote-bs4.css">
	<link rel="stylesheet" href="../public/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="../public/css/style.css">

</head>

<body>
	<div class="main-wrapper">
	<?php include 'partials/top.php'; ?>
		<?php include 'partials/left.php'; ?>
		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title">Caisse</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
								<li class="breadcrumb-item active">Caisse</li>
							</ul>
						</div>
						<div class="col-auto float-end ms-auto">
							<a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_salary"><i class="fa fa-plus"></i> Add </a>
						</div>
					</div>
				</div>


				

				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table datatable">
								<thead>
									<tr>
										<th>Employee</th>
										<th>Employee ID</th>
										<th>Email</th>
										<th>Join Date</th>
										<th>Role</th>
										<th>Salary</th>
										<th>Payslip</th>
										<th class="text-end">Action</th>
									</tr>
								</thead>
								<tbody>


									<tr>
										<td>
											<h2 class="table-avatar">
												<a href="profile" class="avatar"><img src="../public/img/profiles/avatar-03.jpg" alt=""></a>
												<a href="profile">Tarah Shropshire <span>Android Developer</span></a>
											</h2>
										</td>
										<td>FT-0011</td>
										<td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="9aeefbe8fbf2e9f2e8f5eae9f2f3e8ffdaffe2fbf7eaf6ffb4f9f5f7">[email&#160;protected]</a>
										</td>
										<td>1 Jan 2013</td>
										<td>
											<div class="dropdown">
												<a href="" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Android Developer
												</a>
												<div class="dropdown-menu">
													<a class="dropdown-item" href="#">Software Engineer</a>
													<a class="dropdown-item" href="#">Software Tester</a>
													<a class="dropdown-item" href="#">Frontend Developer</a>
													<a class="dropdown-item" href="#">UI/UX Developer</a>
												</div>
											</div>
										</td>
										<td>$92400</td>
										<td><a class="btn btn-sm btn-primary" href="salary_view">Generate Slip</a></td>
										<td class="text-end">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_salary"><i class="fa fa-pencil m-r-5"></i>
														Edit</a>
													<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_salary"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>


			<div id="add_salary" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add Staff Salary</h5>
							<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Select Staff</label>
											<select class="select">
												<option>John Doe</option>
												<option>Richard Miles</option>
											</select>
										</div>
									</div>
									<div class="col-sm-6">
										<label>Net Salary</label>
										<input class="form-control" type="text">
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<h4 class="text-primary">Earnings</h4>
										<div class="form-group">
											<label>Basic</label>
											<input class="form-control" type="text">
										</div>
										<div class="form-group">
											<label>DA(40%)</label>
											<input class="form-control" type="text">
										</div>
										<div class="form-group">
											<label>HRA(15%)</label>
											<input class="form-control" type="text">
										</div>
										<div class="form-group">
											<label>Conveyance</label>
											<input class="form-control" type="text">
										</div>
										<div class="form-group">
											<label>Allowance</label>
											<input class="form-control" type="text">
										</div>
										<div class="form-group">
											<label>Medical Allowance</label>
											<input class="form-control" type="text">
										</div>
										<div class="form-group">
											<label>Others</label>
											<input class="form-control" type="text">
										</div>
										<div class="add-more">
											<a href="#"><i class="fa fa-plus-circle"></i> Add More</a>
										</div>
									</div>
									<div class="col-sm-6">
										<h4 class="text-primary">Deductions</h4>
										<div class="form-group">
											<label>TDS</label>
											<input class="form-control" type="text">
										</div>
										<div class="form-group">
											<label>ESI</label>
											<input class="form-control" type="text">
										</div>
										<div class="form-group">
											<label>PF</label>
											<input class="form-control" type="text">
										</div>
										<div class="form-group">
											<label>Leave</label>
											<input class="form-control" type="text">
										</div>
										<div class="form-group">
											<label>Prof. Tax</label>
											<input class="form-control" type="text">
										</div>
										<div class="form-group">
											<label>Labour Welfare</label>
											<input class="form-control" type="text">
										</div>
										<div class="form-group">
											<label>Others</label>
											<input class="form-control" type="text">
										</div>
										<div class="add-more">
											<a href="#"><i class="fa fa-plus-circle"></i> Add More</a>
										</div>
									</div>
								</div>
								<div class="submit-section">
									<button class="btn btn-primary submit-btn">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>


			<div id="edit_salary" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered modal-md" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Edit Staff Salary</h5>
							<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Select Staff</label>
											<select class="select">
												<option>John Doe</option>
												<option>Richard Miles</option>
											</select>
										</div>
									</div>
									<div class="col-sm-6">
										<label>Net Salary</label>
										<input class="form-control" type="text" value="$4000">
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<h4 class="text-primary">Earnings</h4>
										<div class="form-group">
											<label>Basic</label>
											<input class="form-control" type="text" value="$6500">
										</div>
										<div class="form-group">
											<label>DA(40%)</label>
											<input class="form-control" type="text" value="$2000">
										</div>
										<div class="form-group">
											<label>HRA(15%)</label>
											<input class="form-control" type="text" value="$700">
										</div>
										<div class="form-group">
											<label>Conveyance</label>
											<input class="form-control" type="text" value="$70">
										</div>
										<div class="form-group">
											<label>Allowance</label>
											<input class="form-control" type="text" value="$30">
										</div>
										<div class="form-group">
											<label>Medical Allowance</label>
											<input class="form-control" type="text" value="$20">
										</div>
										<div class="form-group">
											<label>Others</label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-sm-6">
										<h4 class="text-primary">Deductions</h4>
										<div class="form-group">
											<label>TDS</label>
											<input class="form-control" type="text" value="$300">
										</div>
										<div class="form-group">
											<label>ESI</label>
											<input class="form-control" type="text" value="$20">
										</div>
										<div class="form-group">
											<label>PF</label>
											<input class="form-control" type="text" value="$20">
										</div>
										<div class="form-group">
											<label>Leave</label>
											<input class="form-control" type="text" value="$250">
										</div>
										<div class="form-group">
											<label>Prof. Tax</label>
											<input class="form-control" type="text" value="$110">
										</div>
										<div class="form-group">
											<label>Labour Welfare</label>
											<input class="form-control" type="text" value="$10">
										</div>
										<div class="form-group">
											<label>Fund</label>
											<input class="form-control" type="text" value="$40">
										</div>
										<div class="form-group">
											<label>Others</label>
											<input class="form-control" type="text" value="$15">
										</div>
									</div>
								</div>
								<div class="submit-section">
									<button class="btn btn-primary submit-btn">Save</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>


			<div class="modal custom-modal fade" id="delete_salary" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body">
							<div class="form-header">
								<h3>Delete Salary</h3>
								<p>Are you sure want to delete?</p>
							</div>
							<div class="modal-btn delete-action">
								<div class="row">
									<div class="col-6">
										<a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
									</div>
									<div class="col-6">
										<a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>




	<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="../public/js/jquery-3.6.0.min.js"></script>

	<script src="../public/js/bootstrap.bundle.min.js">
	</script>

	<script src="../public/js/jquery.slimscroll.min.js">
	</script>

	<script src="../public/js/select2.min.js"></script>

	<script src="../public/js/moment.min.js"></script>
	<script src="../public/js/bootstrap-datetimepicker.min.js">
	</script>

	<script src="../public/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js">
	</script>

	<script src="../public/js/jquery-ui.min.js"></script>
	<script src="../public/js/fullcalendar.min.js"></script>
	<script src="../public/js/jquery.fullcalendar.js"></script>

	<script src="../public/js/jquery.dataTables.min.js">
	</script>
	<script src="../public/js/dataTables.bootstrap4.min.js">
	</script>

	<script src="../public/js/validation.init.js"></script>

	<script src="../public/js/app.js"></script>

	<div class="modal right fade settings" id="settings" role="dialog" aria-modal="true">
		<div class="toggle-close">
			<div class="toggle" data-bs-toggle="modal" data-bs-target="#settings"><i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
			</div>
		</div>
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body p-0">
					<div class="scroll">
						<div>
							<ul class="list-group">
								<li class="list-group-item border-0">
									<div class="theme-settings-swatches">
										<div class="themes">
											<div class="themes-body">
												<ul id="theme-change" class="theme-colors border-0 list-inline-item list-unstyled mb-0">
													<li class="list-inline-item"><span class="theme-solid-black bg-orange" onclick="toggleTheme('style')"></span></li>
													<li class="list-inline-item"><span class="theme-solid-black bg-blue" onclick="toggleTheme('style-blue')"></span></li>
													<li class="list-inline-item"><span class="theme-solid-black bg-dark" onclick="toggleTheme('style-dark')"></span></li>
													<li class="list-inline-item"><span class="theme-solid-black bg-light" onclick="toggleTheme('style-light')"></span></li>
													<li class="list-inline-item"><span class="theme-solid-black bg-maroon" onclick="toggleTheme('style-maroon')"></span></li>
													<li class="list-inline-item"><span class="theme-solid-black bg-purple" onclick="toggleTheme('style-purple')"></span></li>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="sidebar-contact">
		<div class="toggle" data-bs-toggle="modal" data-bs-target="#settings"><i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i></div>
	</div>
	<div id="themesettings">
	</div>

</body>

</html>