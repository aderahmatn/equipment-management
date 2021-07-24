<table border="1" width="100%">
    <tr>
		<th>Id Transaction Main Process</th>
		<th>Id Master Equipment</th>
		<th>Id Master Main Process</th>
		<th>Qty</th>
		<th>Machine Trouble</th>
		<th>Created Date</th>
		<th>Actions</th>
    </tr>
	<?php foreach($main_process as $e){ ?>
    <tr>
		<td><?php echo $e['id_transaction_main_process']; ?></td>
		<td><?php echo $e['id_master_equipment']; ?></td>
		<td><?php echo $e['id_master_main_process']; ?></td>
		<td><?php echo $e['qty']; ?></td>
		<td><?php echo $e['machine_trouble']; ?></td>
		<td><?php echo $e['created_date']; ?></td>
		<td>
            <a href="<?php echo site_url('main_proces/edit/'.$e['id_transaction_main_process']); ?>">Edit</a> | 
            <a href="<?php echo site_url('main_proces/remove/'.$e['id_transaction_main_process']); ?>">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
