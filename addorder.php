<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

include "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name    = $_POST['customer_name'] ?? '';
    $phone   = $_POST['phone'] ?? '';
    $email   = $_POST['email'] ?? '';
    $address = $_POST['address'] ?? '';
    $part    = $_POST['part_name'] ?? '';
    $price   = $_POST['price'] ?? '';
    $brand   = $_POST['brand'] ?? '';  
    $qty     = $_POST['qty'] ?? '';

    $stmt = $conn->prepare("
        INSERT INTO orders (customer_name, phone, email, address, part_name, price, brand, qty)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
    ");

    if (!$stmt) {
        die("SQL ERROR: " . $conn->error);
    }

    $stmt->bind_param(
        "sssssisi",
        $name, 
        $phone, 
        $email, 
        $address, 
        $part, 
        $price, 
        $brand, 
        $qty
    );

    if ($stmt->execute()) {

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'kingthanushkingthanush@gmail.com';
            $mail->Password   = 'wbgk uxjb nsnz crkg';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            $mail->setFrom('noreply@yourwebsite.com', 'Your Website');
            $mail->addAddress('kingthanushkingthanush@gmail.com');

            if (!empty($email)) {
                $mail->addAddress($email);
            }

            $mail->Subject = 'New Order Received!';
            $mail->Body = 
                "New Order Details\n=====================\n".
                "Name: $name\n".
                "Phone: $phone\n".
                "Email: $email\n".
                "Address: $address\n".
                "Part Name: $part\n".
                "Brand: $brand\n".
                "Price: $price\n".
                "Quantity: $qty\n";

            $mail->send();

            echo "
            <!DOCTYPE html>
            <html>
            <head>
            <title>Order Success</title>
            <style>
                body{
                    margin:0;
                    font-family: Arial, sans-serif;
                    background:linear-gradient(rgb(0,0,0), rgb(13,46,136));
                    display:flex;
                    justify-content:center;
                    align-items:center;
                    height:100vh;
                }
                .success-box{
                    background:linear-gradient(rgb(0,0,0), rgb(20,70,150));
                    padding:40px;
                    border-radius:12px;
                    box-shadow:0 0 20px rgba(255,102,0,0.7);
                    text-align:center;
                    width:400px;
                    color:#ff6600;
                }
                .success-box h2{
                    font-size:28px;
                    margin-bottom:10px;
                }
                .success-box p{
                    font-size:18px;
                    margin-bottom:20px;
                }
                .success-box a{
                    display:inline-block;
                    background:#ff6600;
                    padding:10px 25px;
                    border-radius:6px;
                    color:white;
                    text-decoration:none;
                    font-weight:bold;
                    box-shadow:0 0 10px rgba(255,102,0,0.5);
                    transition:0.3s;
                }
                .success-box a:hover{
                    background:#ffd500;
                    color:black;
                }
                .check-icon{
                    font-size:55px;
                    color:#ffd500;
                }
            </style>
            </head>
            <body>
                <div class='success-box'>
                    <div class='check-icon'>✔</div>
                    <h2>Order Placed Successfully!</h2>
                    <p>Your order has been submitted successfully.<br>Check your email for confirmation.</p>
                    <a href='shop.php'>Back to Shop</a>
                </div>
            </body>
            </html>
            ";
            exit();

        } catch (Exception $e) {
            echo "<script>alert('Order saved but email could not be sent!'); window.location='shop.php';</script>";
        }

    } else {
        echo "<script>alert('Order failed. Try again!'); window.location='order.php';</script>";
    }
}
?>
