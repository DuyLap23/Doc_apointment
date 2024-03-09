<main>
    <?php
    if (is_array($select__billByid)) {
        extract($select__billByid);
        # code...
    } ?>
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
                    <a class="" href="index.php?act=listdonhang">Quản Lý Đơn Hàng </a>
                </li>
                <li>
                    <a class="active" href="#">Cập Nhật Trạng Thái Đơn Hàng </a>
                </li>
            </ul>
        </div>

    </div><a href="index.php?act=listdonhang"><button class="btn btn-insert  status completed mt-4">Trở Lại
        </button></button></a>

    <div class="table-data">


        <div class="order">
            <div class="head">
                <h3>Cập nhật trạng thái đơn hàng</h3>

            </div>
            <table>
                <thead>
                    <tr>
                        <th>Mã Đơn Hàng</th>
                        <th>Thông Tin Khách Hàng</th>
                        <th>Trạng Thái Đơn Hàng</th>
                        <th>Cập Nhật</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="index.php?act=updatedh" method="post">

                        <tr>
                            <td>
                                <?= $id_bill ?>
                                <input type="hidden" name="id_bill" id="" value="<?= $id_bill ?>">
                            </td>
                            <td>
                                <?= $name ?><br>
                                <br>
                                <?= $email ?><br>
                                <br>
                                <?= $address ?><br>
                                <br>
                                <?= $tel ?><br>


                            </td>
                            <td>
                                <select name="status" id="" class="rounded-4 ">
                                    <?php if ($bill_startus == 0) { ?>
                                        <option value="0">Đơn Hàng Mới</option>
                                        <option value="1">Đang Xử Lý</option>
                                        <option value="4">Hủy Đơn </option>


                                    <?php } elseif ($bill_startus == 1) { ?>
                                        <option value="1">Đang Xử Lý</option>
                                        <option value="4">Hủy Đơn </option>
                                        <option value="2">Đang Giao Hàng</option>

                                    <?php } elseif ($bill_startus == 2) { ?>
                                        <option value="2">Đang Giao Hàng</option>
                                        <option value="3">Đã Giao Hàng </option>
                                    <?php } ?>

                                </select>

                            </td>
                            <td>
                                <input type="submit" name="updatedh" id="" class="btn btn-submit" value="Cập Nhật">
                            </td>
                        </tr>

                    </form>
                </tbody>
            </table>
            <div class="notification">
                <?php
                if (isset($Notification) && $Notification != "") {
                    echo $Notification;
                }
                ?>
            </div>
        </div>

    </div>
</main>