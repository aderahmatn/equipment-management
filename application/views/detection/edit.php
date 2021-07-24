<?php echo form_open('detection/edit/'.$detection['id_master_detection']); ?>

	<div>
		Detection Type : 
		<input type="text" name="detection_type" value="<?php echo ($this->input->post('detection_type') ? $this->input->post('detection_type') : $detection['detection_type']); ?>" />
	</div>
	<div>
		Criteria : 
		<input type="text" name="criteria" value="<?php echo ($this->input->post('criteria') ? $this->input->post('criteria') : $detection['criteria']); ?>" />
	</div>
	<div>
		Detection Value : 
		<input type="text" name="detection_value" value="<?php echo ($this->input->post('detection_value') ? $this->input->post('detection_value') : $detection['detection_value']); ?>" />
	</div>
	<div>
		Rankings : 
		<input type="text" name="rankings" value="<?php echo ($this->input->post('rankings') ? $this->input->post('rankings') : $detection['rankings']); ?>" />
	</div>
	
	<button type="submit">Save</button>
	
<?php echo form_close(); ?>