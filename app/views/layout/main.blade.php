<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="path/to/boxicons.min.css">
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<!-- My CSS -->
	@include('layout.style')

	<title>UniQue</title>
</head>

<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-alarm-add	'></i>
			<span class="text">UniQue</span>
		</a>
		<ul class="side-menu top">
			<li class="{{ (!isset($_GET['act']) || $_GET['act'] === 'home') ? 'active' : '' }}">
				<a href="index.php?act=home">
					<i class='bx bxs-dashboard'></i>
					<span class="text">Trang Chủ</span>
				</a>
			</li>


			<li class="{{ (!isset($_GET['act']) || $_GET['act'] === 'listdm') ? 'active' : '' }}">
				<a href="index.php?act=listdm">
					<i class='bx bxs-category'></i>
					<span class="text">Danh Mục</span>
				</a>
			</li>

			<li class="{{ (!isset($_GET['act']) || $_GET['act'] === 'listsp') ? 'active' : '' }}">
				<a href="index.php?act=listsp">
					<i class='bx bxs-shopping-bag'></i>
					<span class="text">Sản Phẩm</span>
				</a>
			</li>

			<li class="{{ (!isset($_GET['act']) || $_GET['act'] === '') ? 'active' : '' }}">
				<a href="{{ route('b') }}">
					<i class='bx bxs-group'></i>
					<span class="text">Tài Khoản</span>
				</a>
			</li>
			<li class="{{ (!isset($_GET['act']) || $_GET['act'] === 'listbinhluan') ? 'active' : '' }}">
				<a href="index.php?act=listbinhluan">
					<i class='bx bxs-message-dots'></i>
					<span class="text">Bình Luận</span>
				</a>
			</li>
			<li class="{{ (!isset($_GET['act']) || $_GET['act'] === 'listdonhang') ? 'active' : '' }}">
				<a href="index.php?act=listdonhang">
					<i class='bx bxs-shopping-bag-alt'></i>
					<span class="text">Quản Lý Đơn Hàng</span>
				</a>
			</li>
			<li class="{{ (!isset($_GET['act']) || $_GET['act'] === 'listthongke') ? 'active' : '' }}">
				<a href="index.php?act=listthongke">
					<i class='bx bxs-doughnut-chart'></i>
					<span class="text">Thống Kê Doanh Thu</span>
				</a>
			</li>
			<li class="{{ (!isset($_GET['act']) || $_GET['act'] === 'thongkedm') ? 'active' : '' }}">
				<a href="index.php?act=thongkedm">
					<i class='bx bxs-chart'></i>
					<span class="text">Thống Kê Sản phẩm</span>
				</a>
			</li>

			<li class="{{ (!isset($_GET['act']) || $_GET['act'] === 'view') ? 'active' : '' }}">
				<a href="../index.php">
					<i class='bx bxs-user'></i>
					<span class="text">Trang Người Dùng</span>
				</a>
			</li>

		</ul>

	</section>
	<section id="content">
		<nav>
			<i class='bx bx-menu'></i>

			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			</ul>
		</nav>
        @yield('content')
		<script src="../../../../public/js/script.js"></script>
<script src="../../../../public/js/sticky_sidebar.min.js"></script>
<script src="../../../../public/js/specific_listing.js"></script>


</body>

</html>