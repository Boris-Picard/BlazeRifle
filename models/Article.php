<?php

require_once __DIR__ . '/../helpers/Database.php';

class Article
{
    private int $id_article;
    private string $article_title;
    private string $secondtitle;
    private string $thirdtitle;
    private string $article_picture;
    private string $article_description;
    private string $firstsection;
    private string $secondsection;
    private ?string $created_at;
    private ?string $updated_at;
    private ?string $deleted_at;
    private ?string $confirmed_at;
    private ?int $id_game;
    private int $id_category;
    private int $id_user;

    public function __construct(
        string $article_title = '',
        string $secondtitle = '',
        string $thirdtitle = '',
        string $article_picture = '',
        string $article_description = '',
        string $firstsection = '',
        string $secondsection = '',
        ?string $created_at = null,
        ?string $updated_at = null,
        ?string $deleted_at = null,
        int $id_article = 0,
        ?string $confirmed_at = null,
        ?int $id_game = null,
        int $id_category = 0,
        int $id_user = 0
    ) {
        $this->article_title = $article_title;
        $this->secondtitle = $secondtitle;
        $this->thirdtitle = $thirdtitle;
        $this->article_picture = $article_picture;
        $this->article_description = $article_description;
        $this->firstsection = $firstsection;
        $this->secondsection = $secondsection;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->deleted_at = $deleted_at;
        $this->id_article = $id_article;
        $this->confirmed_at = $confirmed_at;
        $this->id_game = $id_game;
        $this->id_category = $id_category;
        $this->id_user = $id_user;
    }

    public function setArticleTitle(string $article_title)
    {
        $this->article_title = $article_title;
    }

    public function getArticleTitle(): string
    {
        return $this->article_title;
    }

    public function setSecondTitle(string $secondtitle)
    {
        $this->secondtitle = $secondtitle;
    }

    public function getSecondTitle(): string
    {
        return $this->secondtitle;
    }

    public function setThirdTitle(string $thirdtitle)
    {
        $this->thirdtitle = $thirdtitle;
    }

    public function getThirdTitle(): string
    {
        return $this->thirdtitle;
    }

    public function setArticlePicture(string $article_picture)
    {
        $this->article_picture = $article_picture;
    }

    public function getArticlePicture(): string
    {
        return $this->article_picture;
    }

    public function setArticleDescription(string $article_description)
    {
        $this->article_description = $article_description;
    }

    public function getArticleDescription(): string
    {
        return $this->article_description;
    }

    public function setFirstSection(string $firstsection)
    {
        $this->firstsection = $firstsection;
    }

    public function getFirstSection(): string
    {
        return $this->firstsection;
    }

    public function setSecondSection(string $secondsection)
    {
        $this->secondsection = $secondsection;
    }

    public function getSecondSection(): string
    {
        return $this->secondsection;
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

    public function getDeletedAt(): string
    {
        return $this->deleted_at;
    }

    public function setIdArticle(int $id_article)
    {
        $this->id_article = $id_article;
    }

    public function getIdArticle(): int
    {
        return $this->id_article;
    }

    public function setConfirmedAt(string $confirmed_at)
    {
        $this->confirmed_at = $confirmed_at;
    }

    public function getConfirmedAt(): string
    {
        return $this->confirmed_at;
    }

    public function setIdGame(?int $id_game)
    {
        $this->id_game = $id_game;
    }

    public function getIdGame(): ?int
    {
        return $this->id_game;
    }

    public function setIdCategory(int $id_category)
    {
        $this->id_category = $id_category;
    }

    public function getIdCategory(): int
    {
        return $this->id_category;
    }

    public function setIdUser(int $id_user)
    {
        $this->id_user = $id_user;
    }

    public function getIdUser(): int
    {
        return $this->id_user;
    }

    /**
     * Insertion des données dans la table articles
     * @return int
     */
    public function insert(): int
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO `articles` (`article_title`, `secondtitle`, `thirdtitle`, `article_picture`, `article_description`, `firstsection`, `secondsection`, `id_game`, `id_category`, `id_user`) 
        VALUES(:article_title, :secondtitle, :thirdtitle, :article_picture, :article_description, :firstsection, :secondsection, :id_game, :id_category, :id_user)';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':article_title', $this->getArticleTitle());
        $sth->bindValue(':secondtitle', $this->getSecondTitle());
        $sth->bindValue(':thirdtitle', $this->getThirdTitle());
        $sth->bindValue(':article_picture', $this->getArticlePicture());
        $sth->bindValue(':article_description', $this->getArticleDescription());
        $sth->bindValue(':firstsection', $this->getFirstSection());
        $sth->bindValue(':secondsection', $this->getSecondSection());
        $sth->bindValue(':id_game', $this->getIdGame(), PDO::PARAM_INT);
        $sth->bindValue(':id_category', $this->getIdCategory(), PDO::PARAM_INT);
        $sth->bindValue(':id_user', $this->getIdUser(), PDO::PARAM_INT);

        $sth->execute();

        return $sth->rowCount() > 0;
    }


