<?php
require_once (__DIR__ . '/./../classes/category.php');
$category = new Category();
$result = $category->getAll();
$dropdown = $category->getAll();
?>
<div class="menu_top">
    <ul class=" dropdown-menu">
        <li>
            <a href="?page=home" >TRANG CHỦ</a>
        </li>
        <?php
        if ($result->num_rows > 0) {
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $i++;
                if ($i < 4) {
                    echo '  <li>
                                <a href="?page=products&idLoai='. $row['MaLoai'] .'">GIÀY ' . $row['TenLoai'] . '</a>
                            </li>';
                }
            }
        }
        ?>
        <li class="dropdown">
            <a href="#">KHÁC</a>
            <div class="drodown-mega-menu">
                <div class="mega-menu-list">
                    <ul>
                        <?php
                            if ($dropdown->num_rows > 0) {
                                $dem = 0;
                                while ($row = $dropdown->fetch_assoc()) {
                                    $dem++;
                                    if ($dem >= 4) {
                                        echo '  <li>
                                                    <a href="?page=products&idLoai='. $row['MaLoai'] .'">GIÀY ' . $row['TenLoai'] . '</a>
                                                </li>'; 
                                    }
                                }
                            }
                        ?>
                        
                    </ul>
                </div>
            </div>
        </li>
    </ul>
</div>