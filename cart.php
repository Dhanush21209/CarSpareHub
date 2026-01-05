<?php
include "db.php";
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires:0");
?>
<?php
session_start();

if (isset($_GET['from']) && $_GET['from'] === 'cart') {
    unset($_SESSION['order']); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

    <title>Document</title>
    <style>
        body{
            margin:0;
            font-family:Arial,sans-serif;
            background:linear-gradient(#B296FF,#C1D2DC);
            color:black;
        }
        .site-logo{
            text-align:center;
            background:linear-gradient(#B296FF,#C1D2DC);
            padding:20px 0;
            font-size:32px;
            font-weight:700;
            color:black;
        }
        .site-logo{
            font-size:32px;
            padding:10px;
            border-radius:12px;
            color:black;
        }
        .content{
            width: 90%;
            margin:auto;
            margin-top:30px;
        }
        .content div{
            background:linear-gradient(#B296FF,#C1D2DC);
            padding:15px;
            border-radius:10px;
            margin-bottom:20px;
            color:black;
            display:flex;
            align-items:center;
            gap:20px;
            box-shadow:0 0 10px rgba(255,102,0,0.5);
        }
        .content img{
            width: 110px;
            height:110px;
            border-radius:10px;
            border:2px solid black;
            background:white;
        }
        .content a {
            text-decoration:none;
            color:white;
            padding:8px 12px;
            background:black; 
            border-radius:6px;
            font-weight:bold;
            transition:0.3s;
        }
        .content a:hover{
            background:#B296FF;
        }
        .order-btn{
            background:black !important;
            color:white !important;
            font-weight:bold;
            padding:8px 14px;
            border-radius:6px;
            margin-left:10px;
            text-decoration:none;
            transition:0.3s;
        }
        .order-btn:hover{
            background:#B296FF !important;
            color:white !important;
        }
        .cart-count{
            display:block;
            text-align:center;
            margin-top:25px;
            font-size:22px;
            color:#B296FF;
            text-decoration:none;
        }
        .cart-count:hover{
            color:black;
        }
    </style>
</head>
<body>
<h1 class="site-logo"><i class="fas fa-screwdriver-wrench"></i><span>CarSpareHub</span></h1>
<h3><i class="fas fa-shopping-cart" style="color:white;"></i><a href="order.php?part=Add Order" style="text-decoration:none; color:white;">Add Order</a></h3>


<div class="grid">
<?php

$action = $_GET['action'] ?? '';
$id     = intval($_GET['id'] ?? 0);
$type   = $_GET['type'] ?? '';

if ($action == "add" && $id > 0) {

    if ($type == "engine")      $table = "engineparts";
    elseif ($type == "gear")    $table = "gearparts";
    elseif ($type == "break")   $table = "breaksystem"; 
    elseif ($type == "electrical") $table = "electricalpart";
    else $table = "";

    if ($table != "") {

        $sql = "SELECT * FROM $table WHERE id = $id";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {

            $item = $result->fetch_assoc();
            $name  = $item['name'];
            $price = $item['price'];
            $image = $item['image'];

            $insert = "INSERT INTO cart (part_id, name, price, image) 
                       VALUES ('$id', '$name', '$price', '$image')";
            $conn->query($insert);

            echo "<script>alert('Item added to cart');window.location='cart.php';</script>";
            exit();
        }
    }
}

if ($action == "delete" && $id > 0) {
    $conn->query("DELETE FROM cart WHERE id = $id");
    echo "<script>alert('Item removed');window.location='cart.php';</script>";
    exit();
}

?>
</div>
<div class="content">
<?php
$sql = "SELECT * FROM cart";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<div>";
    echo "<img src='" . $row['image'] . "' width='100'>";
    echo "<p>" . $row['name'] . " - ₹" . $row['price'] . "</p>";
    echo "<a href='cart.php?action=delete&id=" . $row['id'] . "'>Remove</a>";
    
    echo '<a class="order-btn" href="order.php?from=cart&ts=' . time() . '">Add Order</a>';
    
 
    echo "</div><hr>";
}

$count = $conn->query("SELECT COUNT(*) AS total FROM cart")->fetch_assoc()['total'];
echo "<a href='cart.php'>Cart ($count)</a>";
?>
</div>
</body>
</html>