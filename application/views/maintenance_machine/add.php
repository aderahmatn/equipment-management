<?php echo form_open('maintenance_machine/add'); ?>

	<div>
		Id Master Equipment : 
		<input type="text" name="id_master_equipment" value="<?php echo $this->input->post('id_master_equipment'); ?>" />
	</div>
	<div>
		Id Master Occurence : 
		<input type="text" name="id_master_occurence" value="<?php echo $this->input->post('id_master_occurence'); ?>" />
	</div>
	<div>
		Id Master Severity : 
		<input type="text" name="id_master_severity" value="<?php echo $this->input->post('id_master_severity'); ?>" />
	</div>
	<div>
		Id Master Detection : 
		<input type="text" name="id_master_detection" value="<?php echo $this->input->post('id_master_detection'); ?>" />
	</div>
	<div>
		Frpn Value : 
		<input type="text" name="frpn_value" value="<?php echo $this->input->post('frpn_value'); ?>" />
	</div>
	<div>
		Fmea Type : 
		<input type="text" name="fmea_type" value="<?php echo $this->input->post('fmea_type'); ?>" />
	</div>
	<div>
		Date Maintenance Machine : 
		<input type="text" name="date_maintenance_machine" value="<?php echo $this->input->post('date_maintenance_machine'); ?>" />
	</div>
	
	<button type="submit">Save</button>

<?php echo form_close(); ?>