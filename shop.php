<?php
include "db.php";

$name = $_GET['name'] ?? '';
$model = $_GET['model'] ?? '';
$category = $_GET['category'] ?? 'engineparts';

$categories=[
    'engineparts'=>'Engine Parts',
    'gearparts'=>'Gear parts',
    'breaksystem'=>'Break System',
    'electricalpart'=>'Electrical Part'
];

if(!array_key_exists($category,$categories)){
    $category='engineparts';
}

$sql = "SELECT * FROM $category WHERE 1=1";
$params = [];
$types = "";

if($name){
    $sql .= " AND name=?";
    $params[] = $name;
    $types .= "s";
}
if($model){
    $sql .= " AND model=?";
    $params[] = $model;
    $types .= "s";
}

$stmt = $conn->prepare($sql);

if ($params){
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Car spare parts shop</title>
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <style>
        body{
            font-family: Arial,sans-serif;
            margin:0;
            padding:0;
            background-color:black;
        }
        .ig{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://i.pinimg.com/736x/db/d3/b1/dbd3b1e13599dbaf83e0d88b4a35367c.jpg');
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


        h1,h2{
            text-align:center;
            margin:10px 0;
            color:#ff6600;
        }
        .head{
            background:#ff6600;
            padding:15px;
            display:flex;
            justify-content:center;
            gap:30px;
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
            color:black;
            text-decoration:none;
            font-weight:bold;
        }
        .head a:hover{
            color:white;
        }
        form{
            display:flex;
            justify-content:center;
            gap:10px;
            margin:20px 0;
            flex-wrap:wrap;
        }
        form input,form select,form button{
            padding:8px 12px;
            font-size:16px;
        }
        form button{
            background:#ff6600;
            color:white;
            border:none;
            cursor:pointer;
            transition:background 0.3s;
        }
        form button:hover{
            background: green;
        }
        .grid{
            display:grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap:20px;
            padding: 20px;
            max-width: 1200px;
            margin: auto;
}

.parts {
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    padding: 15px;
    text-align: center;
    transition: transform 0.2s, box-shadow 0.2s;
}

.parts:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.parts img {
    max-width: 100%;
    height: 150px;
    object-fit: contain;
    margin-bottom: 10px;
}

.parts ul {
    list-style: none;
    padding: 0;
    margin: 10px 0;
    text-align: left;
}

.parts ul li {
    margin-bottom: 5px;
}

.order-btn {
    display: inline-block;
    margin-top: 10px;
    padding: 8px 12px;
    background: #28a745;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    transition: background 0.3s;
}

.order-btn:hover {
    background: #218838;
}

    </style>
</head>
<body>
<div class="ig"></div>
    <div class="content">

<h1>CarSpareHub</h1>

<div class="head">
<h3><i class="fas fa-camera"></i><a href="about.php">About</a></h3>
<h3><i class="fas fa-store"></i><a href="shop.php">Shop</a></h3>
<h3><i class="fas fa-user"></i><a href="contact.php">Contact</a></h3>
</div>

<form method="get">
<select name="category">
<?php foreach($categories as $key => $label): ?>
    <option value="<?= $key ?>" <?= $category==$key?'selected':'' ?>>
        <?= $label ?>
    </option>
<?php endforeach; ?>
</select>

<input type="text" name="name" placeholder="Name" value="<?= htmlspecialchars($name) ?>">
<input type="text" name="model" placeholder="Model" value="<?= htmlspecialchars($model) ?>">
<button type="submit">Filter</button>
</form>

<h2>
    <?= $categories[$category] ?>
    <?= $name ? ' - '.strtoupper($name) : '' ?>
    <?= $model ? ' - '.$model : '' ?>
</h2>

<div class="grid">
<?php while($row = $result->fetch_assoc()): ?>
<div class="parts">

    <img src="<?= $row['image'] ?>" alt="<?= htmlspecialchars($row['name']) ?>">

    <ul>
        <li><strong>ID:</strong> <?= $row['id'] ?></li>
        <li><strong>Name:</strong> <?= $row['name'] ?></li>
        <li><strong>Price:</strong> ₹<?= $row['price'] ?></li>
        <?php if(isset($row['symptoms'])): ?>
            <li><strong>Symptoms:</strong> <?= $row['symptoms'] ?></li>
        <?php endif; ?>
        <li><strong>Model:</strong> <?= $row['model'] ?></li>
    </ul>

    <a class="order-btn" href="order.php?id=<?= $row['id'] ?>">Add Order</a>

</div>
<?php endwhile; ?>
</div>
        </div>
</body>
</html>
