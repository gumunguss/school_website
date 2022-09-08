<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<title>Классный журнал</title>
    <?php
        require_once "functions/functions.php";
		if(!($grade = getGrade())) echo '';
    ?>
</head>
<body onload="digitalWatch()">
<div class="container">
	<header>
		<!-- <a href="" class="login">Вход</a> -->
		<!-- НЕ УСПЕЛ РЕАЛИЗОВАТЬ ВХОД НА САЙТ И ПОИСК ПО САЙТУ, 
			ФОРМУ ДЛЯ ПОИСКА ОСТАВИЛ, ДЛЯ ЗАПОЛНЕНИЯ ПУСТОГО МЕСТА -->
		<!-- вМЕСТО ПОИСКА ПО САЙТУ РЕАЛИЗОВАЛ ЦИФРОВЫЕ ЧАСЫ НА JS -->
		<p id="digital_watch"></p>
		<div class="search-box">
		<form action="#">
			<input type="text" id="search" placeholder="Поиск по сайту.." name="search">
			<button type="submit">Поиск</button>
		</form>
		</div>
	</header>
	<div class="section">
		<main class="other_main">
			<div class="intro">
				<img src="source/intro_logo.jpg" alt="ШМ" class="logo"></img>
				<h1>Школа математики</h1>
			</div>


			<table class="journal">
				<thead>
				<tr>
					<td>Название предмета</td>
					<td>Ф.И.О. учителя</td>
					<td>Ф.И.О. ученика</td>
					<td>Оценка</td>
					<td>Дата</td>
				</tr>
				</thead>
				<tbody>
					<tr>
						<td>Алгебра</td>
						<td>Владимирова Влада Владимировна</td>
						<td>Иванов Иван Иванович</td>
						<td>5</td>
						<td>2021-06-27</td>
					</tr>
					<tr>
						<td>Алгебра</td>
						<td>Владимирова Влада Владимировна</td>
						<td>Петров Петр Петрович</td>
						<td>4</td>
						<td>2021-06-29</td>
					</tr>
					<tr>
						<td>Геометрия</td>
						<td>Еленова Елена Еленович</td>
						<td>Иванов Иван Иванович</td>
						<td>5</td>
						<td>2021-06-29</td>
					</tr>
					<tr>
						<td>Геометрия</td>
						<td>Еленова Елена Еленович</td>
						<td>Петров Петр Петрович</td>
						<td>4</td>
						<td>2021-06-29</td>
					</tr>
				</tbody>
			</table>
		</main>
		<nav>
			<div>Навигация по сайту</div>
			<a href="/index.html">Главная</a>
			<a href="/about.html">О себе</a>
			<a href="/contacts.html">Контакты</a>
            <a href="/class_journal.php" class="active">Классный журнал</a>
		</nav>
	</div>
	<footer>
		<div class="links"> 
			<p>ССЫЛКИ</p>
			<a href="http://www.edu.ru/">Федеральный портал Российское образование</a>
			<a href="https://minobrnauki.gov.ru/">Министерство науки и высшего образования Российской Федерации</a>
		</div>
		<div class="adress">
			<p>АДРЕС</p>
			<p>Юридический адрес: ул. X, г. X, X район, Алтайский край, 658ХХХ</p>
			<p>Фактический и почтовый адрес: ул. X, г. X, X район, Алтайский край, 658ХХХ</p>
		</div>
		<div class="about">
			<p>ОПИСАНИЕ</p>
			<p>Помогаем разобраться в математике, объясняем темы за пределами школьной программы, готовим к олимпиадам.</p>
		</div>
	</footer>
</div>
<script src="scripts/digitalWatch.js"></script>
</body>
</html>