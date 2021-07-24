<table border="1" width="100%">
    <tr>
		<th>Id Master Severity</th>
		<th>Severity Type</th>
		<th>Severity Effect</th>
		<th>Severity Value</th>
		<th>Rankings</th>
		<th>Actions</th>
    </tr>
	<?php foreach($severity as $e){ ?>
    <tr>
		<td><?php echo $e['id_master_severity']; ?></td>
		<td><?php echo $e['severity_type']; ?></td>
		<td><?php echo $e['severity_effect']; ?></td>
		<td><?php echo $e['severity_value']; ?></td>
		<td><?php echo $e['rankings']; ?></td>
		<td>
            <a href="<?php echo site_url('severity/edit/'.$e['id_master_severity']); ?>">Edit</a> | 
            <a href="<?php echo site_url('severity/remove/'.$e['id_master_severity']); ?>">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
