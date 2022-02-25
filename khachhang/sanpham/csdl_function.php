<?php

function db_connect(){
    $conn = mysqli_connect("localhost", "root", "", "ct466");
    if(!$conn){
        echo "Không thể kêt nối cơ sở dữ liệu. " . mysqli_connect_error($conn);
        exit;
    }
    return $conn;
}

function select4LatestBook($conn){
    $row = array();
    $query = "SELECT sp_id, sp_hinhanh FROM sanpham ORDER BY sp_id DESC";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "Không truy xuất được dữ liệu " . mysqli_error($conn);
        exit;
    }

    for($i = 0; $i < 4; $i++){
        array_push($row, mysqli_fetch_assoc($result));
    }
    return $row;
}
        // lay ttin sach
function getBookByIsbn($conn, $id){
    $query = "SELECT sp_tensach, sp_hinhanh,tg_hoten, sp_gia FROM sanpham  as s join tac_gia tg on s.sp_idtg=tg.tg_id WHERE s.sp_idtg = tg.tg_id and s.sp_id = '$id'";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "Không thể truy xuất dữ lệu." . mysqli_error($conn);
        exit;
    }
    return $result;
}


        // lay idmua hàng
function getOrderId($conn, $idkh){
    $query = "SELECT hd_id FROM hoa_don  WHERE hd_idkh= $idkh ORDER BY hd_id DESC LIMIT 1";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "Lấy dữ liệu không thành công!" . mysqli_error($conn);
        exit;
    }
    $row = mysqli_fetch_assoc($result);
    return $row['hd_id'];
}


//function getOrderId($conn, $idkh){
//    $query = "SELECT id FROM dathang WHERE idkh= '$idkh'";
//    $result = mysqli_query($conn, $query);
//    if(!$result){
//        echo "Lấy dữ liệu không thành công!" . mysqli_error($conn);
//        exit;
//    }
//    $row = mysqli_fetch_assoc($result);
//    return $row['id'];
//}

        // thong tin kh trong hoa don
function insertIntoOrder($conn, $idkh, $gia, $trangthai, $date)
{
//    $query = "INSERT INTO dondathang VALUES
//		('', '" . $idkh . "','" . $gia . "', '" . $emailkh . "','" . $diachikh . "','" . $sdtkh . "','" . $date . "')";
    $query = "INSERT INTO hoa_don VALUES
		('', '" . $idkh . "','" . $gia . "', '" . $trangthai . "','" . $date . "')";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "Mua hàng thất bại " . mysqli_error($conn);
        exit;
    }
}

//}
//function insertIntoOrder($conn, $id, $idkh, $idsach, $sdt, $gia, $soluong){
//    $query = "INSERT INTO dathang VALUES
//		('', '" . $id . "', '" . $idkh . "', '" . $idsach . "','" . $sdt . "', '" . $gia . "', '" . $soluong . "')";
//    $result = mysqli_query($conn, $query);
//
//    if(!$result){
//        echo "Insert orders failed " . mysqli_error($conn);
//        exit;
//    }
//}


        //lấy gia sách
function getbookprice($id){
    $conn = db_connect();
    $query = " SELECT sp_gia FROM sanpham WHERE sp_id = $id ";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "Mua thất bại! " . mysqli_error($conn);
        exit;
    }
    $row = mysqli_fetch_assoc($result);
    return $row['sp_gia'];
}


        //lấy thông tin KH
function getCustomerId( $emailkh, $tenkh, $sdtkh, $diachikh){
    $conn = db_connect();
    $query = "SELECT dc_idkh from dia_chi WHERE 
		dc_emailkh = '$emailkh' AND 
		dc_hoten = '$tenkh' AND 
		dc_sdt= '$sdtkh' AND 
		dc_diachi = '$diachikh'
		";
    $result = mysqli_query($conn, $query);
    // if there is customer in db, take it out
    if($result){
        $row = mysqli_fetch_assoc($result);
        return $row['dc_idkh'];
//        return $row['emailkh'];
    } else {
        return null;
    }
}


        // cap nhat thong tin KH
function setCustomerId($emailkh, $tenkh, $sdtkh, $diachikh){
    $conn = db_connect();
    $query = "INSERT INTO dia_chi VALUES 
			('', '" . $emailkh . "', '" . $tenkh . "', '" . $sdtkh . "', '" . $diachikh . "')";

    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "Thêm thông tin thất bại!" . mysqli_error($conn);
        exit;
    }
    $emailkh = mysqli_insert_id($conn);
    return $idkh;
}

function getPubName($conn, $pubid){
    $query = "SELECT publisher_name FROM publisher WHERE publisherid = '$pubid'";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }
    if(mysqli_num_rows($result) == 0){
        echo "Empty books ! Something wrong! check again";
        exit;
    }

    $row = mysqli_fetch_assoc($result);
    return $row['publisher_name'];
}

// lay thong tin sach
function getAll($conn){
    $query = "SELECT * from books ORDER BY book_isbn DESC";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }
    return $result;
}
?>


