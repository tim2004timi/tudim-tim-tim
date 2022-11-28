<?php
	include('1.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Тудым-Тим-Тим</title>
	<link rel="icon" href="icon.png">
</head>
<body>
	<div class='block1'>
		<select name='city' class='city'>
			<option>Москва</option>
			<option>Питер</option>
			<option>Краснодар</option>
			<option>Ростов</option>
			<option>Самара</option>
			<option>Казань</option>
		</select>
		<div class='enter'><div><a href="#">Войти</a></div></div>
	</div>
	<div class='block2'>
		<h1><span>Т</span>удым-<span>Т</span>им-<span>Т</span>им</h1>
		<form method="get" action="index.php">
			<select name='kategor' class='kat'>
				<option
				<?php 
				if (isset($_GET['kategor'])) {
					if ($_GET['kategor']=="Все"){
						echo "selected";
					}
					} 
				?>
				>Все</option>
				<option
				<?php 
				if (isset($_GET['kategor'])) {
					if ($_GET['kategor']=="Кроссовки"){
						echo "selected";
					}
					} 
				?>>Кроссовки</option>
				<option
				<?php 
				if (isset($_GET['kategor'])) {
					if ($_GET['kategor']=="Сумки"){
						echo "selected";
					}
					} 
				?>>Сумки</option>
				<option
				<?php 
				if (isset($_GET['kategor'])) {
					if ($_GET['kategor']=="Футболки"){
						echo "selected";
					}
					} 
				?>>Футболки</option>
			</select>
			<input type="submit" value="Применить">
		</form>
	</div>
	<div class='block3'>
		<form action="2.php" method="get">
			<?php
			foreach ($tovar as $kat => $m) {
				$i = 1;
				foreach ($m as $thing => $items) {
					if (isset($_GET['kategor'])) {
						if ($_GET['kategor']==$kat or $_GET['kategor']=='Все'){
							echo "<div class='merch'>
										<img src='$items[1]'>
										<table>
											<tr>
												<td class='pr'>$items[0] </td>
												<td rowspan='2' class='buy'><select name='$thing'><option>0 шт.</option><option>1 шт.</option><option>2 шт.</option></select></td>
											</tr>
											<tr>
												<td class='nm'>$thing</td>
											</tr>
										</table>
									</div>";
							if ($i == 4){
								echo "<div style='clear: both;''></div>";
							}
						}
					} 
					else{
						echo "<div class='merch'>
										<img src='$items[1]'>
										<table>
											<tr>
												<td class='pr'>$items[0] </td>
												<td rowspan='2' class='buy'><select name='$thing'><option>0 шт.</option><option>1 шт.</option><option>2 шт.</option></select></td>
											</tr>
											<tr>
												<td class='nm'>$thing</td>
											</tr>
										</table>
									</div>";
							if ($i == 4){
								echo "<div style='clear: both;'></div>";
							}
					}
				}
			}
				
			?>
			<div style='clear: both';></div>
			<input class='tobuy' type="submit" value="Купить">
		</form>
	</div>
	<div style="height: 38px;"></div>
</body>
</html>