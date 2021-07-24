<table border="1" width="100%">
    <tr>
		<th>Id Master Occurence</th>
		<th>Occurrence Type</th>
		<th>Pobability Of Damage</th>
		<th>Occurence Value</th>
		<th>Rangkings</th>
		<th>Actions</th>
    </tr>
	<?php foreach($occurence as $e){ ?>
    <tr>
		<td><?php echo $e['id_master_occurence']; ?></td>
		<td><?php echo $e['occurrence_type']; ?></td>
		<td><?php echo $e['pobability_of_damage']; ?></td>
		<td><?php echo $e['occurence_value']; ?></td>
		<td><?php echo $e['rangkings']; ?></td>
		<td>
            <a href="<?php echo site_url('occurence/edit/'.$e['id_master_occurence']); ?>">Edit</a> | 
            <a href="<?php echo site_url('occurence/remove/'.$e['id_master_occurence']); ?>">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
