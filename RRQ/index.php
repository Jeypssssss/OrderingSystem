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

if(isset($_POST["add"])){
    $producId = $_GET["id"];
    $productName = $_POST["hidden_name"];
    $productImage = $_POST["hidden_image"];
    $productPrice = $_POST["hidden_price"];
    $productQuantity = $_POST["quantity"];

    $sql = "INSERT INTO `product_second` (`description`, `image`, `price`, `quantity`) VALUES ('$productName', '$productImage', '$productPrice', '$productQuantity');";
    mysqli_query($conn, $sql);
}

?>
<style>
   *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
    body{
        background-color: #FDFEFE;
        width: 100%;
    }
    .container{
        background: none;
        width: 100%;
        display: grid ;
        row-gap: 100px;
        column-gap: 100px;
      grid-template-columns: 30% 30% 30%;    
      margin-bottom: 5%;
      margin-right: 50%;
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
    
    .product img{
        width: 100%;
    }
    .but{
        background-color: black;
        color: white;
        border-radius: 5px;
        width: 100%;
        cursor: pointer;
        transition: background-color 0.3s ease;
        border: none;
        
        height: 10%;
    }
    .but:hover{
        background-color: #979A9A;
    border-radius: 5px;
    color: black;
    
    }
    .about p{
  font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  text-align: start;
  font-size: 1.2em;
  width: 100%;
  margin-left: 20px;
  color: #212F3D;
}
.about h1{
  text-align: start;
  margin-left: 20px;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-size: 35px;
    line-height: 50px;
    margin-bottom: 25px;

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

 
  .button a:hover {
    background-color: #ECF0F1;
    background: none;
    }
    .quan{
        width: 10%;
        border: solid black 2px;
        border-color: red;
        font-size: 1em;
        border-radius: 5px;
        padding-left: 10px;
        margin-bottom: 10px;
    }
    h2 {
    text-align: center;
    margin-top: 25px;
    text-decoration: underline;
    font-family: 'Courier New', Courier, monospace;
}
.about{
    margin-bottom: 10px;
}
.cart{
    font-size: 1.5em;
    background: none;
    color: white;
    transition: background-color 0.3s ease;
    
}
.cart a:hover{
    background-color: #979A9A;
}
.dsd{
    text-align: start;
    margin-left: 0;
    font-family: 'Courier New', Courier, monospace;
}

#hakdog {
position: relative;
max-width: 90%;
height: auto;
margin-top: 10px;
padding-right: 0%;
margin-bottom: 10px;
margin-left:5% ;
}

.d-block{
  display: inline-block;
  height: 90%;
  opacity: 0.8;
}
.carousel-inner {
  display: inline-block;
  background-repeat: no-repeat;
  background-position: center;
  background-image: linear-gradient(to bottom right, #ff0000, #00ff00);
  opacity: 1;
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
.shopping-cart .box-container{
   max-width: 1200px;
   margin:0 auto;
   display: grid;
   grid-template-columns: repeat(auto-fit, 30rem);
   align-items: center;
   gap:1.5rem;
   justify-content: center;
}

.shopping-cart .box-container .box{
   text-align: center;
   padding:2rem;
   border-radius: .5rem;
   background-color: var(--white);
   box-shadow: var(--box-shadow);
   position: relative;
   border:var(--border);
}

.shopping-cart .box-container .box .fa-times{
   position: absolute;
   top:1rem; right:1rem;
   height: 4.5rem;
   width: 4.5rem;
   line-height: 4.5rem;
   font-size: 2rem;
   background-color: var(--red);
   color:var(--white);
   border-radius: .5rem;
}

.shopping-cart .box-container .box .fa-times:hover{
   background-color: var(--black);
}

.shopping-cart .box-container .box img{
   height: 30rem;
}

.shopping-cart .box-container .box .name{
   padding:1rem 0;
   font-size: 2rem;
   color:var(--black);
}

.shopping-cart .box-container .box .price{
   padding:1rem 0;
   font-size: 2.5rem;
   color:var(--red);
}

.shopping-cart .box-container .box input[type="number"]{
   margin:.5rem 0;
   border:var(--border);
   border-radius: .5rem;
   padding:1.2rem 1.4rem;
   font-size: 2rem;
   color:var(--black);
   width: 9rem;
}

.shopping-cart .box-container .box .sub-total{
   padding-top: 1.5rem;
   font-size: 2rem;
   color:var(--light-color);
}

.shopping-cart .box-container .box .sub-total span{
   color:var(--red);
}

.shopping-cart .cart-total{
   max-width: 1200px;
   margin:0 auto;
   border:var(--border);
   padding:2rem;
   text-align: center;
   margin-top: 2rem;
   border-radius: .5rem;
}

.shopping-cart .cart-total p{
   font-size: 2.5rem;
   color:var(--light-color);
}

.shopping-cart .cart-total p span{
   color:var(--red);
}

.shopping-cart .cart-total .flex{
   display: flex;
   flex-wrap: wrap;
   column-gap:1rem;
   margin-top: 1.5rem;
   justify-content: center;
}

.shopping-cart .disabled{
   pointer-events: none;
   opacity: .5;
   user-select: none;
}
.popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 300px;
            padding: 20px;
            background: #ffffff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        }
        .descbtn{
          background: none;
          border: none;
          color: black;
          font-family: 'Courier New', Courier, monospace;
          font-size: 1em;
          text-decoration: underline;
          transition: 0.3s ease;
          font-weight: bold;
        }
        .descbtn:hover{
  color: #979A9A;
        }
        .btnc{
          background: none;
          border: none;
          font-family: 'Courier New', Courier, monospace;
          font-size: 15pt;
        color: black;
        margin-left: 80%;
        text-decoration: underline;
        transition: background 1s ease;
        color: black;
        }
        .btnc:hover{
          color: #979A9A;

        }
        .popup{
          font-family: 'Courier New', Courier, monospace;
          font-weight: bold;
          width: 30%;
          padding: 10px;
          
        }
        .p{
          padding: 20px;
        }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GodSpeed</title>
    <link href="bsit/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_css_bootstrap.min.css" rel="stylesheet">
<script src="bsit/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js" ></script>
<link rel="shortcut icon" href="img/logo.webp" type="image/x-icon">
<script src="script.js"></script>
<script src="main.js"></script>
</head>
<body>
    <nav class="header">
        <img src="img/bg.png" alt="" class="logo">

        <div class="button">
            <a class="about button" href="#about" class="nav-link">About</a>
           <a class="shopping-cart" href="cart.php"><ion-icon name="cart-outline"> <span>(<?php echo $product_second_rows_number; ?>)</span></ion-icon></a>
           <?php
               $select_product_second_number = mysqli_query($conn, "SELECT * FROM `product_second` WHERE 1 ") or die('query failed');
               $product_second_rows_number = mysqli_num_rows($select_product_second_number); 
            ?>
          </div>
        
    </nav>

    <main>
    
    <div id="hakdog"> 
  <div id="demo" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicators/dots -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="4"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="5"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="6"></button>
    </div>
    
    <!-- The slideshow/carousel -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/1.jpg" alt="Los Angeles" class="d-block" style="width:100%">
      </div>
      <div class="carousel-item">
        <img src="img/2.jpg" alt="Chicago" class="d-block" style="width:100%">
      </div>
      <div class="carousel-item">
        <img src="img/3.jpg" alt="Malabon" class="d-block" style="width:100%">
      </div>
      <div class="carousel-item">
        <img src="img/4.jpg" alt="mm" class="d-block" style="width:100%">
      </div>
      <div class="carousel-item">
        <img src="img/5.jpg" alt="mmm" class="d-block" style="width:100%">
      </div>
      <div class="carousel-item">
        <img src="img/6.jpg" alt="mmmm" class="d-block" style="width:100%">
      </div>
      <div class="carousel-item">
        <img src="img/7.jpg" alt="mmmmm" class="d-block" style="width:100%">
      </div>
      <div class="carousel-item">
        <img src="img/8.jpg" alt="mmmmm" class="d-block" style="width:100%">
      </div><div class="carousel-item">
        <img src="img/9.jpg" alt="mmmmm" class="d-block" style="width:100%">
      </div>
    </div>
    
    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
</div>  
 
<h2>Hot Releases</h2>
          <div class="container">
          
            <?php
            $query = "SELECT * FROM `product_first` ORDER BY id ASC";
            $result = mysqli_query($conn, $query);

            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_array($result)){
                    ?>
                    <div class="product">
                        <form action="index.php?action=add&id=<?php echo $row["id"]?>" method="post">
                        <div class="product">
                          
                            <img src="img/<?php echo $row["image"];?>" alt="">
                            <h3 class="dsd"><?php echo $row["description"]?></h3>    
                            <button type="button"class="descbtn" onclick="showPopup()">Description</button>                       
                            <p class="dsd">₱<?php echo $row["price"];?></p>     
                                    
                            <input type="text" id="quantity" name="quantity" value="1" class="quan">
                            <input  type="hidden" name="hidden_image" value="<?php echo $row["image"];?>">
                            <input  type="hidden" name="hidden_name" value="<?php echo $row["description"];?>">
                            <input  type="hidden" name="hidden_price" value="<?php echo $row["price"];?>" >        
                            <input  type="submit" name="add" value="Add to Cart" class="but"> 
                            
                            <?php
                            
    // Check if the form has been submitted
   
    ?>

    <!-- The pop-up box -->
  
                        </div>
                        </form> 
                    </div>
                    <?php
                }
            }
?>
       
</div>

<div id="popupBox" type="button"class="popup">
        <h2>Description</h2>
        <p class="p">•Cotton Fabric
          <br>
•220 gsm
<br>
•80% Cotton and 20% Polyester 
<br>
•Crewneck
<br>
•Silkscreen Printing</p>
        <button onclick="hidePopup()" class="btnc">Close</button>
    </div>

 <script>
        function showPopup() {
            document.getElementById("popupBox").style.display = "block";
        }

        function hidePopup() {
            document.getElementById("popupBox").style.display = "none";
        }
    </script>

    </main>
    <section  class="about" id="about">
    <h1>ABOUT GodSpeed"</h1>
    
  <p>Godspeed Clothing Shop is a dynamic and trendsetting fashion destination that caters to individuals seeking stylish apparel and accessories.</p>
    <p> With a passion for delivering cutting-edge designs and premium quality, </p>
     <p>we offer a diverse range of clothing options that combine contemporary aesthetics with timeless elegance.</p>
    <p>  Our curated collection showcases the latest fashion trends, allowing our customers to express their unique style and stand out from the crowd. </p>
    
    
</section>


<div class="footer">
<p> &copy; <?php echo date("Y"); ?> GodSpeed. All rights reserved.</p>
<h1>Follow Us on</h1>
<a class="social" href="https://web.facebook.com/profile.php?id=100088553464327"><ion-icon name="logo-facebook"></ion-icon></a>
<a class="social" href="https://shopee.ph/god_speed?categoryId=100011&entryPoint=ShopByPDP&itemId=23547601457&upstream=search"><ion-icon name="storefront"></ion-icon></a>

</div>
<script></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>
