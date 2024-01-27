<?php

require_once __DIR__ . '/../helpers/Database.php';

class Game
{
    private ?int $id_game;
    private string $name;
    private string $description;
    private string $game_picture;

    public function __construct(string $name = '', string $description = '', string $game_picture = '', ?int $id_game = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->game_picture = $game_picture;
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

    public function setGameDescription(string $description)
    {
        $this->description = $description;
    }

    public function getGameDescription(): string
    {
        return $this->description;
    }

    public function setGamePicture(?string $game_picture)
    {
        $this->game_picture = $game_picture;
    }

    public function getGamePicture(): ?string
    {
        return $this->game_picture;
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

        $sql = 'INSERT INTO `games` (`name`, `game_description`, `game_picture`)
        VALUES(:name, :description, :game_picture);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':name', $this->getName());
        $sth->bindValue(':description', $this->getGameDescription());
        $sth->bindValue(':game_picture', $this->getGamePicture());

        $result = $sth->execute();

        return $result;
    }

    public static function delete(int $id_game)
    {
        $pdo = Database::connect();

        $sql = 'DELETE FROM `games` WHERE `id_game` = :id_game;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_game', $id_game, PDO::PARAM_INT);

        $sth->execute();

        return $sth->rowCount() > 0;
    }

    public static function getAll()
    {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM `games`;';

        $sth = $pdo->query($sql);

        $result = $sth->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public static function get(int $id_game)
    {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM `games` WHERE `games`.`id_game`=:id_game;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_game', $id_game, PDO::PARAM_INT);

        $sth->execute();

        $result = $sth->fetch(PDO::FETCH_OBJ);

        return $result;
    }

    public function update(): bool
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `games` 
        SET `name`=:name, `game_description`=:game_description, `game_picture`=:game_picture
        WHERE `id_game`=:id_game;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':name', $this->getName());
        $sth->bindValue(':game_description', $this->getGameDescription());
        $sth->bindValue(':game_picture', $this->getGamePicture());
        $sth->bindValue(':id_game', $this->getIdGame(), PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }

    public static function updateImg(int $id_game): bool
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `games` SET `game_picture`= null WHERE `id_game`=:id_game;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_game', $id_game, PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }
}
