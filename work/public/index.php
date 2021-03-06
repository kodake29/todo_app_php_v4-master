<?php

require_once(__DIR__ . '/../app/config.php');


Token::create();

$pdo = Database::getInstance();

$todo = new Todo($pdo);
$todo->processPost();
$todos = $todo->getAll();



?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>My Todos</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
<main>
  <h1>Todos</h1>
  <form action="?action=add" method="post">
    <input type="text" name="title" placeholder="Type new todo">
    <input type="hidden" name="token" value="<?= Utils::h($_SESSION['token']); ?>">
  </form>
  <ul>
    <?php foreach ($todos as $todo) : ?>
      <li>
        <form action="?action=toggle" method="post">
          <input type="checkbox" <?= $todo->is_do ? 'checked' : ''; ?>>
          <input type="hidden" name='id' value='<?= Utils::h($todo->id); ?>'>
          <input type="hidden" name="token" value="<?= Utils::h($_SESSION['token']); ?>">
        </form>

        <span class="<?= $todo->is_do ? 'done' : ''; ?>">
          <?= Utils::h($todo->title); ?>
        </span>

        <form action="?action=delete" method="post">
          <span class="delete">x</span>
          <input type="hidden" name="id" value="<?= Utils::h($todo->id); ?>">
          <input type="hidden" name="token" value="<?= Utils::h($_SESSION['token']); ?>">
        </form>
      </li>
    <?php endforeach; ?>
  </ul>
  <script src="js/main.js"></script>
  </main>
</body>

</html>