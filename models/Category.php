<?php

require_once __DIR__ . '/../helpers';

class Category
{
    private string $label;
    private string $created_at;
    private string $updated_at;
    private string $deleted_at;
    private int $id_category;


    public function __construct(
        string $label = '',
        string $created_at = '',
        string $updated_at = '',
        string $deleted_at = '',
        int $id_category = 0
    ) {
        $this->label = $label;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->deleted_at = $deleted_at;
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

    public function setCreatedAt(string $created_at)
    {
        $this->created_at = $created_at;
    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    public function setUpdatedAt(string $updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }

    public function setDeletedAt(string $deleted_at)
    {
        $this->deleted_at = $deleted_at;
    }

    public function getDeletedAt(): string
    {
        return $this->deleted_at;
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
}
