<?php
// src/Model/CategoryManager.php
namespace Model;
//require __DIR__ . '/../../app/db.php';

class CategoryManager
{
    public function selectAllCategory() :array
    {
        $pdo = new \PDO(DSN, USER, PASS);
        $query = "SELECT * FROM Category";
        $res = $pdo->query($query);
        return $res->fetchAll();
    }
    // la méthode prend l'id en paramètre
    public function selectOneCategory(int $id) : array
    {
        $pdo = new \PDO(DSN, USER, PASS);
        $query = "SELECT * FROM Category WHERE idCategory = :id";
        $statement = $pdo->prepare($query);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->execute();
        // contrairement à fetchAll(), fetch() ne renvoie qu'un seul résultat
        return $statement->fetch();
    }

}



?>