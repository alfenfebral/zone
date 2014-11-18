<?php
include("../butuh/hubung.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Materi</title>
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
			<li class="active"><a href="/materi">Materi</a></li>
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
			<li><a href="/kontak">Kontak</a></li>
			<li><a href="/about">About</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container">
      <h2>Materi</h2>
      <p>Download Materi yg ada di perkuliahan (yg terbaru di paling atas)</p>  
		<?php 
		//fungsi untuk mengambil ke database
		$sql = mysql_query("SELECT * FROM materi ORDER BY id DESC");
		$result = mysql_num_rows($sql);
		if ($result > 0) {
		?>
      <div class="table-responsive">          
       <table class="table table-bordered table-hover">
         <thead>
           <tr>
             <th>#</th>
             <th>Nama</th>
             <th>Deskripsi</th>
			 <th>Tanggal</th>
			 <th>Link</th>
           </tr>
         </thead>
         <tbody>
			<?php
			while ($row = mysql_fetch_row($sql)) {
				echo'
					<tr>
						<td>' . $row[0]. '</td>
						<td>' . $row[1]. '</td>
						<td>' . $row[2]. '</td>
						<td>' . $row[3]. '</td>
						<td><a href="/berkas/' . $row[4]. '">Download</td>
					</tr>
					';
			}
			?>
         </tbody>
       </table>
      </div>
		<?php 
		}else{
			echo '<h4>Berkas masih kosong...</h4>';
		}
		?>
	  <div class=""></div>
    </div>

    <!-- JavaScript placed at the end of the document so the pages load faster -->
    <!-- Optional: Include the jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Optional: Incorporate the Bootstrap JavaScript plugins -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  </body>

</html>
