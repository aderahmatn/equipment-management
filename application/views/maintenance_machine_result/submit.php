<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Submit Result Maintenance Machine</h4>
        </div>
    </div>
    <div class="d-flex my-xl-auto right-content">
        <div class="pr-1 mb-3 mb-xl-0">
            <button type="button" class="btn btn-warning  btn-icon mr-2" onclick="location.reload()"><i class="mdi mdi-refresh"></i></button>
        </div>
        <div class="pr-1 mb-3 mb-xl-0">
            <a href="<?= base_url('maintenance_machine_result') ?>" type="button" class="btn btn-primary  mr-2">Back</a>
        </div>

    </div>
</div>
<!-- breadcrumb -->
<div class="row">
    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
        <div class="card  box-shadow-0">
            <div class="card-body">
                <form class="form-horizontal" method="post" action="<?= base_url('maintenance_machine_result/res') ?>" enctype="multipart/form-data">
                    <input type="hidden" name="id_transaction_maintenance_machine" value="<?= $maintenance_machine->id_transaction_maintenance_machine ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Machine Code</label>
                                <input type="text" class="form-control form-control" value="<?= $maintenance_machine->machine_code ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label>Equipment Name</label>
                                <input type="text" class="form-control" value="<?= strtoupper($maintenance_machine->equipment_name) ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label>Line</label>
                                <input type="text" class="form-control" value="<?= strtoupper($maintenance_machine->line) ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Machine Trouble</label>
                                <input type="text" class="form-control form-control" value="<?= strtoupper($maintenance_machine->machine_trouble) ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label>FMEA Type</label>
                                <input type="text" class="form-control" value="<?= strtoupper($maintenance_machine->fmea_type) ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label>Date Maintenance Machine</label>
                                <input type="text" class="form-control" value="<?= strtoupper($maintenance_machine->date_maintenance_machine) ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status_maintenance_machine">Machine Maintenance Status</label>
                                <select id='status_maintenance_machine' class="form-control <?= form_error('status_maintenance_machine') ? 'is-invalid' : '' ?>" name="status_maintenance_machine" placeholder="status_maintenance_machine">
                                    <option value="not fixed yet" <?= $maintenance_machine->status_maintenance_machine == 'not fixed yet' ? 'selected' : '' ?>> NOT FIXED YET - <small>(belum diperbaiki)</small>
                                    </option>
                                    <option value="already repaired" <?= $maintenance_machine->status_maintenance_machine == 'already repaired' ? 'selected' : '' ?>> ALREADY REPAIRED - <small>(sudah diperbaiki)</small>
                                    </option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= form_error('status_maintenance_machine'); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-0 mt-3 justify-content-end">
                        <div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>