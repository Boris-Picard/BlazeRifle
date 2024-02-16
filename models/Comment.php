<?php

require_once __DIR__ . '/../helpers/Database.php';

class Comment
{
    private int $id_comment;
    private int $id_article;
    private int $id_user;
    private string $comment;
    private ?string $created_at;
    private ?string $updated_at;
    private ?string $confirmed_at;

    public function __construct(
        int $id_comment = 0,
        int $id_article = 0,
        int $id_user = 0,
        string $comment = '',
        string $created_at = '',
        string $updated_at = '',
        string $confirmed_at = ''
    ) {
        $this->id_comment = $id_comment;
        $this->id_article = $id_article;
        $this->id_user = $id_user;
        $this->comment = $comment;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->confirmed_at = $confirmed_at;
    }

    public function setIdComment(int $id_comment)
    {
        $this->id_comment = $id_comment;
    }

    public function getIdComment(): int
    {
        return $this->id_comment;
    }

    public function setIdArticle(int $id_article)
    {
        $this->id_article = $id_article;
    }

    public function getIdArticle(): int
    {
        return $this->id_article;
    }

    public function setIdUser(int $id_user)
    {
        $this->id_user = $id_user;
    }

    public function getIdUser(): int
    {
        return $this->id_user;
    }

    public function setComment(string $comment)
    {
        $this->comment = $comment;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function setCreatedAt(?string $created_at)
    {
        $this->created_at = $created_at;
    }

    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    public function setUpdatedAt(?string $updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updated_at;
    }

    public function setConfirmedAt(?string $confirmed_at)
    {
        $this->confirmed_at = $confirmed_at;
    }

    public function getConfirmedAt(): ?string
    {
        return $this->confirmed_at;
    }

    public function insert(): int
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO `comments` (`comment`, `id_article`, `id_user`)
        VALUES (:comment, :id_article, :id_user);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':comment', $this->getComment());
        $sth->bindValue(':id_article', $this->getIdArticle(), PDO::PARAM_INT);
        $sth->bindValue(':id_user', $this->getIdUser(), PDO::PARAM_INT);

        $sth->execute();

        return (int) ($sth->rowCount() > 0);
    }

    public static function getAll(bool $showConfirmedAt = false, ?string $order = 'DESC', ?int $nbComments = null): array|false
    {
        $pdo = Database::connect();

        $sql = 'SELECT 
        `comments`.`comment`,
        `comments`.`created_at` AS comment_created_at,
        `comments`.`updated_at`,
        `comments`.`confirmed_at` AS comment_confirmed_at,
        `comments`.`id_comment`,
        `comments`.`id_article`,
        `comments`.`id_user`,
        `users`.`pseudo`,
        `users`.`user_picture`,
        `articles`.`id_game`,
        `articles`.`article_title`,
        `categories`.`label`,
        `games`.`game_name`
        FROM `comments`
        INNER JOIN `users` ON `users`.`id_user`=`comments`.`id_user`
        INNER JOIN `articles` ON `articles`.`id_article`=`comments`.`id_article`
        INNER JOIN `categories` ON `articles`.`id_category`=`categories`.`id_category`
        LEFT JOIN `games` ON `games`.`id_game`=`articles`.`id_game`
        WHERE 1 = 1';

        if ($showConfirmedAt) {
            $sql .= ' AND `comments`.`confirmed_at` IS NOT NULL ';
        }

        $order == 'ASC' ? $sql .= ' ORDER BY `comments`.`created_at` ASC ' : $sql .= ' ORDER BY `comments`.`created_at` DESC ';

        if (!is_null($nbComments)) {
            $sql .= ' LIMIT :nbComments ';
            $sth = $pdo->prepare($sql);
            $sth->bindValue('nbComments', $nbComments, PDO::PARAM_INT);
            $sth->execute();
        } else {
            $sth = $pdo->query($sql);
        }


        return $sth->fetchAll(PDO::FETCH_OBJ);
    }

    public static function get(int $id_comment): object|false
    {
        $pdo = Database::connect();

        $sql = 'SELECT 
        `comments`.`comment`,
        `comments`.`created_at` AS comment_created_at,
        `comments`.`updated_at`,
        `comments`.`confirmed_at` AS comment_confirmed_at,
        `comments`.`id_comment`,
        `comments`.`id_article`,
        `comments`.`id_user`,
        `users`.`pseudo`,
        `users`.`user_picture`,
        `articles`.`id_game`,
        `articles`.`article_title`,
        `games`.`game_name`
        FROM `comments`
        INNER JOIN `users` ON `users`.`id_user`=`comments`.`id_user`
        INNER JOIN `articles` ON `articles`.`id_article`=`comments`.`id_article`
        LEFT JOIN `games` ON `games`.`id_game`=`articles`.`id_game`
        WHERE `comments`.`id_comment`=:id_comment;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_comment', $id_comment, PDO::PARAM_INT);

        $sth->execute();

        return $sth->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Met à jour une catégorie dans la base de données.
     * 
     * @return bool Retourne true si la mise à jour est réussie, false sinon.
     */
    public function update(): bool
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `comments` SET `comment`=:comment
            WHERE `id_comment`=:id_comment;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':comment', $this->getComment());
        $sth->bindValue(':id_comment', $this->getIdComment(), PDO::PARAM_INT);

        return $sth->execute();
    }

    /**
     * Supprime une catégorie de la base de données par son identifiant.
     * 
     * @param int $id_category Identifiant de la catégorie à supprimer.
     * @return int Retourne 1 si une ligne est supprimée, 0 sinon.
     */
    public static function delete(int $id_comment): int
    {
        $pdo = Database::connect();

        $sql = 'DELETE FROM `comments`
            WHERE `id_comment`=:id_comment;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_comment', $id_comment, PDO::PARAM_INT);

        $sth->execute();

        return (int) ($sth->rowCount() > 0);
    }

    public static function confirm(?int $id_comment): bool
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `comments` set `confirmed_at`= NOW() WHERE `id_comment`= :id_comment;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_comment', $id_comment);

        $sth->execute();

        if ($sth->rowCount() <= 0) {
            throw new Exception('erreur confirmation');
        } else {
            return true;
        }
    }

    public static function count(int $id_article)
    {
        $pdo = Database::connect();

        $sql = 'SELECT COUNT(*) FROM `comments` WHERE `id_article`=:id_article
        AND `comments`.`confirmed_at` IS NOT NULL;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_article', $id_article, PDO::PARAM_INT);

        $sth->execute();

        return $sth->fetchColumn();
    }

    public static function getConfirmed(): int
    {
        $pdo = Database::connect();

        $sql = 'SELECT COUNT(*)
        FROM `comments`
        WHERE `confirmed_at` IS NULL;';

        $sth = $pdo->query($sql);

        $result = $sth->fetchColumn();

        return $result > 0;
    }
}
