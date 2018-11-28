<?php
//require_once __DIR__.'/../../lib/assets.php';
?>

<html>
<head><title>Sistem Pembuatan ID Card</title>
<style type="text/css">
	body{
		font-family:Arial;
	}
	body a {
		text-decoration:none;
	}
	body a:hover{
			background-color:#CCCCCC;
	}
	
	.main{
		width:1150px;
		height:auto;
		border:2px solid green;
		position:relative;
		margin:0 auto;
	}
	.menu{
		position:relative;
		height:100px;
		width:95%;
		background-color:yellow;
		padding:10px 28px 10px 30px; 
		border-bottom:2px solid green;
	}


</style>
</head>
<body>
<div class='main'>

<div class='menu'>
<table width="100%" cellpadding="0" cellspacing="0" border="0">

<?php
// jumlah data yang akan ditampilkan per halaman
$dataPerPage = 10;

// apabila $_GET['page'] sudah didefinisikan, gunakan nomor halaman tersebut,
// sedangkan apabila belum, nomor halamannya 1.

$noPage = isset($_GET['page']) ? $_GET['page'] : 1 ;

$filterKelas = isset($_GET['kelas']) ? $_GET['kelas'] : 'semua';

$offset = ($noPage - 1) * $dataPerPage;

if($filterKelas == "semua")
{
$query = "select * from pakamdua LIMIT $offset, $dataPerPage  ";

}
else
{
$query = "select * from pakamdua  where Kelas= '".$filterKelas."' LIMIT $offset, $dataPerPage  ";

}

$result = mysql_query($query) or die('Error');

// membaca nomor halaman
//$noPage = $_GET['page'];

// membuat nomor urut awal di setiap halaman berdasarkan formula di atas
$i = $noPage + ($noPage - 1) * ($dataPerPage - 1);
if($filterKelas == "semua")
{
//$query = "select * from pakamdua  where Kelas= '".$filterKelas."' LIMIT $offset, $dataPerPage  ";
$query   = "SELECT COUNT(*) AS jumData FROM pakamdua ";

}
else
{
//$query = "select * from pakamdua LIMIT $offset, $dataPerPage  ";
$query   = "SELECT COUNT(*) AS jumData FROM pakamdua where Kelas= '".$filterKelas."' ";

}

//$query   = "SELECT COUNT(*) AS jumData FROM pakamdua where Kelas= '"."VII-1"."' ";
$hasil  = mysql_query($query);
$data     = mysql_fetch_array($hasil);

$jumData = $data['jumData'];

$jumPage = ceil($jumData/$dataPerPage);
?>
<tr>
<td width="600px" align="center">Pilih Halaman :<br>
<?php

$showPage = $noPage;
if ($noPage > 1) echo  "<a style='padding:3px;background:BLUE;color:white;border:1px solid #E8F2FD;' href='".$_SERVER['PHP_SELF']."?page=".($noPage-1)."&kelas=".$filterKelas."'>&lt;&lt; Prev</a>";

for($page = 1; $page <= $jumPage; $page++)
{
         if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage))
         {
            if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  echo "...";
            if ($page == $noPage) echo " <b style='color:white;padding:3px;background:red;border:1px solid #E8F2FD;'>".$page."</b> ";
            else echo " <a style='color:white;padding:3px;background:blue;border:1px solid #E8F2FD;' href='".$_SERVER['PHP_SELF']."?page=".$page."&kelas=".$filterKelas."'>".$page."</a> ";
            $showPage = $page;
         }
}

if ($noPage < $jumPage) echo "<a style='color:white;padding:3px;background:blue;border:1px solid #E8F2FD;'href='".$_SERVER['PHP_SELF']."?page=".($noPage+1)."&kelas=".$filterKelas."'>Next &gt;&gt;</a>";

