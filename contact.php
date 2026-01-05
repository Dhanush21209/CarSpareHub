<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
include "db.php";

$msg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $message = $_POST['message'] ?? '';

    $stmt= $conn->prepare("
    INSERT INTO contacts(name,email,phone,message)
    VALUES(?,?,?,?)
    ");
    $stmt->bind_param("ssss",$name,$email,$phone,$message);
    if($stmt->execute()){
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'kingthanushkingthanush@gmail.com';
            $mail->Password   = 'wbgk uxjb nsnz crkg';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;
        
            $mail->setFrom('noreply@CarSpareHub.com', 'CarSpareHub');
            $mail->addAddress('mkamesh4567@gmail.com');
            $mail->Subject = 'New Contact Received!';
            $mail->Body = "New Contact Details\n=====================\n".
                          "Name: $name\n".
                          "Phone: $phone\n".
                          "Email: $email\n".
                          "Message: $message\n";
        
            $mail->send();
            $msg = "Your message has been sent!";
        } catch (Exception $e) {
            echo "Contact Detail Received but email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        
} else {
echo "DB Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

} else {
}
?>

    


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
<title>Contact - CarSpareHub</title>

<style>

body {
    font-family: Arial, sans-serif;
    background: white;
    margin: 0;
}
.ig{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://static.vecteezy.com/system/resources/thumbnails/023/980/938/small/close-up-red-luxury-car-on-black-background-with-copy-space-photo.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: brightness(1);
            z-index: -1;
        }
        .content{
            position: relative;
            z-index: 10;
        }


h1 {
    text-align: center;
    background: black;
    color: #ff6600;
    padding: 15px;
    margin: 0;
}
.header-menu {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap:wrap;
    text-align:center;
    background: #ff6600;
    padding: 15px 0;
}
.header-menu h3{
    margin: 0;
    color:white;
    cursor: pointer;
    transition: 0.3s;
}
.header-menu h3:hover{
    color:black;
}
.header-menu a {
    color: white;
    font-size: 20px;
    font-weight: bold;
    text-decoration: none;
}
.header-menu a:hover {
    color: black;
}
.container {
    max-width: 450px;
    width:90%;
    margin: 40px auto;
    box-sizing:border-box;
    background: lightgreen;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.2);
}
input, textarea {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border-radius: 5px;
    border: 1px solid #aaa;
}
button {
    width: 100%;
    padding: 10px;
    background: #ff6600;
    color: white;
    font-size: 18px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
button:hover {
    background: black;
}
.success {
    text-align: center;
    background: black;
    color: #ff6600;
    padding: 8px;
    border-radius: 5px;
}
@media(max-width:600Px){
    h1{
        font-size:22px;
        padding:10px;
    }
    .header-menu a{
        font-size:16px;
    }
    .container{
        margin:2opx auto;
    }
    input,textarea,button{
        font-size:16px;
    }
}
</style>
</head>

<body>
    <div class="ig"></div>
    <div class="content">

<h1>CarSpareHub</h1>

<div class="header-menu">
    <h3><i class="fas fa-camera" ></i><a href="about.php">About</a></h3>
    <h3><i class="fas fa-shopping-cart"></i><a href="order.php">Add Order</a></h3>
    <h3><i class="fas fa-store"></i><a href="shop.php">Shop</a></h3>
    <h3><i class="fas fa-user"></i><a href="contact.php">Contact</a></h3>
</div>

<div class="container">
    <h2>Contact Us</h2>

    <?php if($msg != "") echo "<p class='success'>$msg</p>"; ?>

    <form action="contact.php" method="POST">
        <label>Your Name</label>
        <input type="text" name="name" required>

        <label>Your Email</label>
        <input type="email" name="email">

        <label>Your Phone</label>
        <input type="text" name="phone" required>

        <label>Your Message</label>
        <textarea name="message" rows="5" required></textarea>

        <button type="submit">Send Message</button>
    </form>
</div>
</div>
</body>
</html>
