<main>
    <div class="head-title">
        <div class="left">
            <h1>Thống Kê</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="index.php?act=home">Trang Chủ</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Thống Kê </a>
                </li>
            </ul>
        </div>

    </div>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Thống Kê </h3>

            </div>
            <div class="pb-3"> <a href="index.php?act=bieudo" class="btn btn-primary">Biểu đồ</a></div>
            <table>
                <thead>
                    <tr>
                        <th>Mã Danh Mục</th>
                        <th>Tên Danh Mục</th>
                        <th>Số Lượng</th>
                        <th>Giá Thấp Nhất</th>
                        <th>Giá Cao Nhất</th>
                        <th>Giá Trung Bình</th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($Thong_ke_cate as $key => $value):
                        extract($value);
                        ?>
                        <tr class="tr-shadow">
                            <td>
                                <?= $category_id ?>
                            </td>
                            <td>
                                <?= $category_name ?>
                            </td>
                            <td>
                                <?= $soluong ?>
                            </td>
                            <td>
                                <?= number_format($gia_min, 0, '.', ',') ?> VND
                            </td>
                            <td>
                                <?= number_format($gia_max, 0, '.', ',') ?> VND
                            </td>
                            <td>
                                <?= number_format($gia_avg, 0, '.', ',') ?> VND
                            </td>

                        </tr>
                    <?php endforeach; ?>



                </tbody>
            </table>

        </div>

    </div>
</main>