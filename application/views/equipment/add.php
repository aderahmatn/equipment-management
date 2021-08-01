<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">Master Equipment</h4>
			<span class="text-muted mt-1 tx-13 ml-2 mb-0">/ Add Equipment Data</span>
		</div>
	</div>
	<div class="d-flex my-xl-auto right-content">
		<div class="pr-1 mb-3 mb-xl-0">
			<button type="button" class="btn btn-warning  btn-icon mr-2" onclick="location.reload()"><i class="mdi mdi-refresh"></i></button>
		</div>
		<div class="pr-1 mb-3 mb-xl-0">
			<a href="<?= base_url('equipment') ?>" type="button" class="btn btn-primary  mr-2">Kembali</a>
		</div>

	</div>
</div>
<!-- breadcrumb -->
<div class="row">
	<div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
		<div class="card  box-shadow-0">
			<div class="card-header">
				<h4 class="card-title mb-1">Add Equipment Data</h4>
				<p class="mb-2">Please fill the form for insert data</p>
			</div>
			<div class="card-body">
				<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label for="machine_code">Machine Code</label>
						<input type="text" id='machine_code' class="form-control <?= form_error('machine_code') ? 'is-invalid' : '' ?>" name="machine_code" placeholder="Machine Code" value="<?= $this->input->post('machine_code'); ?>">
						<div class="invalid-feedback">
							<?= form_error('machine_code'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="equipment_name">Equipment Name</label>
						<input type="text" id='equipment_name' class="form-control <?= form_error('equipment_name') ? 'is-invalid' : '' ?>" name="equipment_name" placeholder="Equipment Name" value="<?= $this->input->post('equipment_name'); ?>">
						<div class="invalid-feedback">
							<?= form_error('equipment_name'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="machine_purchase_date">Machine Purchase Date :</label>
						<input type="date" id='machine_purchase_date' class="form-control <?= form_error('machine_purchase_date') ? 'is-invalid' : '' ?>" name="machine_purchase_date" placeholder="Machine Purchase Date" value="<?= $this->input->post('machine_purchase_date'); ?>">
						<div class="invalid-feedback">
							<?= form_error('machine_purchase_date'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="machine_enter_line">Machine Enter Line</label>
						<input type="date" id='machine_enter_line' class="form-control <?= form_error('machine_enter_line') ? 'is-invalid' : '' ?>" name="machine_enter_line" placeholder="Machine Enter Line" value="<?= $this->input->post('machine_enter_line'); ?>">
						<div class="invalid-feedback">
							<?= form_error('machine_enter_line'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="line">Line</label>
						<input type="text" id='line' class="form-control <?= form_error('line') ? 'is-invalid' : '' ?>" name="line" placeholder="Line" value="<?= $this->input->post('line'); ?>">
						<div class="invalid-feedback">
							<?= form_error('line'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="qty">Qty</label>
						<input type="number" id='qty' class="form-control <?= form_error('qty') ? 'is-invalid' : '' ?>" name="qty" placeholder="Qty" value="<?= $this->input->post('qty'); ?>" autocomplete="off" min="1">
						<div class="invalid-feedback">
							<?= form_error('qty'); ?>
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