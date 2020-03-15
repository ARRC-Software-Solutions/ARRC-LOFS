<link rel="stylesheet" href="form.css">

<?php
session_start();
?>

<div class="body content" >
    <div class="welcome">
        <div class="alert alert-success"><? $_SESSION['message']?></div>
            Welcome <span class="user"><img src='<?php$_SESSION['avatar']?>'> </span>