<?php

class Model
{
    protected static function createStatement($sql)
    {
        try {
            require __DIR__.'/../config.php';

            $pdo = new PDO(
                "mysql:dbname=$dbname;host=$host;charset=utf8", $user, $password
              );

            $pdo_statement = $pdo->prepare($sql);
        } catch (PDOException $e) {
            echo 'erreur : ' . $e->getMessage();

            $pdo_statement = null;
        }

        return $pdo_statement;
    }
}

?>