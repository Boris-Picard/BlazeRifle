<?php

require_once __DIR__ . '/../helpers/Database.php';

class Game
{
    private int $id_game;
    private string $game_name;
    private string $description;
    private string $game_picture;

    public function __construct(string $game_name = '', string $description = '', string $game_picture = '', int $id_game = 0)
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
    public function insert(): bool
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO `games` (`game_name`, `game_description`, `game_picture`)
        VALUES(:game_name, :game_description, :game_picture);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':game_name', $this->getGameName());
        $sth->bindValue(':game_description', $this->getGameDescription());
        $sth->bindValue(':game_picture', $this->getGamePicture());

        $result = $sth->execute();

        if ($sth->rowCount() <= 0) {
            throw new Exception('Erreur dans consoles_games');
        } else {
            return true;
        }
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
    public static function getAll(): array|false
    {
        $pdo = Database::connect();

        $sql = 'SELECT *
        FROM `games`
        WHERE 1=1';

        $sth = $pdo->query($sql);

        $result = $sth->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public static function getGameCategory(int $id_category): array|false
    {
        $pdo = Database::connect();

        $sql = 'SELECT DISTINCT
        `games`.`id_game`,
        `games`.`game_name`,
        `games`.`game_description`,
        `games`.`game_picture`,
        `categories`.`id_category`,
        `categories`.`label` as category_label
        FROM 
            `games`
        INNER JOIN 
            `articles` ON `games`.`id_game` = `articles`.`id_game`
        INNER JOIN  
            `categories` ON `articles`.`id_category` = `categories`.`id_category`
        WHERE 
            `categories`.`id_category` = :id_category;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_category', $id_category, PDO::PARAM_INT);

        $sth->execute();

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

        $sql = 'SELECT 
        `games`.`id_game`,
        `games`.`game_name`,
        `games`.`game_description`,
        `games`.`game_picture`,
        GROUP_CONCAT(`consoles`.`console_name`) AS `consoles`
        FROM `games`
        LEFT JOIN 
            `consoles_games` ON `games`.`id_game` = `consoles_games`.`id_game`
        LEFT JOIN 
            `consoles` ON `consoles_games`.`id_console` = `consoles`.`id_console`
        WHERE `games`.`id_game`=:id_game;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_game', $id_game, PDO::PARAM_INT);

        $sth->execute();

        $result = $sth->fetch(PDO::FETCH_OBJ);

        return $result;
    }

    /**
     * Méthode permettant de récupérer tous les identifiants de consoles associés à un jeu spécifique dans la table consoles_games.
     * Utilise l'identifiant du jeu pour rechercher les correspondances.
     * @param int $id_game
     * 
     * @return array
     */
    public static function getConsoleIdsByGameId(int $id_game): array
    {
        $pdo = Database::connect();

        $sql = 'SELECT `consoles_games`.`id_console`
            FROM `consoles_games`
            WHERE `consoles_games`.`id_game` = :id_game;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_game', $id_game, PDO::PARAM_INT);
        $sth->execute();

        $consoleIds = $sth->fetchAll(PDO::FETCH_COLUMN);

        return $consoleIds;
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

    /**
     * Méthode pour savoir si une donnée existe déja en base de donnée
     * @param string $registration
     * 
     * @return bool
     */
    public static function isExist(string $game_name): bool
    {
        $pdo = Database::connect();

        $sql = 'SELECT COUNT(`id_game`) AS "count" FROM `games` WHERE `game_name`=:game_name;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':game_name', $game_name);
        $sth->execute();

        $result = $sth->fetchColumn();

        return (bool) $result > 0;
    }

    /**
     * Récupère tous les jeux avec les noms des consoles associées.
     *
     * Cette méthode exécute une requête SQL qui joint les tables 'games', 'consoles_games', et 'consoles'
     * pour récupérer chaque jeu avec une chaîne concaténée des noms de toutes les consoles sur lesquelles le jeu est disponible.
     * Les jeux sont regroupés par 'id_game' pour éviter les doublons et sont triés par 'game_name'.
     * 
     * @return array La liste des jeux avec leurs consoles associées sous forme d'objets.
     */
    public static function concat(): array
    {
        $pdo = Database::connect();

        $sql = 'SELECT 
        `games`.`id_game`,
        `games`.`game_name`,
        `games`.`game_description`,
        `games`.`game_picture`,
        GROUP_CONCAT(`consoles`.`console_name` ORDER BY `consoles`.`console_name`) AS `consoles`
        FROM 
            `games`
        LEFT JOIN 
            `consoles_games` ON `games`.`id_game` = `consoles_games`.`id_game`
        LEFT JOIN 
            `consoles` ON `consoles_games`.`id_console` = `consoles`.`id_console`
        GROUP BY 
            `games`.`id_game`;';

        $sth = $pdo->query($sql);

        return $sth->fetchAll(PDO::FETCH_OBJ);
    }
}
