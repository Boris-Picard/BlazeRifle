<?php

require_once __DIR__ . '/../helpers/Database.php';

class Quiz
{
    private int $id_quiz;
    private string $quiz_title;
    private ?string $quiz_picture;
    private string $quiz_description;
    private string $created_at;
    private string $updated_at;
    private ?string $deleted_at;

    public function __construct(
        int $id_quiz = 0,
        string $quiz_title = '',
        ?string $quiz_picture = '',
        string $quiz_description = '',
        string $created_at = '',
        string $updated_at = '',
        ?string $deleted_at = '',
    ) {
        $this->id_quiz = $id_quiz;
        $this->quiz_title = $quiz_title;
        $this->quiz_picture = $quiz_picture;
        $this->quiz_description = $quiz_description;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->deleted_at = $deleted_at;
    }

    public function setIdQuiz(int $id_quiz)
    {
        $this->id_quiz = $id_quiz;
    }

    public function getIdQuiz(): int
    {
        return $this->id_quiz;
    }

    public function setQuizTitle(string $quiz_title)
    {
        $this->quiz_title = $quiz_title;
    }

    public function getQuizTitle(): string
    {
        return $this->quiz_title;
    }

    public function setQuizPicture(?string $quiz_picture)
    {
        $this->quiz_picture = $quiz_picture;
    }

    public function getQuizPicture(): ?string
    {
        return $this->quiz_picture;
    }

    public function setQuizDescription(string $quiz_description)
    {
        $this->quiz_description = $quiz_description;
    }

    public function getQuizDescription(): string
    {
        return $this->quiz_description;
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

    public function setDeletedAt(?string $deleted_at)
    {
        $this->deleted_at = $deleted_at;
    }

    public function getDeletedAt(): ?string
    {
        return $this->deleted_at;
    }

    public function insert(): int
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO `quiz` (`quiz_title`, `quiz_picture`, `quiz_description`)
        VALUES (:quiz_title, :quiz_picture, :quiz_description);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue('quiz_title', $this->getQuizTitle());
        $sth->bindValue('quiz_picture', $this->getQuizPicture());
        $sth->bindValue('quiz_description', $this->getQuizDescription());

        $sth->execute();

        return $sth->rowCount() > 0;
    }

    public static function getAll()
    {
        $pdo = Database::connect();

        $sql = 'SELECT 
        *
        FROM quiz;';

        $sth = $pdo->query($sql);

        return $sth->fetchAll();
    }

    public static function get(?int $id_quiz): object|false
    {
        $pdo = Database::connect();

        $sql = 'SELECT `quiz`.`id_quiz`, `quiz`.`quiz_title`, `quiz`.`quiz_picture`, `quiz_description`, `quiz`.`deleted_at`
        FROM `quiz`
        WHERE `id_quiz`=:id_quiz;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_quiz', $id_quiz, PDO::PARAM_INT);

        $sth->execute();

        return $sth->fetch(PDO::FETCH_OBJ);
    }

    public function update(): bool
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `quiz` SET `quiz_title`=:quiz_title, `quiz_picture`=:quiz_picture, `quiz_description`=:quiz_description
            WHERE `id_quiz`=:id_quiz;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':quiz_title', $this->getQuizTitle());
        $sth->bindValue(':quiz_picture', $this->getQuizPicture());
        $sth->bindValue(':quiz_description', $this->getQuizDescription());
        $sth->bindValue(':id_quiz', $this->getIdQuiz(), PDO::PARAM_INT);

        return $sth->execute();
    }

    public static function updateImg(int $id_quiz): bool
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `quiz` SET `quiz_picture`= null WHERE `id_quiz`=:id_quiz;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_quiz', $id_quiz, PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }

    public static function delete(int $id_quiz): int
    {
        $pdo = Database::connect();

        $sql = 'DELETE FROM `quiz` WHERE `id_quiz`=:id_quiz;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_quiz', $id_quiz, PDO::PARAM_INT);

        $sth->execute();

        return $sth->rowCount() > 0;
    }

    public static function active(int $id_quiz, bool $active = true)
    {
        $pdo = Database::connect();

        $active ? $active = 'NULL ' : $active = 'NOW() ';

        $sql = 'UPDATE `quiz` SET `deleted_at`=' . $active .
            ' WHERE `quiz`.`id_quiz`=:id_quiz;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_quiz', $id_quiz, PDO::PARAM_INT);

        $sth->execute();

        return $sth->rowCount() > 0;
    }
}
