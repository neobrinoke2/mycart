<?php
session_start();

require __DIR__.'/models/Product.php';

$carts = $_SESSION['panier'];

function getArticle($id) {
	return Product::read($id);
}

if(isset($_POST['deleteArticle'], $_POST['id']) && is_numeric($_POST['id'])) {
	$index = array_search($_POST['id'], array_column($_SESSION['panier'], "id"));
	if($index !== false) {
		array_splice($_SESSION['panier'], $index, 1);
	}
} else if(isset($_POST['editArticle'], $_POST['id'], $_POST['count']) && is_numeric($_POST['id']) && is_numeric($_POST['count']) && $_POST['count'] > 0) {
	$index = array_search($_POST['id'], array_column($_SESSION['panier'], "id"));
	if($index !== false) {
		$numMax = getArticle($_POST['id'])['quantity'];
		if($_POST['count'] > $numMax) {
			$_POST['count'] = $numMax;
		}

		$_SESSION['panier'][$index]['num'] = $_POST['count'];
	}
}

require __DIR__.'/views/users/panier.php';
?>