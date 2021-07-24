<table border="1" width="100%">
    <tr>
		<th>Id Transaction Maintenance Machine</th>
		<th>Id Master Equipment</th>
		<th>Id Master Occurence</th>
		<th>Id Master Severity</th>
		<th>Id Master Detection</th>
		<th>Frpn Value</th>
		<th>Fmea Type</th>
		<th>Date Maintenance Machine</th>
		<th>Actions</th>
    </tr>
	<?php foreach($maintenance_machine as $e){ ?>
    <tr>
		<td><?php echo $e['id_transaction_maintenance_machine']; ?></td>
		<td><?php echo $e['id_master_equipment']; ?></td>
		<td><?php echo $e['id_master_occurence']; ?></td>
		<td><?php echo $e['id_master_severity']; ?></td>
		<td><?php echo $e['id_master_detection']; ?></td>
		<td><?php echo $e['frpn_value']; ?></td>
		<td><?php echo $e['fmea_type']; ?></td>
		<td><?php echo $e['date_maintenance_machine']; ?></td>
		<td>
            <a href="<?php echo site_url('maintenance_machine/edit/'.$e['id_transaction_maintenance_machine']); ?>">Edit</a> | 
            <a href="<?php echo site_url('maintenance_machine/remove/'.$e['id_transaction_maintenance_machine']); ?>">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
