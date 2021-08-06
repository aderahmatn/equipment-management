<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Report Machine Shrinkage</h4>
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
            <div class="card-body">
                <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="id_master_equipment">Equipment</label>
                                <select id='id_master_equipment' class="form-control <?= form_error('id_master_equipment') ? 'is-invalid' : '' ?>" name="id_master_equipment">
                                    <option value="" selected hidden>Choose equipment</option>
                                    <?php foreach ($eq as $key) : ?>
                                        <option value="<?= $key['id_master_equipment'] ?>"><?= strtoupper($key['equipment_name']) ?></option>
                                    <?php endforeach ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= form_error('id_master_equipment'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-0 mt-3 d-flex justify-content-end">
                        <div>
                            <button type="submit" class="btn btn-primary" name="btn-submit" id="btn-submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php if ($equipment != null) { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        REPORT TRASACTION MAIN PROCESS
                    </h4>
                    <a href="<?= base_url('pdf/report_machine_shrinkage/') . $equip ?>" class="btn btn-primary" target="_blank">PDF</a>
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
                                                <th>EQUIPMENT NAME</th>
                                                <th>PURCHASE DATE</th>
                                                <th>LINE</th>
                                                <th>ENTER LINE DATE</th>
                                                <th>QTY MACHINE</th>
                                                <th>OVERAL FRPN</th>
                                                <th>QTY SHRINKAGE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($equipment as $e) { ?>
                                                <tr>
                                                    <td><?= strtoupper($e->machine_code) ?></td>
                                                    <td><?= strtoupper($e->equipment_name) ?></td>
                                                    <td><?= strtoupper($e->machine_purchase_date) ?></td>
                                                    <td><?= strtoupper($e->line) ?></td>
                                                    <td><?= strtoupper($e->machine_enter_line) ?></td>
                                                    <td><?= strtoupper($e->qty) ?></td>
                                                    <td><?= strtoupper($e->overall_frpn) ?></td>
                                                    <td><?= strtoupper($e->qty_machine_shrinkage) ?></td>
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
<?php } ?>


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