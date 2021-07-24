<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">Master Equipment</h4>
			<span class="text-muted mt-1 tx-13 ml-2 mb-0">/ Edit Equipment Data</span>
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
				<h4 class="card-title mb-1">Edit Equipment Data</h4>
				<p class="mb-2">Please fill the form for update data</p>
			</div>
			<div class="card-body">
				<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
					<input type="hidden" name="created_date" value="<?= $equipment['created_date'] ?>">
					<div class="form-group">
						<label for="machine_code">Machine Code</label>
						<input type="text" id='machine_code' class="form-control <?= form_error('machine_code') ? 'is-invalid' : '' ?>" name="machine_code" placeholder="Machine Code" value="<?php echo ($this->input->post('machine_code') ? $this->input->post('machine_code') : $equipment['machine_code']); ?>">
						<div class="invalid-feedback">
							<?= form_error('machine_code'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="equipment_name">Equipment Name</label>
						<input type="text" id='equipment_name' class="form-control <?= form_error('equipment_name') ? 'is-invalid' : '' ?>" name="equipment_name" placeholder="Equipment Name" value="<?php echo ($this->input->post('equipment_name') ? $this->input->post('equipment_name') : $equipment['equipment_name']); ?>">
						<div class="invalid-feedback">
							<?= form_error('equipment_name'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="machine_purchase_date">Machine Purchase Date :</label>
						<input type="date" id='machine_purchase_date' class="form-control <?= form_error('machine_purchase_date') ? 'is-invalid' : '' ?>" name="machine_purchase_date" placeholder="Machine Purchase Date" value="<?php echo ($this->input->post('machine_purchase_date') ? $this->input->post('machine_purchase_date') : $equipment['machine_purchase_date']); ?>">
						<div class="invalid-feedback">
							<?= form_error('machine_purchase_date'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="machine_enter_line">Machine Enter Line</label>
						<input type="date" id='machine_enter_line' class="form-control <?= form_error('machine_enter_line') ? 'is-invalid' : '' ?>" name="machine_enter_line" placeholder="Machine Enter Line" value="<?php echo ($this->input->post('machine_enter_line') ? $this->input->post('machine_enter_line') : $equipment['machine_enter_line']); ?>">
						<div class="invalid-feedback">
							<?= form_error('machine_enter_line'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="line">Line</label>
						<input type="text" id='line' class="form-control <?= form_error('line') ? 'is-invalid' : '' ?>" name="line" placeholder="Line" value="<?php echo ($this->input->post('line') ? $this->input->post('line') : $equipment['line']); ?>">
						<div class="invalid-feedback">
							<?= form_error('line'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="qty">Qty</label>
						<input type="number" id='qty' class="form-control <?= form_error('qty') ? 'is-invalid' : '' ?>" name="qty" placeholder="Qty" value="<?php echo ($this->input->post('qty') ? $this->input->post('qty') : $equipment['qty']); ?>" autocomplete="off" min="1">
						<div class="invalid-feedback">
							<?= form_error('qty'); ?>
						</div>
					</div>
					<div class="form-group mb-0 mt-3 justify-content-end">
						<div>
							<button type="submit" class="btn btn-primary">Submit</button>
							<a href="<?= base_url('equipment') ?>" class="btn btn-secondary">Cancel</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>