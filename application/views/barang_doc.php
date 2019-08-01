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
        <h2>Barang List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Barang</th>
		<th>Deskripsi Barang</th>
		<th>Jenis Barang</th>
		<th>Foto</th>
		<th>P</th>
		
            </tr><?php
            foreach ($barang_data as $barang)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $barang->nama_barang ?></td>
		      <td><?php echo $barang->deskripsi_barang ?></td>
		      <td><?php echo $barang->jenis_barang ?></td>
		      <td><?php echo $barang->foto ?></td>
		      <td><?php echo $barang->p ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>