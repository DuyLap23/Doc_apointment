<main>
<div class="head-title">
    <div class="left">
        <h1>Quản Lý Đơn Hàng</h1>
        <ul class="breadcrumb">
            <li>
                <a href="index.php?act=home">Trang Chủ</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="" href="index.php?act=listdonhang">Quản Lý Đơn Hàng </a>
            </li>
            <li>
                <a class="active" href="#">Chi Tiết Đơn Hàng </a>
            </li>
        </ul>
    </div>

</div><a href="index.php?act=listdonhang"><button class="btn btn-insert  status completed mt-4">Trở Lại </button></button></a>

<div class="table-data">


    <div class="order">
        <div class="head">
            <h3>Chi Tiết Đơn Hàng</h3>
          
        </div>
        <table>
            <thead>
                <tr>
                    <th>Mã Đơn Hàng</th>
                    <th>Mã Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Size</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Giá</th>
                    <th>Phương Thức Thanh Toán</th>
                    <th>Tình Trạng Đơn Hàng</th>
                  
                 
                </tr>
            </thead>
            <tbody>
            <?php
              
                foreach($select_All_billDetailByid as $billDetail):
                    extract($billDetail);
                    $count_sl = count_Quanti($billDetail["id_bill"]);
                    $trangthaidh = get_ttdh($billDetail["bill_startus"]);
                    $payment = get_pay($billDetail["payment"]??'');
                ?>
                <tr class="tr-shadow">
                    <td>
                       <?= $billDetail["id_bill"] ?>
                    </td>   
                    <td>    <?= $billDetail["product_id"] ?></td>
                    <td>    <?= $billDetail["quantity"] ?></td>
                    <td>    <?= $billDetail["size"] ?></td>
                    <td>    <?= $billDetail["product_name"] ?></td> 
                    <td>    <?=number_format($billDetail["price"], 0, '.', ',')  ?> VND</td>
                    <td>    <?= $payment ?></td>
                    <td>
                        <span class=" <?php
                                if($billDetail["bill_startus"] == 0) {
                                    echo 'status completed';
                                } elseif($billDetail["bill_startus"] == 1) {
                                    echo 'status pending';

                                } elseif($billDetail["bill_startus"] == 2) {
                                    echo 'status cancel';
                                } elseif($billDetail["bill_startus"] == 3) {
                                    echo 'status process';
                                
                                }
                                 ?>"><?= $trangthaidh?>
                                </span>
                                </td>
                  
                </tr>
             
        
               
                <?php
                endforeach;
                ?>
             
            </tbody>    
        </table>
       
    </div>

</div>
</main>     