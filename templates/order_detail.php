<?php
require_once __DIR__ . './../classes/order.php';
$order = new Order();
$total = 0;
if (isset($_POST['madh'])) {
    $id = $_POST['madh'];
    $result = $order->get_detail($id);
    if ($result->num_rows > 0 && $result) {
        while ($row = $result->fetch_assoc()) {
            echo ('
            <div class="modal-body_item ">
                <div class="order_form-content-item-info-name ">
                    <a href="?page=detail&id=' . $row['MaSanPham'] . '">
                        ' . $row['TenSanPham'] . ' <span> x' . $row['SoLuongSP'] . '</span>
                    </a>    
                </div>
                <div class="order_form-content-item-info-price">
                    <span>' . number_format($row['SoLuongSP'] * $row['GiaSanPham'], 0, ',', ',') . 'đ</span>
                </div>
            </div>
            ');
            $total += $row['SoLuongSP'] * $row['GiaSanPham'];
        }
    }
}
?>
    <div class="modal-bottom">
        <div class="modal-body_bottom ">
            <p class="order_form-content-item-info-name">
                <span class="total_detail">Tổng cộng</span>
            </p>
            <div class="order_form-content-item-info-price">
                <span><?= number_format($total, 0, ',', ',') ?>đ</span>
            </div>
        </div>
        <div class="modal-body_bottom_payment ">
            Phương thức thanh toán: thanh toán khi nhận hàng
        </div>
    </div>