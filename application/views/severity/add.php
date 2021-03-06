<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">Master Severity</h4>
			<span class="text-muted mt-1 tx-13 ml-2 mb-0">/ Add Severity Data</span>
		</div>
	</div>
	<div class="d-flex my-xl-auto right-content">
		<div class="pr-1 mb-3 mb-xl-0">
			<button type="button" class="btn btn-warning  btn-icon mr-2" onclick="location.reload()"><i class="mdi mdi-refresh"></i></button>
		</div>
		<div class="pr-1 mb-3 mb-xl-0">
			<a href="<?= base_url('severity') ?>" type="button" class="btn btn-primary  mr-2">Back</a>
		</div>

	</div>
</div>
<!-- breadcrumb -->
<div class="row">
	<div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
		<div class="card  box-shadow-0">
			<div class="card-header">
				<h4 class="card-title mb-1">Add Severity Data</h4>
				<p class="mb-2">Please fill the form for insert data</p>
			</div>
			<div class="card-body">
				<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label for="severity_type">Severity Type</label>
						<input type="text" id='severity_type' class="form-control <?= form_error('severity_type') ? 'is-invalid' : '' ?>" name="severity_type" placeholder="Severity Type" value="<?= $this->input->post('severity_type'); ?>">
						<div class="invalid-feedback">
							<?= form_error('severity_type'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="severity_effect">Severity Effect</label>
						<input type="text" id='severity_effect' class="form-control <?= form_error('severity_effect') ? 'is-invalid' : '' ?>" name="severity_effect" placeholder="Severity Effect" value="<?= $this->input->post('severity_effect'); ?>">
						<div class="invalid-feedback">
							<?= form_error('severity_effect'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="severity_value">Severity Value</label>
						<input type="number" id='severity_value' class="form-control <?= form_error('severity_value') ? 'is-invalid' : '' ?>" name="severity_value" placeholder="Severity Value" value="<?= $this->input->post('severity_value'); ?>" min='1'>
						<div class="invalid-feedback">
							<?= form_error('severity_value'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="rangkings">Rangkings</label>
						<input type="number" id='rangkings' class="form-control <?= form_error('rangkings') ? 'is-invalid' : '' ?>" name="rangkings" placeholder="Rangkings" value="<?= $this->input->post('rangkings'); ?>" min='1'>
						<div class="invalid-feedback">
							<?= form_error('rangkings'); ?>
						</div>
					</div>
					<div class="form-group mb-0 mt-3 justify-content-end">
						<div>
							<button type="submit" class="btn btn-primary">Submit</button>
							<button type="reset" class="btn btn-secondary">Reset</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>