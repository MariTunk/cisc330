<?php

echo '
    <div>
      <b>content from backend</b>
    </div>
    '

?>



$username = 'Mariyam';
$greeting = 'Hello' . ' ' . $username . '.';

$coffee = [
  'item' => 'drink',
  'qty' => 2,
  'price' => 10,
  'discount' => 3
];
$usualPrice = $coffee['qty'] * $coffee['price'];
$offerPrice = $coffee['qty'] * $coffee['discount'];
$saving = $usualPrice - $offerPrice;

?>
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

        <h2>Multi-buy Offer</h2>

        <!--shorthand for echo-->
        <p><?= $greeting ?></p>

        <p class="sticker">Save <?= $saving ?></p>

        <p>Buy <?= $coffee['qty'] ?> packs of <?= $coffee['item'] ?>
          for <?= $offerPrice ?><br>(usual price $<?= $usualPrice ?>)</p>
      </div>
      <div>
        <img src="shopping.webp" class="drinks">
      </div>
    </div>

  </body>
</html>
