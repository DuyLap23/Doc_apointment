<main>
    <div class="head-title">
        <div class="left">
            <h1>Thêm Danh Mục</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="index.php?act=home">Trang Chủ</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="index.php?act=listdm" href="#">Danh Mục </a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Thêm Danh Mục </a>
                </li>
            </ul>
        </div>

    </div>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Danh Mục</h3>

            </div>
            <form action="index.php?act=createdm" class="form-input" method="post">
                <div class="form-group pb-4">
                    <label for="">
                        Mã Danh Mục
                    </label> <br />
                    <input type="text" name="category_id" id="" value="" readonly class="rounded-2 w-75"> <br />
                    <label for="" class="label pt-2">
                        Tên Danh Mục
                    </label><br />
                    <input type="text" name="category_name" id="" value="" placeholder="Nhập tên danh mục "
                        class="input w-75 rounded-2">
                </div>


                <input type="submit" name="submitdm" id="" value="Thêm" class="btn btn-insert  status completed ">
                <input type="reset" name="reset" id="" value="Nhập Lại" class=" btn btn-reset ">

            </form>
            <a href="index.php?act=listdm"><button class="btn btn-insert  status completed mt-4">Về Trang Danh Sách
                </button></button></a>
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