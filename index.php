<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"  integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

	<title>AdminHub</title>
</head>
<body>

	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
		<img src="bm.png" alt="logo" width="150" class="logo">
			<span class="text"><br> SMA BM </span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#" onclick="loadDashboard()">
					<i class='bx bxs-dashboard'></i>
					<span class="text">Dashboard</span>

				</a>
				<li>
				<a href="login.php" onclick="loadlogin()">
					<i class='bx bxs-doughnut-chart'></i>
					<span class="text">Logout</span>
				</a>
			</li>
			</li>
			<li>
				<a href="#" onclick="loadHome()">
					<i class='bx bxs-shopping-bag-alt'></i>
					<span class="text">Home</span>
				</a>
			</li>
			<li>
				<a href="#" onclick="loadSiswa()">
					<i class='bx bxs-doughnut-chart'></i>
					<span class="text">Siswa</span>
				</a>
			</li>
			<li>
				<a href="#" onclick="loadGuru()">
					<i class='bx bxs-doughnut-chart'></i>
					<span class="text">Guru</span>
				</a>
			</li>
			<li>
				<a href="#" onclick="loadmapel()">
					<i class='bx bxs-doughnut-chart'></i>
					<span class="text">Mata Pelajaran</span>
				</a>
			</li>
			<li>
				<a href="#" onclick="loadnilai()">
					<i class='bx bxs-doughnut-chart'></i>
					<span class="text">Nilai</span>
				</a>
			</li>
			
		</ul>
		
		<ul class="side-menu">
			<li>
				<a href="login.php" class="logout">
					<i class='bx bxs-log-out-circle'></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu'></i>
			<a href="#" class="nav-link">DASHBOARD</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
			</div>

			<!-- Dynamic Content Area -->
			<div id="dynamic-content" class="container mt-5">
				<!-- Initial Content: Dashboard -->
				<h2>Welcome to SMA BM</h2>
				<p></p>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
	<!-- Bootstrap JS and dependencies -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<!-- Custom JS -->
	<script>
		function loadDashboard() {
			document.getElementById('dynamic-content').innerHTML = `
				<h2>Welcome to  SMA BM</h2>
				<p></p>
			`;
		}

		function loadHome() {
			document.getElementById('dynamic-content').innerHTML = `
				<h2>Informasi SMA BM</h2>
				<p>SMA BM adalah salah satu sekolah menengah atas terkemuka yang berfokus pada pengembangan akademik dan non-akademik siswa. Dengan fasilitas yang lengkap dan tenaga pengajar yang berpengalaman, kami berkomitmen untuk memberikan pendidikan terbaik bagi siswa-siswi kami.</p>
				<h3>Fasilitas Sekolah</h3>
				<ul>
					<li>Laboratorium Komputer</li>
					<li>Laboratorium Sains</li>
					<li>Perpustakaan</li>
					<li>Lapangan Olahraga</li>
					<li>Ruang Musik dan Seni</li>
				</ul>
				
			`;
		}

		function loadSiswa() {
			const xhr = new XMLHttpRequest();
			xhr.open('GET', 'siswa.php', true);
			xhr.onload = function() {
				if (this.status === 200) {
					document.getElementById('dynamic-content').innerHTML = this.responseText;
				}
			};
			xhr.send();
		}

		function loadGuru() {
			const xhr = new XMLHttpRequest();
			xhr.open('GET', 'profile_guru.php', true);
			xhr.onload = function() {
				if (this.status === 200) {
					document.getElementById('dynamic-content').innerHTML = this.responseText;
				}
			};
			xhr.send();
		}

		function loadmapel() {
			const xhr = new XMLHttpRequest();
			xhr.open('GET', 'mata_pelajaran.php', true);
			xhr.onload = function() {
				if (this.status === 200) {
					document.getElementById('dynamic-content').innerHTML = this.responseText;
				}
			};
			xhr.send();
		}
		function loadnilai() {
			const xhr = new XMLHttpRequest();
			xhr.open('GET', 'nilai_siswa.php', true);
			xhr.onload = function() {
				if (this.status === 200) {
					document.getElementById('dynamic-content').innerHTML = this.responseText;
				}
			};
			xhr.send();
		}
		function loadlogout() {
			const xhr = new XMLHttpRequest();
			xhr.open('GET', 'login.php', true);
			xhr.onload = function() {
				if (this.status === 200) {
					document.getElementById('dynamic-content').innerHTML = this.responseText;
				}
			};
			xhr.send();
		}

		// Load initial dashboard content
		loadDashboard();
	</script>

</body>
</html>
