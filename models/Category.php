<?php

require_once __DIR__ . '/../helpers/Database.php';

class Category
{
    private string $label;
    private int $id_category;


    public function __construct(
        string $label = '',
        int $id_category = 0
    ) {
        $this->label = $label;
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

    public function setIdCategory(int $id_category)
    {
        $this->id_category = $id_category;
    }

    public function getIdCategory(): int
    {
        return $this->id_category;
    }

    /**
     * Insère une nouvelle catégorie dans la base de données.
     * 
     * @return int Retourne 1 si une ligne est insérée, 0 sinon.
     */
    public function insert(): int
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO `categories` (`label`)
            VALUES (:label);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':label', $this->getLabel());

        $sth->execute();

        // Convertit le booléen en entier (1 pour vrai, 0 pour faux)
        return (int) ($sth->rowCount() > 0);
    }

    /**
     * Récupère toutes les catégories de la base de données avec le nombre d'articles associés à chaque catégorie.
     * 
     * Cette requête effectue une jointure entre les tables `categories` et `articles` pour compter le nombre d'articles dans chaque catégorie, incluant les catégories sans articles (comptées comme 0).
     * 
     * @return array|false 
     */

    public static function getAll(): array|false
    {
        $pdo = Database::connect();

        $sql = 'SELECT `categories`.`id_category`, `categories`.`label`, COUNT(`articles`.`id_article`) AS article_count 
        FROM `categories`
        LEFT JOIN `articles` ON `articles`.`id_category` = `categories`.`id_category`
        GROUP BY `categories`.`id_category`';

        $sth = $pdo->query($sql);

        return $sth->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getGameCategory()
    {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM `categories`
        LEFT JOIN `games` ON `games`.`id_game`=`articles`.`id_game`;';

        $sth = $pdo->query($sql);

        return $sth->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Récupère une catégorie par son identifiant.
     * 
     * @param int $id_category Identifiant de la catégorie.
     * @return object|false Retourne un objet catégorie ou false si non trouvé.
     */
    public static function get(int $id_category): object|false
    {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM `categories`
            WHERE `id_category`=:id_category;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_category', $id_category, PDO::PARAM_INT);

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

        $sql = 'UPDATE `categories` SET `label`=:label
            WHERE `id_category`=:id_category;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':label', $this->getLabel());
        $sth->bindValue(':id_category', $this->getIdCategory(), PDO::PARAM_INT);

        return $sth->execute();
    }

    /**
     * Supprime une catégorie de la base de données par son identifiant.
     * 
     * @param int $id_category Identifiant de la catégorie à supprimer.
     * @return int Retourne 1 si une ligne est supprimée, 0 sinon.
     */
    public static function delete(int $id_category): int
    {
        $pdo = Database::connect();

        $sql = 'DELETE FROM `categories`
            WHERE `id_category`=:id_category;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_category', $id_category, PDO::PARAM_INT);

        $sth->execute();

        return (int) ($sth->rowCount() > 0);
    }
}
