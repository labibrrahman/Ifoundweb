<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>L_kehilangan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id User</th>
		<th>Id Barang</th>
		<th>Tgl Kehilangan</th>
		<th>Lokasi Kehilangan</th>
		<th>P</th>
		
            </tr><?php
            foreach ($l_kehilangan_data as $l_kehilangan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $l_kehilangan->id_user ?></td>
		      <td><?php echo $l_kehilangan->id_barang ?></td>
		      <td><?php echo $l_kehilangan->tgl_kehilangan ?></td>
		      <td><?php echo $l_kehilangan->lokasi_kehilangan ?></td>
		      <td><?php echo $l_kehilangan->p ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>