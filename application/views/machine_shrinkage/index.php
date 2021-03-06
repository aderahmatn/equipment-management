<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Machine Shrinkage</h4>
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
                <h4 class="card-title mb-1">Add Machine Shrinkage Data</h4>
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
                                <label for="id_master_equipment">Equipment Name</label>
                                <select id='id_master_equipment' class="form-control <?= form_error('id_master_equipment') ? 'is-invalid' : '' ?>" name="id_master_equipment" value="<?= $this->input->post('id_master_equipment'); ?>">
                                    <option value="" selected hidden>Choose Equipment</option>
                                    <?php foreach ($equipment as $key) : ?>
                                        <option value="<?= $key['id_master_equipment'] ?>" <?= $this->input->post('id_master_equipment') == $key['id_master_equipment'] ? 'selected' : '' ?>><?= strtoupper($key['equipment_name']) ?></option>
                                    <?php endforeach ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= form_error('id_master_equipment'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="purchase_date">Purchase Date</label>
                                <input type="text" id='purchase_date' class="form-control <?= form_error('purchase_date') ? 'is-invalid' : '' ?>" name="purchase_date" readonly>
                                <div class="invalid-feedback">
                                    <?= form_error('purchase_date'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="overall_frpn">Overall FRPN</label>
                                <input type="text" id='overall_frpn' class="form-control <?= form_error('overall_frpn') ? 'is-invalid' : '' ?>" name="overall_frpn" readonly>
                                <div class="invalid-feedback">
                                    <?= form_error('overall_frpn'); ?>
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
                                <label for="qty_machine_shrinkage">Qty Shrinkage</label>
                                <input type="number" id='qty_machine_shrinkage' class="form-control <?= form_error('qty_machine_shrinkage') ? 'is-invalid' : '' ?>" name="qty_machine_shrinkage" min='1'>
                                <div class="invalid-feedback" id="qty_machine_shrinkage-msg">
                                    <?= form_error('qty_machine_shrinkage'); ?>
                                </div>
                            </div>
                            <input type="hidden" name="qty_equipment" id="qty_equipment">
                            <input type="hidden" name="now" id="now">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="qty">Qty</label>
                                <input type="text" id='qty' class="form-control <?= form_error('qty') ? 'is-invalid' : '' ?>" name="qty" readonly>
                                <div class="invalid-feedback">
                                    <?= form_error('qty'); ?>
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
        $('#machine_code').val('Choose Equipment');
        $('#line').val('Choose Equipment');
        $('#purchase_date').val('Choose Equipment');
        $('#max_capacity_daily').val('Choose Eain process');
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
                    $('#qty_equipment').val(data.qty.toUpperCase());
                    $('#qty').val(data.qty.toUpperCase());
                    $('#purchase_date').val(data.machine_purchase_date.toUpperCase());
                }
            });
        });
        $('#id_master_equipment').change(function() {
            var id = $(this).val();
            $.ajax({
                url: '<?= base_url("Maintenance_machine/get_overall_frpn") ?>',
                method: "POST",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(data) {
                    $('#overall_frpn').val(data.overall);
                }
            });
        });
        $('#qty_machine_shrinkage').change(function() {
            var qty_shrinkage = $(this).val();
            var qty_equipment = $('#qty_equipment').val();
            if (parseInt(qty_shrinkage) > parseInt(qty_equipment)) {
                $('#qty_machine_shrinkage').addClass('is-invalid')
                $('#qty_machine_shrinkage-msg').append('<p>Shrinkage over equipment qty</p>')
                $('#btn-submit').attr('disabled', 'disabled')
            } else {
                $('#qty_machine_shrinkage').removeClass('is-invalid')
                $('#qty_machine_shrinkage-msg').empty()
                var now = qty_equipment - qty_shrinkage
                $('#now').val(now);
                $('#btn-submit').removeAttr('disabled')
            }

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
                                            <th>EQUIPMENT CODE</th>
                                            <th>EQUIPMENT NAME</th>
                                            <th>LINE</th>
                                            <th>OVERALL FRPN</th>
                                            <th>QTY</th>
                                            <th>SHRINKAGE</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($machine_shrinkage as $e) { ?>
                                            <tr>
                                                <td><?= strtoupper($e->machine_code) ?></td>
                                                <td><?= strtoupper($e->equipment_name) ?></td>
                                                <td><?= strtoupper($e->line) ?></td>
                                                <td><?= strtoupper($e->overall_frpn) ?></td>
                                                <td><?= strtoupper($e->qty) ?></td>
                                                <td><?= strtoupper($e->qty_shrinkage) ?></td>
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