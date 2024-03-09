<main>
    <div class="head-title">
        <div class="left">
            <h1>Quản Lý Khách Hàng</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="index.php?act=home">Trang Chủ</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Quản Lý Khách Hàng </a>
                </li>
            </ul>
        </div>

    </div>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Quản Lý Khách Hàng</h3>

            </div>
            <table>
                <thead>
                    <tr>
                        <th>Mã Khách Hàng </th>
                        <th>Tên Khách Hàng</th>
                        <th>Email</th>
                        <th>Mật khẩu</th>
                        <th>Số Điện Thoại</th>
                        <th>Role</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($listkhachhang as $key => $khachhang) {
                        ?>
                        <tr class="tr-shadow">
                            <td>
                                <?= $key + 1 ?>
                            </td>
                            <td>
                                <?= $khachhang['user_name'] ?>
                            </td>
                            <td>
                                <?= $khachhang['email'] ?>
                            </td>
                            <td>
                                <?= $khachhang['password'] ?>
                            </td>
                            <td>
                                <?= $khachhang['tel'] ?>
                            </td>
                            <td>
                                <?= $khachhang['role'] ?>
                            </td>
                            <td>
                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa khách hàng này không?')"
                                    href="index.php?act=deletekh&id_khachhang=<?= $khachhang['user_id'] ?>"><button
                                        class="btn status pending">xóa</button></a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>

        </div>

    </div>
</main>