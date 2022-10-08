

        <?php
        // var_dump($_COOKIE);
            if( isset($_POST['test'])){
                if( $_POST['test']=='login' && !isset($_COOKIE['maKhachHang'])){
                    echo ('
                        <p> Bạn Chưa Đăng nhập</p> 
                        <a href="./pages/login.php">Đến đăng nhập</a>            
                    ');
                }else echo "Đã đăng nhập";
            }
        ?>
    