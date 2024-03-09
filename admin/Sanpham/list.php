<main>
    <div class="head-title">
        <div class="left">
            <h1>Sản Phẩm</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="index.php?act=home">Trang Chủ</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Sản Phẩm</a>
                </li>
            </ul>
        </div>

    </div>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Sản Phẩm</h3>
            </div>
            <div class="form-group  d-flex ">
                <form action="index.php?act=createsp" method="post" class="pb-4">

                    <a href="index.php?act=createsp"><button class="btn btn-insert">Thêm Sản Phẩm</button></a>
                </form>
                <form action="" method="post" class="form-group form-search-sp">
                    <div class="form-input pb-2 d-flex    ">

                        <input type="text" name="search" width="50px" placeholder="Search..." class="form-control mx-2">
                        <select name="category_id" class="rounded-4">
                            <option value="0" selected>Tất cả</option>
                            <?php
                            foreach ($sellect_categories as $danhmuc) {
                                extract($danhmuc);
                                echo '   <option value="' . $category_id . '">' . $category_name . '</option>';
                            }
                            ?>
                        </select>
                        <input type="submit" name="locsp" value="Lọc " class=" btn btn-insert mx-2">
                    </div>
                </form>
            </div>

            <table>

                <thead class="tr-shadow">
                    <tr>

                        <th>Mã Sản Phẩm</th>
                        <th>Tên Sản Phẩm</th>
                        <th colspan="2"> Ảnh </th>
                        <th>Giá </th>
                        <th class="desc">Mô Tả </th>

                        <th>Danh Mục</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    $stt = 1;
                    foreach ($listsanpham as $sanpham) {
                        extract($sanpham);


                        $suasp = "index.php?act=editsp&id_sp=" . $product_id;
                        $xoasp = "index.php?act=deletesp&id_sp=" . $product_id; // đường liên kết 
                        echo '<tr class="tr-shadow">
                       
                           <td>
                            ' . $product_id . '
                           </td>    
                           <td >' . $product_name . '</td>
                           <td colspan="2"> <img src="../image/' .
                            explode(',', $image)[0]
                            . '" ></td>
                           <td>' . number_format($price, 0, '.', ',') . 'VND</td>
                           <td class="desc">' . $description . '</td>
                         
                           <td>' . $category_name . '</td>
                           <td >
                               <a href="' . $suasp . '"><button class=" btn status completed">Sửa </button></a>
                           <a href=" ' . $xoasp . '" onclick="return confirm(\'Bạn có chắc muốn xóa?\')"><button class="btn status pending">xóa</button></a>
                           </td>
                       </tr>'
                        ;

                    }
                    ?>






                </tbody>
            </table>
            <div class="pagination__wrapper">

                <ul class="pagination">
                    <li><a href="index.php?act=listsp&page=<?= $page > 1 ? $page - 1 : 1 ?>" class="prev"
                            title="Trang trước">&#10094;</a></li>
                    <?php
                    $Pagepagination = ceil($countsp / $limit);

                    for ($i = 1; $i <= $Pagepagination; $i++):
                        ?>
                        <li>
                            <a href="index.php?act=listsp&page=<?= $i ?>" class="<?= $i == $page ? 'active' : '' ?>">
                                <?= $i ?>
                            </a>
                        </li>
                    <?php endfor; ?>
                    <li><a href="index.php?act=listsp&page=<?= $page < $Pagepagination ? $page + 1 : $page ?>"
                            class="next" title="Trang tiếp theo">&#10095;</a></li>
                </ul>
            </div>

        </div>

    </div>
</main>