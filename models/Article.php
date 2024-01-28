<?php

require_once __DIR__ . '/../helpers/Database.php';

class Article
{
    private ?int $id_article;
    private string $title;
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
    private ?int $id_console;
    private ?int $id_game;

    public function __construct(
        string $title = '',
        string $secondtitle = '',
        string $thirdtitle = '',
        string $article_picture = '',
        string $article_description = '',
        string $firstsection = '',
        string $secondsection = '',
        ?string $created_at = null,
        ?string $updated_at = null,
        ?string $deleted_at = null,
        ?int $id_article = null,
        ?string $confirmed_at = null,
        ?int $id_console = null,
        ?int $id_game = null
    ) {
        $this->title = $title;
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
        $this->id_console = $id_console;
        $this->id_game = $id_game;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
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

    public function setArticlePicture(?string $article_picture)
    {
        $this->article_picture = $article_picture;
    }

    public function getArticlePicture(): ?string
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

    public function setIdConsole(int $id_console)
    {
        $this->id_console = $id_console;
    }

    public function getIdConsole(): int
    {
        return $this->id_console;
    }

    public function setIdGame(?int $id_game)
    {
        $this->id_game = $id_game;
    }

    public function getIdGame(): ?int
    {
        return $this->id_game;
    }

    public function insert(): int
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO `articles` (`title`, `secondtitle`, `thirdtitle`, `article_picture`, `article_description`, `firstsection`, `secondsection`, `id_game`) 
        VALUES(:title, :secondtitle, :thirdtitle, :article_picture, :article_description, :firstsection, :secondsection, :id_game)';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':title', $this->getTitle());
        $sth->bindValue(':secondtitle', $this->getSecondTitle());
        $sth->bindValue(':thirdtitle', $this->getThirdTitle());
        $sth->bindValue(':article_picture', $this->getArticlePicture());
        $sth->bindValue(':article_description', $this->getArticleDescription());
        $sth->bindValue(':firstsection', $this->getFirstSection());
        $sth->bindValue(':secondsection', $this->getSecondSection());
        $sth->bindValue(':id_game', $this->getIdGame(), PDO::PARAM_INT);

        $sth->execute();

        return $sth->rowCount() > 0;
    }

    public static function getAll(?int $id_game = null, bool $showDeletedAt = false, string $order = 'ASC'): array|false
    {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM `articles`
        INNER JOIN `games` ON `games`.`id_game`=`articles`.`id_game`
        WHERE 1=1';

        $showDeletedAt ? $sql .= ' AND `deleted_at` IS NOT NULL ' : $sql .= ' AND `deleted_at` IS NULL ';

        isset($id_game) ? $sql .= ' AND `games`.`id_game`=:id_game ' : null;

        $order == 'ASC' ? $sql .= ' ORDER BY `articles`.`created_at` ASC ' : $sql .= ' ORDER BY `articles`.`created_at` DESC ';

        if (isset($id_game)) {
            $sth = $pdo->prepare($sql);
            $sth->bindValue('id_game', $id_game, PDO::PARAM_INT);
            $sth->execute();
        } else {
            $sth = $pdo->query($sql);
        }

        $result = $sth->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public static function get(int $id)
    {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM `articles`
        INNER JOIN `games` ON `games`.`id_game`=`articles`.`id_game`
        WHERE `id_article`=:id_article';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_article', $id, PDO::PARAM_INT);

        $sth->execute();

        $result = $sth->fetch(PDO::FETCH_OBJ);

        return $result;
    }

    public function update(): bool
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `articles` 
        SET `title`=:title, `secondtitle`=:secondtitle, `thirdtitle`=:thirdtitle, `article_picture`=:article_picture, `article_description`=:article_description, `firstsection`=:firstsection, `secondsection`=:secondsection, `id_game`=:id_game 
        WHERE `id_article`=:id_article;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':title', $this->getTitle());
        $sth->bindValue(':secondtitle', $this->getSecondTitle());
        $sth->bindValue(':thirdtitle', $this->getThirdTitle());
        $sth->bindValue(':article_picture', $this->getArticlePicture());
        $sth->bindValue(':article_description', $this->getArticleDescription());
        $sth->bindValue(':firstsection', $this->getFirstSection());
        $sth->bindValue(':secondsection', $this->getSecondSection());
        $sth->bindValue(':id_game', $this->getIdGame(), PDO::PARAM_INT);
        $sth->bindValue(':id_article', $this->getIdArticle(), PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }

    public static function updateImg(int $id): bool
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `articles` SET `article_picture`= null WHERE `id_article`=:id_article;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_article', $id, PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }

    public static function archive(int $id, bool $archive = false): bool
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `articles`';

        $archive ? $sql .=  " SET `deleted_at`=NOW() WHERE `id_article`=:id_article "  : $sql .= " SET `deleted_at`= NULL WHERE `id_article`=:id_article ";
        
        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_article', $id, PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }

    public static function delete(int $id): int
    {
        $pdo = Database::connect();

        $sql = 'DELETE FROM `articles` WHERE `id_article` = :id_article;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_article', $id, PDO::PARAM_INT);

        $sth->execute();

        return $sth->rowCount() > 0;
    }
}
