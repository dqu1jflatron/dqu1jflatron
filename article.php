<DOCTYPE !html>
	<html>
	<head>
		<title>FlatronPlay</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width-device-width, initial-scale-1">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/media.css">
		<link rel="stylesheet" type="text/css" href="css/menu.css">
		<link rel="apple-touch-icon" sizes="180x180" href="icon/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="icon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="icon/favicon-16x16.png">
		<link rel="manifest" href="icon/site.webmanifest">
		<link rel="mask-icon" href="icon/safari-pinned-tab.svg" color="#cd1111">
		<meta name="msapplication-TileColor" content="#ff0000">
		<meta name="theme-color" content="#ffffff">
		<script src="https://vk.com/js/api/openapi.js?160" type="text/javascript"></script>
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   		<script src="js/menu.js"></script>
	</head>
	<body>
		<?php
		$art_id = (int) $_GET['id'];
	require_once('php/php.php');
?>
		<div class="wrapper">
		<h1 align=center>FlatronPlay</h1>
		<ul align=center class="pc-menu-ul">
			<a href="index.php"><li id="pc-menu">Главная</li></a>
			<a href="news.php"><li id="pc-menu">Новости</li></a>
			<a href="info.php"><li id="pc-menu">Информация</li></a>
			<a href="url.php"><li id="pc-menu">Ссылки</li></a>
		</ul>
		<div class="content">
			<div id='cssmenu'>
<ul>
   <li class='active has-sub'><a href='#'><span>Меню</span></a>
      <ul>
         <li class='last'><a href='index.php'><span>Главная</span></a>
         </li>
         <li class='last'><a href='news.php'><span>Новости</span></a>
         </li>
         <li class='last'><a href='info.php'><span>Информация</span></a>
         </li>
         <li class='last'><a href='url.php'><span>Ссылки</span></a>
         </li>
      </ul>
   </li>
</ul>
</div>
        
		<?php article();
		mysqli_query($con, "UPDATE `articles` SET `views` = `views` + 1 WHERE `id` = " . (int) $_GET['id'] );
		 ?>
		 <br><br>

		 <?php
		 	global $article;
		 	if (mysqli_num_rows($article) <= 0) {} else {
		 ?>
		 <div id=comment_section>
		 <h2 id="#comments">Комментарии:</h2><a name="comments"></a>
		<?php
			comments();
		?>
		<h3 class="comments"><strong>Добавить свой:</strong></h3>
		<div class="add_comment">
			<form class="form" method="POST" action="/article.php?id=<?php echo $art_id ?>#comments"/>
			<?php
				global $con;
				if(isset($_POST['do_post'])) {
					$errors = array();

					if($_POST['nickname'] == '') {
						$errors[] = 'Введите никнэйм!';
					}
					if($_POST['text'] == '') {
						$errors[] = 'Введите текст комментария!';
					}

					if(empty($errors)) {
						mysqli_query($con, "INSERT INTO `comments` (`author`, `text`, `articles_id`) VALUES ('".mysqli_real_escape_string($con, $_POST['nickname'])."', '".mysqli_real_escape_string($con, $_POST['text'])."', $art_id)");
						echo '<p>Комментарий успешно добавлен!</php>';
					} else {
						echo '<p>' . $errors['0'] . '</p>';
					}
				}
			?>
			<input type="text" name="nickname" class="php__form_small" placeholder="Никнэйм"/ value="<?php echo $_POST['nickname'] ?>"><br/>
			<textarea class="php__form_large" name="text" placeholder="Текст комментария"/><?php echo $_POST['text'] ?></textarea><br/>
			<input type="submit" name="do_post" class="php__form_submit" value="Добавить">
		</div>
	</div> <?php } ?>
	</div></div>
	<div class="vk_support">
		<script type="text/javascript" src="https://vk.com/js/api/openapi.js?160"></script>

		<!-- VK Widget -->
		<div id="vk_community_messages"></div>
		<script type="text/javascript">
		VK.Widgets.CommunityMessages("vk_community_messages", 127153142, {tooltipButtonText: "Есть вопрос?"});
		</script>
    </div>
	</body>
	</html>