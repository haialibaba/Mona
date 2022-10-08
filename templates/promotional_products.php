<?php
    require_once('./classes/database.php');
    $db = new Database();
    $sql = "SELECT * FROM `tbl_sanpham` WHERE GiamGia <> 0 limit 8";
    $result = $db->select($sql);
?>

<div class="sales container">
    <div class="sale_title row">
        SẢN PHẨM GIẢM GIÁ
    </div>
    <div class="products row">
        <div class="sale__wrapper">
            <div class="sale__main">
                <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<div class="sale__item">
                            <div class="onsale">'.$row['GiamGia'].'%</div>
                            <a href="?page=detail&id=' . $row['MaSanPham'] . '">
                                <img src="admin/public/uploads/'.$row['HinhAnhSanPham'].'" alt="" />
                                <div class="product__name">'.$row['TenSanPham'].'</div>
                                <div class="sale__price">
                                    <span class="amount giacu">'.number_format($row['GiaSanPham'],'0',',','.').'đ</span>
                                    <span class="amount giagiam">'.number_format($row['GiaSanPham']-($row['GiaSanPham']*$row['GiamGia']/100),'0',',','.').'đ</span>
                                </div>
                            </a>
                            <button class="add_to_cart" data-maSanPham=' . $row['MaSanPham'] . '>Thêm vào giỏ</button>
                        </div>';
                        }}
                ?>
            </div>
        </div>
    </div>
</div>