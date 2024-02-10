<?php

require_once __DIR__ . '/../helpers/Database.php';

class Category
{
    private string $label;
    private int $id_category;


    public function __construct(
        string $label = '',
        int $id_category = 0
    ) {
        $this->label = $label;
        $this->id_category = $id_category;
    }

    public function setLabel(string $label)
    {
        $this->label = $label;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setIdCategory(int $id_category)
    {
        $this->id_category = $id_category;
    }

    public function getIdCategory(): int
    {
        return $this->id_category;
    }

    public function insert(): int
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO `categories` (`label`)
                VALUES (:label);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':label', $this->getLabel());

        $sth->execute();

        return $sth->rowCount() > 0;
    }

    public static function getAll(): array|false
    {
        $pdo = Database::connect();

        $sql = 'SELECT *
        FROM `categories`;';

        $sth = $pdo->query($sql);

        return $sth->fetchAll(PDO::FETCH_OBJ);
    }
}