?>
</td>
<td width="200px" align="center">Pilih Kelas : <form name="frmdata" action="<?php $_SERVER['PHP_SELF'];?>" method="get">
	<?php 
	$s = mysql_query("SELECT kelas FROM `pakamdua` group by kelas");
	if (!$s)
		die("Query Data Gagal");
	?>
	<select id="kelas" name="kelas">
		<option value='semua'>Semua</option>
		<?php 
		while ($kls = mysql_fetch_array($s)) {
		if ($kls['kelas'] == $_GET['kelas'] ) {

		?>
		
		<option value="<?php echo $kls['kelas']?>" selected="selected"><?php echo $kls['kelas']?></option>
		<?php 
		}
		else
		{
		?>                                 
															  
		<option value="<?php echo $kls['kelas']?>" maxlength=30><?php echo $kls['kelas']?></option>
		
		<?php
		}
		}
		?>
	</select>

    <input type="submit" value="Filter">
</form> </td><td align="center" valign="middle"><a style="border:0px solid black; color:white; background-color:blue; padding:2px;" href="cetak.php?kelas=<?php echo $filterKelas ?>&page=<?php echo $noPage ?>" target="_blank">Cetak</a></td>
<td>        
		<p align=right>
 <?php
	echo "<b style='color:#0079b1'>Halaman ".$noPage."/".$jumPage."</b>";
 //echo $jumPage;
// echo "&nbsp;".$filterKelas;
 ?>
 </p>

		<p align=right>
	
		<?php        
                //print("Update Terakhir : <b>$hari, $my_t[mday] $bulan $my_t[year],  &nbsp;&nbsp;&nbsp; $jam:$my_t[minutes]</b>");
                print("Kelas : <b>$filterKelas</b>");
                
                ?> 
				<br/>
				<a href="daftarsiswa.php" target=_blank>Daftar Siswa</a></p>

</td>
</tr>
</table>

</div>

<div style="position:absolute;width:1150px;height:1771px;border: 0px solid black;">
</div>
<div style="width:1300px;height:1771px;border: 0px solid black;">
&nbsp;

<?php
//			$query = "select * from pakamdua";
	//		$result = mysql_query($query);
		//	if(!$result) die("Query data gagal.");
		
			while($row=mysql_fetch_array($result))
			{
			//echo $row['Foto']."<br/>";
			//if($row['Foto']!='0000')
			//{
?>
<div style="margin: 10px 65px 19px 10px;width:510px;height:322px;border: 1px solid black;position:relative;float:left;background: url(<?php echo img('pakam.png');?>) no-repeat; ">
<!-- Tombol Kontrol -->
<div style="border:solid 1 px black; width:11px; height:10px; position:absolute; background-color:#F00; margin-left:515px;"><a href="update.php?nis=<?php echo $row['NIS'];?>&kelas=<?php echo $filterKelas ;?>&page=<?php echo $noPage?>" target=_self><img src="images/update.png" width="30" height="30" /></a></div>

<!-- Gambar Siswa -->
<div style="margin: 170px 0px 0px 32px;width:89px;height:118px;border: 2px solid #628fc6;position:relative;float:left;"><img width="89px" height="118px" src="<?php echo img("foto/IMG_".$row['Foto']);?>.JPG"/>
</div>

<!-- Data Siswa -->



<div style="margin: 125px 0px 0px 25px;width:340px;height:95px;position:relative;float:left;">
<table style="font-size:12px; font-family:Arial, Helvetica, sans-serif; font-weight:bold" border=0 cellpadding=0 cellspacing=>
<tr>
<td width="120px">Nama Lengkap	</td><td width="250px">: <?php echo $row['Nama_Lengkap']?></td>
</tr>
<tr>
<td>NIS/NISN	</td><td>: <?php echo $row['NIS']?> / <?php echo $row['NISN']?></td>
</tr>
<tr>
<td>Tempat/ Tgl. Lahir	</td> <td>: <?php echo $row['TTL']?></td>
</tr>
<tr>
<td>Jenis Kelamin	</td><td>: <?php echo $row['JK']?></td>
</tr>
<tr>
<td>Agama 	</td><td>: <?php echo $row['Agama']?></td>
</tr>
<tr>
<td>Alamat</td><td>: <?php echo $row['Alamat']?></td>
</tr>
</table>
</div>

</div>
<?php	}

?>

</div>
</div>
</body>
</html>
