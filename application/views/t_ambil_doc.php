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
        <h2>T_ambil List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Laporan</th>
		<th>Tgl Ambil</th>
		<th>P</th>
		
            </tr><?php
            foreach ($t_ambil_data as $t_ambil)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $t_ambil->id_laporan ?></td>
		      <td><?php echo $t_ambil->tgl_ambil ?></td>
		      <td><?php echo $t_ambil->p ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>