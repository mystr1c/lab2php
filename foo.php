<?php

include 'db.php';

$name = $_POST['name'];
$text = $_POST['text'];
$get_id = $_GET['id'];

//Create

if (isset($_POST['add'])) {
    $sql = ("INSERT INTO users_lab2 (name, text) VALUES (?,?)");
    $query = $pdo->prepare($sql);
    $query->execute([$name, $text]);
    if ($query) {
        header("Location: ". $_SERVER['HTTP_REFERER']);
    }
}

// Read
$sql = $pdo->prepare("SELECT * FROM users_lab2");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_OBJ);

//Update
if (isset($_POST['edit'])) {
    $sql = ("UPDATE users_lab2 SET name=?, text=? WHERE id=?");
    $query = $pdo->prepare($sql);
    $query->execute([$name, $text, $get_id]);
    if ($query) {
        header("Location: ". $_SERVER['HTTP_REFERER']);
    }
}

//Delete

if (isset($_POST['delete'])) {
    $sql = ("DELETE FROM users_lab2 WHERE id = ?");
    $query = $pdo->prepare($sql);
    $query->execute([$get_id]);
    if ($query) {
        header("Location: ". $_SERVER['HTTP_REFERER']);
    }
}

//Like

if(isset($_POST['like'])) {

    $sql = ("UPDATE `users_lab2` SET likes = likes + 1 WHERE `id` = ?");
    $query = $pdo -> prepare($sql);
    $query-> execute([$_GET['id']]);
    header('Location: index.php');

}

//Dislike

if(isset($_POST['dislike'])) {

    $sql = ("UPDATE `users_lab2` SET `dislikes` = `dislikes` + 1 WHERE id = ?");
    $query = $pdo->prepare($sql);
    $query->execute([$_GET['id']]);
    header('Location: index.php');
}