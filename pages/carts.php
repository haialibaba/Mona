<?php
require_once(__DIR__ . './../classes/cart.php');
$cart = new Cart();
$cart_items  = $cart->getAll();
?>
<main>
    <div class="container">
        <div class="row">
            <div class="breadcrumbs">
                <ul>
                    <li>
                        <a href="index.php">Trang chủ</a>
                    </li>
                    <span class="divider">/</span>
                    <li>
                        <a href="">
                            Cart
                        </a>
                    </li>
                </ul>
            </div>
            <table class="table table-bordered" style="margin-top:15px">
                <thead class="table_cart-header">
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng phụ</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody class="table_cart">
                    <?php
                        if(empty($cart_items)){
                            echo '<tr><td colspan="6"><p>Your cart is empty!</p></td></tr>';
                        }else
                        foreach ($cart_items as $item) : ?>
                        <tr>
                            <td><?php echo $item['TenSanPham']; ?></td>
                            <td><img src="./admin/public/uploads/<?php echo $item['HinhAnhSanPham']; ?>" alt="<?php echo $item['TenSanPham']; ?>"></td>
                            <td><?php echo number_format($item['GiaSanPham'], 0, ',', ','); ?> VNĐ</td>
                            <td>
                                <div class="product_quantity">
                                    <button class="cart_quantity_sub" data-idsp=<?php echo $item['MaSanPham']; ?>>-</button>
                                    <input type="number" name="quantity" class="cartquantity_input" value="<?php echo $item['SoLuong']; ?>" min="0" max="100">
                                    <button class="cart_quantity_plus">+</button>
                                </div>
                            </td>
                            <td><?php 
                                    if($item['GiamGia']!=0){
                                        echo '<p>-'.$item["GiamGia"].'%</p>';
                                        echo '<span class="price">'.number_format($item['GiaSanPham']*$item['SoLuong']*(100-$item['GiamGia'])/100, 0, ',', ',').' VNĐ</span>';
                                    }else{
                                        echo '<span class="price">'.number_format($item['GiaSanPham']*$item['SoLuong'], 0, ',', ',').' VNĐ</span>';
                                    }
                                ?></td>
                            <td>
                                <button class="btn-update" data-idsp=<?= $item['MaSanPham']; ?>>
                                    <i class="fas fa-sync"></i>
                                </button>
                                <button class=" btn-remove " data-idsp=<?= $item['MaSanPham']; ?>>
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="cart_info">
            <div>
                <div class="total">
                    <span>Tổng tiền: <?php echo number_format($cart->get_total_price(), 0, ',', ','); ?> VNĐ</span>
                </div>
                <div class="total">
                    <span>Số Lượng: <?php echo $cart->get_quantity_product_cart() ?> sản phẩm</span>
                </div>
                <div class="total">
                    <button class="check_out">Thanh toán</button>
                </div>
            </div>
        </div>
        <p>
            <button class="btn_continue">
                <i class="fas fa-arrow-left icon_left"></i>
                Trở lại mua hàng
            </button>
        </p>
    </div>
</main>