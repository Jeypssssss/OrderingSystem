<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "productdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    echo "Failed to Connect";
}

if(isset($_GET["action"]) && $_GET["action"] == "delete"){
    $productName = $_GET["name"];
    $deleteQuery = "DELETE FROM `product_second` WHERE description = '$productName'";
    mysqli_query($conn, $deleteQuery);
}

?>
<style>
    .canton {

        border-radius: 7px;
        color: black;
        background-color: white;
    }
    
    .adobo a{
        color: black;
        background-color: white;

        border-radius: 7px;
    }
    .header{
        background-color: black;
        max-height: 20%;
    }
    .header img{
        width: 20%;
        padding: 0;
        margin-right: 90%;
    
    }
    table{
    width: 100%;
    padding: 20px;
    background-color: rgba(128, 128, 128, 0.192);
}

  .table_container th{
    padding: 3%;
    font-weight: bold;

  }
  tr .img{
    width: 50%;
    margin-bottom: 10%;
  }
  .remove{
    background-color: black;
    color: white;
    border-radius: 10px;
    transition: background-color ease 0.5s;
    
  }
  .remove:hover{
    background-color: #ABB2B9;
    color: black;
  }
  .desc th{
    margin-right: 10%;
    font-family: 'Courier New', Courier, monospace;
    padding: 20px;
  }
  h3{
    font-size: 1.5em;
    font-family: 'Courier New', Courier, monospace;
  }
  .payment button{
    color: white;
    background-color: black;
    border-radius: 10px;
  }
  .footer{
    background-color: black;
    height: 10%;
    margin-top: 50px;
}
.footer p {
    color: white;
    margin-top: 1px;
    text-align: center;
    font-family: 'Courier New', Courier, monospace;

}
.checkout button{
    color: black;
    font-size: 1em;
    font-family: 'Courier New', Courier, monospace;
}
.social{
  color: white;
  font-size: 2em;
  margin-bottom: 50%;
  transition: 0.3s ease;

}
.social:hover{
    color: #ABB2B9;
}
.footer h1{
  color: white;
  font-family: 'Courier New', Courier, monospace;
  font-size: 1.2em;
}
.btn{
    color: black;
    transition: background 0.3s;
}
.btn:hover{
   
      color: #ABB2B9;
      background: none;
}
 
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CART</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/logo.webp" type="image/x-icon">
</head>
<body>
    <nav class="header">
    <a href="index.php">
    <img src="img/bg.png" alt="Logo">
</a>

      

    </nav>
    <h3>Cart</h3>
    <div class="table_container">
        <table>
            <tr class="desc">
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Remove Item</th>
            </tr>
            <?php
            $query = "SELECT * FROM `product_second` ORDER BY id ASC";
            $result = mysqli_query($conn, $query);
            $total = 0;
            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <td><img src="img/<?php echo $row["image"];?>" alt="" class="img"></td>
                        
                        <td><?php echo $row["description"];?></td>
                        <td><?php echo $row["price"];?></td>
                        <td><?php echo $row["quantity"];?></td>
                        <td><?php echo number_format($row["quantity"]*$row["price"],2);?></td>
                        
                        <td><a class="remove" href="cart.php?action=delete&name=<?php echo $row["description"];?>"><span>Remove</span></a></td>
                        <?php
                        $total = $total + ($row["quantity"]*$row["price"]);
                    }
                }
                ?>
                </tr>
                <tr></tr>
                <tr class="payment">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total</td>
                    <td><?php echo number_format($total, 2);?></td>
                    <td ><a class="btn" href="checkout.php" class="btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">Proceed To Checkout</a></td>
                </tr>

        </table>
    </div>
    <div class="footer">
<p> &copy; <?php echo date("Y"); ?> GodSpeed. All rights reserved.</p>
<h1>Follow Us on</h1>
<a class="social" href="https://web.facebook.com/profile.php?id=100088553464327"><ion-icon name="logo-facebook"></ion-icon></a>
<a class="social" href="https://shopee.ph/god_speed?categoryId=100011&entryPoint=ShopByPDP&itemId=23547601457&upstream=search"><ion-icon name="storefront"></ion-icon></a>

</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
