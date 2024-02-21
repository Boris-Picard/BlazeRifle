<?php

require_once __DIR__ . '/../helpers/Database.php';

class Favorite
{
    private int $id_user;
    private int $id_article;

    public function __construct(int $id_user = 0, int $id_article = 0)
    {
        $this->id_user = $id_user;
        $this->id_article = $id_article;
    }

    public function setIdUser(int $id_user)
    {
        $this->id_user = $id_user;
    }

    public function getIdUser(): int
    {
        return $this->id_user;
    }

    public function setIdArticle(int $id_article)
    {
        $this->id_article = $id_article;
    }

    public function getIdArticle(): int
    {
        return $this->id_article;
    }

    public function insert(): int
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO `favorites` (`id_user`, `id_article`)
        VALUES (:id_user, :id_article);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_user', $this->getIdUser(), PDO::PARAM_INT);
        $sth->bindValue(':id_article', $this->getIdArticle(), PDO::PARAM_INT);

        $sth->execute();

        return $sth->rowCount() > 0;
    }

    public static function get(?int $id_user = null)
    {
        $pdo = Database::connect();

        $sql = 'SELECT 
        `favorites`.`id_user`,
        `favorites`.`id_article`
        FROM `favorites`
        INNER JOIN `users` ON `users`.`id_user`=`favorites`.`id_user`
        WHERE `favorites`.`id_user`=:id_user;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_user', $id_user,PDO::PARAM_INT);

        $sth->execute();

        return $sth->fetch();
    }
}
