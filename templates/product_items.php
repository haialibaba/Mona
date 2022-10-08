
<?php
require_once(__DIR__.'./../classes/product.php');
$product = new product();
$limit = 8;
$start = 0;
$total_page=0;
if(!isset($_GET['key']) || $_GET['key'] == ''){
    $maLoai = $_GET['idLoai'];
    $result = $product->get_products_by_category($maLoai);
    if( $_SERVER['REQUEST_METHOD'] == 'GET'){
        if(isset($_GET['price_from']) && $_GET['price_from'] != ''){
            $result =$product->get_count_filter($maLoai,$_GET['price_from'],$_GET['price_to']);
        }
    }
    if($result){
        $total_records = $result->num_rows;
        $current_page = isset($_GET['p']) ? $_GET['p'] : 1;
        $total_page = ceil($total_records / $limit);
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
        $start = ($current_page - 1) * $limit;
    }
}else{
    $result = $product->get_products_by_search($_GET['key']);
    if(isset($_GET['price_from']) && $_GET['price_from'] != ''){
        $result =$product->filter_product_by_search_count($_GET['key'],$_GET['price_from'],$_GET['price_to']);
    }
    if($result){
        $total_records = $result->num_rows;
        $current_page = isset($_GET['p']) ? $_GET['p'] : 1;
        $total_page = ceil($total_records / $limit);
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
        $start = ($current_page - 1) * $limit;
    }

}

    // $total_records = $result->num_rows;
    // $current_page = isset($_GET['p']) ? $_GET['p'] : 1;
    // $total_page = ceil($total_records / $limit);
    // if ($current_page > $total_page){
    //     $current_page = $total_page;
    // }
    // else if ($current_page < 1){
    //     $current_page = 1;
    // }
    // $start = ($current_page - 1) * $limit;

    if( $_SERVER['REQUEST_METHOD'] == 'GET'){
        if(isset($_GET['key']) && $_GET['key'] != ''){
            if(isset($_GET['sort']) && $_GET['sort'] != ''){
                $products =$product->sort_products_by_search($_GET['key'], $start, $limit,$_GET['sort']);
            }else if(isset($_GET['price_from']) && $_GET['price_from'] != ''){
                $products =$product->filter_product_by_search($_GET['key'],$_GET['price_from'],$_GET['price_to'],$start, $limit);
            }else{
                $products = $product->get_products_by_search_pagination($_GET['key'],$start, $limit);
            }
        }else{
            if(isset($_GET['sort']) && $_GET['sort'] != ''){
                $products =$product->sort_products_by_category($maLoai, $start, $limit,$_GET['sort']);
            }else if(isset($_GET['price_from']) && $_GET['price_from'] != ''){
                $products =$product->filter_product_by_price($maLoai, $start, $limit,$_GET['price_from'],$_GET['price_to']);
            } else{
                $products = $product->get_products_by_category_pagination($_GET['idLoai'], $start, $limit);
            }
        }
    }
echo('<div class="shop-container">');

if($products){
    if ($products->num_rows > 0) {
        while ($row = $products->fetch_assoc()) {
            echo '<div class="product__item">
                        <a href="?page=detail&id=' . $row['MaSanPham'] . '">
                            <img src="admin/public/uploads/' . $row['HinhAnhSanPham'] . '" alt="" />
                            <div class="product__name">' . $row['TenSanPham'] . '</div>
                            <div class="product__price">' . number_format($row['GiaSanPham'], '0', ',', '.') . ' đ</div>
                        </a>
                        <button class="add_to_cart" data-maSanPham=' . $row['MaSanPham'] . '>Thêm vào giỏ</button>
                    </div>';
        }
        if ($total_page > 1) {
            echo '</div>
            <ul class="pagi">';
            for ($i = 1; $i <= $total_page; $i++) {
                if ($i == $current_page) {
                    echo '<li class="pagi-item is-active" onclick="pagi();" data-p=' . $i .  '>' . $i . '</li>';
                } else {
                    echo '<li class="pagi-item" onclick="pagi();" data-p=' . $i .  '>' . $i . '</li>';
                }
            }
            echo '</ul></div>';
        }
    }    
}else{
    echo('Không có sp nào:)))))))');
}


?>