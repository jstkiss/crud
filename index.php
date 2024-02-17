<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="main.js"></script>
    <title>Document</title>
  </head>
  <body>
    <section>
        <nav>
            <ul class="flex items-center justify-center">
                <li class="pl-4"><a href="./User/user.php">users</a></li>
                <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'membre') : ?>
                <li class="pl-4"><a href="./cars/cars.php">cars</a></li>
                <li class="pl-4"><a href="">collection</a></li>
                <?php endif; ?>
                <?php if(isset($_SESSION['role']) && $_SESSION['role'] !== 'membre') : ?>
                <li class="pl-4"><a href="">membre</a></li>
                <?php endif; ?>
                <li class="pl-44"><a href="register.php">S'inscrire</a></li>
                <li class="pl-10"><a href="login.php">Se connecter</a></li>
            </ul>
        </nav>
    </section>
  </body>
</html>
