<?php include "db.php";?>
<?php
$brand = $_GET['brand'] ?? '';

echo "<h2>Showing products for: " . strtoupper($brand) . "</h2>";
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
  <title>Available parts</title>

  <style>
    body{
      background:#FEBAFF;
    }
     h2 {
      text-align: center;
      font-weight: bold;
      background:linear-gradient(#2a1177,#B296FF,#C1D2DC);
      color:black;
      padding:10px;
    }
    .rotate-box{
      background:linear-gradient(#2a1177,#B296FF,#C1D2DC);
      font-weight: bold;
      color:black;
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

    .site-logo{
      text-align:center;
      background:linear-gradient(#B296FF,#C1D2DC);
      align-items:center;
      gap:12px;
      font-size:24px;
      font-weight:700;
      color:black;
    }
    .site-logo i{
      font-size:28px; 
      background:linear-gradient(135deg,#ff6600,#ffd500);
      color:black;
      padding:10px;
      border-radius:12px;
      box-shadow:0 6px 18px rgba(0,0,0,0.15);
    }
    .head{
    display: flex;
    justify-content: center;
    gap: 50px;
    background:linear-gradient(#B296FF,#C1D2DC);
    padding: 15px 0;
    color:black;
  }
.head h3{
    margin: 0;
    color:black;
    cursor: pointer;
    transition: 0.3s;
}

.head h3:hover{
    color: white;
}
.head a{
  text-decoration:none; 
  color:black;
}
.head a:hover{
  color:white;
}

    .grid {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      padding: 20px;
      justify-content: center;
    }


    .parts {
      background:linear-gradient(#B296FF,#C1D2DC);
      padding: 16px;
      border-radius: 8px;
      width: 22%;
      color:black;
      box-sizing:border-box;
      transition:transform 0.3s;
    }
    .parts:hover{
      transform: scale(1.15);
      z-index: 10;
    }

    .parts img {
      width: 150px;
      height:150px;
      border-radius: 30px;
      margin:0 auto 10px;
      color:black;
      object-fit:cover;
    }

   

    .parts ul,.parts li {
      list-style: none;
      padding: 0;
      margin-bottom: 8px;
      font-size: 16px;
    }

    .order-btn {
      display: block;
      text-align: center;
      margin-top: 10px;
      background: #fff;
      color: #000;
      padding: 8px;
      border-radius: 6px;
      text-decoration: none;
      font-weight: bold;
    }
    @media (max-width:900px) {
      .parts img{
        width:120px;
        height:120px;
      }
      .parts{
        width:45%;
      }
      .head{
        /* flex-direction:column; */
        gap:10px;
        text-align:center;
      }
      h2{
        font-size:18px;
      }
    }
  </style>
</head>

<body>

  <h1 class="site-logo"><i class="fas fa-screwdriver-wrench"></i><span>CarSpareHub</span></h1>
  <div class="head">
<h3><i class="fas fa-shopping-cart"></i><a href="order.php?part=Add Order">Add Order</a></h3>
<h3><i class="fas fa-store"></i><a href="shop.php">Shop</a></h3>
<h3><i class="fas fa-user"></i><a href="contact.php">Contact</a></h3>
<h3><i class="fas fa-camera" ></i><a href="about.php">About</a></h3>
<h3><i class="fas fa-cart-plus"></i><a href="cart.php">Cart</a></h3>

</div>
<h2 class="rotate-box">
        <i class="fa-solid fa-gear icon icon1"></i>
        <i class="fa-solid fa-gear icon icon2"></i>
        ENGINE PARTS</h2>
  <div class="grid">
    <?php
      $sql = "SELECT * FROM engineparts";
      $result = $conn->query($sql);

      while ($row = $result->fetch_assoc()) { ?>
        <div class="parts">
          <img src="<?php echo $row['image']; ?>" alt="">
          <ul>
            <li><strong>ID:</strong> <?php echo $row['id']; ?></li>
            <li><strong>Name:</strong> <?php echo $row['name']; ?></li>
            <li><strong>Price:</strong> ₹<?php echo $row['price']; ?></li>
            <li><strong>Symptoms:</strong> <?php echo $row['symptoms']; ?></li>
            <li><strong>Brand:</strong> <?php echo $row['brand']; ?></li>
            <li><strong>Model:</strong> <?php echo $row['model']; ?></li>
          </ul>

          <a class="order-btn" 
   href="cart.php?action=add&id=<?php echo $row['id']; ?>&type=engine">
   Add to Cart
</a>
        </div>
    <?php } ?>
  </div>

  <h2 class="rotate-box">
        <i class="fa-solid fa-gear icon icon1"></i>
        <i class="fa-solid fa-gear icon icon2"></i>
        GEAR PARTS</h2>

  <div class="grid">
    <?php
      $sql = "SELECT * FROM gearparts";
      $result = $conn->query($sql);

      while ($row = $result->fetch_assoc()) { ?>
        <div class="parts">
          <img src="<?php echo $row['image']; ?>" alt="">
          <ul>
            <li><strong>ID:</strong> <?php echo $row['id']; ?></li>
            <li><strong>Name:</strong> <?php echo $row['name']; ?></li>
            <li><strong>Price:</strong> ₹<?php echo $row['price']; ?></li>
            <li><strong>Model:</strong> <?php echo $row['model']; ?></li>
          </ul>

          <a class="order-btn" 
   href="cart.php?action=add&id=<?php echo $row['id']; ?>&type=gear">
   Add to Cart
</a>
        </div>
    <?php } ?>
  </div>

  <h2 class="rotate-box">
        <i class="fa-solid fa-gear icon icon1"></i>
        <i class="fa-solid fa-gear icon icon2"></i>
        BREAKSYSTEM</h2>
  <div class="grid">
    <?php
    $sql="SELECT*FROM breaksystem";
    $result=$conn->query($sql);

    while($row=$result->fetch_assoc()){ ?>
<div class="parts">
  <img src="<?php echo $row['image'];?>" alt="">
  <ul>
            <li><strong>ID:</strong> <?php echo $row['id']; ?></li>
            <li><strong>Name:</strong> <?php echo $row['name']; ?></li>
            <li><strong>Price:</strong> ₹<?php echo $row['price']; ?></li>
            <li><strong>Symptoms:</strong><?php echo $row['symptoms'];?></li>
            <li><strong>Model:</strong> <?php echo $row['model']; ?></li>
  </ul>
  <a class="order-btn" 
   href="cart.php?action=add&id=<?php echo $row['id']; ?>&type=break">
   Add to Cart
</a>
    </div>
  <?php  }?>
  </div>

  <h2 class="rotate-box">
        <i class="fa-solid fa-gear icon icon1"></i>
        <i class="fa-solid fa-gear icon icon2"></i>
        ELECTRICAL PARTS</h2>
  <div class="grid">
    <?php
    $sql="SELECT*FROM electricalpart";
    $result=$conn->query($sql);

    while($row=$result->fetch_assoc()){ ?>
<div class="parts">
  <img src="<?php echo $row['image'];?>" alt="">
  <ul>
            <li><strong>ID:</strong> <?php echo $row['id']; ?></li>
            <li><strong>Name:</strong> <?php echo $row['name']; ?></li>
            <li><strong>Price:</strong> ₹<?php echo $row['price']; ?></li>
            <li><strong>Brand:</strong><?php echo $row['brand'];?></li>
  </ul>
  <a class="order-btn" 
   href="cart.php?action=add&id=<?php echo $row['id']; ?>&type=electrical">
   Add to Cart
</a>
    </div>
  <?php  }?>
  </div>
</body>
</html>
