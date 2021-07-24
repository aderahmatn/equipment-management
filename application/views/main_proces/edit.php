<?php echo form_open('main_proces/edit/'.$main_proces['id_transaction_main_process']); ?>

	<div>
		Id Master Equipment : 
		<input type="text" name="id_master_equipment" value="<?php echo ($this->input->post('id_master_equipment') ? $this->input->post('id_master_equipment') : $main_proces['id_master_equipment']); ?>" />
	</div>
	<div>
		Id Master Main Process : 
		<input type="text" name="id_master_main_process" value="<?php echo ($this->input->post('id_master_main_process') ? $this->input->post('id_master_main_process') : $main_proces['id_master_main_process']); ?>" />
	</div>
	<div>
		Qty : 
		<input type="text" name="qty" value="<?php echo ($this->input->post('qty') ? $this->input->post('qty') : $main_proces['qty']); ?>" />
	</div>
	<div>
		Machine Trouble : 
		<input type="text" name="machine_trouble" value="<?php echo ($this->input->post('machine_trouble') ? $this->input->post('machine_trouble') : $main_proces['machine_trouble']); ?>" />
	</div>
	<div>
		Created Date : 
		<input type="text" name="created_date" value="<?php echo ($this->input->post('created_date') ? $this->input->post('created_date') : $main_proces['created_date']); ?>" />
	</div>
	
	<button type="submit">Save</button>
	
<?php echo form_close(); ?>