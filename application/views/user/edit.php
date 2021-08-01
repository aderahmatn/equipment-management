<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">Master User</h4>
			<span class="text-muted mt-1 tx-13 ml-2 mb-0">/ Edit User Data</span>
		</div>
	</div>
	<div class="d-flex my-xl-auto right-content">
		<div class="pr-1 mb-3 mb-xl-0">
			<button type="button" class="btn btn-warning  btn-icon mr-2" onclick="location.reload()"><i class="mdi mdi-refresh"></i></button>
		</div>
		<div class="pr-1 mb-3 mb-xl-0">
			<a href="<?= base_url('user') ?>" type="button" class="btn btn-primary  mr-2">Back</a>
		</div>

	</div>
</div>
<!-- breadcrumb -->
<div class="row">
	<div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
		<div class="card  box-shadow-0">
			<div class="card-header">
				<h4 class="card-title mb-1">Edit User Data</h4>
				<p class="mb-2">Please fill the form for update user data</p>
			</div>
			<div class="card-body pt-0">
				<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label for="nik">NIK</label>
						<input type="text" id='nik' class="form-control <?= form_error('nik') ? 'is-invalid' : '' ?>" name="nik" placeholder="NIK" value="<?php echo ($this->input->post('nik') ? $this->input->post('nik') : $user['nik']); ?>">
						<div class="invalid-feedback">
							<?= form_error('nik'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="full_name">Full Name</label>
						<input type="text" id='full_name' class="form-control <?= form_error('full_name') ? 'is-invalid' : '' ?>" name="full_name" placeholder="Full Name" value="<?php echo ($this->input->post('full_name') ? $this->input->post('full_name') : $user['full_name']); ?>">
						<div class="invalid-feedback">
							<?= form_error('full_name'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="division">Division</label>
						<select id='division' class="form-control <?= form_error('division') ? 'is-invalid' : '' ?>" name="division" placeholder="Division">
							<option value="" hidden selected> Choose Division</option>
							<option value="manager" <?= $user['division'] == 'manager' ? 'selected' : '' ?>> MANAGER</option>
							<option value="admin" <?= $user['division'] == 'admin' ? 'selected' : '' ?>> ADMIN</option>
							<option value="user" <?= $user['division'] == 'user' ? 'selected' : '' ?>> USER</option>
							<option value="technician" <?= $user['division'] == 'technician' ? 'selected' : '' ?>> TECHNICIAN</option>
						</select>
						<div class="invalid-feedback">
							<?= form_error('division'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="dept_code">Departement Code</label>
						<input type="text" id='dept_code' class="form-control <?= form_error('dept_code') ? 'is-invalid' : '' ?>" name="dept_code" placeholder="Departement Code" value="<?php echo ($this->input->post('dept_code') ? $this->input->post('dept_code') : $user['dept_code']); ?>">
						<div class="invalid-feedback">
							<?= form_error('dept_code'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="position">Position</label>
						<input type="text" id='position' class="form-control <?= form_error('position') ? 'is-invalid' : '' ?>" name="position" placeholder="Position" value="<?php echo ($this->input->post('position') ? $this->input->post('position') : $user['position']); ?>">
						<div class="invalid-feedback">
							<?= form_error('position'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="first_work">First Work</label>
						<input type="date" id='first_work' class="form-control <?= form_error('first_work') ? 'is-invalid' : '' ?>" name="first_work" placeholder="First Work" value="<?php echo ($this->input->post('first_work') ? $this->input->post('first_work') : $user['first_work']); ?>">
						<div class="invalid-feedback">
							<?= form_error('first_work'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" id='email' class="form-control <?= form_error('email') ? 'is-invalid' : '' ?>" name="email" placeholder="First Work" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $user['email']); ?>">
						<div class="invalid-feedback">
							<?= form_error('email'); ?>
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