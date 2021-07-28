<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Transaction Main Process</h4>
            <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ Add Transaction Main Process Data</span>
        </div>
    </div>
    <div class="d-flex my-xl-auto right-content">
        <div class="pr-1 mb-3 mb-xl-0">
            <button type="button" class="btn btn-warning  btn-icon mr-2" onclick="location.reload()"><i class="mdi mdi-refresh"></i></button>
        </div>
        <div class="pr-1 mb-3 mb-xl-0">
            <a href="<?= base_url('transaction_main_process') ?>" type="button" class="btn btn-primary  mr-2">Kembali</a>
        </div>

    </div>
</div>
<!-- breadcrumb -->
<div class="row">
    <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
        <div class="card  box-shadow-0">
            <div class="card-header">
                <h4 class="card-title mb-1">Add Transaction Main Process Data</h4>
                <p class="mb-2">Please fill the form for insert data</p>
            </div>
            <div class="card-body">
                <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
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
                    <div class="form-group">
                        <label for="machine_code">Machine Code</label>
                        <input type="text" id='machine_code' class="form-control <?= form_error('machine_code') ? 'is-invalid' : '' ?>" name="machine_code" readonly>
                        <div class="invalid-feedback">
                            <?= form_error('machine_code'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="line">Line</label>
                        <input type="text" id='line' class="form-control <?= form_error('line') ? 'is-invalid' : '' ?>" name="line" readonly>
                        <div class="invalid-feedback">
                            <?= form_error('line'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="id_master_main_process">Main Process</label>
                        <select id='id_master_main_process' class="form-control <?= form_error('id_master_main_process') ? 'is-invalid' : '' ?>" name="id_master_main_process">
                            <option value="" selected hidden>Pilih Main Process</option>
                            <?php foreach ($main_process as $key) : ?>
                                <option value="<?= $key->id_master_main_process ?>" <?= $this->input->post('id_master_main_process') == $key->id_master_main_process ? 'selected' : '' ?>><?= strtoupper($key->main_process) ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= form_error('id_master_main_process'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="max_capacity_daily">Max Capacity Daily</label>
                        <input type="text" id='max_capacity_daily' class="form-control <?= form_error('max_capacity_daily') ? 'is-invalid' : '' ?>" name="max_capacity_daily" readonly>
                        <div class="invalid-feedback">
                            <?= form_error('max_capacity_daily'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="qty">Qty Transaction</label>
                        <input type="number" id='qty' class="form-control <?= form_error('qty') ? 'is-invalid' : '' ?>" name="qty" min='1' disabled>
                        <div class="invalid-feedback" id="qty-msg">
                            <?= form_error('qty'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="machine_trouble">Machine Trouble</label>
                        <textarea id='machine_trouble' class="form-control <?= form_error('machine_trouble') ? 'is-invalid' : '' ?>" name="machine_trouble" value="<?= $this->input->post('machine_trouble'); ?>"></textarea>
                        <div class="invalid-feedback">
                            <?= form_error('machine_trouble'); ?>
                        </div>
                    </div>
                    <div class="form-group mb-0 mt-3 justify-content-end">
                        <div>
                            <button type="submit" class="btn btn-primary" name="btn-submit" id="btn-submit">Submit</button>
                            <a href="<?= base_url('detection') ?>" class="btn btn-secondary">Cancel</a>
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