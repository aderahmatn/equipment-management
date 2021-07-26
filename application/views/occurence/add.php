<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">Master Occurence</h4>
			<span class="text-muted mt-1 tx-13 ml-2 mb-0">/ Add Occurence Data</span>
		</div>
	</div>
	<div class="d-flex my-xl-auto right-content">
		<div class="pr-1 mb-3 mb-xl-0">
			<button type="button" class="btn btn-warning  btn-icon mr-2" onclick="location.reload()"><i class="mdi mdi-refresh"></i></button>
		</div>
		<div class="pr-1 mb-3 mb-xl-0">
			<a href="<?= base_url('occurence') ?>" type="button" class="btn btn-primary  mr-2">Kembali</a>
		</div>

	</div>
</div>
<!-- breadcrumb -->
<div class="row">
	<div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
		<div class="card  box-shadow-0">
			<div class="card-header">
				<h4 class="card-title mb-1">Add Occurence Data</h4>
				<p class="mb-2">Please fill the form for insert data</p>
			</div>
			<div class="card-body">
				<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label for="occurence_type">Occurence Type</label>
						<input type="text" id='occurence_type' class="form-control <?= form_error('occurence_type') ? 'is-invalid' : '' ?>" name="occurence_type" placeholder="Occurence Type" value="<?= $this->input->post('occurence_type'); ?>">
						<div class="invalid-feedback">
							<?= form_error('occurence_type'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="probability_of_damage">Probability Of Damage</label>
						<input type="text" id='probability_of_damage' class="form-control <?= form_error('probability_of_damage') ? 'is-invalid' : '' ?>" name="probability_of_damage" placeholder="Probability Of Damage" value="<?= $this->input->post('probability_of_damage'); ?>">
						<div class="invalid-feedback">
							<?= form_error('probability_of_damage'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="occurence_value">Occurence Value</label>
						<input type="number" id='occurence_value' class="form-control <?= form_error('occurence_value') ? 'is-invalid' : '' ?>" name="occurence_value" placeholder="Occurence Value" value="<?= $this->input->post('occurence_value'); ?>" min='1'>
						<div class="invalid-feedback">
							<?= form_error('occurence_value'); ?>
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
							<a href="<?= base_url('occurence') ?>" class="btn btn-secondary">Cancel</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>