<?php 
$error='<div><p style="color:red;">';

$noDisc=$error.'Дискриминант отрицательный, корней нет';
$noQad=$error.'Уравнение не квадратное';
$noViet=$error.'В указанном диапазоне корней нет';
$NoData=$error.'Введите коэффициенты уравнения!';
$NoInterval=$error.'Интервалне НЕ задан!</p>'; 
$WrongInterval=$error.'<p>>Введен недопустимый интервал</p>';

$range='';

	//проверка заполнения
	if (isset($_POST['a']) &&isset($_POST['b']) && isset($_POST['c'])){
		if ((is_numeric($_POST['a'])) && (is_numeric($_POST['b'])) && (is_numeric($_POST['c']))){
			$a =(float)$_POST['a'];
			$b =(float)$_POST['b'];
			$c =(float)$_POST['c'];
			if ($a!=0) {
				if (isset($_POST['checkViet'])){
					if ((isset($_POST['min'])) && (isset($_POST['max']))){
						if ((is_numeric($_POST['min'])) && (is_numeric($_POST['max']))){
							$min = (float)$_POST['min'];
							$max = (float)$_POST['max'];
							if ($min<=$max){
								for ($x1=$min;$x1<=$max;$x1++){
									for ($x2=$min;$x2<=$max;$x2++){		
										if ($x1 + $x2 == -$b/$a && $x1*$x2 == $c/$a){
											$range='<div>В диапозоне от: '.$min. ' до: '  .$max. '<div>';
											$alert='<div><p> КорНи по формуле Виета: <br> x1= '.$x1.'<br> x2= '.$x2.'</p></div>';
											break 2; //разобрать подробнее прерывание
										}
										$alert = $noViet;
									}
								}
							}else {$alert=$WrongInterval;}
						}else {$alert=$NoInterval;}
					}else {$alert=$NoInterval;}
				}else {$D=($b*$b)-(4*$a*$c);
					   if ($D>=0) {
						   $x1=(($b*-1)-sqrt($D))/(2*$a);
						   $x2=(($b*-1)+sqrt($D))/(2*$a);
						   $alert='<div><p> КорНи по формуле Дискириминанта: <br> x1= '.$x1.'<br> x2= '.$x2.'</p></div>';
					   }else { $alert = $noDisc;}
					  }			
			}else {$alert = $noQad;}
		}else { $alert = $NoData; }
	}else {$alert = $NoData;}		
	echo $range;
	echo $alert;
	
?>