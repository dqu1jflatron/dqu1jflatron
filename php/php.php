<?php

require_once('db_connect.php');

if ( $con === false ) {
	echo 'Подключение не удалось: ' . mysqli_connect_error() . '<br>';
	echo 'Попробуйте обновить страницу <br>';
	echo 'Если ничего не помогает, сообщите об этом в ЛС группы <br>';
	exit();
}

$post = mysqli_query($con, "SELECT * FROM `articles` ORDER BY `id` DESC");
function showPosts() {
	global $post;
	while (($pst = mysqli_fetch_assoc($post))) {
		echo '<div id="post"><a href="article.php?id=' . $pst['id'] . '"><h3>' . $pst['title']  . '</h3></a>';
		echo '<p>' . mb_substr(strip_tags($pst['text']), 0, 50, 'utf-8') . '...</p></div>';
	}
}
global $art_id;
$article = mysqli_query($con, "SELECT * FROM `articles` WHERE `id` = " . (int) $art_id);
$comments = mysqli_query($con, "SELECT * FROM `comments` WHERE `articles_id` = " .  (int) $art_id . " ORDER BY `id` DESC LIMIT 20");
function article() {
	global $article;
	if (mysqli_num_rows($article) <= 0) {
		echo '<h1>Статья не найдена!</h1>';
	} else {
		$art = mysqli_fetch_assoc($article);
		echo "<h2>" . $art['title'] . "</h2>";
		echo '<p class="php__small">Просмотров: ' . $art['views'] . "	  <a href='#comments'>К комментариям</a>";
		echo "<p>". $art['text'] . "</p>";
	}
}

function comments() {
	global $comments;
	if (mysqli_num_rows($comments) <= 0) {
		echo '<p>Комментариев не найдено!</p>';
	} else {
		while(($com = mysqli_fetch_assoc($comments))) {
			echo '<h3 class="comments">' . $com['author'] . '<p class="php__small">' . $com['pubdate'] . '</p></h3>';
			echo "<p>" . $com['text'] . "</p><br>";
		}
	}
}