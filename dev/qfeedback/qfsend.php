<?PHP

// имя файла, в который производиться запись POST или GET запроса
$filename = "data.txt"; 
// имя поля в POST или GET запросе
$name_var='data';

// проверка существования файла 
if (file_exists($filename)) { 
  // если файл существует - открываем его 
  $file = fopen($filename, "w+"); 
} else { 
  // если файл не существует - создадим его 
  $file = fopen($filename, "w+"); 
} 
// данные из поля $name_var в POST или GET запросе
//$text = print_r(json_decode($_POST[$name_var],true),true); 
$text = json_decode($_POST[$name_var],true); 
$mess=$text[0]['Сообщение'];
  $img = $text[1];
  #$img = str_replace('data:image/png;base64,', '', $img);
  #$img = str_replace(' ', '+', $img);
  #$data = base64_decode($img);
//$text = $_GET[$name_var]; 
//(раскомментируйте нужную строку)

// записываем строку в файл 
#fwrite($file, $text1); 
// закрываем файл 
#fclose($file); 

// ответ скрипта на запрос
//echo "The request was accepted"; 

$message='
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title></title>
<style>
  

</style>
</head>
<body>
<p>'.$mess.'</p><br><br>
<img src="'.$img.'">
';

// записываем строку в файл 
#fwrite($file, $img); 
// закрываем файл 
#fclose($file); 



$headers= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";

/* дополнительные шапки */
$headers .= "From: ME <test@test.com>\r\n";

/* и теперь отправим из */
//mail('t.motanin@demis.ru', 'Сообщение с сайта', $message, $headers);

/* save image if needit
define('UPLOAD_DIR', 'images/');
  $img = $text[1];
  $img = str_replace('data:image/png;base64,', '', $img);
  $img = str_replace(' ', '+', $img);
  $data = base64_decode($img);
  $file = UPLOAD_DIR . uniqid() . '.png';
  $success = file_put_contents($file, $data);
  print $success ? $file : 'Unable to save the file.';
*/
