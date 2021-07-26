<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">Master Main Process</h4>
			<span class="text-muted mt-1 tx-13 ml-2 mb-0">/ Edit Main Process Data</span>
		</div>
	</div>
	<div class="d-flex my-xl-auto right-content">
		<div class="pr-1 mb-3 mb-xl-0">
			<button type="button" class="btn btn-warning  btn-icon mr-2" onclick="location.reload()"><i class="mdi mdi-refresh"></i></button>
		</div>
		<div class="pr-1 mb-3 mb-xl-0">
			<a href="<?= base_url('main_proces') ?>" type="button" class="btn btn-primary  mr-2">Kembali</a>
		</div>

	</div>
</div>
<!-- breadcrumb -->
<div class="row">
	<div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
		<div class="card  box-shadow-0">
			<div class="card-header">
				<h4 class="card-title mb-1">Edit Main Process Data</h4>
				<p class="mb-2">Please fill the form for update data</p>
			</div>
			<div class="card-body">
				<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
					<input type="hidden" name="id_master_main_process" value="<?= $main_process->id_master_main_process ?>">
					<div class="form-group">
						<label for="main_process_code">Main Process Code</label>
						<input type="text" id='main_process_code' class="form-control <?= form_error('main_process_code') ? 'is-invalid' : '' ?>" name="main_process_code" placeholder="Main Process Code" value="<?php echo ($this->input->post('main_process_code') ? $this->input->post('main_process_code') : $main_process->main_process_code); ?>">
						<div class="invalid-feedback">
							<?= form_error('main_process_code'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="main_process">Main Process</label>
						<input type="text" id='main_process' class="form-control <?= form_error('main_process') ? 'is-invalid' : '' ?>" name="main_process" placeholder="Main Process" value="<?php echo ($this->input->post('main_process') ? $this->input->post('main_process') : $main_process->main_process); ?>">
						<div class="invalid-feedback">
							<?= form_error('main_process'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="max_capacity_daily">Maximum Capacity Daily</label>
						<input type="number" id='max_capacity_daily' class="form-control <?= form_error('max_capacity_daily') ? 'is-invalid' : '' ?>" name="max_capacity_daily" placeholder="Main Process" value="<?php echo ($this->input->post('max_capacity_daily') ? $this->input->post('max_capacity_daily') : $main_process->max_capacity_daily); ?>" min='1'>
						<div class="invalid-feedback">
							<?= form_error('max_capacity_daily'); ?>
						</div>
					</div>
					<div class="form-group mb-0 mt-3 justify-content-end">
						<div>
							<button type="submit" class="btn btn-primary">Submit</button>
							<a href="<?= base_url('main_proces') ?>" class="btn btn-secondary">Cancel</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>