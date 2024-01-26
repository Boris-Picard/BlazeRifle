<?php

require_once __DIR__ . '/../helpers/Database.php';

class Game
{
    private ?int $id_game;
    private string $name;
    private string $description;
    private string $picture;

    public function __construct(string $name = '', string $description = '', string $picture = '', ?int $id_game = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->picture = $picture;
        $this->id_game = $id_game;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setPicture(string $picture)
    {
        $this->picture = $picture;
    }

    public function getPicture(): string
    {
        return $this->picture;
    }

    public function setIdGame(int $id_game)
    {
        $this->id_game = $id_game;
    }

    public function getIdGame(): int
    {
        return $this->id_game;
    }

    public function insert()
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO `games` (`name`, `description`, `picture`)
        VALUES(:name, :description, :picture);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':name', $this->getName());
        $sth->bindValue(':description', $this->getDescription());
        $sth->bindValue(':picture', $this->getPicture());

        $result = $sth->execute();

        return $result;
    }

    public static function getAll()
    {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM `games`;';

        $sth = $pdo->query($sql);

        $result = $sth->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }
}
