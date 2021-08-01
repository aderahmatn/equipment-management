<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Transaction Main Process</h4>
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
                <h4 class="card-title mb-1">Edit Transaction Main Process Data</h4>
                <p class="mb-2">Please fill the form for update data</p>
            </div>
            <div class="card-body">
                <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                    <input type="hidden" name="id_transaction_main_process" value="<?= $data->id_transaction_main_process ?>">
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
                                <label for="id_master_main_process">Main Process</label>
                                <select id='id_master_main_process' class="form-control <?= form_error('id_master_main_process') ? 'is-invalid' : '' ?>" name="id_master_main_process">
                                    <option value="" selected hidden>Pilih Main Process</option>
                                    <?php foreach ($main_process as $key) : ?>
                                        <option value="<?= $key->id_master_main_process ?>" <?= $data->id_master_main_process == $key->id_master_main_process ? 'selected' : '' ?>><?= strtoupper($key->main_process) ?></option>
                                    <?php endforeach ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= form_error('id_master_main_process'); ?>
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
                                        <option value="<?= $key['id_master_equipment'] ?>" <?= $data->id_master_equipment == $key['id_master_equipment'] ? 'selected' : '' ?>><?= strtoupper($key['equipment_name']) ?></option>
                                    <?php endforeach ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= form_error('id_master_equipment'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="max_capacity_daily">Max Capacity Daily</label>
                                <input type="text" id='max_capacity_daily' class="form-control <?= form_error('max_capacity_daily') ? 'is-invalid' : '' ?>" name="max_capacity_daily" readonly>
                                <div class="invalid-feedback">
                                    <?= form_error('max_capacity_daily'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="line">Line</label>
                                <input type="text" id='line' class="form-control <?= form_error('line') ? 'is-invalid' : '' ?>" name="line" readonly>
                                <div class="invalid-feedback">
                                    <?= form_error('line'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="qty">Qty Transaction</label>
                                <input type="number" id='qty' class="form-control <?= form_error('qty') ? 'is-invalid' : '' ?>" name="qty" min='1' value="<?= $data->qty_transaction_main_process ?>">
                                <div class="invalid-feedback" id="qty-msg">
                                    <?= form_error('qty'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="machine_trouble">Machine Trouble</label>
                        <textarea id='machine_trouble' class="form-control <?= form_error('machine_trouble') ? 'is-invalid' : '' ?>" name="machine_trouble" value="<?= $this->input->post('machine_trouble'); ?>"><?= $data->machine_trouble ?></textarea>
                        <div class="invalid-feedback">
                            <?= form_error('machine_trouble'); ?>
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
        // get equipment
        var id = <?= $data->id_master_equipment ?>;
        $.ajax({
            url: '<?= base_url("Transaction_main_process/get_equipment") ?>',
            method: "POST",
            data: {
                id: id
            },

            dataType: 'json',
            success: function(data) {
                console.log(data);
                $('#machine_code').val(data.machine_code.toUpperCase());
                $('#line').val(data.line.toUpperCase());
            }
        });
        // get main process
        var idm = <?= $data->id_master_main_process ?>;
        $.ajax({
            url: '<?= base_url("Transaction_main_process/get_main_process") ?>',
            method: "POST",
            data: {
                id: idm
            },

            dataType: 'json',
            success: function(data) {
                $('#max_capacity_daily').val(data.max_capacity_daily.toUpperCase());
                $('#qty').removeAttr('disabled');
                $('#qty').change(function() {
                    console.log(parseInt($(this).val()) > data.max_capacity_daily);
                    if (parseInt($(this).val()) > data.max_capacity_daily) {
                        $('#qty').addClass('is-invalid');
                        $('#btn-submit').attr('disabled', 'disabled');
                        $('#qty-msg').empty()
                        $('#qty-msg').append('Qty melebihi kapasitas harian!')
                    } else {
                        $('#btn-submit').removeAttr('disabled');
                        $('#qty').removeClass('is-invalid');
                        $('#qty-msg').empty()

                    }
                })

            }
        });
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
        });

        $('#id_master_main_process').change(function() {
            var id = $(this).val();
            $.ajax({
                url: '<?= base_url("Transaction_main_process/get_main_process") ?>',
                method: "POST",
                data: {
                    id: id
                },

                dataType: 'json',
                success: function(data) {
                    $('#max_capacity_daily').val(data.max_capacity_daily.toUpperCase());
                    $('#qty').removeAttr('disabled');
                    $('#qty').change(function() {
                        console.log(parseInt($(this).val()) > data.max_capacity_daily);
                        if (parseInt($(this).val()) > data.max_capacity_daily) {
                            $('#qty').addClass('is-invalid');
                            $('#btn-submit').attr('disabled', 'disabled');
                            $('#qty-msg').empty()
                            $('#qty-msg').append('Qty melebihi kapasitas harian!')
                        } else {
                            $('#btn-submit').removeAttr('disabled');
                            $('#qty').removeClass('is-invalid');
                            $('#qty-msg').empty()

                        }
                    })

                }
            });
        });

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
                                            <th>EQUIPMENT</th>
                                            <th>LINE</th>
                                            <th>MAIN PROCESS</th>
                                            <th>MAX CAPACITY DAILY</th>
                                            <th>QTY</th>
                                            <th>MACHINE TROUBLE</th>
                                            <th>ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($transaction_main_process as $e) { ?>
                                            <tr>
                                                <td><?= strtoupper($e->equipment_name) ?></td>
                                                <td><?= strtoupper($e->line) ?></td>
                                                <td><?= strtoupper($e->main_process) ?></td>
                                                <td><?= strtoupper($e->max_capacity_daily) ?></td>
                                                <td><?= strtoupper($e->qty_transaction_main_process) ?></td>
                                                <td><?= strtoupper($e->machine_trouble) ?></td>
                                                <td>
                                                    <a href="<?php echo site_url('transaction_main_process/edit/' . $e->id_transaction_main_process); ?>">Edit</a> |
                                                    <a href="#" onclick="deleteConfirm('<?= 'transaction_main_process/remove/' . $e->id_transaction_main_process ?>')">Delete </a>
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