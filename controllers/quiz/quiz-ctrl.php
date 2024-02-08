<?php
session_start();
require_once __DIR__ . '/../../helpers/CheckPermissions.php';

CheckPermissions::checkMember();






include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/quiz/quiz.php';