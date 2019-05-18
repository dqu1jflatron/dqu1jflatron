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
	require_once('php/php.php');
?>
		<div class="wrapper">
		<h1 align=center>FlatronPlay</h1>
		<ul align=center class="pc-menu-ul">
			<a href="index.php"><li class="active" id="pc-menu">Главная</li></a>
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
        <h2>Кто такой флатрон?</h2>
		<p>Флатрон - отличный стример по разным играм на YouTube. Флатрона зовут Дмитрий Попов, живет он в России, город Воронеж. Работает в кафе Жар Пицца, учится в колледже.</p>
		<h2>Стримы</h2>
		<p>Стримы он проводит на <a href="https://www.youtube.com/channel/UC7P-Tl5cMNwEw7X4D41SHGg">его канале</a>. Чаще всего он стримит Minecraft, где он играет в мини-игры с подписчиками, проводит конкурсы, и т.д. Информацию о стримах можно найти в <a href="https://www.vk.com/flatronplay">группе ВК</a>. В данный момент он стримит редко по причине работы и учебы. </p>
		<h2>Статьи</h2>
		<div id="blog">
			<?php showPosts(); 
			?>
		</div>
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