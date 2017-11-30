<?php

session_start();

require __DIR__.'/models/Product.php';

$todo = null;

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $product = Product::read($_GET['id']);

    if(isset($_POST['sendPanier'], $_POST['ammount']) && is_numeric($_POST['ammount'])) {
    	if(!isset($_SESSION['panier'])) {
    		$_SESSION['panier'] = [];
		}
		
		$index = array_search($_GET['id'], array_column($_SESSION['panier'], "id"));
    	if($index !== false) {
			$numMax = $_SESSION['panier'][$index]['num'] + $_POST['ammount'];
			if( $numMax <= $product['quantity'] )
				$_SESSION['panier'][$index]['num'] = $numMax;
    	} else {
    		array_push($_SESSION['panier'], ['id' => $_GET['id'], 'num' => $_POST['ammount']]);
    	}
    }
}

require __DIR__.'/views/products/read.php';

?>