    /**
     * Récupération de toutes les données dans la table 'articles', 
     * jointure avec les tables 'games', 
     * vérification des articles supprimés ou non, ordre ASC ou DESC, 
     * application des LIMIT et OFFSET pour les articles visibles, ainsi que la pagination
     * @param int|null $id_game
     * @param bool $showDeletedAt
     * @param string $order
     * @param int $limit
     * @param int $page
     * @param int $offset
     * 
     * @return array
     */
    public static function getAll(?int $id_game = null, bool $showDeletedAt = false, bool $showConfirmedAt = false, ?int $id_category = null, string $order = 'ASC', int $limit = 7, int $page = null, int $offset = 0): array|false
    {
        $pdo = Database::connect();

        if (!is_null($page)) {
            $offset = ($page - 1) * $limit;
        }

        $sql =
            'SELECT 
            `articles`.`id_article`,
            `articles`.`article_picture`,
            `articles`.`article_title`,
            `articles`.`article_description`,
            `articles`.`created_at` AS article_created_at,
            `articles`.`deleted_at` AS article_deleted_at,
            `articles`.`confirmed_at` AS article_confirmed_at,
            `categories`.`label`,
            `categories`.`id_category`,
            `games`.`game_description`,
            `games`.`game_name`,
            `games`.`game_picture`,
            `games`.`id_game`,
            `users`.`pseudo`,
            `users`.`role`,
            `users`.`created_at` AS user_created_at
            FROM `articles`
            INNER JOIN `categories` ON `categories`.`id_category`=`articles`.`id_category`
            INNER JOIN `games` ON `games`.`id_game`=`articles`.`id_game`
            INNER JOIN `users` ON `users`.`id_user`=`articles`.`id_user`
            WHERE 1=1';

        $showDeletedAt ? $sql .= ' AND `articles`.`deleted_at` IS NOT NULL ' : $sql .= ' AND `articles`.`deleted_at` IS NULL ';

        if ($showConfirmedAt) {
            $sql .= ' AND `articles`.`confirmed_at` IS NOT NULL ';
        }

        if (!is_null($id_game)) {
            $sql .= ' AND `games`.`id_game`=:id_game ';
        }

        if (!is_null($id_category)) {
            $sql .= ' AND `categories`.`id_category`=:id_category ';
        }

        $order == 'ASC' ? $sql .= ' ORDER BY `articles`.`created_at` ASC ' : $sql .= ' ORDER BY `articles`.`created_at` DESC ';

        $sql .= " LIMIT :limit OFFSET :offset ";

        $sth = $pdo->prepare($sql);

        if (!is_null($id_game)) {
            $sth->bindValue(':id_game', $id_game, PDO::PARAM_INT);
        }

        if (!is_null($id_category)) {
            $sth->bindValue(':id_category', $id_category, PDO::PARAM_INT);
        }

        $sth->bindValue(':limit', $limit, PDO::PARAM_INT);
        $sth->bindValue(':offset', $offset, PDO::PARAM_INT);

        $sth->execute();

        $result = $sth->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    /**
     * Récupération d'une donnée spécifique via son id 
     * @param int $id
     * 
     * @return [type]
     */
    public static function get(?int $id_article = null, bool $showConfirmedAt = false, ?int $id_category = null, ?bool $archived = null)
    {
        $pdo = Database::connect();

        $sql = 'SELECT `articles`.`id_article`,
        `articles`.`article_picture`,
        `articles`.`article_title`,
        `articles`.`article_description`,
        `articles`.`secondtitle`,
        `articles`.`thirdtitle`,
        `articles`.`firstsection`,
        `articles`.`secondsection`,
        `articles`.`created_at` AS article_created_at,
        `articles`.`deleted_at` AS article_deleted_at,
        `articles`.`confirmed_at` AS article_confirmed_at,
        `categories`.`label`,
        `categories`.`id_category`,
        `games`.`game_description`,
        `games`.`game_name`,
        `games`.`id_game`,
        `users`.`pseudo`,
        `users`.`role`,
        `users`.`id_user`,
        `users`.`created_at` AS user_created_at
        FROM `articles`
        INNER JOIN `categories` ON `categories`.`id_category`=`articles`.`id_category`
        INNER JOIN `games` ON `games`.`id_game`=`articles`.`id_game`
        INNER JOIN `users` ON `users`.`id_user`=`articles`.`id_user`
        WHERE `id_article`=:id_article';

        if (!is_null($archived)) {
            $archived === true ? $sql .= ' AND `articles`.`deleted_at` IS NOT NULL ' : $sql .= ' AND `articles`.`deleted_at` IS NULL ';
        }

        if ($showConfirmedAt) {
            $sql .= ' AND `articles`.`confirmed_at` IS NOT NULL ';
        }

        if (!is_null($id_category)) {
            $sql .= ' AND `categories`.`id_category`=:id_category ';
        }

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_article', $id_article, PDO::PARAM_INT);

        if (!is_null($id_category)) {
            $sth->bindValue(':id_category', $id_category, PDO::PARAM_INT);
        }

        $sth->execute();

        $result = $sth->fetch(PDO::FETCH_OBJ);

        return $result;
    }

    public static function confirm(int $id_article)
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `articles` SET `confirmed_at`= NOW()
        WHERE `articles`.`id_article`=:id_article;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_article', $id_article, PDO::PARAM_INT);

        $sth->execute();

        return $sth->rowCount() > 0;
    }

