<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>
      Lire
      <?php if ($product): ?>
          <?php echo '- ' . $product['title']; ?>
      <?php endif; ?>
    </title>
  </head>
  <body>
    <?php if ($product): ?>
      <h1><?php echo $product['title']; ?></h1>
      <p><?php echo $product['description']; ?></p>
      <aside>
        <dl>
          <dt>prix :</dt>
          <dd><?php echo $product['price']; ?></dd>
          <dt>en stock :</dt>
          <dd><?php echo $product['quantity']; ?></dd>
        </dl>
      </aside>
      <form method="POST">
        <label>Nombre</label>
        <input type="number" name="ammount" id="ammount" value="1" min="1" max="<?= $product['quantity'] ?>">
        <input type="submit" name="sendPanier" value="Ajouter au panier">
      </form>
    <?php endif; ?>
    <ul>
      <li><a href="index.php">retour à l'index</a></li>
      <li><a href="panier.php">aller sur votre panier</a></li>
    </ul>
  </body>
</html>
