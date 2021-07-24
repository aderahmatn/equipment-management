<table border="1" width="100%">
    <tr>
		<th>Id Master Detection</th>
		<th>Detection Type</th>
		<th>Criteria</th>
		<th>Detection Value</th>
		<th>Rankings</th>
		<th>Actions</th>
    </tr>
	<?php foreach($detection as $e){ ?>
    <tr>
		<td><?php echo $e['id_master_detection']; ?></td>
		<td><?php echo $e['detection_type']; ?></td>
		<td><?php echo $e['criteria']; ?></td>
		<td><?php echo $e['detection_value']; ?></td>
		<td><?php echo $e['rankings']; ?></td>
		<td>
            <a href="<?php echo site_url('detection/edit/'.$e['id_master_detection']); ?>">Edit</a> | 
            <a href="<?php echo site_url('detection/remove/'.$e['id_master_detection']); ?>">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
