<?php echo form_open('detection/add'); ?>

	<div>
		Detection Type : 
		<input type="text" name="detection_type" value="<?php echo $this->input->post('detection_type'); ?>" />
	</div>
	<div>
		Criteria : 
		<input type="text" name="criteria" value="<?php echo $this->input->post('criteria'); ?>" />
	</div>
	<div>
		Detection Value : 
		<input type="text" name="detection_value" value="<?php echo $this->input->post('detection_value'); ?>" />
	</div>
	<div>
		Rankings : 
		<input type="text" name="rankings" value="<?php echo $this->input->post('rankings'); ?>" />
	</div>
	
	<button type="submit">Save</button>

<?php echo form_close(); ?>