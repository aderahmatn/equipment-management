<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">Transaction Maintenance Machine</h4>
		</div>
	</div>
	<div class="d-flex my-xl-auto right-content">
		<div class="pr-1 mb-3 mb-xl-0">
			<button type="button" class="btn btn-warning  btn-icon mr-2" onclick="location.reload()"><i class="mdi mdi-refresh"></i></button>
		</div>
		<div class="pr-1 mb-3 mb-xl-0">

		</div>

	</div>
</div>
<!-- breadcrumb -->
<div class="row">
	<div class="col-md-12">
		<div class="card  box-shadow-0">
			<div class="card-header">
				<h4 class="card-title mb-1">Add Transaction Maintenance Machine Data</h4>
				<p class="mb-2">Please fill the form for insert data</p>
			</div>
			<div class="card-body">
				<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="machine_code">Machine Code</label>
								<input type="text" id='machine_code' class="form-control <?= form_error('machine_code') ? 'is-invalid' : '' ?>" name="machine_code" readonly>
								<div class="invalid-feedback">
									<?= form_error('machine_code'); ?>
								</div>
							</div>

						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="id_master_occurence">Occurence Type</label>
								<select id='id_master_occurence' class="form-control <?= form_error('id_master_occurence') ? 'is-invalid' : '' ?>" name="id_master_occurence">
									<option value="0" selected hidden>Pilih Occurence Type</option>
									<option value="0">None</option>
									<?php foreach ($occurence as $key) : ?>
										<option value="<?= $key->occurence_value ?>" <?= $this->input->post('id_master_occurence') == $key->id_master_occurence ? 'selected' : '' ?>><?= strtoupper($key->occurence_type) ?></option>
									<?php endforeach ?>
								</select>
								<div class="invalid-feedback">
									<?= form_error('id_master_occurence'); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="id_master_equipment">Equipment Name</label>
								<select id='id_master_equipment' class="form-control <?= form_error('id_master_equipment') ? 'is-invalid' : '' ?>" name="id_master_equipment" value="<?= $this->input->post('id_master_equipment'); ?>">
									<option value="" selected hidden>Pilih Equipment</option>
									<?php foreach ($equipment as $key) : ?>
										<option value="<?= $key['id_master_equipment'] ?>" <?= $this->input->post('id_master_equipment') == $key['id_master_equipment'] ? 'selected' : '' ?>><?= strtoupper($key['equipment_name']) ?></option>
									<?php endforeach ?>
								</select>
								<div class="invalid-feedback">
									<?= form_error('id_master_equipment'); ?>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="id_master_severity">Severity Type</label>
								<select id='id_master_severity' class="form-control <?= form_error('id_master_severity') ? 'is-invalid' : '' ?>" name="id_master_severity">
									<option value="0" selected hidden>Pilih Severity Type</option>
									<option value="0">None</option>
									<?php foreach ($severity as $key) : ?>
										<option value="<?= $key->severity_value ?>" <?= $this->input->post('id_master_severity') == $key->id_master_severity ? 'selected' : '' ?>><?= strtoupper($key->severity_type) ?></option>
									<?php endforeach ?>
								</select>
								<div class="invalid-feedback">
									<?= form_error('id_master_severity'); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="id_master_main_process">Machine Trouble</label>
								<select id='id_master_main_process' class="form-control <?= form_error('id_master_main_process') ? 'is-invalid' : '' ?>" name="id_master_main_process">
									<option value="" selected hidden>Pilih Machine Trouble</option>
								</select>
								<div class="invalid-feedback">
									<?= form_error('id_master_main_process'); ?>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="id_master_detection">Detection Type</label>
								<select id='id_master_detection' class="form-control <?= form_error('id_master_detection') ? 'is-invalid' : '' ?>" name="id_master_detection">
									<option value="0" selected hidden>Pilih Detection Type</option>
									<option value="0">None</option>
									<?php foreach ($detection as $key) : ?>
										<option value="<?= $key->detection_value ?>" <?= $this->input->post('id_master_detection') == $key->id_master_detection ? 'selected' : '' ?>><?= strtoupper($key->detection_type) ?></option>
									<?php endforeach ?>
								</select>
								<div class="invalid-feedback">
									<?= form_error('id_master_detection'); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="fmea_type">FMEA Type</label>
								<input type="text" id='fmea_type' class="form-control <?= form_error('fmea_type') ? 'is-invalid' : '' ?>" name="fmea_type">
								<div class="invalid-feedback" id="fmea_type">
									<?= form_error('fmea_type'); ?>
								</div>
							</div>
							<div class="form-group">
								<label for="date_maintenance_machine">Date Maintenance Machine</label>
								<input type="date" id='date_maintenance_machine' class="form-control <?= form_error('date_maintenance_machine') ? 'is-invalid' : '' ?>" name="date_maintenance_machine" min="<?= date('Y-m-d') ?>">
								<div class="invalid-feedback" id="date_maintenance_machine">
									<?= form_error('date_maintenance_machine'); ?>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="frpn_value">FRPN Value</label>
								<input type="text" id='frpn_value' class="form-control <?= form_error('frpn_value') ? 'is-invalid' : '' ?>" name="frpn_value" readonly>
								<div class="invalid-feedback" id="frpn_value">
									<?= form_error('frpn_value'); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group mb-0 mt-3 d-flex justify-content-end">
						<div>
							<button type="reset" class="btn btn-secondary">Reset</button>
							<button type="submit" class="btn btn-primary" name="btn-submit" id="btn-submit">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('#machine_code').val('pilih equipment');
		$('#line').val('pilih equipment');
		$('#max_capacity_daily').val('pilih main process');
		$('#id_master_equipment').change(function() {
			var id = $(this).val();
			$.ajax({
				url: '<?= base_url("Transaction_main_process/get_equipment") ?>',
				method: "POST",
				data: {
					id: id
				},

				dataType: 'json',
				success: function(data) {
					$('#machine_code').val(data.machine_code.toUpperCase());
					$('#line').val(data.line.toUpperCase());
				}
			});
			var idm = $(this).val();
			$.ajax({
				url: '<?= base_url("Transaction_main_process/get_machine_trouble") ?>',
				method: "POST",
				data: {
					id: idm
				},

				dataType: 'json',
				success: function(data) {
					var html = '';
					var i;
					for (i = 0; i < data.length; i++) {
						html += '<option value="' + data[i].id_transaction_main_process + '">' + data[i].machine_trouble + '</option>';
					}
					$('#id_master_main_process').html(html);
				}
			});
		});

		$('#id_master_occurence').change(function() {
			var oc = $('#id_master_occurence').val() == 0 ? 1 : $('#id_master_occurence').val()
			var sev = $('#id_master_severity').val() == 0 ? 1 : $('#id_master_severity').val()
			var det = $('#id_master_detection').val() == 0 ? 1 : $('#id_master_detection').val()
			var frpn = oc * sev * det
			$('#frpn_value').val(frpn === 1 ? 0 : parseInt(frpn))
		})
		$('#id_master_severity').change(function() {
			var oc = $('#id_master_occurence').val() == 0 ? 1 : $('#id_master_occurence').val()
			var sev = $('#id_master_severity').val() == 0 ? 1 : $('#id_master_severity').val()
			var det = $('#id_master_detection').val() == 0 ? 1 : $('#id_master_detection').val()
			var frpn = oc * sev * det
			$('#frpn_value').val(frpn === 1 ? 0 : parseInt(frpn))
		})
		$('#id_master_detection').change(function() {
			var oc = $('#id_master_occurence').val() == 0 ? 1 : $('#id_master_occurence').val()
			var sev = $('#id_master_severity').val() == 0 ? 1 : $('#id_master_severity').val()
			var det = $('#id_master_detection').val() == 0 ? 1 : $('#id_master_detection').val()
			var frpn = oc * sev * det
			$('#frpn_value').val(frpn === 1 ? 0 : parseInt(frpn))
		})

	});
