<?php echo form_open('maintenance_machine_result/add'); ?>

	<div>
		Id Master Equipment : 
		<input type="text" name="id_master_equipment" value="<?php echo $this->input->post('id_master_equipment'); ?>" />
	</div>
	<div>
		Machine Trouble : 
		<input type="text" name="machine_trouble" value="<?php echo $this->input->post('machine_trouble'); ?>" />
	</div>
	<div>
		Fmea Type : 
		<input type="text" name="fmea_type" value="<?php echo $this->input->post('fmea_type'); ?>" />
	</div>
	<div>
		Date Maintenance Machine : 
		<input type="text" name="date_maintenance_machine" value="<?php echo $this->input->post('date_maintenance_machine'); ?>" />
	</div>
	<div>
		Machine Maintenance Status : 
		<input type="text" name="machine_maintenance_status" value="<?php echo $this->input->post('machine_maintenance_status'); ?>" />
	</div>
	
	<button type="submit">Save</button>

<?php echo form_close(); ?>