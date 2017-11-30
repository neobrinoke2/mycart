<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title> - Panier </title>
  </head>
  <body>
    <?php if (isset($_SESSION['panier'])): ?>
      <table>
        <thead>
          <tr>
            <th>Nom</th>
            <th>Prix Unit.</th>
            <th>Prix Total</th>
            <th>Quantité</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $totalPrice = 0;
          foreach($_SESSION['panier']  as $cart):
            $article = getArticle($cart['id']);
            $price = $cart['num'] * $article['price'];
            $totalPrice += $price;
            ?>
            <tr>
              <form method="POST">
                <input type="hidden" name="id" value="<?= $cart['id'] ?>">
                <td><?= $article['title'] ?></td>
                <td><?= $article['price'] ?> €</td>
                <td><?= $price ?> €</td>
                <td>
                  <input type="number" name="count" id="count" value="<?= $cart['num'] ?>" min="1" max="<?= $article['quantity'] ?>">
                </td>
                <td>
                  <input type="submit" name="editArticle" value="Editer cet article">
                  <input type="submit" name="deleteArticle" value="Supprimer cet article">
                </td>
              </form>
            </tr>
          <?php endforeach; ?>

            <tr>
                <td></td>
                <td></td>
                <td><?= $totalPrice ?> €</td>
                <td></td>
                <td></td>
              </form>
            </tr>
        </tbody>
      </table>
    <?php endif; ?>
    <ul>
      <li><a href="index.php">retour à l'index</a></li>
    </ul>
  </body>
</html>
