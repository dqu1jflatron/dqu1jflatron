<?php

require_once('db_connect.php');
session_start();

if ( $con === false ) {
	echo 'Подключение не удалось: ' . mysqli_connect_error() . '<br>';
	exit();
}

$post = mysqli_query($con, "SELECT * FROM `articles` ORDER BY `id` DESC");
function showPosts() {
	global $post;
	while (($pst = mysqli_fetch_assoc($post))) {
		echo '<div id="post"><a href="article.html?id=' . $pst['id'] . '"><h3>' . $pst['title']  . '</h3></a>';
		echo '<p>' . mb_substr(strip_tags($pst['text']), 0, 50, 'utf-8') . '...</p></div>';
	}
}
$article = mysqli_query($con, "SELECT * FROM `articles` WHERE `id` = " . (int) $_GET['id']);
$comments = mysqli_query($con, "SELECT * FROM `comments` WHERE `articles_id` = " .  (int) $_GET['id'] . " ORDER BY `id` DESC LIMIT 20");
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
			echo '<img style="width: 64px; height: 64px; padding-right: 15px;" id="inline" src="https://www.gravatar.com/avatar/' . $com['avatar'] . '&s=256?d=' . urlencode('https://www.iconsdb.com/icons/preview/black/user-xxl.png') . '"/>';
			echo '<h3 id="inline" class="comments">' . $com['author'] . '</h3><br>';
			echo "<p id='inline' style='margin-top:0; margin-bottom:5px; padding:0;'>" . $com['text'] . "</p><br><br><br>";
		}
	}
}