<!DOCTYPE html>
<html lang="en">
<head>
<title>Export Data PDF</title>

<style type="text/css">
.table1 {
    color: #444;
    border-collapse: collapse;
    border: 1px solid #000000;
	margin-left: auto;
	margin-right: auto;
	width: 100%;
	margin-left: 2em;

	& > tbody {
		width: 100%;
	}
}
 
.table1 tr th{
    font-weight: normal;
	border: 1px solid #000000
}
 
.table1, th, td {
    padding: 8px 20px;
    text-align: left;
	border: 1px solid #000000
}
 
.table1 tr:hover {
    background-color: #f5f5f5;
}
 
.table1 tr:nth-child(even) {
    background-color: #f2f2f2;
}
.table1 tr:nth-child(odd) {
    background-color: #d5dfdd;
}

table tr td:first-child  {
	color: rgb(19, 18, 18);
	table-layout: auto;
	width: 150px;
}
</style>
</head>
<body>

<section>
	<?php if(isset($exportpdf)) : ?>
	<?php foreach ($exportpdf as $koleksi) : ?> 
	<?php endforeach; ?>
	<?php endif; ?> 
    <div>
        <div class="section-inner" style="padding-bottom: 0px!important">
            <div class="container">
                <div class="row">
                    <div id="main-sidebar" class="col-md-6 divider-wrapperPost wow fadeInRight">
                        <h4 style="text-align:center"><strong>Data Objek</strong></h4>
                        <div class="row">
                            <table class="table1">
								<tr>
                                    <td><strong>Nama Koleksi</strong></td>
                                    <td><p style="color:rgb(22, 21, 21)"><?= $koleksi['nama_koleksi'] ?></p></td>
                                </tr>
                                <tr>
                                    <td><strong>Kelompok Koleksi</strong></td>
                                    <td><p style="color:rgb(22, 21, 21)"><?= $koleksi['kel_koleksi'] ?></p></td>
                                </tr>
                                <tr>
                                    <td><strong>Lokasi Penemuan</strong></td>
                                    <td><p style="color:rgb(22, 21, 21)"><?= $koleksi['lok_temuan'] ?></p></td>
                                </tr>
                                <tr>
                                    <td><strong>Bahan</strong></td>
                                    <td><p style="color:rgb(22, 21, 21)"><?= $koleksi['bahan'] ?></p></td>
                                </tr>                      
<!--
                                <tr>
                                    <td><strong>Jenis</strong></td>
                                    <td><p style="color:rgb(22, 21, 21)"><?= $bbangunan['jenis_post_tangible']; ?></p></td>
                                </tr>   
								<tr>
                                    <td><strong>Detail</strong></td>
                                    <td><p style="color:rgb(22, 21, 21)"><?= $bbangunan['detail_post_tangible']; ?></p></td>
                                </tr> 
								<tr>
                                    <td><strong>Sejarah</strong></td>
                                    <td><p style="color:rgb(22, 21, 21)"><?= $bbangunan['sejarah_post_tangible']; ?></p></td>
                                </tr>   
-->
								<tr>
                                    <td><strong>Gambar</strong></td>
                                    <td><img src="<?php echo base_url('upload/koleksi/'.$koleksi['gambarkoleksi'])?>" class="img-post" alt="image" style="width:6cm;height:9cm;"></td>                                    
                                </tr>                     
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>   


</body>
</html>