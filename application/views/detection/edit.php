<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">Master Detection</h4>
			<span class="text-muted mt-1 tx-13 ml-2 mb-0">/ Edit Detection Data</span>
		</div>
	</div>
	<div class="d-flex my-xl-auto right-content">
		<div class="pr-1 mb-3 mb-xl-0">
			<button type="button" class="btn btn-warning  btn-icon mr-2" onclick="location.reload()"><i class="mdi mdi-refresh"></i></button>
		</div>
		<div class="pr-1 mb-3 mb-xl-0">
			<a href="<?= base_url('detection') ?>" type="button" class="btn btn-primary  mr-2">Kembali</a>
		</div>

	</div>
</div>
<!-- breadcrumb -->
<div class="row">
	<div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
		<div class="card  box-shadow-0">
			<div class="card-header">
				<h4 class="card-title mb-1">Edit Detection Data</h4>
				<p class="mb-2">Please fill the form for update data</p>
			</div>
			<div class="card-body">
				<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
					<input type="hidden" name="id_master_detection" value="<?= $detection->id_master_detection ?>">
					<div class="form-group">
						<label for="detection_type">Detection_type Type</label>
						<input type="text" id='detection_type' class="form-control <?= form_error('detection_type') ? 'is-invalid' : '' ?>" name="detection_type" value="<?php echo ($this->input->post('detection_type') ? $this->input->post('detection_type') : $detection->detection_type); ?>">
						<div class="invalid-feedback">
							<?= form_error('detection_type'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="criteria">Criteria</label>
						<input type="text" id='criteria' class="form-control <?= form_error('criteria') ? 'is-invalid' : '' ?>" name="criteria" value="<?php echo ($this->input->post('criteria') ? $this->input->post('criteria') : $detection->criteria); ?>">
						<div class="invalid-feedback">
							<?= form_error('criteria'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="detection_value">Detection Value</label>
						<input type="number" id='detection_value' class="form-control <?= form_error('detection_value') ? 'is-invalid' : '' ?>" name="detection_value" value="<?php echo ($this->input->post('detection_value') ? $this->input->post('detection_value') : $detection->detection_value); ?>" min='1'>
						<div class="invalid-feedback">
							<?= form_error('detection_value'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="rangkings">Rangkings</label>
						<input type="number" id='rangkings' class="form-control <?= form_error('rangkings') ? 'is-invalid' : '' ?>" name="rangkings" value="<?php echo ($this->input->post('rangkings') ? $this->input->post('rangkings') : $detection->rangkings); ?>" min='1'>
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