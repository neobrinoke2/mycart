<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Parcourir les produits</title>
  </head>
  <body>
    <h1>produits</h1>
    <ul>
      <?php foreach ($products as $product): ?>
        <li>
          <a href="read.php?id=<?php echo $product['id']; ?>">
            <?php echo $product['title']; ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
    <ul>
    	<li><a href="panier.php">voir mon panier</a></li>
    </ul>
  </body>
</html>
