<?php include "db.php"; ?>
<?php
$brand = $_GET['brand'] ?? '';

echo "<h2>Showing products for: " . strtoupper($brand) . "</h2>";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Now</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background:linear-gradient(#B296FF,#C1D2DC);
            padding: 20px;
        }

        .order-box {
            max-width: 450px;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
select[name="brand"] {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 15px;
    background-color: #fff;
    appearance: none; 
    cursor: pointer;
    transition: 0.3s ease;
}

select[name="brand"]:hover {
    border-color: #ff6600;
}

select[name="brand"]:focus {
    outline: none;
    border-color: #ff6600;
    box-shadow: 0 0 5px rgba(0,123,255,0.5);
}


        .order-box h2 {
            text-align: center;
            margin-bottom: 20px;
            background-color:black;
            color:#ff6600;
        }

        label {
            display: block;
            margin-top: 12px;
            font-weight: bold;
        }

        input, textarea, button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 15px;
        }
        select[name="payment"] {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 15px;
    background-color: #fff;
    appearance: none; 
    cursor: pointer;
    transition: 0.3s ease;
}

select[name="payment"]:hover {
    border-color: #ff6600;
}

select[name="payment"]:focus {
    outline: none;
    border-color: #ff6600;
    box-shadow: 0 0 5px rgba(0,123,255,0.5);
}
 

        button {
            margin-top: 18px;
            background: black;
            color: white;
            border: none;
            cursor: pointer;
            transition: 0.3s ease;
        }

        button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

    <div class="order-box">
        <h2>Order Now</h2>

        <form action="addorder.php" method="POST">

            <label>Your Name</label>
            <input type="text" name="customer_name" required>

            <label>Mobile Number</label>
            <input type="text" name="phone" pattern="[0-9]{10}" maxlength="10" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Address</label>
            <textarea name="address" rows="3" required></textarea>

            <label>Part Name</label>
            <input type="text" name="part_name" value="" required>
             
            <label>Price</label>
            <input type="int" name="price" value="₹" required>

            <label>Brand</label>
             <select name="brand" id=" <?php echo $row['brand']; ?>">
                <option value="">Please choose the brand</option>
                <option value="dhanush">Dhanush</option>
             </select>
            
            <label>Quantity</label>
            <input type="number" name="qty" min="1" required>

            <!-- <label>Payment</label>
            <select name="payment" id="">
                <option value="">Please choose the payment</option>
                <option value="case on delivery">Case On Delivery</option>
                <option value="upi">UPI</option>
                <option value="net banking">Net Banking</option>
    </select> -->

            <button type="submit">Place Order</button>
        </form>
    </div>

</body>
</html>


<!-- <!DOCTYPE html>
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
            </html> -->