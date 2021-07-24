<?php echo form_open('main_proces/add'); ?>

	<div>
		Id Master Equipment : 
		<input type="text" name="id_master_equipment" value="<?php echo $this->input->post('id_master_equipment'); ?>" />
	</div>
	<div>
		Id Master Main Process : 
		<input type="text" name="id_master_main_process" value="<?php echo $this->input->post('id_master_main_process'); ?>" />
	</div>
	<div>
		Qty : 
		<input type="text" name="qty" value="<?php echo $this->input->post('qty'); ?>" />
	</div>
	<div>
		Machine Trouble : 
		<input type="text" name="machine_trouble" value="<?php echo $this->input->post('machine_trouble'); ?>" />
	</div>
	<div>
		Created Date : 
		<input type="text" name="created_date" value="<?php echo $this->input->post('created_date'); ?>" />
	</div>
	
	<button type="submit">Save</button>

<?php echo form_close(); ?>