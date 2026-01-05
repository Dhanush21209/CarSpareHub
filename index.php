<?php

include "db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Your one-stop shop for genuine car spare parts. Buy quality parts online with easy returns and a 1-year warranty.">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <title>CarSpareHub</title>

    <style>
        body {
            margin:0;
            padding:0;
            font-family:'Poppins',sans-serif;
            background:#f2f5f7;
            color:#222;
        }
        .car-run{
            display:flex;
            text-align: center;
            background:linear-gradient(rgb(0,0,0),rgb(13,43,136));
            font-size: 50px;
            color: #ff6600;
            animation: drive 1.5s ease-in-out infinite;
            text-shadow: -10px 0 10px rgba(0,0,0,0.4);
        }
        @keyframes drive {
            0%{
                transform: translate(0) rotate(0deg);
            }
            50%{
                transform: translate(50px) rotate(-3deg);
            }
            100%{
                transform: translate(0) rotate(0deg);
            }
        }
        h2 {
            text-align:center;
            font-size:26px;
            margin-bottom:20px;
        }
        .ig{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://www.spinny.com/blog/wp-content/uploads/2024/09/videoframe_0.webp');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: brightness(0.5);
            z-index: -1;
        }
        .content{
            position: relative;
            z-index: 10;
        }
        .hero{
            background:linear-gradient(rgb(0,0,0),rgb(13,43,136));
            color:#ff6600;
        }
        .hero i{
            font-size: 28px;
            background: linear-gradient(135deg,#d66a04,#07060a);
            color:white;
            padding: 10px;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.15);

        }

        .warranty-section {
            display:flex;
            justify-content:center;
            gap:30px;
            padding:40px 20px;
        }
        .warranty-box {
            width:330px;
            padding:25px;
            background:white;
            border-radius:15px;
            box-shadow:0px 4px 12px rgba(0,0,0,0.1);
            transition:0.3s;
            border-top:4px solid #ff6600;
        }
        .warranty-box:hover {
            transform:translateY(-8px);
            box-shadow:0px 6px 18px rgba(0,0,0,0.15);
        }
        .warranty-box i {
            font-size:45px;
            color:#ff6600;
        }

        .products-grid {
            display:grid;
            grid-template-columns:repeat(auto-fill, minmax(200px, 1fr));
            gap:20px;
            padding:0 20px;
        }
    .products-preview{
 background:linear-gradient(rgb(0,0,0),rgb(13,43,136));   
font-weight: bold;
color:orange;
text-align: center;
}
.icon{
    animation: spin 3s linear infinite;
}
.icon2{
    animation-direction: reverse;
}

@keyframes spin {
     from{transform: rotate(0deg);}
    
    to{transform: rotate(360deg);}
}


        .button {
            background:#ff6600;
            color:white;
            padding:10px 20px;
            border:none;
            border-radius:5px;
            cursor:pointer;
            font-size:16px;
        }
        .button:hover {
            background:#e65c00;
        }
@media (max-width: 768px) {

.car-run {
    justify-content: center;
    font-size: 26px;
    padding: 10px;
    animation: none;
}

.car-run h1 {
    font-size: 26px;
}

.hero h2 {
    font-size: 18px;
    padding: 10px;
    text-align: center;
}

.warranty-section {
    flex-direction: column;
    align-items: center;
    gap: 20px;
    padding: 20px 10px;
}

.warranty-box {
    width: 90%;
}
.products-preview h2 {
    font-size: 20px;
    padding: 10px;
}

.products-grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 12px;
    padding: 10px;
}

.button {
    width: 90%;
    font-size: 16px;
}

/* Footer */
footer {
    font-size: 14px;
    padding: 15px;
}
}

/* Extra small phones */
@media (max-width: 480px) {

.products-grid {
    grid-template-columns: 1fr;
}

.car-run h1 {
    font-size: 22px;
}
}
    footer {
            text-align:center;
            padding:20px;
            background:linear-gradient(rgb(0,0,0),rgb(255,0,0));
            color:#110b0b;
        }

    </style>
</head>

<body>
    <div class="ig"></div>
    <div class="content">

<header>
    <div class="car-run">
    <h1> <i class="fa-solid fa-car-side"></i>CarSpareHub</h1>
    </div>
</header>

<section class="hero">
    <h2> <i class="fa-solid fa-plug-circle-bolt"></i>Welcome to the Best Online Car Spare Hub</h2>
</section>

<section class="warranty-section">
    <div class="warranty-box">
        <i class="fas fa-shield-alt"></i>
        <h3>1-Year Warranty</h3>
        <p>All spare parts include a standard manufacturer warranty.</p>
    </div>

    <div class="warranty-box">
        <i class="fas fa-tools"></i>
        <h3>Genuine Parts</h3>
        <p>100% original and verified car & bike spare parts.</p>
    </div>

    <div class="warranty-box">
        <i class="fas fa-sync-alt"></i>
        <h3>Easy Replacement</h3>
        <p>7-day return and free replacement for damaged items.</p>
    </div>
</section>

<section class="products-preview">
    <h2> <i class="fa-solid fa-gear icon icon1"></i>
         <i class="fa-solid fa-gear icon icon2"></i>
        CarSpareHub Products</h2>
    <div class="products-grid" id="previewProducts"></div>

    <p style="text-align:center; margin-top:20px;">
        <a href="home.php"><button class="button">See Now</button></a>
    </p>
</section>

<footer>
    <p>© 2025 CarSpareHub. All rights reserved.</p>
</footer>
    </div>
</body>
</html>
