<?php  
	include('../../config/koneksi.php');
	session_start();
	if($_SESSION['status'] == "warga"){
		header("Location: ../../admin_denied_page.php");
	}else if($_SESSION['status'] != "warga" && $_SESSION['status'] != "admin"){
		header("Location: ../../other_denied_page.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin | Kas RT</title>
	<link rel="shortcut icon" href="../../assets/img/favicon.png" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/dropdown.css">
	<script type="text/javascript" src="../../assets/js/jquery-1.12.2.js"></script>
	<script type="text/javascript" src="../../assets/js/jquery.js"></script>	
	<script type="text/javascript" src="../../assets/js/dropdown.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#tombol").click(function(){
				window.confirm("Apakah anda yakin ingin mengirim peringatan kebakaran?");
			});
		});
		$(document).ready(function(){
			$("#tombol1").click(function(){
				window.confirm("Apakah anda yakin ingin mengirim peringatan ada maling?");
			});
		});
		$(document).ready(function(){
			$("#tombol2").click(function(){
				window.confirm("Apakah anda yakin ingin mengirim peringatan bencana?");
			});
		});

	</script>
	<style>
		/* General Styles */
		h4 { color: #c5c5c5; margin-top: 50px; }
		body { margin: 0; font-family: Arial; background-color: #fff; }
		ul#simple { display: table; list-style: none; margin: 0 auto; padding: 0; }
		ul#simple > li:last-child { margin-right: 0; }
		ul#simple > li > span { margin-bottom: 10px; }
	</style>

	<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#dropdown-account > .account").click(function(){
				$("#dropdown-account > .dropdown").slideToggle("slow", function(){
					if($(this).css('display') == "none")
						$("#dropdown-account > .account").removeClass("active");
					else
						$("#dropdown-account > .account").addClass("active");
				});
			});
		});
	</script>
