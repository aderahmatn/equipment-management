<?php echo form_open('occurence/add'); ?>

	<div>
		Occurrence Type : 
		<input type="text" name="occurrence_type" value="<?php echo $this->input->post('occurrence_type'); ?>" />
	</div>
	<div>
		Pobability Of Damage : 
		<input type="text" name="pobability_of_damage" value="<?php echo $this->input->post('pobability_of_damage'); ?>" />
	</div>
	<div>
		Occurence Value : 
		<input type="text" name="occurence_value" value="<?php echo $this->input->post('occurence_value'); ?>" />
	</div>
	<div>
		Rangkings : 
		<input type="text" name="rangkings" value="<?php echo $this->input->post('rangkings'); ?>" />
	</div>
	
	<button type="submit">Save</button>

<?php echo form_close(); ?>