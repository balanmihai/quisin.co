<?php
session_start();
$connect = mysqli_connect('localhost','admin','admin','meniuri');

if($_GET["action"] == "add")
{
  echo '<script>alert("Produsul a fost adaugat deja")</script>'; 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style_menu.css">
  <title>Menu</title>
</head>
<body>
<div class="menu">
<!-- HEADER -->
    <div class="header">
      <div class="quisin">
        <h3>Digital Menu Powered By</h3>
        <img src="./image/logo-white.png" alt="" width="80px" height="auto">
      </div>
      <div class="restname">
        <h2>Numele Restaurantului</h2>
      </div>
      <div class="scroll">
        <div class="nav">
                  
        <?php
             
              $sql = "SELECT * FROM tip ";

             
              
               $result = mysqli_query($connect, $sql);
               while( $category = mysqli_fetch_assoc($result) ) 
               {
               
                  ?>
                    <a href="#<?php echo $category['fel_id'];?>"><?php echo $category['fel']; ?></a>  
  
                  <?php
                 
               } 
           ?>
        </div>
      </div>
    </div>

<!-- CONTAINER -->

  <div class="container">
    
         <?php
         $sql = "SELECT * FROM tip ";

             
              
         $result = mysqli_query($connect, $sql);
         while( $category = mysqli_fetch_assoc($result) ) 
         {
          $sql1 = "SELECT * FROM meniuri WHERE fel_id = ".$category["fel_id"];
          $result1 =  mysqli_query($connect, $sql1);
          ?>
          <div class="cocktails" id="<?php  echo $category['fel_id']; ?>" >
          
          <?php
          while( $product = mysqli_fetch_assoc($result1) ) 
         {
          ?>
          <form method = "post" action ="menu.php?action=add">
                <button class="accordion">
        <img class="image" src="<?php  echo $product['imagine'];?>" alt="drinks">
        <h1 class="drinkname"><?php  echo $product['nume'];?></h1>
        <h3 class="quantity"><?php  echo $product['gramaj'];?></h3>
        <h1 class="price"><?php  echo $product['pret'];?></h1>
        <input type = "image" src="./image/plusbun.png" name = "add" value = "Adauga"    class="plus"/>
      </button>
      
      
      
      <div class="accordion-content">
        <h3 class="ingredients"><?php  echo $product['ingr'];?></h3>
      </div>
      </form>
          <?php
         
          
         }
         

            
         }
           

      ?>

    </div>

    <div class="shots" id="shots">

      
    </div>
  </div>

<!-- FOOTER -->
      <div class="footer">
        <div class="footercontent">
          <div class="left">
            <a href="#1">Meniu</a>
          </div>
          <div class="right">
            <a href="checkout.html">Comanda 
            <span class = "badge">
              <?php
              $nr  = 0;
              echo $nr;
              ?>
            </span>
            </a>
          </div>
        </div>
      </div>
  </div>

  <script src="script_menu.js"></script>
</body>
</html>