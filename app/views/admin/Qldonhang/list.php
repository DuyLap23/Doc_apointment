<main>
    <div class="head-title">
        <div class="left">
            <h1>Quản Lý Đơn Hàng</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="index.php?act=home">Trang Chủ</a>
                </li>
                <li>
                    <i class='bx bx-chevron-right'></i>
                </li>
                <li>
                    <a class="active" href="#">Quản Lý Đơn Hàng </a>
                </li>
            </ul>
        </div>

    </div>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Quản Lý Đơn Hàng</h3>

            </div>
            <table>
                <thead>
                    <tr>
                        <th>Mã Đơn Hàng</th>
                        <th>Mã Khách Hàng</th>
                        <th>Ngày Đặt Hàng</th>
                        <th>Số Lượng</th>
                        <th>Tổng Giá Trị</th>
                        <th>Tình Trạng Đơn Hàng</th>
                        <th>Chi Tiết Đơn Hàng</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($loadAll_bill as $key => $bill):
                        extract($bill);
                        $kh = $bill["name"] . '<br>
            
                    ' . $bill["email"] . '<br>
                    ' . $bill["address"] . '<br>
                    ' . $bill["tel"];
                        $count_sl = count_sl($bill["id_bill"]);
                        $trangthaidh = get_ttdh($bill["bill_startus"]);
                        $detail_Dh = 'index.php?act=order_detail&id_bill=' . $bill["id_bill"];
                        $dele = "index.php?act=deletedh&id_dh=" . $bill["id_bill"];
                        $edit = "index.php?act=editdh&id_dh=" . $bill["id_bill"];

                        ?>
                        <tr class="tr-shadow box2">
                            <td>
                                <?= $bill["id_bill"] ?>
                            </td>
                            <td>
                                <?= $kh ?>
                            </td>
                            <td>
                                <?= $bill["date"] ?>
                            </td>
                            <td>
                                <?= $count_sl ?>
                            </td>

                            <td>
                                <?= number_format($bill['total'], 0, '.', ',') ?> VND
                            </td>

                            <td>
                                <span class="
                                <?php
                                if ($bill["bill_startus"] == 0) {
                                    echo 'status completed';
                                } elseif ($bill["bill_startus"] == 1) {
                                    echo 'status pending';

                                } elseif ($bill["bill_startus"] == 2) {
                                    echo 'status cancel';
                                } elseif ($bill["bill_startus"] == 3) {
                                    echo 'status process';

                                } elseif ($bill["bill_startus"] == 4) {
                                    echo 'status  bluecheck';

                                } ?>
                        ">
                                    <?= $trangthaidh ?>
                                </span>
                            </td>

                            <td>

                                <a href="<?= $detail_Dh ?>">
                                    <button class="btn btn-submit">Chi Tiết Đơn Hàng
                                    </button>
                                </a>
                            </td>
                            <td class="d-flex justify-content-around" style="gap: 5px ;line-height: 80px">
                                <?php

                                if ($bill["bill_startus"] == 3 || $bill["bill_startus"] == 4) { ?>
                                    <a href=" <?= $edit ?>  ">

                                    </a>
                                    <?php
                                } else {
                                    ?>
                                    <a href=" <?= $edit ?>  " class="">
                                        <button class="btn btn-primary  ">Sửa
                                        </button>
                                    </a>
                                    <?php
                                }

                                ?>


                            </td>
                        </tr>



                    <?php endforeach; ?>





                </tbody>
            </table>




            <div class="pagination__wrapper">

                <ul class="pagination">
                    <li><a href="index.php?act=listdonhang&page=<?= $page > 1 ? $page - 1 : 1 ?>" class="prev"
                            title="Trang trước">&#10094;</a></li>
                    <?php
                    $Pagepagination = ceil($countDh / $limit);

                    for ($i = 1; $i <= $Pagepagination; $i++):
                        ?>
                        <li>
                            <a href="index.php?act=listdonhang&page=<?= $i ?>" class="<?= $i == $page ? 'active' : '' ?>">
                                <?= $i ?>
                            </a>
                        </li>
                    <?php endfor; ?>
                    <li><a href="index.php?act=listdonhang&page=<?= $page < $Pagepagination ? $page + 1 : $page ?>"
                            class="next" title="Trang tiếp theo">&#10095;</a></li>
                </ul>
            </div>
        </div>

    </div>
</main>
<script>
    const toggleButton = document.getElementById('toggleButton');
    const box1 = document.getElementById('box1');

    toggleButton.addEventListener('click', function () {
        if (box1.style.display === 'none' || box1.style.display === '') {
            box1.style.display = 'block';
        } else {
            box1.style.display = 'none';
        }
    });
</script>