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
        if(isset( $_POST['num'])){
            $num = $_POST['num'];
        } else $num = 1;

        $status = 200;
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
                'number' => $num
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
                    'number'=> (int)$cart[$id]["number"] + $num> (int)$row[10] ? (int)$row[10] : (int)$cart[$id]["number"] + $num
                );
            }
            else{
                $cart[$id] = array(
                    'id'=> $row[0],
                    'name' => $row[6],
                    'img' => $row[8],
                    'number_kho' => $row[10],
                    'price' => $row[7],
                    'number' => $num
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
        echo $number."-".$total;
    }
?>