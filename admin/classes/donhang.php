<?php
    require_once '../lib/database.php';
    require_once '../helpers/format.php';
?>



<?php
    class donhang
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        

        public function show_donhang()
        {

            $query = "SELECT * FROM tbl_donhang ";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_chitietdonhang($id)
        {
            $query = "SELECT *,sum(`SoLuongSP`) FROM tbl_trangthaidonhang,tbl_donhang, tbl_chitietdonhang,tbl_sanpham WHERE tbl_donhang.MaDonHang = tbl_chitietdonhang.MaDonHang AND tbl_chitietdonhang.MaSanPham = tbl_sanpham.MaSanPham AND tbl_trangthaidonhang.MaTrangThai = tbl_donhang.TrangThai AND tbl_donhang.MaDonHang = '$id' ";
            // $query = "SELECT * FROM tbl_donhang, tbl_chitietdonhang,tbl_sanpham WHERE tbl_donhang.MaDonHang = tbl_chitietdonhang.MaDonHang AND tbl_chitietdonhang.MaSanPham = tbl_sanpham.MaSanPham AND tbl_donhang.MaDonHang = '$id' ";
            $result = $this->db->select($query);
            // echo($query."<br>"."123");
            return $result;
        }

        public function show_chitietdonhang2($id)
        {

            //$query = "SELECT * FROM tbl_chitietdonhang WHERE maDonHang = '$id'  ";
            // $query="SELECT *,sum(`soLuongSP`) FROM `tbl_chitietdonhang` WHERE `maDonHang`='$id' and `soLuongSP`>0 GROUP BY `maSanPham`";
            // $query="SELECT *,sum(`SoLuongSP`) FROM tbl_chitietdonhang,tbl_sanpham WHERE `MaDonHang`='$id' and tbl_sanpham.MaSanPham = tbl_chitietdonhang.MaSanPham and `SoLuongSP`>0 GROUP BY `MaSanPham`";
            $query = "SELECT * FROM tbl_trangthaidonhang,tbl_donhang, tbl_chitietdonhang,tbl_sanpham WHERE tbl_donhang.MaDonHang = tbl_chitietdonhang.MaDonHang AND tbl_chitietdonhang.MaSanPham = tbl_sanpham.MaSanPham AND tbl_trangthaidonhang.MaTrangThai = tbl_donhang.TrangThai AND tbl_donhang.MaDonHang = '$id' ";
            // echo($query."<br>"."123456");
            $result = $this->db->select($query);
            return $result;
        }

        // public function getSoLuongSPTrung($maSanPham, $idDH){
        //     $query = "SELECT SUM(soLuongSP) FROM tbl_chitietdonhang WHERE maSanPham = '$maSanPham' AND maDonHang = '$idDH' ";
        //     $result = $this->db->select($query);
        //     return $result;
        // }


        public function show_donhangPhanTrang()
        {
            //Ph??n trang
            $sanPhamTungTrang = 10; //S???n ph???m t???ng trang

            if (!isset($_GET['trang'])){
                    $trang = 1;
            }else{
                    $trang = $_GET['trang'];
            }
            $tungTrang = ($trang - 1) * $sanPhamTungTrang; //V??? tr?? b???t ?????u $trang

            //Search v?? show
           if (isset($_GET['wordSearch']) && !empty($_GET['wordSearch']) ){
                if (isset($_GET['timTheo']) && !empty($_GET['timTheo']) ){
                    $wordSearch = $_GET['wordSearch'];
                    $timTheo = $_GET['timTheo'];
                    

                    if ($timTheo == "M?? ????n h??ng"){
                        $query = "SELECT * FROM tbl_donhang WHERE MaDonHang LIKE '%$wordSearch%' ORDER BY MaDonHang DESC LIMIT $tungTrang, $sanPhamTungTrang ";
                    }
                    if ($timTheo == "M?? kh??ch h??ng"){
                        $query = "SELECT * FROM tbl_donhang WHERE MaKhachHang LIKE '%$wordSearch%' ORDER BY MaDonHang DESC LIMIT $tungTrang, $sanPhamTungTrang";
                    }
                    if ($timTheo == "Tr???ng th??i"){
                        $query = "SELECT * FROM tbl_donhang WHERE TrangThai LIKE '%$wordSearch%' ORDER BY MaDonHang DESC LIMIT $tungTrang, $sanPhamTungTrang  ";
                    }
                    if ($timTheo == "Ng??y l???p ????n h??ng"){
                        $query = "SELECT * FROM tbl_donhang WHERE NgayDat LIKE '%$wordSearch%' ORDER BY MaDonHang DESC LIMIT $tungTrang, $sanPhamTungTrang ";
                    }
                    // if ($timTheo == "M?? giao h??ng"){
                    //     $query = "SELECT * FROM tbl_donhang WHERE maGiaoHang LIKE '%$wordSearch%' ORDER BY maDonHang DESC LIMIT $tungTrang, $sanPhamTungTrang ";
                    // }
                    
                }
                
            }else{
                    $query = "SELECT * FROM tbl_donhang ORDER BY MaDonHang DESC LIMIT $tungTrang, $sanPhamTungTrang "; //DESC: s???n ph???m m???i nh???t s??? l??n ?????u danh s??ch
            }

            if (isset($_GET['ngaytruoc']) && !empty($_GET['ngaytruoc']) ){
                if (isset($_GET['ngaytruoc']) && !empty($_GET['ngaytruoc']) ){
                    $ngaytruoc = $_GET['ngaytruoc'];
                    $ngaysau = $_GET['ngaysau'];

                    $query = "SELECT * FROM tbl_donhang WHERE NgayDat BETWEEN '$ngaytruoc' AND '$ngaysau' ORDER BY MaDonHang DESC ";
                }
            }

            
            //$query = "SELECT * FROM tbl_donhang ";
            $result = $this->db->select($query);
            return $result;
        }

        public function DoiTrangThaiDH($id)
        {

            $queryHoanThanhHD = "UPDATE tbl_donhang SET TrangThai = 2 WHERE MaDonHang = '$id' ";

            $querySelect = "SELECT * FROM tbl_donhang WHERE MaDonHang = '$id' ";
            $resultSelect = $this->db->select($querySelect);
            $value = $resultSelect->fetch_assoc();
            // $maKH = $value['MaKhachHang'];
            // $ngaydat = date("Y/m/d");
            // $giatri = $value['TongTien'];


            //L???y m?? h??a ????n m???i start
            //   $queryMHD = "SELECT MAX(MaHoaDon) FROM tbl_hoadon ";
            //   $resultMHD =  $this->db->select($queryMHD);
            //   $fetchMHD = $resultMHD->fetch_assoc();

            //   if ($fetchMHD['MAX(maHoaDon)'] != NULL ){
            //     $dataMHDNew = $fetchMHD['MAX(maHoaDon)'] + 1;
            //   }else{
            //     $dataMHDNew = 1;
            //   }
              
            //L???y m?? h??a ????n m???i end

            //Th??m v??o h??a ????n start
            // $queryThemHD = "INSERT INTO tbl_hoadon(maHoaDon, maKhachHang, ngayDat, giaTriHD) VALUE('$dataMHDNew', '$maKH', '$ngaydat', '$giatri') ";
            // $resultThemHD = $this->db->insert($queryThemHD);
            //Th??m v??o h??a ????n end

            // //Th??m chi ti???t h??a ????n start
            // $queryDH = "SELECT * FROM tbl_chitietdonhang WHERE maDonHang = '$id' ";
            // $resultdataGH = $this->db->select($queryDH);

            // while ($dataGH = $resultdataGH->fetch_assoc()){
            //     $tenNN = $dataGH['tenNguoiNhan'];
            //     $SDTKH = $dataGH['sdtKH'];
            //     $diachiNN = $dataGH['diachi'];
            //     $ghiChu = $dataGH['ghiChuCuaKhachhang'];

            //     $maSP = $dataGH['maSanPham']; 
            //     $tenSP = $dataGH['tenSanPham'];
            //     $SLSP = $dataGH['soLuongSP'];
            //     $sizeSP = $dataGH['sizeSanPham'];
            //     $giaSP = $dataGH['giaSanPham'];
            //     $mieutaSP = $dataGH['mieuTaSP'];
            //     $hinhanhSP = $dataGH['hinhAnhSP'];


            //     $querychitietdonhang="INSERT INTO `web2`.`tbl_chitiethoadon` (`maHoaDon` ,`tenNguoiNhan`, `sdtKH`,`ghiChu`, `maSP`, `tenSP`, `soLuongSP`, `sizeSP`, `giaSP`, `mieuTaSP`, `hinhAnhSP`, `diachi`)
            //       VALUES('$dataMHDNew','$tenNN','$SDTKH','$ghiChu','$maSP', '$tenSP','$SLSP','$sizeSP','$giaSP','$mieutaSP', '$hinhanhSP', '$diachiNN') ";
            //     $themCTHD = $this->db->insert($querychitietdonhang);

            // }
            // //Th??m chi ti???t h??a ????n end

            // N???u ng?????i d??ng Active th?? Update status inactive v?? ng?????c l???i
            if ($value['TrangThai'] == 1)
            {
                
                $resultUpdate = $this->db->update($queryHoanThanhHD);

                if ($resultUpdate)
                {
                    $alert = "<div class= 'alert alert-success'>Thanh to??n th??nh c??ng!</div>";
                    return $alert;
                }
                else
                {
                    $alert = "<div class= 'alert alert-danger'>Thanh to??n kh??ng th??nh c??ng!</div>";
                    return $alert;
                }
            }
           
        }

        public function getAllDonHang() //D??ng cho ph??n trang,...
        {

            if (isset($_GET['wordSearch']) && !empty($_GET['wordSearch']) ){
                if (isset($_GET['timTheo']) && !empty($_GET['timTheo']) ){
                    $wordSearch = $_GET['wordSearch'];
                    $timTheo = $_GET['timTheo'];

                    if ($timTheo == "M?? ????n h??ng"){
                        $query = "SELECT * FROM tbl_donhang WHERE MaDonHang LIKE '%$wordSearch%' ORDER BY MaDonHang DESC ";
                    }
                    if ($timTheo == "M?? kh??ch h??ng"){
                        $query = "SELECT * FROM tbl_donhang WHERE MaKhachHang LIKE '%$wordSearch%' ORDER BY MaDonHang DESC ";
                    }
                    if ($timTheo == "Tr???ng th??i"){
                        $query = "SELECT * FROM tbl_donhang WHERE TrangThai LIKE '%$wordSearch%' ORDER BY MaDonHang DESC ";
                    }
                    if ($timTheo == "Ng??y l???p ????n h??ng"){
                        $query = "SELECT * FROM tbl_donhang WHERE NgayDat LIKE '%$wordSearch%' ORDER BY MaDonHang DESC ";
                    }
                    // if ($timTheo == "M?? giao h??ng"){
                    //     $query = "SELECT * FROM tbl_donhang WHERE maGiaoHang LIKE '%$wordSearch%' ORDER BY MaDonHang DESC ";
                    // }
                    
                }
                
            }else{
                    $query = "SELECT * FROM tbl_donhang ORDER BY MaDonHang DESC "; //DESC: s???n ph???m m???i nh???t s??? l??n ?????u danh s??ch
            }

            $result = $this->db->select($query);
            return $result;
        }

        
        public function count_donhangchuagiao()
        {
            $query = "SELECT COUNT(maDonHang) AS soluongDHchuagiao FROM tbl_donhang WHERE TrangThai NOT IN (4,5) ";
            $result = $this->db->select($query);
            return $result;
        }

        public function count_donhangdagiao()
        {
            $query = "SELECT COUNT(maDonHang) AS soluongDHdagiao FROM tbl_donhang WHERE TrangThai = 4 ";
            $result = $this->db->select($query);
            return $result;
        }

        
        
    }

?>