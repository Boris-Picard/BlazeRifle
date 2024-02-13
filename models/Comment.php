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
    private ?string $deleted_at;
    private ?string $confirmed_at;

    public function __construct(
        int $id_comment = 0,
        int $id_article = 0,
        int $id_user = 0,
        string $comment = '',
        string $created_at = '',
        string $updated_at = '',
        string $deleted_at = '',
        string $confirmed_at = ''
    ) {
        $this->id_comment = $id_comment;
        $this->id_article = $id_article;
        $this->id_user = $id_user;
        $this->comment = $comment;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->deleted_at = $deleted_at;
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

    public function setDeletedAt(?string $deleted_at)
    {
        $this->deleted_at = $deleted_at;
    }

    public function getDeletedAt(): ?string
    {
        return $this->deleted_at;
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
}
