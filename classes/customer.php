<?php
require_once 'database.php';
class Customer
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function login($username, $password){
        $username = $this->db->link->real_escape_string($username);
        $password = $this->db->link->real_escape_string($password);
        $sql = "SELECT * FROM tbl_khachhang WHERE TenDangNhap='$username' AND MatKhau = '".md5($password)."' AND TrangThai = 'Active'";
        $data = $this->db->select($sql);
        return $data;
    }
    public function signup($data){
        $sdt = $this->db->link->real_escape_string($data['sdt']);
        $address = $this->db->link->real_escape_string($data['address']);
        $tendangnhap = $data['tendangnhap'];
        $matkhau = md5($data['matkhau']);
        $email = $data['email'];
        $sql= "SELECT * FROM tbl_khachhang WHERE TenDangNhap = '$tendangnhap'";
        $result = $this->db->select($sql);
        if($result && $result->num_rows>0){
            return false;
        }else{
            $sql = "INSERT INTO tbl_khachhang (SDT,DiaChi,TenDangNhap,MatKhau,Email) VALUES ('$sdt','$address','$tendangnhap','$matkhau','$email')";
            return $this->db->insert($sql)?true:false;     
        }
        
    }
    public function getAll(){
        $sql = "SELECT * FROM tbl_khachhang,tbl_vaitro where VaiTro = MaVaiTro";
        $result = $this->db->select($sql);
        return $result?$result:false;
    }
}
