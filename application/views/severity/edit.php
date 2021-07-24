<?php echo form_open('severity/edit/'.$severity['id_master_severity']); ?>

	<div>
		Severity Type : 
		<input type="text" name="severity_type" value="<?php echo ($this->input->post('severity_type') ? $this->input->post('severity_type') : $severity['severity_type']); ?>" />
	</div>
	<div>
		Severity Effect : 
		<input type="text" name="severity_effect" value="<?php echo ($this->input->post('severity_effect') ? $this->input->post('severity_effect') : $severity['severity_effect']); ?>" />
	</div>
	<div>
		Severity Value : 
		<input type="text" name="severity_value" value="<?php echo ($this->input->post('severity_value') ? $this->input->post('severity_value') : $severity['severity_value']); ?>" />
	</div>
	<div>
		Rankings : 
		<input type="text" name="rankings" value="<?php echo ($this->input->post('rankings') ? $this->input->post('rankings') : $severity['rankings']); ?>" />
	</div>
	
	<button type="submit">Save</button>
	
<?php echo form_close(); ?>