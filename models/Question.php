<?php

require_once __DIR__ . '/../helpers/Database.php';

class Question
{
    private int $id_question;
    private string $text_question;
    private string $firstanswer;
    private string $secondanswer;
    private string $thirdanswer;
    private int $goodanswer;
    private int $id_quiz;

    public function __construct(
        int $id_question = 0,
        string $text_question = '',
        string $firstanswer = '',
        string $secondanswer = '',
        string $thirdanswer = '',
        int $goodanswer = 0,
        int $id_quiz = 0
    ) {
        $this->id_question = $id_question;
        $this->text_question = $text_question;
        $this->firstanswer = $firstanswer;
        $this->secondanswer = $secondanswer;
        $this->thirdanswer = $thirdanswer;
        $this->goodanswer = $goodanswer;
        $this->id_quiz = $id_quiz;
    }

    public function setIdQuestion(int $id_question)
    {
        $this->id_question = $id_question;
    }

    public function getIdQuestion(): int
    {
        return $this->id_question;
    }

    public function setTextQuestion(string $text_question)
    {
        $this->text_question = $text_question;
    }

    public function getTextQuestion(): string
    {
        return $this->text_question;
    }

    public function setFirstAnswer(string $firstanswer)
    {
        $this->firstanswer = $firstanswer;
    }

    public function getFirstAnswer(): string
    {
        return $this->firstanswer;
    }

    public function setSecondAnswer(string $secondanswer)
    {
        $this->secondanswer = $secondanswer;
    }

    public function getSecondAnswer(): string
    {
        return $this->secondanswer;
    }

    public function setThirdAnswer(string $thirdanswer)
    {
        $this->thirdanswer = $thirdanswer;
    }

    public function getThirdAnswer(): string
    {
        return $this->thirdanswer;
    }

    public function setGoodAnswer(int $goodanswer)
    {
        $this->goodanswer = $goodanswer;
    }

    public function getGoodAnswer(): int
    {
        return $this->goodanswer;
    }

    public function setIdQuiz(int $id_quiz)
    {
        $this->id_quiz = $id_quiz;
    }

    public function getIdQuiz(): int
    {
        return $this->id_quiz;
    }

    public function insert()
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO `questions` (`text_question`, `firstanswer`, `secondanswer`, `thirdanswer`, `goodanswer`, `id_quiz`)
        VALUES (:text_question, :firstanswer, :secondanswer, :thirdanswer, :goodanswer, :id_quiz);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':text_question', $this->getTextQuestion());
        $sth->bindValue(':firstanswer', $this->getFirstAnswer());
        $sth->bindValue(':secondanswer', $this->getSecondAnswer());
        $sth->bindValue(':thirdanswer', $this->getThirdAnswer());
        $sth->bindValue(':goodanswer', $this->getGoodAnswer(), PDO::PARAM_INT);
        $sth->bindValue(':id_quiz', $this->getIdQuiz(), PDO::PARAM_INT);

        $sth->execute();

        return $sth->rowCount() > 0;
    }
}
