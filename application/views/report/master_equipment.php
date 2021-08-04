<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Report Master Equipment</h4>
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
                                <label for="sort_by">Sort By</label>
                                <select id='sort_by' class="form-control <?= form_error('sort_by') ? 'is-invalid' : '' ?>" name="sort_by">
                                    <option value="" selected hidden>Choose sort by</option>
                                    <option value="purchase">Machine Purchase Date</option>
                                    <option value="lin">Machine Enter Line Date</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= form_error('sort_by'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" id='start_date' class="form-control <?= form_error('start_date') ? 'is-invalid' : '' ?>" name="start_date">
                                <div class="invalid-feedback" id="start_date">
                                    <?= form_error('start_date'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="finish_date">Finish Date</label>
                                <input type="date" id='finish_date' class="form-control <?= form_error('finish_date') ? 'is-invalid' : '' ?>" name="finish_date">
                                <div class="invalid-feedback" id="finish_date">
                                    <?= form_error('finish_date'); ?>
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
                        REPORT MASTER EQUIPMENT SORT BY <?= $sort == 'purchase' ? 'MACHINE PURCHASE DATE' : 'MACHINE ENTER LINE' ?> FROM DATE <?= $tgl1 ?> FINISH DATE <?= $tgl1 ?>
                    </h4>
                    <a href="<?= base_url('pdf/report_master_equipment/') . $tgl1 . '/' . $tgl2 . '/' . $sort ?>" class="btn btn-primary" target="_blank">PDF</a>
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
                                                <th>QTY</th>
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