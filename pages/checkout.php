<?php
require_once(__DIR__ . './../classes/cart.php');
$cart = new Cart();
$cart_items  = $cart->getAll();
?>
<main class="container">
    <div class="row">
        <div class="payment_info">
            <div class="payment_info-title">
                Thông tin thanh toán
            </div>
            <form action="" class="form-payment">
                <div class="text-field">
                    <label for="name">Họ tên khách hàng</label>
                    <input autocomplete="off" type="text" id="name" name="name" placeholder="" />
                    <small style="color:red" id="error_name"></small>
                </div>
                <div class="text-field">
                    <label for="address">Địa Chỉ</label>
                    <input autocomplete="off" type="text" id="address" name="address" placeholder="" />
                    <small style="color:red" id="error_address"></small>
                </div>
                <div class="text-field">
                    <label for="city">Tỉnh/ Thành phố</label>
                    <input autocomplete="off" type="text" id="city" placeholder="" name="city" />
                    <small style="color:red" id="error_city"></small>
                </div>
                <div class="text-field">
                    <label for="phone">Số điện thoại</label>
                    <input autocomplete="off" type="text" id="phone" placeholder=""  name="phone"/>
                    <small style="color:red" id="error_phone"></small>
                </div>
                <div class="text-field">
                    <label for="email">Địa chỉ email</label>
                    <input autocomplete="off" type="text" id="email" placeholder="" name="email" />
                    <small style="color:red" id="error_email"></small>
                </div>
                <div class="text-field">
                    <label for="note">Ghi chú đơn hàng</label>
                    <textarea autocomplete="off" type="text" id="note" placeholder="" name="note"></textarea>
                </div>
            </form>
        </div>
        <div class="order">
            <div class="order_form">
                <div class="order_form-title">
                    Đơn Hàng của Bạn
                </div>
                <div class="order_form-head">
                    <span>Sản phẩm</span>
                    <span>Tổng</span>
                </div>
                <div class="order_form-content">
                    <div class="order_form-content">
                        <div class="order_form-content-item">
                            <?php
                            if(empty($cart_items)){
                                echo '<tr><td colspan="6"><p>Your cart is empty!</p></td></tr>';
                                
                            }else
                                while ($item = $cart_items->fetch_assoc()){
                                    echo '
                                    <div class="order_form-content-item-info">
                                        <div class="order_form-content-item-info-name">
                                        '.$item['TenSanPham'].' <span> x'.$item['SoLuong'].'</span>
                                        </div>
                                        <div class="order_form-content-item-info-price">
                                            <span>'.number_format($item['GiaSanPham'] * $item['SoLuong'], 0, ',', ',').'đ</span>
                                        </div>
                                    </div>
                                    ';
                                }    
                            ?>
                        </div>
                        <div class="order_form-content-item-info">
                            <div class="order_form-content-item-info-name">
                                Tổng phụ
                            </div>
                            <div class="order_form-content-item-info-price">
                                <span><?=number_format($cart->get_total_price(), 0, ',', ',');?>đ</span>
                            </div>
                        </div>
                        <div class="order_form-content-item-info">
                            <div class="order_form-content-item-info-name">
                                Giao hàng
                            </div>
                            <div class="order_form-content-item-info-price">
                                <span>Giao hàng miễn phí</span>
                            </div>
                        </div>
                        <div class="order_form-content-item-info">
                            <div class="order_form-content-item-info-name">
                                Tổng
                            </div>
                            <div class="order_form-content-item-info-price order_price">
                                <span><?=number_format($cart->get_total_price(), 0, ',', ',');?>đ</span>
                            </div>
                        </div>
                        <div class="pay_method">
                            <div class = "pay_method-cod">
                                <input type="radio" name="pay_method" id="cod" value="cod" checked>
                                <label for="cod">Thanh toán khi nhận hàng</label>
                            </div>
                            <div class="payment_box payment_method_cod_box">
                                <div class="payment_box-title">
                                    Thanh toán khi nhận hàng
                                </div>
                            </div>
                            <div class="pay_method-bacs">
                                <input type="radio" name="pay_method" id="bacs" value="bacs">
                                <label for="bacs">Chuyển khoản ngân hàng</label>
                            </div>
                            <div class="payment_box payment_method_bacs_box">
                                <div class="payment_box-title">
                                    <p>
                                    Thực hiện thanh toán vào ngay tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng Mã đơn hàng của bạn trong phần Nội dung thanh toán. Đơn hàng sẽ đươc giao sau khi tiền đã chuyển.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <button class="btn_order">Đặt hàng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>