<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">Master User</h4>
		</div>
	</div>
	<div class="d-flex my-xl-auto right-content">
		<div class="pr-1 mb-3 mb-xl-0">
			<button type="button" class="btn btn-warning  btn-icon mr-2" onclick="location.reload()"><i class="mdi mdi-refresh"></i></button>
		</div>
		<div class="pr-1 mb-3 mb-xl-0">
			<a href="<?= base_url('user/add') ?>" type="button" class="btn btn-primary  mr-2">Tambah Data</a>
		</div>

	</div>
</div>
<!-- breadcrumb -->
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
											<th>NIK</th>
											<th>FULL NAME</th>
											<th>EMAIL</th>
											<th>POSITION</th>
											<th>DIVISION</th>
											<th>DEPT</th>
											<th>FIRST WORK</th>
											<th>PICTURE</th>
											<th>ACTIONS</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($user as $e) { ?>
											<tr>
												<td><?= strtoupper($e['nik']) ?></td>
												<td><?= strtoupper($e['full_name']) ?></td>
												<td><?= strtoupper($e['email']) ?></td>
												<td><?= strtoupper($e['position']) ?></td>
												<td><?= strtoupper($e['division']) ?></td>
												<td><?= strtoupper($e['dept_code']) ?></td>
												<td><?= strtoupper($e['first_work']) ?></td>
												<td><img alt="user-img" class="avatar avatar-md brround" src="<?= '../../uploads/picture/' . $e['picture'] ?>" style='object-fit: cover;'></td>
												<td>
													<a href="<?php echo site_url('user/edit/' . $e['id_master_create_user']); ?>">Edit</a> |
													<a href="#" onclick="deleteConfirm('<?= 'user/remove/' . $e['id_master_create_user'] ?>')">Delete </a>
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
						<h5>Apakah anda yakin?</h5>
						<span>Data yang dihapus tidak akan bisa dikembalikan.</span>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button class="btn btn-default" type="button" data-dismiss="modal"> Batal</button>
				<a id="btn-delete" class="btn btn-danger" href="#"> Hapus</a>
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