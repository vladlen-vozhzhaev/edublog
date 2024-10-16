<?php
session_start();
require_once('header.php');
?>
<div class="container px-4 px-lg-5">
    <p><strong>ID:</strong> <?= $_SESSION['id'] ?></p>
    <p><strong>NAME: </strong><?= $_SESSION['name']; ?></p>
    <p><strong>EMAIL: </strong><?= $_SESSION['email'] ?></p>
</div>
<?php
require_once('footer.php');
?>