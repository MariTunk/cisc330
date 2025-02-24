<?php


echo '

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="styles.css">
    <title>The Store</title>
  </head>
  <body>
    <div class="container">
      <div>
        <h1>The Store</h1>

        <h2> BUY ONE GET ONE FREE</h2>

        <!--shorthand for echo-->
        <p><?= $greeting ?></p>

        <p class="sticker"> success <?= $saving ?></p>

       
      </div>
      
    </div>

  </body>
</html>
    '

?>