</script>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
						<div class="row">
							<div class="col-sm-12">
								<table class="table text-md-nowrap dataTable no-footer" id="example1" role="grid" aria-describedby="example1_info">
									<thead>
										<tr role="row">
											<th>MACHINE CODE</th>
											<th>EQUIPMENT</th>
											<th>OCCURENCE</th>
											<th>SEVERITY</th>
											<th>DETECTION</th>
											<th>TROUBLE</th>
											<th>FRPN</th>
											<th>FMEA</th>
											<th>DATE</th>
											<th>STATUS</th>
											<th>ACTIONS</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($maintenance_machine as $e) { ?>
											<tr>
												<td><?= strtoupper($e->machine_code) ?></td>
												<td><?= strtoupper($e->equipment_name) ?></td>
												<td><?= strtoupper($e->occurence_value) ?></td>
												<td><?= strtoupper($e->severity_value) ?></td>
												<td><?= strtoupper($e->detection_value) ?></td>
												<td><?= strtoupper($e->machine_trouble) ?></td>
												<td><?= strtoupper($e->frpn_value) ?></td>
												<td><?= strtoupper($e->fmea_type) ?></td>
												<td><?= strtoupper($e->date_maintenance_machine) ?></td>
												<td><?= status($e->status_maintenance_machine) ?></td>
												<td>
													<a href="<?php echo site_url('maintenance_machine/edit/' . $e->id_transaction_maintenance_machine); ?>">Edit</a> |
													<a href="#" onclick="deleteConfirm('<?= 'maintenance_machine/remove/' . $e->id_transaction_maintenance_machine ?>')">Delete </a>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="row">
					<div class="col-3 d-flex justify-content-center">
						<i class="fa  fa-exclamation-triangle" style="font-size: 70px; color:red;"></i>
					</div>
					<div class="col-9 pt-2">
						<h5>Delete Confirmation</h5>
						<span>Are you sure want to delete this data?</span>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button class="btn btn-default" type="button" data-dismiss="modal"> Cancel</button>
				<a id="btn-delete" class="btn btn-danger" href="#"> Delete</a>
			</div>
		</div>
	</div>
</div>

<!-- Delete Confirm -->
<script type="text/javascript">
	function deleteConfirm(url) {
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
</script>