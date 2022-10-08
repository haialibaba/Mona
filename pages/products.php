<?php
require_once(__DIR__ . './../classes/product.php');
$product = new product();
$maLoai = isset($_GET['idLoai']) ? $_GET['idLoai'] : $_POST['maloai'];
$result = $product->get_products_by_category($maLoai);

// $total_records = $result->num_rows;
// $current_page = isset($_POST['p']) ? $_POST['p'] : 1;
// $limit = 9;
// $total_page = ceil($total_records / $limit);
// if ($current_page > $total_page) {
//     $current_page = $total_page;
// } else if ($current_page < 1) {
//     $current_page = 1;
// }
// $start = ($current_page - 1) * $limit;

?>
<div class="shop-page-title">
    <div class="page-title-inner">
        <div>
            <a href="#">TRANG CHỦ</a>/ NAM
        </div>
        <div>
            <select name="sort" id="sort">
                <option value="">Sắp xếp</option>
                <option value="date_asc">Mới nhất</option>
                <option value="date_desc">Cũ nhất</option>
                <option value="price_asc">Giá tăng dần</option>
                <option value="price_desc">Giá giảm dần</option>
            </select>
        </div>
    </div>
</div>
<div class="main">
    <div class="category-page-row">
        <div class="main-left">
            <div>LỌC THEO GIÁ</div>
            <form action="" class="filter-box">
                <input type="number" name="" id="price_from">
                <i class="fas fa-arrow-right"></i>
                <input type="number" name="" id="price_to">
                <button type="submit" class="btn_sort_price">Lọc</button>
            </form>
            <div class="products-left">
                <div class="product-left__tiltle">
                    SẢN PHẨM
                </div>
                <div class="products-left__wrapper">
                    <?php
                    $result = $product->get_featured_products();
                    if ($result->num_rows > 0) {
                        $i = 0;
                        while ($row = $result->fetch_assoc()) {
                            if ($i++ < 6) {
                                echo '  <div class="product-left__item">
                                            <div class="product-left__item-img">
                                                <img src="./admin/public/uploads/' . $row['HinhAnhSanPham'] . '" alt="">
                                            </div>
                                            <div class="product-left__item-name">
                                                <a href="?page=detail&id=' . $row['MaSanPham'] . '">' . $row['TenSanPham'] . '</a>
                                                <span>' . number_format($row['GiaSanPham'], 0, '.', ',') . ' đ</span>
                                            </div>
                                        </div>';
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="main-content product-list">
                <?php
                require_once("./templates/product_items.php");
                ?>
            <!-- <ul class="pagi">
                <?php
                // require_once("./templates/pagi.php");
                // if ($total_page > 1) {
                //     for ($i = 1; $i <= $total_page; $i++) {
                //         if ($i == $current_page) {
                //             echo '<li class="pagi-item is-active"  data-limit=' . $limit . ' data-p=' . $i . ' data-maloai=' . $maLoai . '>' . $i . '</li>';
                //         } else {
                //             echo '<li class="pagi-item" data-limit=' . $limit . ' data-p=' . $i . ' data-maloai=' . $maLoai . '>' . $i . '</li>';
                //         }
                //     }
                // }
                ?>
            </ul> -->
        </div>
    </div>
</div>