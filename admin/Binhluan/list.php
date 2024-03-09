<main>
    <div class="head-title">
        <div class="left">
            <h1>Quản Lý Bình Luận</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="index.php?act=home">Trang Chủ</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Quản Lý Bình Luận </a>
                </li>
            </ul>
        </div>

    </div>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Quản Lý Bình Luận</h3>

            </div>
            <table>
                <thead>
                    <tr>
                        <th>Mã Bình Luận</th>
                        <th>Mã Khách Hàng</th>
                        <th>Mã Sản Phẩm</th>
                        <th>Nội Dung</th>
                        <th>Ngày Bình Luận</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($liastBinhluan as $key => $binhluan) {
                        ?>
                        <tr class="tr-shadow">
                            <td>
                                <?= $key + 1 ?>
                            </td>
                            <td>
                                <?= $binhluan['user_id'] ?>
                            </td>
                            <td>
                                <?= $binhluan['product_id'] ?>
                            </td>
                            <td>
                                <?= $binhluan['content'] ?>
                            </td>
                            <td>
                                <?= $binhluan['date_comment'] ?>
                            </td>
                            <td>

                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này hay không?')"
                                    href="index.php?act=deletebl&id_khachhang=<?= $binhluan['comment_id'] ?>"><button
                                        class="btn status pending">xóa</button></a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>

                </tbody>
            </table>
            <div class="pagination__wrapper">

                <ul class="pagination">
                    <li><a href="index.php?act=listbinhluan&page=<?= $page > 1 ? $page - 1 : 1 ?>" class="prev"
                            title="Trang trước">&#10094;</a></li>
                    <?php
                    $Pagepagination = ceil($countsp / $limit);

                    for ($i = 1; $i <= $Pagepagination; $i++):
                        ?>
                        <li>
                            <a href="index.php?act=listbinhluan&page=<?= $i ?>" class="<?= $i == $page ? 'active' : '' ?>">
                                <?= $i ?>
                            </a>
                        </li>
                    <?php endfor; ?>
                    <li><a href="index.php?act=listbinhluan&page=<?= $page < $Pagepagination ? $page + 1 : $page ?>"
                            class="next" title="Trang tiếp theo">&#10095;</a></li>
                </ul>
            </div>

        </div>

    </div>
</main>