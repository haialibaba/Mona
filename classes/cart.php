<?php

include_once 'database.php';
?>



<?php
class Cart
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    } 
    public function add_to_cart($id, $qty)
    {
        
        //save cart to database
        $quantity = 0;    
        if(isset($_COOKIE['maKhachHang'])){
            $makh = $_COOKIE['maKhachHang'];
            $sql="SELECT * FROM tbl_giohang WHERE MaKhachHang = '$makh' AND MaSanPham = '$id'";
            $result = $this->db->select($sql);
            if($result!=null && $result->num_rows>0){
                $sql="UPDATE tbl_giohang SET SoLuong=SoLuong+'$qty' WHERE MaSanPham='$id' AND MaKhachHang='$makh'";
                $this->db->update($sql);
            }else{
                $sql = "INSERT INTO tbl_giohang (MaKhachHang,MaSanPham,SoLuong) VALUES('$makh','$id','$qty')";
                $this->db->insert($sql);
            }
            $quantity = $this->db->select("SELECT SUM(SoLuong) FROM tbl_giohang WHERE MaKhachHang = '$makh'")->fetch_assoc()['SUM(SoLuong)'];
        }else{
            $idCart=$_COOKIE['idCart'];
            $sql="SELECT * FROM tbl_giohang WHERE id='$idCart' AND MaSanPham = '$id'";
            $result = $this->db->select($sql);
            if($result!=null && $result->num_rows>0){
                $sql="UPDATE tbl_giohang SET SoLuong=SoLuong+'$qty' WHERE MaSanPham='$id' AND id='$idCart'";
                $this->db->update($sql);
            }else{
                $sql = "INSERT INTO tbl_giohang (id,MaSanPham,SoLuong) VALUES('$idCart','$id','$qty')";
                $this->db->insert($sql);
            }
            $quantity = $this->db->select("SELECT SUM(SoLuong) FROM tbl_giohang WHERE id = '$idCart'")->fetch_assoc()['SUM(SoLuong)'];
        }
        echo ($quantity);
    }
    public function get_quantity_product_cart(){
        $qty=0;
        if(isset($_COOKIE['maKhachHang'])){
            $qty = $this->db->select("SELECT SUM(SoLuong) FROM tbl_giohang WHERE MaKhachHang = '$_COOKIE[maKhachHang]'")->fetch_assoc()['SUM(SoLuong)'];
        }else{
            $idCart=$_COOKIE['idCart'];
            $qty = $this->db->select("SELECT SUM(SoLuong) FROM tbl_giohang WHERE id = '$idCart'")->fetch_assoc()['SUM(SoLuong)'];
        }
        return $qty!=null ? $qty :0;
    }
    public function getAll(){
        if(isset($_COOKIE['maKhachHang'])){
            $makh = $_COOKIE['maKhachHang'];
            $sql = "SELECT * FROM tbl_giohang,tbl_sanpham WHERE tbl_giohang.MaSanPham = tbl_sanpham.MaSanPham AND MaKhachHang = '$makh'";
        }else{
            $idCart=$_COOKIE['idCart'];
            $sql="SELECT * FROM tbl_giohang,tbl_sanpham WHERE tbl_giohang.MaSanPham = tbl_sanpham.MaSanPham AND id='$idCart'";
        }
        // echo($sql);
        $result = $this->db->select($sql);
        return $result?$result:false;
    }
    public function get_total_price(){
        if(isset($_COOKIE['maKhachHang'])){
            $makh = $_COOKIE['maKhachHang'];
            $sql = "SELECT SUM((tbl_sanpham.GiaSanPham*tbl_giohang.SoLuong)-(tbl_sanpham.GiaSanPham * (tbl_sanpham.GiamGia/100))) AS 'Total' 
                    FROM tbl_giohang,tbl_sanpham 
                    WHERE tbl_giohang.MaSanPham = tbl_sanpham.MaSanPham AND MaKhachHang = '$makh'";
        }else{
            $idCart=$_COOKIE['idCart'];
            $sql="SELECT SUM((tbl_sanpham.GiaSanPham*tbl_giohang.SoLuong)-(tbl_sanpham.GiaSanPham * (tbl_sanpham.GiamGia/100))) AS 'Total' 
            FROM tbl_giohang,tbl_sanpham 
            WHERE tbl_giohang.MaSanPham = tbl_sanpham.MaSanPham AND id='$idCart'";
        }
        $result = $this->db->select($sql)->fetch_assoc()['Total'];
        return $result?$result:0;
    }
    public function delete_product_cart($id){
        if(isset($_COOKIE['maKhachHang'])){
            $makh = $_COOKIE['maKhachHang'];
            $sql = "DELETE FROM tbl_giohang WHERE MaSanPham = '$id' AND MaKhachHang = '$makh'";
        }else{
            $idCart=$_COOKIE['idCart'];
            $sql = "DELETE FROM tbl_giohang WHERE MaSanPham = '$id' AND id = '$idCart'";
        }
        return $this->db->delete($sql)?true:false;
    }
    public function update_product_cart($id,$qty){
        if(isset($_COOKIE['maKhachHang'])){
            $makh = $_COOKIE['maKhachHang'];
            $sql = "UPDATE tbl_giohang SET SoLuong = '$qty' WHERE MaSanPham = '$id' AND MaKhachHang = '$makh'";
        } else{
            $idCart=$_COOKIE['idCart'];
            $sql = "UPDATE tbl_giohang SET SoLuong = '$qty' WHERE MaSanPham = '$id' AND id = '$idCart'";
        }
        return $this->db->update($sql)?true:false;
    }
    public function add_order($makh,$tongtien,$cart,$address,$name,$phone,$note,$email){
        $sql = "INSERT INTO tbl_donhang (MaKhachHang,TongTien) VALUES('$makh','$tongtien')";
        $this->db->insert($sql);
        $last_id = $this->db->last_id();
        if($cart!=null){
            foreach($cart as $item){
                $sql='INSERT INTO `tbl_chitietdonhang` ( `MaDonHang`, `TenNguoiNhan`, `SDTNguoiNhan`, `GhiChu`, `MaSanPham`, `SoLuongSP`, `DiaChiNguoiNhan`)
                VALUES ('.$last_id.',"'.$name.'","'.$phone.'","'.$note.'",'.$item['MaSanPham'].','.$item['SoLuong'].',"'.$address.'")';
                $this->db->insert($sql);
            }
        }
        $sql="DELETE FROM tbl_giohang WHERE MaKhachHang='$makh'";
        $this->db->delete($sql);
        return true;
    }
    
}
