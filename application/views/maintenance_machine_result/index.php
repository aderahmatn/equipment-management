<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">Maintenance Machine Result</h4>
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
		<div class="card">
			<div class="card-header">
				<Strong>List Maintenance Machine</Strong>
			</div>
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
											<th>MACHINE TROUBLE</th>
											<th>FRPN</th>
											<th>FMEA TYPE</th>
											<th>DATE MAINTENANCE</th>
											<th>STATUS MAINTENANCE</th>
											<th>ACTIONS</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($maintenance_machine as $e) { ?>
											<tr>
												<td><?= strtoupper($e->machine_code) ?></td>
												<td><?= strtoupper($e->equipment_name) ?></td>
												<td><?= strtoupper($e->machine_trouble) ?></td>
												<td><?= strtoupper($e->frpn_value) ?></td>
												<td><?= strtoupper($e->fmea_type) ?></td>
												<td><?= strtoupper($e->date_maintenance_machine) ?></td>
												<td><?= status($e->status_maintenance_machine) ?></td>
												<td>
													<a href="<?= site_url('maintenance_machine_result/submit/' . $e->id_transaction_maintenance_machine); ?>">Submit Result</a>
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