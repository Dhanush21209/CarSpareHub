<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <title>About - CarSpareHub</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: black;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            background: black;
            color: white;
            padding: 15px;
            margin: 0;
        }
        .head{
            display: flex;
            justify-content: center;
            gap: 50px;
            background-color: white;
            padding: 15px 0;
            color:#ff6600;
        }
        .head h3{
            margin:0;
            color:#ff6600;
            cursor:pointer;
            transition:0.3s;
        }
        .head h3:hover{
            color:black;
        }
        .head a{
            color: #ff6600;
            text-decoration: none;
            font-size: 20px;
            font-weight: bold;
        }
        .head a:hover{
            color: black;
        }

        .container {
            width: 80%;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            line-height: 1.8;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }

        h2 {
            color: #ff6600;
            margin-bottom: 10px;
        }

        p {
            font-size: 18px;
        }
    </style>
</head>

<body>

    <h1>CarSpareHub</h1>

    <div class="head">
        <h3><i class="fas fa-camera" ></i><a href="about.php">About</a></h3>
        <h3><i class="fas fa-shopping-cart"></i><a href="order.php?part=Add Order">Add Order</a></h3>
        <h3><i class="fas fa-store"></i><a href="shop.php">Shop</a></h3>
        <h3><i class="fas fa-user"></i><a href="contact.php">Contact</a></h3>
    </div>

    <div class="container">
        <h2>About CarSpareHub</h2>

        <p>
            Welcome to <strong>CarSpareHub</strong> — your trusted online spare parts store.
            We provide high-quality engine parts, gear parts, brake components, and electrical parts
            for all major car brands at affordable prices.
        </p>

        <h2>Our Mission</h2>
        <p>
            Our mission is to make automobile spare parts easily accessible with
            reliable quality, fast delivery, and excellent customer support.
        </p>

        <h2>Why Choose Us?</h2>
        <p>
            ✔ 100% Genuine Spare Parts<br>
            ✔ Affordable Prices<br>
            ✔ Fast Delivery<br>
            ✔ Trusted by Thousands of Customers<br>
            ✔ Expert Customer Support
        </p>

        <h2>Contact Us</h2>
        <p>
            Have questions? Need help finding the right part?<br>
            You can always reach us through our <a href="contact.php">Contact Page</a>.
        </p>
    </div>

</body>
</html>
