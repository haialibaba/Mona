<?php
   require_once(__DIR__ . './../classes/product.php');
   $product = new product();

$maLoai = $_GET['idLoai'] ;
$result = $product->get_products_by_loai($maLoai, 0, 9,"","","");
if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['sort'])){
    // var_dump($_GET);
    $sort = $_GET['sort'];
    $price_from = $_GET['price_from'];
    $price_to = $_GET['price_to'];
    $maLoai = $_GET['idLoai'];
    $limit=5;
    $p=1;
    if(isset($_GET['limit'])&&isset($_GET['p'])){    
        $limit = $_GET['limit'];
        $p= $_GET['p'];
    }
    $start = ($p - 1) * $limit;
    if($sort!="" && $price_from=="" && $price_to==""){
        $result = $product->get_products_by_loai($maLoai, $start, $limit,$sort,null,null);
    }else if($sort=="" && $price_from!="" && $price_to!=""){
        $result = $product->get_products_by_loai($maLoai, $start, $limit,null,$price_from,$price_to);
    }else{
        $result = $product->get_products_by_loai($maLoai, $start, $limit,$sort,$price_from,$price_to);
    }
}
$total_records = $result->num_rows;
$current_page = isset($_POST['p']) ? $_POST['p'] : 1;
$limit = 5;
$total_page = ceil($total_records / $limit);
if ($current_page > $total_page) {
    $current_page = $total_page;
} else if ($current_page < 1) {
    $current_page = 1;
}
$start = ($current_page - 1) * $limit;
if ($total_page > 1) {
    for ($i = 1; $i <= $total_page; $i++) {
        if ($i == $current_page) {
            echo '<li class="pagi-item is-active"  data-limit=' . $limit . ' data-p=' . $i . ' data-maloai=' . $maLoai . '>' . $i . '</li>';
        } else {
            echo '<li class="pagi-item" data-limit=' . $limit . ' data-p=' . $i . ' data-maloai=' . $maLoai . '>' . $i . '</li>';
        }
    }
}