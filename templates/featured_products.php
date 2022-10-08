<?php
require_once(__DIR__ . './../classes/product.php');
$product = new Product();
$result = $product->get_featured_products();
?>
<div class="products__main">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '  <div class="product__item">
                        <a href="?page=detail&id=' . $row['MaSanPham'] . '">
                            <img src="admin/public/uploads/' . $row['HinhAnhSanPham'] . '" alt="" class="img_reponsive"/>
                            <div class="product__name">' . $row['TenSanPham'] . '</div>
                            <div class="product__price">' . number_format($row['GiaSanPham'], '0', ',', '.') . ' đ</div>
                        </a>
                        <button class="add_to_cart" data-maSanPham=' . $row['MaSanPham'] . '>Thêm vào giỏ</button>
                    </div>';
        }
    }
    ?>
</div>