    /**
     * Méthode pour mettre a jour les données de la table articles
     * @return bool
     */
    public function update(): bool
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `articles` 
        SET `article_title`=:article_title, `secondtitle`=:secondtitle, `thirdtitle`=:thirdtitle, `article_picture`=:article_picture, `article_description`=:article_description, `firstsection`=:firstsection, `secondsection`=:secondsection, `id_game`=:id_game, `id_user`=:id_user, `id_category`=:id_category 
        WHERE `id_article`=:id_article;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':article_title', $this->getArticleTitle());
        $sth->bindValue(':secondtitle', $this->getSecondTitle());
        $sth->bindValue(':thirdtitle', $this->getThirdTitle());
        $sth->bindValue(':article_picture', $this->getArticlePicture());
        $sth->bindValue(':article_description', $this->getArticleDescription());
        $sth->bindValue(':firstsection', $this->getFirstSection());
        $sth->bindValue(':secondsection', $this->getSecondSection());
        $sth->bindValue(':id_game', $this->getIdGame(), PDO::PARAM_INT);
        $sth->bindValue(':id_article', $this->getIdArticle(), PDO::PARAM_INT);
        $sth->bindValue(':id_user', $this->getIdUser(), PDO::PARAM_INT);
        $sth->bindValue(':id_category', $this->getIdCategory(), PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }

    /**
     * Méthode spécifique pour mettre a jour l'image d'un article en récupérant son id
     * @param int $id
     * 
     * @return bool
     */
    public static function updateImg(int $id): bool
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `articles` SET `article_picture`= null WHERE `id_article`=:id_article;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_article', $id, PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }

    /**
     * Méthode pour archiver et désarchiver un article via son id
     * @param int $id
     * @param bool $archive
     * 
     * @return bool
     */
    public static function archive(int $id_article, bool $archive = false): bool
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `articles`';

        $archive ? $sql .=  " SET `deleted_at`=NOW() WHERE `id_article`=:id_article "  : $sql .= " SET `deleted_at`= NULL WHERE `id_article`=:id_article ";

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_article', $id_article, PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }

    /**
     * Méthode de suppression d'un article
     * @param int $id_article
     * 
     * @return int
     */
    public static function delete(int $id_article): int
    {
        $pdo = Database::connect();

        $sql = 'DELETE FROM `articles` WHERE `id_article` = :id_article;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_article', $id_article, PDO::PARAM_INT);

        $sth->execute();

        return $sth->rowCount() > 0;
    }

    /**
     * Méthode pour retourner le nombre total d'articles 
     * @param int|null $id_game
     * 
     * @return int
     */
    public static function count(?int $id_game = null, ?int $id_category = null): int
    {
        $pdo = Database::connect();

        $sql = 'SELECT COUNT(*) AS `count` FROM `articles`
                INNER JOIN `games` ON `games`.`id_game` = `articles`.`id_game`
                INNER JOIN `categories` ON `categories`.`id_category`= `articles`.`id_category`
                WHERE 1 = 1';

        if (!is_null($id_game)) {
            $sql .= ' AND `articles`.`id_game` = :id_game';
        }

        if (!is_null($id_category)) {
            $sql .= ' AND `categories`.`id_category` = :id_category';
        }

        $sth = $pdo->prepare($sql);

        if (!is_null($id_game)) {
            $sth->bindValue(':id_game', $id_game, PDO::PARAM_INT);
        }

        if (!is_null($id_category)) {
            $sth->bindValue(':id_category', $id_category, PDO::PARAM_INT);
        }

        $sth->execute();

        $result = $sth->fetchColumn();

        return $result;
    }

    /**
     * Méthode pour savoir si une donnée existe déja en base de donnée
     * @param string $registration
     * 
     * @return bool
     */
    public static function isExist(string $article_title): bool
    {
        $pdo = Database::connect();

        $sql = 'SELECT COUNT(`id_article`) AS "count" FROM `articles` WHERE `article_title`=:article_title;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':article_title', $article_title);
        $sth->execute();

        $result = $sth->fetchColumn();

        return (bool) $result > 0;
    }

    public static function getConfirmed(): int
    {
        $pdo = Database::connect();

        $sql = 'SELECT COUNT(*)
        FROM `articles`
        WHERE `confirmed_at` IS NULL;';

        $sth = $pdo->query($sql);

        $result = $sth->fetchColumn();

        return $result;
    }
}
