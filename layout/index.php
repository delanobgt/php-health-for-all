<!DOCTYPE html>
<html lang="en">
	<head>
  		<?php include __DIR__.'/head.php'; ?>
  	</head>
	<body role="document" class="bg-success">
<header>
		 <?php include __DIR__.'/nav.php'; ?>
	</header>
   <?php include __DIR__.'/flash.php'; ?>
		<div class="container content" role="main">
			<!--Content-->
			<div class='col-md-12 col-sm-12 col-xs-12 no-padding menu'>
				<h3 class="text-center">Tahun Pelajaran <?php echo $setting->nama;?></h3>
				<?php foreach ($sekolahArray as $index => $sekolah): ?>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="thumbnail">
						<h4><?php echo $sekolah->nama; ?></h4>
			          <img src="<?php echo foto($sekolah->gambar_depan)?>">
			          <div class="caption">
			          <!--  <h3><?php echo $sekolah->nama;?></h3>
			            <p>Jumlah Kelas: 4 <br/>Jumlah Siswa: 150 orang</p>-->
			            <p><a role="button" class="btn btn-primary" href="<?php echo path('idcard.php',array('id_sekolah'=> $sekolah->id));?>">Lihat</a>
			            <a role="button" class="btn btn-primary" href="<?php echo path('foto.php',array('id_sekolah'=> $sekolah->id));?>">Foto</a> 
			            <a role="button" class="btn btn-primary" href="<?php echo path('foto-mix.php',array('id_sekolah'=> $sekolah->id));?>">Foto Mix</a> 
			            <a role="button" class="btn btn-primary" href="<?php echo path('foto-rename.php',array('id_sekolah'=> $sekolah->id));?>">Foto Rename</a> 
			            </p>
			          </div>
			        </div>
				</div>
				<?php endforeach;?>

				<?php foreach ($sekolahGuruArray as $index => $sekolah): ?>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="thumbnail">
			          <img src="<?php echo foto($sekolah->gambar_depan)?>">
			          <div class="caption">
			          <!--  <h3><?php echo $sekolah->nama;?></h3>
			            <p>Jumlah Kelas: 4 <br/>Jumlah Siswa: 150 orang</p>-->
			            <p><a role="button" class="btn btn-primary" href="<?php echo path('idcard-guru.php',array('id_sekolah'=> $sekolah->id));?>">Lihat</a> </p>
			          </div>
			        </div>
				</div>
				<?php endforeach;?>
			</div>
	        <!-- End Content -->
		</div>
		<?php include __DIR__.'/footer.php'; ?>
		<?php include __DIR__.'/js.php'; ?>
  </body>
</html>