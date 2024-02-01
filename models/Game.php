<?php

require_once __DIR__ . '/../helpers/Database.php';

class Game
{
    private ?int $id_game;
    private string $game_name;
    private string $description;
    private string $game_picture;

    public function __construct(string $game_name = '', string $description = '', string $game_picture = '', ?int $id_game = null)
    {
        $this->game_name = $game_name;
        $this->description = $description;
        $this->game_picture = $game_picture;
        $this->id_game = $id_game;
    }

    public function setGameName(string $game_name)
    {
        $this->game_name = $game_name;
    }

    public function getGameName(): string
    {
        return $this->game_name;
    }

    public function setGameDescription(string $description)
    {
        $this->description = $description;
    }

    public function getGameDescription(): string
    {
        return $this->description;
    }

    public function setGamePicture(string $game_picture)
    {
        $this->game_picture = $game_picture;
    }

    public function getGamePicture(): string
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

    /**
     * Méthode d'insertion des données dans la table games
     * @return [type]
     */
    public function insert()
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO `games` (`game_name`, `game_description`, `game_picture`)
        VALUES(:game_name, :game_description, :game_picture);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':game_name', $this->getGameName());
        $sth->bindValue(':game_description', $this->getGameDescription());
        $sth->bindValue(':game_picture', $this->getGamePicture());

        $result = $sth->execute();

        return $result;
    }

    /**
     * Méthode pour supprimer un ligne dans la table games
     * @param int $id_game
     * 
     * @return [type]
     */
    public static function delete(int $id_game)
    {
        $pdo = Database::connect();

        $sql = 'DELETE FROM `games` WHERE `id_game` = :id_game;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_game', $id_game, PDO::PARAM_INT);

        $sth->execute();

        return $sth->rowCount() > 0;
    }

    /**
     * Méthode pour récuperer toutes les données dans la table games
     * @return [type]
     */
    public static function getAll()
    {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM `games`
        WHERE 1=1;';

        $sth = $pdo->query($sql);

        $result = $sth->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    /**
     * Méthode pour récuperer une donnée spécifique dans la table games
     * @param int $id_game
     * 
     * @return object
     */
    public static function get(int $id_game): object|false
    {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM `games`
        WHERE `games`.`id_game`=:id_game;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_game', $id_game, PDO::PARAM_INT);

        $sth->execute();

        $result = $sth->fetch(PDO::FETCH_OBJ);

        return $result;
    }

    /**
     * Méthode pour mettre a jour une ligne dans la table games
     * @return bool
     */
    public function update(): bool
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `games` 
        SET `game_name`=:game_name, `game_description`=:game_description, `game_picture`=:game_picture
        WHERE `id_game`=:id_game;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':game_name', $this->getGameName());
        $sth->bindValue(':game_description', $this->getGameDescription());
        $sth->bindValue(':game_picture', $this->getGamePicture());
        $sth->bindValue(':id_game', $this->getIdGame(), PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }

    /**
     * Méthode pour mettre a jour une image 
     * @param int $id_game
     * 
     * @return bool
     */
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