</head>
<body>
	<!-- <div id="wrapper"> -->
		<header id="header-top">
			<img src="../../assets/img/logorpl.png" style="float:left; width: 150px; margin: 20px">
			<ul id="simple" style="float:right">
				<li>
					<div id="dropdown-account">
						<div class="account">
							<img src="../../assets/images/account.png" alt="Account"/>
							<?php echo $_SESSION['nama_user']; ?>
							<img src="../../assets/images/arrow.png" alt="Dropdown"/>
						</div>
						<div class="dropdown" style="display:none;margin-top:10px;">
							<ul>
								<li style="height:60px;width:150px;">
									<table>
										<tbody>
											<tr>
												<td><img src="../../assets/images/account.png" alt="Account" style="padding-left:5px;padding-top:5px;padding-right:5px" /></td>
												<td>
													<?php echo $_SESSION['nama_username']; ?><br>
													<?php echo $_SESSION['status']; ?><br>
												</td>
											</tr>
										</tbody>
									</table>									
								</li>
								<li><a href="../warga/kas.php" style="text-align:left"><img src="../../assets/images/account-icon.png" alt="Upload" style="float:left;width:15px" /> User Mode</a></li>
								<li><a href="#" style="text-align:left"><img src="../../assets/images/settings.png" alt="Upload" style="float:left;width:15px" /> Pengaturan</a></li>
								<li><a href="../../proses/proses_logout.php" style="text-align:left"><img src="../../assets/images/logout.png" alt="Upload" style="float:left;width:15px"/> Logout</a></li>
							</ul>
						</div>
					</div>
				</li>
			</ul>
		</header>
		<nav>
			<ul>
				<li><a href="admin_berita.php">Berita</a></li>
				<li><a href="admin_profil.php">Profil</a></li>
				<li><a href="admin_biodata.php">Biodata</a></li>
				<li><a href="admin_pengumuman.php">Pengumuman</a></li>
				<li><a href="admin_berkas.php">Berkas</a></li>
				<li><a href="admin_keluhan.php">Keluhan</a></li>
				<li><a class="active" href="admin_kas.php">Kas RT</a></li>
			</ul>
		</nav>
		<section>
			<aside>
				<div id="tombolAlert">
					<div id="tombol">
						<a href=""><center>
							<img src="../../assets/img/api.png" style="width:70px;">
							<h2 style="color: white; padding-bottom: 50px;">Kebakaran</h2>
						</center></a>
					</div>	
					<div id="tombol1">
						<center>
							<img src="../../assets/img/maling.png" style="width:70px;">
							<h2 style="color: white; padding-bottom: 50px;">Maling</h2>
						</center>
					</div>
					<div id="tombol2">
						<center>
							<img src="../../assets/img/bencana.png" style="width:100px;">
							<h2 style="color: white; padding-bottom: 50px;">Bencana</h2>
						</center>
					</div>
				</div>
			</aside>
			<div id="berkas">
				<div class="bhead">
					<div>
						<h1 style="color: #31a9e1; width:740px; float:left;font-family:Calibri">Kas RT</h1>
					</div>

					<div>
						
						<div class="kotak-tambah hover">
							<a href="../tambah_kas.php"><p style="clear:both;margin:6px 0px 0px 20px;">+Tambah Kas RT</p></a>
						</div>
					</div>
				</div>
				<div class="dropdown" style="float:right">
			  		<button onclick="myFunction()" class="dropbtn">Filter   <img src="../../assets/img/arrow-icon.png" alt="Dropdown" style="width:10px;margin-left:5px;vertical-align:middle" /></button>
				  	<div id="myDropdown" class="dropdown-content">
					    <a href="admin_kas.php">Semua</a>
					    <a href="admin_filter_kas.php?bulan=januari">Januari</a>
					    <a href="admin_filter_kas.php?bulan=februari">Februari</a>
					    <a href="admin_filter_kas.php?bulan=maret">Maret</a>
					    <a href="admin_filter_kas.php?bulan=april">April</a>
					    <a href="admin_filter_kas.php?bulan=mei">Mei</a>
					    <a href="admin_filter_kas.php?bulan=juni">Juni</a>
					    <a href="admin_filter_kas.php?bulan=juli">Juli</a>
					    <a href="admin_filter_kas.php?bulan=agustus">Agustus</a>
					    <a href="admin_filter_kas.php?bulan=september">September</a>
					    <a href="admin_filter_kas.php?bulan=oktober">Oktober</a>
					    <a href="admin_filter_kas.php?bulan=november">November</a>
					    <a href="admin_filter_kas.php?bulan=desember">Desember</a>
				  	</div>
				</div>
				<br><br>
				<h3 style="color:#31a9e1; cursor:pointer" class="add_news">Pemasukan</h2>
				<hr>	
				<table class="tabel_kas box_add_news">
					<thead>
						<td>Jenis</td>
						<td>Nominal</td>
						<td>Jumlah</td>
						<td>Satuan</td>
						<td>Total</td>
						<td>Aksi</td>
					</thead>
					<tbody>
						<?php 
							$query = "SELECT * FROM kas WHERE status='pemasukan'";
							$hasil = mysql_query($query);
							while ($row = mysql_fetch_array($hasil)){
								// $id = $row['id'];
								$jenis = $row['jenis'];
								$nominal = $row['nominal'];
								$jumlah = $row['jumlah'];
								$satuan = $row['satuan'];
								$total = $row['total'];
								echo "<tr>";
								echo "<td>$jenis</td>";
								echo "<td>$nominal</td>";
								echo "<td>$jumlah</td>";
								echo "<td>$satuan</td>";
								echo "<td>$total</td>";
								echo "<td><a href='../../proses/proses_hapus_kas.php?id=".$row['id']."'><img src='../../assets/img/icon-hapus.png' style='width:50px;margin-right:10px;img:hover{background-color:#ccc};'></a>
										<a href='../../proses/proses_edit_biodata.php?id=".$row['id']."'><img src='../../assets/img/icon-edit.png' style='width:50px;margin-right:15px'></a></td>";
								echo "</tr>";
							}
						?>	
						<?php  
							$total1 = "SELECT SUM(total) AS hasil FROM kas WHERE status='pemasukan'";
							$jumlah1 = mysql_query($total1);
							$result = mysql_fetch_array($jumlah1);
							echo "<tr>";
							echo "<td colspan='4'>Total</td>";
							echo "<td>{$result['hasil']}</td>";
							echo "<td></td>";
							echo "</tr>";
						?>
					</tbody>
				</table>
				<br><br>
				<table class="tabel_pengeluaran">
					<thead>
						<td><h3 style="color: #31a9e1;">Pengeluaran</h3></td>
						<td class="hide_pengeluaran" style="cursor:pointer;">Hide</td>
					</thead>
				</table><br>
				<table class="tabel_kas box_hide_pengeluaran">
					<thead>
						<td>Jenis</td>
						<td>Nominal</td>
						<td>Jumlah</td>
						<td>Satuan</td>
						<td>Total</td>
						<td>Aksi</td>
					</thead>
					<tbody>
						<?php 
							$query = "SELECT * FROM kas WHERE status='pengeluaran'";
							$hasil = mysql_query($query);
							while ($row = mysql_fetch_array($hasil)){
								// $id = $row['id'];
								$jenis = $row['jenis'];
								$nominal = $row['nominal'];
								$jumlah = $row['jumlah'];
								$satuan = $row['satuan'];
								$total = $row['total'];
								echo "<tr>";
								echo "<td>$jenis</td>";
								echo "<td>$nominal</td>";
								echo "<td>$jumlah</td>";
								echo "<td>$satuan</td>";
								echo "<td>$total</td>";
								echo "<td><a href='../../proses/proses_hapus_biodata.php?id=".$row['id']."'><img src='../../assets/img/icon-hapus.png' style='width:50px;margin-right:10px;'></a>
										<a href='../../proses/proses_edit_biodata.php?id=".$row['id']."'><img src='../../assets/img/icon-edit.png' style='width:50px;margin-right:15px'></a></td>";
								echo "</tr>";
							}
						?>
						<?php  
							$total1 = "SELECT SUM(total) AS hasil FROM kas WHERE status='pengeluaran'";
							$jumlah1 = mysql_query($total1);
							$result = mysql_fetch_array($jumlah1);
								// var_dump($result);die();
								echo "<tr>";
								echo "<td colspan='4'>Total</td>";
								echo "<td>{$result['hasil']}</td>";
								echo "<td></td>";
								echo "</tr>";
							
						?>	
					</tbody>
				</table>
			</div>
		</section>		
		<footer>
			Copyright &copy KT-E Project - 2016
		</footer>
		<script>
			$(document).ready(function() {
				var isShow = false;
				$('.hide_pemasukan').click(function() {
					if (!isShow) {
						$('.box_hide_pemasukan').slideDown();
						$(this).html('Hide');
						isShow = true;
					} else {
						$('.box_hide_pemasukan').slideUp();
						$(this).html('Show');
						isShow = false;
					}
				});
			});
			$(document).ready(function() {
				var isShow = false;
				$('.hide_pengeluaran').click(function() {
					if (!isShow) {
						$(this).html('Hide');
						$('.box_hide_pengeluaran').slideDown();
						isShow = true;
					} else {
						$(this).html('Show');
						$('.box_hide_pengeluaran').slideUp();
						
						isShow = false;
					}
				});
			});
		</script>
	<!-- </div> -->
</body>
</html>