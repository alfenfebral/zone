<?php
include("../butuh/hubung.php");
include("../butuh/fungsi.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Kontak</title>
    <!-- Include meta tag to ensure proper rendering and touch zooming -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Include bootstrap stylesheets -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
  </head>

  <body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="/">Beranda</a></li>
			<li><a href="/berita">Berita</a></li>
			<li><a href="/materi">Materi</a></li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Jadwal <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
				<li class="dropdown-header">Jadwal Kuliah</li>
                <li><a href="/jadwal/?jadwal=kuliah&smt=1">Semester 1</a></li>
                <li><a href="/jadwal/?jadwal=kuliah&smt=2">Semester 2</a></li>
                <li><a href="/jadwal/?jadwal=kuliah&smt=3">Semester 3</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Ujian</li>
                <li><a href="/jadwal/?jadwal=uts">UTS</a></li>
                <li><a href="/jadwal/?jadwal=uas">UAS</a></li>
              </ul>
            </li>
			<li class="active"><a href="/kontak">Kontak</a></li>
			<li><a href="/about">About</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<div class="container">
	<div class="starter-template">
      <h2>Kontak</h2>
	  <?php
	  $nama = $judul = $pesan = "";
	  if(isset($_POST['kirim']))
		{
		$nama = cek($_POST['nama']);
		$judul = cek($_POST['judul']);
		$pesan = cek($_POST['pesan']);
		mysql_query("INSERT INTO kontak(judul, nama, pesan, tgl) 
			VALUES('".mysql_real_escape_string($judul)."',
			'".mysql_real_escape_string($nama)."',
			'".mysql_real_escape_string($pesan)."',
			'".time()."')");
            //header('location: ./index.php');
			//$notif = 'Pesan Sukses Terkirim';
		}
	  ?>
	  
      <form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group">
          <label for="nama">Nama:</label>
          <input type="text" class="form-control" id="nama" name="nama" maxlength="50" placeholder="Masukkan Nama">
        </div>
        <div class="form-group">
          <label for="judul">Judul Pesan:</label>
          <input type="text" class="form-control" id="judul" name="judul" maxlength="50" placeholder="Judul Pesan">
		  <span class="help-block">*Judul laporan pesan</span>
        </div>
        <div class="form-group">
          <label for="pesan">Pesan:</label>
          <textarea class="form-control" id="pesan" name="pesan" maxlength="500" placeholder="Masukkan Pesan"></textarea>
		  <span class="help-block">Maksimum 500 karakter.</span>
        </div>
        <button type="submit" class="btn btn-default" name="kirim">Submit</button>
      </form>
	  </div>
	  	  <hr>
		<footer>
			<p>&copy; Alf Enterprise 2014</p>
		</footer>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
