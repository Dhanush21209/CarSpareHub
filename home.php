<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <title>CarSpareHub</title>
    <style>
    body{
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
    background: #f5f5f5;
}
.ig{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://cdn.cars24.com/prod/auto-news24-cms/CARS24-Blog-Images/2025/08/26/7d25982d-4a7b-4b24-b8c9-b12a01ba209d-cheap-sportscar.webp');
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


header h1{
    font-size: 32px;
    background:linear-gradient(rgb(0,0,0),rgb(13,43,136));
    text-align: center;
    gap: 10px;
    font-weight: bold;
    color: #f15d06;
    margin-top: 20px;
}
h1 i{
    color:#ff6600;
    font-size: 40px;
    animation: rotateGear 2s linear infinite;
}
@keyframes rotateGear {
    100% {transform: rotate(360deg);}
}

.head{
    display: flex;
    justify-content: center;
    gap: 50px;
    background-color: #131212;
    padding: 15px 0;
    color: #ff6600;
}

.head h3{
    margin: 0;
    color: #ff6600;
    cursor: pointer;
    transition: 0.3s;
}

.head h3:hover{
    color: white;
}

.rotate-box{
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

.Car-Section{
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.brand-box{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
    gap: 25px;
    width: 90%;
    max-width: 900px;
}

.brand-box a{
    background:linear-gradient(rgb(0,0,0),rgb(13,43,136));
    padding: 20px 10px;
    text-align: center;
    text-decoration: none;
    border-radius: 12px;
    color: #f5f2f2;
    box-shadow: 0px 2px 8px rgba(0,0,0,0.15);
    transition: 0.3s ease;
}

.brand-box a:hover{
    transform: translateY(-5px);
    box-shadow: 0px 5px 12px rgba(0,0,0,0.25);
}

.brand-box i{
    font-size: 40px;           
    color: #ff6600;
    margin-bottom: 10px;
}

.brand-box p{
    font-size: 16px;
    font-weight: bold;
}

.products-preview{
    text-align: center;
    margin-top: 50px;
}

.products-preview h2{
    font-size: 26px;
    background-color: #0c0b0b;
    color: #ff6600;
}

.button{
    background: #ff6600;
    color: #fff;
    border: none;
    padding: 12px 30px;
    font-size: 16px;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s;
}

.button:hover{
    background: #0e0d0d;
}
footer{
    text-align:center;
            padding:20px;
            background:linear-gradient(rgb(0,0,0),rgb(13,43,136));
            color:rgb(211, 99, 7);
}

    </style>
</head>
<body>
    <div class="ig"></div>
    <div class="content">
<header>
    <h1> <i class="fa-solid fa-gear"></i>Popular Car & bike Brands</h1>
</header>
<div class="head">
    <h3><i class="fas fa-store"></i>
        <a href="shop.php" style="text-decoration:none; color:white;">Shop</a></h3>
    <h3><i class="fas fa-user"></i><a href="contact.php" style="text-decoration:none; color:white;">Contact</a></h3>
    <h3><i class="fas fa-camera" ></i><a href="about.php" style="text-decoration:none; color:white;">About</a></h3>
    <h3><i class="fas fa-cart-plus"></i>
        <a href="cart.php" style="text-decoration: none; color: white;">Cart</a></h3>
</div>
    <h2 class="rotate-box">
        <i class="fa-solid fa-gear icon icon1"></i>
        <i class="fa-solid fa-gear icon icon2"></i>
        India Car Brands</h2>
<section class="Car-Section">
    <div class="brand-box">

        <a href="parts.php?brand=maruti">
            <i class="fas fa-car"></i>
            <p>Maruti Suzuki</p>
        </a>
        
        <a href="parts.php?brand=hyundai">
            <i class="fas fa-car-side"></i>
            <p>Hyundai</p>
        </a>
        
        <a href="parts.php?brand=tata">
            <i class="fas fa-car-alt"></i>
            <p>Tata Motors</p>
        </a>
        
        <a href="parts.php?brand=mahindra">
            <i class="fas fa-truck-pickup"></i>
            <p>Mahindra</p>
        </a>
        
        <a href="parts.php?brand=bmw">
            <i class="fa-brands fa-bmw"></i>
            <p>BMW</p>
        </a>
        
    </div>
</section>
<section class="products-preview">
    <div class="Products-grid" id="previewProducts"></div>
    <h2>CarSpareHub All Products</h2>
    <p style="margin-top: 20px;"><a href="parts.php"><button class="button">Shop Now</button></a></p>
</section>
<footer>
    <p>© 2025 CarSpareHub. All rights reserved.</p>
</footer>
</div>
</body>
</html>