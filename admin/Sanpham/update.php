<?php
if (isset($sanpham)) {
    extract($sanpham);

}
?>

<main>
    <div class="head-title">
        <div class="left">
            <h1>Cập Nhật Sản Phẩm</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="index.php?act=home">Trang Chủ</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="" href="index.php?act=listsp">Sản Phẩm </a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Cập Nhật Sản Phẩm </a>
                </li>
            </ul>
        </div>

    </div>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Sản Phẩm</h3>

            </div>
            <form action="index.php?act=updatesp" class="form-input" method="post" enctype="multipart/form-data">
                <div class="form-group pb-4">
                    <label for="">
                        Mã Sản Phẩm
                    </label> <br />
                    <input type="text" name="product_id" id="" value="<?= $product_id ?>" readonly
                        class="rounded-2 w-75"> <br />
                    <label for="" class="label pt-2">
                        Tên Sản Phẩm
                    </label><br />
                    <input type="text" name="product_name" id="" value="<?= $product_name ?>"
                        placeholder="Nhập tên sản phẩm " class="input w-75 rounded-2"><br />
                    <label for="" class="label pt-2">
                        Ảnh
                    </label><br />
                    <input type="hidden" value="<?= $image ?>" name="img" width="80px">
                    <input type="file" name="image[]" multiple accept="image/*" width="80px" height="50px"
                        class="input w-75 rounded-2 fileImage"><br />
                    <?php
                    $images = explode(',', $image);
                    foreach ($images as $key => $value): ?>
                        <img src="../image/<?= $value ?>" width="80px" height="80px" alt="">
                    <?php endforeach; ?>
                    <div class="list-img ">

                    </div>
                    <script>
                        let listImg = document.querySelector('.list-img');
                        let fileImage = document.querySelector('.fileImage');
                        fileImage.onchange = function () {
                            let file = fileImage.files;
                            console.log(file);
                            for (let i = 0; i < file.length; i++) {
                                let img = document.createElement('img');
                                img.src = URL.createObjectURL(file[i]);
                                listImg.appendChild(img);
                            }

                        }
                    </script>

                    <label for="" class="label pt-2">
                        Giá
                    </label><br />
                    <input type="number" name="price" id="" value="<?= $price ?>" placeholder="Nhập số lượng "
                        class="input w-75 rounded-2"><br />



                    <label for="" class="label pt-2">
                        Mô Tả
                    </label><br />
                    <textarea name="description" id="" cols="30" rows="10"><?= $description ?></textarea><br />

                    <label for="" class="label pt-2">
                        Biến Thể
                    </label><br />
                    <?php foreach ($load_all_pro_detail as $key => $value):
                        # code...
                        extract($value);

                        ?>
                        <div class="variant d-flex pb-2">
                            <label for="size1" class="label px-3">
                                Size
                            </label><br />
                            <input type="text" name="size[]" id="size1" value="<?= $size ?>" class=" rounded-2 px-3"><br />
                            <label for="quantity1" class="label px-3">
                                Số Lượng
                            </label><br />
                            <input type="number" name="quantity[]" id="quantity1" value="<?= $quantity ?>"
                                placeholder="Nhập số lượng " class=" rounded-2 "><br />
                        </div>
                    <?php endforeach; ?>


                    <label for="" class="pt-3">Danh Mục</label><br />
                    <select name="category_id" id="" class="rounded-2 ">
                        <?php
                        foreach ($sellect_categories as $dm) {
                            $cate_id = $dm['category_id']; // Trích xuất giá trị 'ma_loai' từ mảng $dm
                            $cate_name = $dm['category_name']; // Trích xuất giá trị 'ten_loai' từ mảng $dm
                            if ($cate_id == $category_id) {
                                echo '<option value="' . $cate_id . '" selected>' . $cate_name . '</option>';
                            } else {
                                echo '<option value="' . $cate_id . '">' . $cate_name . '</option>';
                            }
                        }
                        ?>
                    </select>
                    <div class="notification">
                        <?php
                        if (isset($Notification) && $Notification != "") {
                            echo $Notification;
                        }
                        ?>
                    </div>
                </div>


                <a href="index.php?act=listsp"><input type="submit" name="updatesp" id="" value="Cập Nhật"
                        class="btn btn-insert  status completed "> </a>
                <input type="reset" name="reset" id="" value="Nhập Lại" class=" btn btn-reset ">
            </form>
        </div>

    </div>
</main>