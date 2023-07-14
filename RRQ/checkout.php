<?php

include 'config.php';

session_start();







if(isset($_POST['order_btn'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);      
   $number = $_POST['number'];
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $method = mysqli_real_escape_string($conn, $_POST['method']);
   $address = mysqli_real_escape_string($conn, ' '. $_POST['flat'].', '. $_POST['street'].', '. $_POST['city'].', '. $_POST['country'].' - '. $_POST['pin_code']);
   $placed_on = date('d-M-Y');

   $cart_total = 0;
   $cart_products[] = '';

   $product_second_query = mysqli_query($conn, "SELECT * FROM `product_second` WHERE 1") or die('query failed');
   if(mysqli_num_rows($product_second_query) > 0){
      while($cart_item = mysqli_fetch_assoc($product_second_query)){
         $product_second_description[] = $cart_item['id'].' ('.$cart_item['quantity'].') ';
         $sub_total = ($cart_item['price'] * $cart_item['quantity']);
         $cart_total += $sub_total;
      }
   }

   $total_products = implode(', ',$cart_products);

   $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

   if($cart_total == 0){
      $message[] = 'your cart is empty';
   }else{
      if(mysqli_num_rows($order_query) > 0){
         $message[] = 'order already placed!'; 
      }else{
         mysqli_query($conn, "INSERT INTO `orders`(name, number, email, method, address, total_products, total_price, placed_on) VALUES('$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on')") or die('query failed');
         $message[] = 'order placed successfully!';
         mysqli_query($conn, "DELETE FROM `product_second` WHERE 1") or die('query failed');
      }
   }
   
}

?>
<style>
   *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body{
    
    background-color: white;
}
.heading{
   text-align: center;
   color: black;
   font-size: 1.5em;
   font-family:'Courier New', Courier, monospace;
}

.button a{
        font-family: 'Courier New', Courier, monospace;
        margin-top: 50%;
        color: white;
    text-decoration: none;
    padding: 5px 10px;
    font-family:'Courier New', Courier, monospace;
    transition: background-color 0.3s ease;
    }
    .header{

background-color: #000000;
    width: 100%;
    height: 10%;
    color: #000000;
    padding: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .logo{
width: 10%;
display: flex;
    align-items: center;
    font-size: 24px;
    font-weight: bold;
    cursor: pointer;
    }
    .checkout form{
      grid-template-columns: 20% 20% 20% 20% 20% 20% 20%;
      width: 80%;
   padding:2rem;
   margin:0 auto;
   background-color: white;
   border-radius: .5rem;
}
.inputBox{
   border: solid 2px black;
   border-radius: 10px;
   padding: 20px;
   font-family: 'Courier New', Courier, monospace;
   font-weight: 400;
}


.checkout form h3{
   text-align: center;
   margin-bottom: 2rem;
   color:black;
   text-transform: uppercase;
   font-size: 2rem;
   font-family: 'Courier New', Courier, monospace;
}

.checkout form .flex{
   display: flex;
   flex-wrap: wrap;
   gap:1.5rem;
}

.checkout form .flex .inputBox{
   flex:1 1 40rem;
}

.checkout form .flex span{
   font-size: 2rem;
   color:var(--black);
}

.checkout form .flex select,
.checkout form .flex input{
   border:var(--border);
   width: 100%;
   border-radius: .5rem;
   width: 100%;
   background-color: var(--white);
   padding:1.2rem 1.4rem;
   font-size: 1.8rem;
   margin:1rem 0;
}

.placed-orders .box-container{
   max-width: 1200px;
   margin:0 auto;
   display:flex;
   flex-wrap: wrap;
   align-items: flex-end;
   gap:1.5rem;
}

.placed-orders .box-container .empty{
   flex:1;
}

.placed-orders .box-container .box{
   flex:1 1 40rem;
   border-radius: .5rem;
   padding:2rem;
   border:var(--border);
   background-color: var(--light-bg);
   padding:1rem 2rem;
}

.placed-orders .box-container .box p{
   padding:1rem 0;
   font-size: 2rem;
   color:var(--light-color);
}

.placed-orders .box-container .box p span{
   color:var(--purple);
}

.search-form form{
   max-width: 1200px;
   margin:0 auto;
   display: flex;
   gap:1rem;
   color: white;
}

.search-form form .btn{
   margin-top: 0;
}

.search-form form .box{
   width: 100%;
   padding:1.2rem 1.4rem;
   border:var(--border);
   font-size: 2rem;
   color:var(--black);
   background-color: var(--light-bg);
   border-radius: .5rem;
}

.orderbutton{
   background: none;
   color: black;
   font-size: 1em;
   font-family: 'Courier New', Courier, monospace;
}
.social{
  color: white;
  font-size: 2em;
  margin-bottom: 50%;

}
.footer h1{
  color: white;
  font-family: 'Courier New', Courier, monospace;
  font-size: 1.2em;
}
.footer{
    background-color: black;
    height: 20%;
    margin-top: 50px;
}
.footer p {
    color: white;
    margin-top: 1px;
    text-align: center;
    font-family: 'Courier New', Courier, monospace;

}
.btn{
   background: black;
   margin-top: 20px;
   height: 7%;
   width: 100%;
   color: white;
   border: none;
   cursor: pointer;
   font-weight: bold;
   font-family: 'Courier New', Courier, monospace;
   font-size: 1em;
   transition: background-color 0.5s ease;
   border-radius: 10px;
}
.btn:hover{
   background-color: #D0D3D4;
   color: black;
}
.title{
   font-size: 2em;
   font-family: 'Courier New', Courier, monospace;
   font-weight: bold;
   text-align: center;
   text-transform: capitalize;
}
</style>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>GodSpeed</title>
   <link rel="shortcut icon" href="img/logo.webp" type="image/x-icon">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   

</head>
<body>
<nav class="header">
        <a href="index.php"><img src="img/bg.png" alt="" class="logo"></a>
        
        <div class="button">
            <a href="index.php" class="nav-link">home</a>
            <a class="cart" href="cart.php"><ion-icon name="cart-outline"></ion-icon></a>
        </div>
        
    </nav>


<div class="heading">
   <h3 class="title">checkout</h3>
</div>

<section class="display-order">

   
   

</section>

<section class="checkout">

   <form action="" method="post">
      <h3>Delivery Information</h3>
      <div class="flex">
         <div class="inputBox">
            <span>Your Name:</span>
            <input class="inputb" type="text" name="name" required placeholder="Enter Your Name">
         </div>
         <div class="inputBox">
            <span>Your Number :</span>
            <input type="number" name="number" required placeholder="Enter Your Number">
         </div>
         <div class="inputBox">
            <span>Your Email :</span>
            <input type="email" name="email" required placeholder="Enter Your Email">
         </div>
         <div class="inputBox">
            <span>Method Of Payment:</span>
            <select name="method">
               <option value="cash on delivery">Cash On Delivery</option>
               <option value="credit card">Credit Card</option>
               <option value="paypal">Paypal</option>
               <option value="paytm">Gcash</option>
            </select>
         </div>
         <div class="inputBox">
            <span>BlockNo:</span>
            <input type="number" min="0" name="flat" required placeholder="No of street">
         </div>
         <div class="inputBox">
            <span>Street Name:</span>
            <input type="text" name="street" required placeholder="Name of your Street">
         </div>
         <div class="inputBox">
            <span>City:</span>
            <input type="text" name="city" required placeholder="City Name">
         </div>
         <div class="inputBox">
            <span>Region:</span>
            <input type="text" name="state" required placeholder="Your Region:">
         </div>
         <div class="inputBox">
            <span>Country:</span>
            <input type="text" name="country" required placeholder="Country Name">
         </div>
         <div class="inputBox">
            <span>Postal Code:</span>
            <input type="number" min="0" name="pin_code" required placeholder="Postal Code:">
         </div>
      </div>
      <input type="submit" value="order now" class="btn" name="order_btn"  onclick="myFunction()">
   </form>

</section>
<footer class="footer">
<p> &copy; <?php echo date("Y"); ?> GodSpeed. All rights reserved.</p>
<h1>Follow Us on</h1>
<a class="social" href="https://web.facebook.com/profile.php?id=100088553464327"><ion-icon name="logo-facebook"></ion-icon></a>
<a class="social" href="https://shopee.ph/god_speed?categoryId=100011&entryPoint=ShopByPDP&itemId=23547601457&upstream=search"><ion-icon name="storefront"></ion-icon></a>
</footer>


<!-- custom js file link  -->
<script>function myFunction() {
  alert("Your Order has been placed!");
}</script>
<script src="script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>