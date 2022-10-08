<?php
if (!isset($_COOKIE['idCart'])) {
    setcookie('idCart', uniqid(), time() + 60 * 60 * 24 * 30 * 12);
}
$key=isset($_GET['key'])?$_GET['key']:'';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MONA</title>
    <!-- link css -->
    <link rel="stylesheet" href="./css/style.css" />
    <!-- <script src="./public/js/d3efa8ea96.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" type="text/css" href="./css/slick.css" />
    <link rel="stylesheet" href="./fonts/fontawesome-free-5.15.4-web/css/all.css">
    <link rel="stylesheet" href="./css/shop-page.css">
    <link rel="stylesheet" href="./css/style_reponsive.css">

</head>

<body>
    <div class="alert">
        <div class="alert-content">
            <button class="alert-close">X</button>
            <div class="alert-title">
                <h3>Thông báo</h3>
            </div>
            <div class="alert-body">
            </div>
            <div class="alert-footer">
                <button type="submit" class="btn-alert">OK</button>
            </div>
        </div>
    </div>
    <div class="modal">
        <div class="modal-content">
            <button class="modal-close">X</button>
            <div class="modal-body">
                <div class="modal-body_title">
                    <span>SẢN PHẨM</span>
                    <span>Tổng</span>
                </div>
                <div class="modal-body_main">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="box_search">
        <div id="form_search" class="form_search">
            <span class="close_search">x</span>
            <input type="search" name="search" value="<?=$key;?>" id="search" placeholder="Enter search term">
            <i class="fas fa-search icon_search_submit"></i>
        </div>
    </div>
    <?php
    require_once('./templates/header.php');
    ?>
    <?php
    require_once('./templates/menu_top.php');
    ?>
    <?php
    $page = 'home';
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    switch ($page) {
        case 'home':
            require_once('./pages/home.php');
            break;
        case 'products':
            require_once('./pages/products.php');
            break;
        case 'detail':
            require_once('./pages/detail.php');
            break;
        case 'cart':
            require_once('./pages/carts.php');
            break;
        case 'checkout':
            require_once('./pages/checkout.php');
            break;
        case 'order':
            require_once('./pages/order.php');
            break;
        case 'search':
            require_once('./pages/search.php');
            break;
        default:
            require_once('./pages/home.php');
            break;
    }
    ?>
    <?php
    require_once('./templates/footer.php');
    ?>
    <?php
    require_once('./templates/script.php');
    ?>
</body>

</html>