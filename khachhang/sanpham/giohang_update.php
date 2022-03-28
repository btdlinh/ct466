<?php

    ob_start();
    session_start();
// session_destroy();
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'ct466';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname)
    or die($conn->connect_error);

    $conn->set_charset('utf8');

    if(isset($_POST["id"])) {
        $id = $_POST["id"];
        if(isset( $_POST['value'])){
            $num = $_POST['value'];
        } 
        $sql = "SELECT * FROM sanpham where sp_id=" . $id;
        $rs = mysqli_query($conn, $sql);
        $row = mysqli_fetch_row($rs);

        if (!isset($_SESSION["cart"])) {
            $cart[$id] = array(
                'id'=> $row[0],
                'name' => $row[6],
                'img' => $row[8],
                'price' => $row[7],
                'number_kho' => $row[10],
                'number' => $num > $row[10] ? $row[10] : $num 
            );
        } else {
            $cart = $_SESSION["cart"];
            if(array_key_exists($id, $cart)){
                $cart[$id] = array(
                    'id'=> $row[0],
                    'name' => $row[6],
                    'img' => $row[8],
                    'number_kho' => $row[10],
                    'price' => $row[7],
                    'number' => $num > $row[10] ? $row[10] : $num 
                );
            }
            else{
                $cart[$id] = array(
                    'id'=> $row[0],
                    'name' => $row[6],
                    'img' => $row[8],
                    'number_kho' => $row[10],
                    'price' => $row[7],
                    'number' => $num > $row[10] ? $row[10] : $num 
                );
            }
        }
        $_SESSION["cart"] = $cart;
//        print_r($_SESSION["cart"]);
        $number = 0;
        $total = 0;
        foreach ($cart as $value){
            $number +=  (int)$value["number"];
            $total += (int)$value["number"]*(int)$value["price"];
        }
        $number1= $cart[$id]['number'];
        echo $number."-".$total."-".$number."-".number_format($total)."-".$number1 ;
    }
?>