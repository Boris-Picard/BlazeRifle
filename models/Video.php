<?php

require_once __DIR__ . '/../helpers/Database.php';

class Video
{
    private int $id_video;
    private string $game_video;
    private int $id_game;

    public function __construct(int $id_video = 0, string $game_video = '', int $id_game = 0)
    {
        $this->id_video = $id_video;
        $this->game_video = $game_video;
        $this->id_game = $id_game;
    }

    public function setIdVideo(int $id_video)
    {
        $this->id_video = $id_video;
    }

    public function getIdVideo(): int
    {
        return $this->id_video;
    }

    public function setGameVideo(string $game_video)
    {
        $this->game_video = $game_video;
    }

    public function getGameVideo(): string
    {
        return $this->game_video;
    }
    public function setIdGame(int $id_game)
    {
        $this->id_game = $id_game;
    }

    public function getIdGame(): int
    {
        return $this->id_game;
    }

    public function insert(): int
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO `videos` (`game_video`, `id_game`)
        VALUES (:game_video, :id_game);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':game_video', $this->getGameVideo());
        $sth->bindValue(':id_game', $this->getIdGame(), PDO::PARAM_INT);

        $sth->execute();

        return (int) $sth->rowCount() > 0;
    }

    public static function getAll(): array|false
    {
        $pdo = Database::connect();

        $sql = 'SELECT `videos`.`game_video`, `videos`.`id_video`, `games`.`game_name`
        FROM `videos`
        INNER JOIN `games` ON `games`.`id_game` = `videos`.`id_game`;';

        $sth = $pdo->query($sql);

        return $sth->fetchAll(PDO::FETCH_OBJ);
    }

    public static function get(int $id_video): object|false
    {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM `video`
        INNER JOIN `games` ON `games`.`id_game` = `videos`.`id_game`
        WHERE `id_video`=:id_video;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_video', $id_video, PDO::PARAM_INT);

        $sth->execute();

        return $sth->fetch(PDO::FETCH_OBJ);
    }

    public function update(): int
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `videos` SET `game_video`=:game_video, `id_game`=:id_game
            WHERE `id_video`=:id_video;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':game_video', $this->getGameVideo());
        $sth->bindValue(':id_game', $this->getIdGame(), PDO::PARAM_INT);

        $sth->execute();

        return (int) $sth->rowCount() > 0;
    }

    public static function isExist(string $url): bool
    {
        $pdo = Database::connect();

        $sql = 'SELECT COUNT(`game_video`) AS video FROM `videos` WHERE `game_video`=:game_video;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':game_video', $url);
        $sth->execute();

        $result = $sth->fetchColumn();

        return (bool) $result > 0;
    }
}
