<?php
require_once('./templates/slider.php');
?>
<div class="container">
    <?php
    require_once('./templates/offer.php');
    ?>
</div>
<div class="content container">
    <div class="content__header">
        <div class="">
            <button class="button new_products">sản phẩm mới</button>
        </div>
        <div class="">
            <button class="button selling_products">sản phẩm bán chạy</button>
        </div>
        <div>
            <button class="button popular_products">sản phẩm phổ biến</button>
        </div>
    </div>
    <div class="products row">
        <div class="product__wrapper">
            <?php
            require_once('./templates/featured_products.php');
            ?>
        </div>
    </div>

</div>

<?php
require_once('./templates/promotional_products.php');
?>