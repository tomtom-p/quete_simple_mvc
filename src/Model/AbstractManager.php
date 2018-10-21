<?php
/**
 * Created by PhpStorm.
 * User: wilder2
 * Date: 15/10/18
 * Time: 12:00
 */
namespace Model;

use App\Connection;

abstract class AbstractManager
{
    protected $pdo; // connexion
    protected $table;
    protected $className;

    /**
     * AbstractManager constructor.
     * @param string $table
     * @param \PDO $pdo
     */
    public function __construct(string $table, \PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->table = $table;
        $this->className = __NAMESPACE__ . '\\' . ucfirst($table);
    }

    /**
     * @return array
     */
    public function selectAll(): array
    {
        return $this->pdo->query('SELECT * FROM ' . $this->table, \PDO::FETCH_CLASS, $this->className)->fetchAll();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function selectOneById(int $id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM $this->table WHERE id=:id");
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch();
    }
}