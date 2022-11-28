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
		<div class='korz'>Корзина</div>
	</div>
	<div class='block3'>
		<?php
			$i = 0;
			$sum = 0;
			foreach ($_GET as $t => $kol) {
				$t = str_replace('_', ' ', $t);
				if ($kol > 0){
					foreach ($tovar as $kat => $m){
						if (isset($m[$t])){
							$pr = $m[$t][0];
							$pr = str_replace(' ', '', $pr);
							$a = $t . ' ' . $kol;
							$b = ($pr * $kol);
							$sum += $b;
							$b = substr($b, 0, -3) . " " . substr($b, -3) . " " . "₽";
							if ($i % 2 == 0){
								echo "
									<table class='gr'>
										<tr>
											<td class='name'>$a</div>
											<td class='price'>$b</div>
										</tr>
									</table>
								";
							}
							else{
								echo "
									<table class='wh'>
										<tr>
											<td class='name'>$a</div>
											<td class='price'>$b</div>
										</tr>
									</table>
								";
							}
							$i++;
							
						}
					}
				}
				
			}
			if ($i == 0){
				echo "<div class='empty'>Пусто</div>";
			}
		?>
		<div class='sum'>
			<div class='zakaz'>Сумма заказа</div>
				<table>
					<tr>
						<td class='opl'>К оплате</td>
						<td class='itog'>
						<?php 
						$sum = substr($sum, 0, -3) . " " . substr($sum, -3) . " " . "₽";
						echo "$sum";
						?>
						</td>
					</tr>
				</table>				
				<input type="submit" class='b' value="Купить"></input>		
		</div>	
	</div>
	<div style="height: 2000px"></div>
</body>
</html>