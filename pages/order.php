<?php
require_once(__DIR__ . './../classes/order.php');
$order = new Order();
$cart = new Cart();
$cart_items = $cart->getAll();
$order_items  = $order->get_order_by_id($_COOKIE['maKhachHang']);
?>
<main class="container">
    <div class="breadcrumbs row">
        <ul>
            <li>
                <a href="index.php">Trang chủ</a>
            </li>
            <span class="divider">/</span>
            <li>
                <a href="">
                    Chi tiết đơn hàng
                </a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="order_detail">
            <table class="table table-bordered table_order" style="margin-top:15px">
                <thead>
                    <tr>
                        <th>Mã Đơn Hàng</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>&nbsp</th>
                        <th>&nbsp</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $order_items  = $order->get_order($_COOKIE['maKhachHang']);
                    if (empty($order_items)) {
                        echo '<tr><td colspan="6"><p>Your cart is empty!</p></td></tr>';
                    } else
                        while ($item  = $order_items->fetch_assoc()) {
                            $btn='&nbsp;';
                            if($item['TrangThai']<2){
                                $btn = '<button type="button" class="btn_cancel" data-madh=' . $item['MaDonHang'] . '>
                                            Hủy đơn hàng
                                        </button>';
                            }
                            echo '
                                <tr>
                                    <td>' . $item['MaDonHang'] . '</td>
                                    <td>' . $item['NgayDat'] . '</td>
                                    <td>' . number_format($item['TongTien'], 0, ',', ',') . 'đ</td>
                                    <td>' . $item['TenTrangThai'] . '</td>
                                    <td>
                                        <button type="button" class="btn_detail" data-madh=' . $item['MaDonHang'] . '>
                                            Xem chi tiết</button>
                                    </td>
                                    <td>
                                        '.$btn.'
                                    </td>
                                </tr>
                                ';
                        }
                    ?>
                </tbody>
            </table>
        </div>
</main>