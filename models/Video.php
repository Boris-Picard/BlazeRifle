<?php

require_once __DIR__ . '/../helpers/Database.php';

class Video
{
    private int $id_video;
    private string $game_video;
    private string $title_video;
    private int $id_game;
    private ?string $confirmed_at;
    private ?string $created_at;

    public function __construct(int $id_video = 0, string $game_video = '', string $title_video = '', int $id_game = 0, ?string $confirmed_at = '', ?string $created_at = '')
    {
        $this->id_video = $id_video;
        $this->game_video = $game_video;
        $this->title_video = $title_video;
        $this->id_game = $id_game;
        $this->confirmed_at = $confirmed_at;
        $this->created_at = $created_at;
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

    public function setTitleVideo(string $title_video)
    {
        $this->title_video = $title_video;
    }

    public function getTitleVideo(): string
    {
        return $this->title_video;
    }

    public function setIdGame(int $id_game)
    {
        $this->id_game = $id_game;
    }

    public function getIdGame(): int
    {
        return $this->id_game;
    }

    public function setConfirmedAt(?string $confirmed_at)
    {
        $this->confirmed_at = $confirmed_at;
    }

    public function getConfirmedAt(): ?string
    {
        return $this->confirmed_at;
    }

    public function setCreatedAt(?string $created_at)
    {
        $this->created_at = $created_at;
    }

    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    public function insert(): int
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO `videos` (`game_video`, `title_video`, `id_game`)
        VALUES (:game_video, :title_video, :id_game);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':game_video', $this->getGameVideo());
        $sth->bindValue(':title_video', $this->getTitleVideo());
        $sth->bindValue(':id_game', $this->getIdGame(), PDO::PARAM_INT);

        $sth->execute();

        return (int) $sth->rowCount() > 0;
    }

    public static function getAll(?int $id_game = null, ?bool $showConfirmedAt = null, int $limit = 100, ?string $order = 'DESC'): array|false
    {
        $pdo = Database::connect();

        $sql = 'SELECT `videos`.`game_video`, 
        `videos`.`title_video`, 
        `videos`.`id_video`, 
        `videos`.`confirmed_at`,
        `videos`.`id_game`,
        `videos`.`created_at`,
        `games`.`game_name`
        FROM `videos`
        INNER JOIN `games` ON `games`.`id_game` = `videos`.`id_game`
        WHERE 1=1';

        if (!is_null($id_game)) {
            $sql .= ' AND `games`.`id_game` = :id_game';
        }

        if (!is_null($showConfirmedAt)) {
            $sql .= ' AND `videos`.`confirmed_at` IS NOT NULL';
        }

        $order == 'ASC' ? $sql .= ' ORDER BY `videos`.`created_at` ASC ' : $sql .= ' ORDER BY `videos`.`created_at` DESC ';

        $sql .= ' LIMIT :limit ';

        $sth = $pdo->prepare($sql);

        if (!is_null($id_game)) {
            $sth->bindValue(':id_game', $id_game, PDO::PARAM_INT);
        }
        $sth->bindValue(':limit', $limit, PDO::PARAM_INT);

        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_OBJ);
    }


    public static function get(int $id_video): object|false
    {
        $pdo = Database::connect();

        $sql = 'SELECT `videos`.`game_video`, `videos`.`title_video`, `videos`.`id_video`, `games`.`game_name`, `videos`.`id_game`, `videos`.`confirmed_at`,`videos`.`created_at`
        FROM `videos`
        INNER JOIN `games` ON `games`.`id_game` = `videos`.`id_game`
        WHERE `id_video`=:id_video;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_video', $id_video, PDO::PARAM_INT);

        $sth->execute();

        return $sth->fetch(PDO::FETCH_OBJ);
    }

    public static function confirm(int $id_video)
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `videos` SET `confirmed_at`= NOW()
        WHERE `videos`.`id_video`=:id_video;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_video', $id_video, PDO::PARAM_INT);

        $sth->execute();

        return $sth->rowCount() > 0;
    }

    public function update(): int
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `videos` SET `game_video`=:game_video, `title_video`=:title_video, `id_game`=:id_game
            WHERE `id_video`=:id_video;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':game_video', $this->getGameVideo());
        $sth->bindValue(':title_video', $this->getTitleVideo());
        $sth->bindValue(':id_game', $this->getIdGame(), PDO::PARAM_INT);
        $sth->bindValue(':id_video', $this->getIdVideo(), PDO::PARAM_INT);

        $sth->execute();

        return (int) $sth->rowCount() > 0;
    }

    public static function delete(int $id_video): int
    {
        $pdo = Database::connect();

        $sql = 'DELETE FROM `videos`
            WHERE `id_video`=:id_video;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_video', $id_video, PDO::PARAM_INT);

        $sth->execute();

        return (int) ($sth->rowCount() > 0);
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
