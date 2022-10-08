<?php

include_once 'database.php';
?>



<?php
class product
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAll()
    {
        $sql = "SELECT * FROM `tbl_sanpham`";
        $result = $this->db->select($sql);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
    public function get_products_by_category($category){
        $sql = "SELECT * FROM `tbl_sanpham` WHERE LoaiSanPham = $category";
        $result = $this->db->select($sql);
        if ($result && $result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
    public function get_products_by_category_pagination($category, $start, $limit){
        $sql = "SELECT * FROM `tbl_sanpham` WHERE LoaiSanPham = $category LIMIT $start,$limit";
        $result = $this->db->select($sql);
        if ($result && $result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
    public function filter_product_by_price($category,$start, $limit,$price_from,$price_to){
        $sql = "SELECT * FROM `tbl_sanpham` where LoaiSanPham = $category AND GiaSanPham between $price_from and $price_to limit $start,$limit";
        $result = $this->db->select($sql);
        if ($result && $result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
    public function get_count_filter($category,$price_from,$price_to){
        $sql = "SELECT * FROM `tbl_sanpham` WHERE LoaiSanPham = $category AND GiaSanPham between $price_from and $price_to ";
        $result = $this->db->select($sql);
        if ($result && $result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
    public function sort_products_by_category($category,$start,$limit,$sort){
        if ($sort == 'price_asc') { //Tang dan
            $sql = "SELECT * FROM `tbl_sanpham` where LoaiSanPham = $category ORDER by GiaSanPham ASC limit $start,$limit";
        } else if ($sort == 'price_desc') { //Giam
            $sql = "SELECT * FROM `tbl_sanpham` where LoaiSanPham = $category ORDER by GiaSanPham DESC limit $start,$limit";
        } else if ($sort == 'date_asc') {
            $sql = "SELECT * FROM `tbl_sanpham` where LoaiSanPham = $category ORDER by created_at ASC limit $start,$limit";
        } else if ($sort == 'date_desc') {
            $sql = "SELECT * FROM `tbl_sanpham` where LoaiSanPham = $category ORDER by created_at DESC limit $start,$limit";
        }
        $result = $this->db->select($sql);
        if ($result && $result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
    public function get_products_by_search($key){
        $sql = "SELECT * FROM `tbl_sanpham` where TenSanPham LIKE '%$key%'";
        $result = $this->db->select($sql);
        if ($result && $result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
    public function get_products_by_search_pagination($key,$start,$limit){
        $sql = "SELECT * FROM `tbl_sanpham` where TenSanPham LIKE '%$key%' limit $start,$limit";
        $result = $this->db->select($sql);
        if ($result && $result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
    public function get_featured_products()
    {
        $sql = "SELECT * FROM `tbl_sanpham`  ORDER by created_at DESC LIMIT 15";
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
            if (($_POST['dataPost'] == 'selling_products')) {
                //Tạo view
                // create view sanphambanchay as SELECT count(maSanPham) as msp,maSanPham FROM `tbl_chitietdonhang` GROUP by (maSanPham) ORDER by msp DESC limit 15
                $sql = "SELECT * from tbl_sanpham WHERE MaSanPham IN (SELECT sanphambanchay.MaSanPham FROM sanphambanchay)";
            } else
                    if ($_POST['dataPost'] == 'popular_products') {
                $sql = "SELECT * FROM `tbl_sanpham` where LoaiSanPham IN(1,2,3) ORDER by RAND()  DESC LIMIT 15";
            }
        }
        return $this->db->select($sql) ? $this->db->select($sql) : false;
    }
    public function get_products_by_id($id){
        $sql = "SELECT * FROM tbl_sanpham,tbl_loaisanpham where MaLoai=LoaiSanPham AND MaSanPham =".$id;
        return $this->db->select($sql) ? $this->db->select($sql) : false;
    }
    public function getProductByCategory($category){
        $sql = "SELECT * FROM tbl_sanpham where LoaiSanPham= $category";
        return $this->db->select($sql) ? $this->db->select($sql) : false;
    }
    public function sort_products_by_search($key,$start,$limit,$sort){
        if ($sort == 'price_asc') { //Tang dan
            $sql = "SELECT * FROM `tbl_sanpham` where TenSanPham LIKE '%$key%' ORDER by GiaSanPham ASC limit $start,$limit";
        } else if ($sort == 'price_desc') { //Giam
            $sql = "SELECT * FROM `tbl_sanpham` where TenSanPham LIKE '%$key%' ORDER by GiaSanPham DESC limit $start,$limit";
        } else if ($sort == 'date_asc') {
            $sql = "SELECT * FROM `tbl_sanpham` where TenSanPham LIKE '%$key%' ORDER by created_at ASC limit $start,$limit";
        } else if ($sort == 'date_desc') {
            $sql = "SELECT * FROM `tbl_sanpham` where TenSanPham LIKE '%$key%' ORDER by created_at DESC limit $start,$limit";
        }
        $result = $this->db->select($sql);
        if ($result && $result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
    public function filter_product_by_search($key,$form,$to,$start,$limit){
        $sql = "SELECT * FROM `tbl_sanpham` where TenSanPham LIKE '%$key%' AND GiaSanPham between $form and $to limit $start,$limit";
        $result = $this->db->select($sql);
        if ($result && $result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
    public function filter_product_by_search_count($key,$form,$to){
        $sql = "SELECT * FROM `tbl_sanpham` where TenSanPham LIKE '%$key%' AND GiaSanPham between $form and $to ";
        $result = $this->db->select($sql);
        if ($result && $result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
}


?>