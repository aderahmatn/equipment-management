<table border="1" width="100%">
    <tr>
		<th>Id Transaction Maintenance Machine Results</th>
		<th>Id Master Equipment</th>
		<th>Machine Trouble</th>
		<th>Fmea Type</th>
		<th>Date Maintenance Machine</th>
		<th>Machine Maintenance Status</th>
		<th>Actions</th>
    </tr>
	<?php foreach($maintenance_machine_results as $e){ ?>
    <tr>
		<td><?php echo $e['id_transaction_maintenance_machine_results']; ?></td>
		<td><?php echo $e['id_master_equipment']; ?></td>
		<td><?php echo $e['machine_trouble']; ?></td>
		<td><?php echo $e['fmea_type']; ?></td>
		<td><?php echo $e['date_maintenance_machine']; ?></td>
		<td><?php echo $e['machine_maintenance_status']; ?></td>
		<td>
            <a href="<?php echo site_url('maintenance_machine_result/edit/'.$e['id_transaction_maintenance_machine_results']); ?>">Edit</a> | 
            <a href="<?php echo site_url('maintenance_machine_result/remove/'.$e['id_transaction_maintenance_machine_results']); ?>">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
