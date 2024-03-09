<main>
	<div class="head-title">
		<div class="left">
			<h1>Tổng quan</h1>
			<ul class="breadcrumb">
				<li>
					<a href="#">Trang Chủ</a>
				</li>
				<li><i class='bx bx-chevron-right'></i></li>
				<li>
					<a class="active" href="#">Tổng Quan </a>
				</li>
			</ul>
		</div>

	</div>

	<ul class="box-info">
		<li>
			<i class='bx bxs-calendar-check'></i>
			<span class="text">
				<?php foreach ($count_bill as $key => $bill):
					extract($bill);

					?>
					<h3>
						<?= $bill['count'] ?>
					</h3>
				<?php endforeach; ?>

				<p>Đơn Hàng</p>
			</span>
		</li>
		<li>
			<i class='bx bxs-group'></i>
			<span class="text">
				<?php foreach ($count_account as $key => $ac):
					extract($ac);

					?>
					<h3>
						<?= $ac['count'] ?>
					</h3>
				<?php endforeach; ?>
				<p>Khách Hàng</p>
			</span>
		</li>
		<li>
			<i class='bx bxs-dollar-circle'></i>
			<span class="text">
			<h3> <strong>83.043.354 VND</strong>
			</h3>
				<p>Tổng Doanh Thu</p>
			</span>
		</li>

	</ul>


	<div class="table-data">
		<div class="order">
			<div class="head">
				<h3>Đơn Hàng Gần Đây </h3>
				<i class='bx bx-search'></i>
				<i class='bx bx-filter'></i>
			</div>
			<table>
				<thead>
					<tr>
						<th>Khách Hàng</th>
						<th>Ngày</th>
						<th>Trạng Thái</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($loadAll_bill_home as $key => $bill):
						extract($bill);
						$kh = $bill["name"] . '<br>
                    	' . $bill["email"];
						$trangthaidh = get_ttdh($bill["bill_startus"]);
						?>
						<tr>
							<td>
								<p>
									<?= $kh ?>
								</p>
							</td>
							<td>
								<p>
									<?= $bill["date"] ?>
								</p>
							</td>
							<td>
								<!-- <select name="" id="" class=" <?php
								if ($bill["bill_startus"] == 0) {
									echo 'status completed';
								} elseif ($bill["bill_startus"] == 1) {
									echo 'status pending';

								} elseif ($bill["bill_startus"] == 2) {
									echo 'status cancel';
								} elseif ($bill["bill_startus"] == 3) {
									echo 'status process';
								} elseif ($bill["bill_startus"] == 4) {
									echo 'status bluecheck';
								} ?>">
									<option value=""><?= $trangthaidh ?></option>
								</select> -->
								<span class=" <?php
								if ($bill["bill_startus"] == 0) {
									echo 'status completed';
								} elseif ($bill["bill_startus"] == 1) {
									echo 'status pending';

								} elseif ($bill["bill_startus"] == 2) {
									echo 'status cancel';
								} elseif ($bill["bill_startus"] == 3) {
									echo 'status process';
								} elseif ($bill["bill_startus"] == 4) {
									echo 'status bluecheck';
								} ?>">
									<?= $trangthaidh ?>
								</span>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

	</div>
</main>