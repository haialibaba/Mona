<?php
    require_once __DIR__ . './../classes/database.php';
class Order{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }
    public function get_order_by_id($id){
        $sql = "SELECT * FROM tbl_chitietdonhang,tbl_sanpham,tbl_donhang 
                where tbl_chitietdonhang.MaSanPham = tbl_sanpham.MaSanPham 
                    AND tbl_donhang.MaDonHang  = tbl_chitietdonhang.MaDonHang AND MaKhachHang = '$id'";
        $result = $this->db->select($sql);
        // echo($sql);
        return $result?$result:false;
    }
    public function get_order($id){
        $sql = "SELECT * FROM tbl_donhang,tbl_trangthaidonhang WHERE tbl_trangthaidonhang.MaTrangThai = tbl_donhang.TrangThai  AND MaKhachHang = '$id'";
        $result = $this->db->select($sql);
        return $result?$result:false;
    }
    public function get_detail($id){
        $sql ="SELECT * from tbl_chitietdonhang,tbl_sanpham,tbl_donhang WHERE tbl_chitietdonhang.MaSanPham = tbl_sanpham.MaSanPham 
        AND tbl_donhang.MaDonHang  = tbl_chitietdonhang.MaDonHang AND tbl_chitietdonhang.MaDonHang = ".$id;
        $result = $this->db->select($sql);
        return $result?$result:false;
    }
    public function cancel_order($id){
        $sql = "UPDATE tbl_donhang SET TrangThai = '5' WHERE MaDonHang='$id'";
        $this->db->update($sql);
        return true;
    }
}