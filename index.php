
<!DOCTYPE html>
<html>
<head>
    <title>Стандартные функции</title>
</head>
<body>
<?php
include_once "function.php"; // подключаем файл с функцией
//$size = get_filesize ($file); 
$files = scandir('img/');
foreach($files as $file){
    if($file != '.' || $file != '..'){
        $ext = array('jpg', 'gif', 'png');
        $file1 = explode(".", $file);
        if(in_array($file1[1], $ext)){
            $file1 = 'img/'.$file;
            $size = get_filesize ($file1);
            $date = date ("F d Y H:i:s.", filemtime($file1));
            $list[] = array($file, $size,  $date);
            $fp = fopen('file.csv', 'w');
            foreach ($list as $fields) {
                fputcsv($fp, $fields);
            }
            fclose($fp);
        }
    }
}
$row = 1;
if (($handle = fopen("file.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo "<br />";
        //echo "<p> $num полей в строке $row: <br /></p>\n";
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo  $data[$c] . "<br />\n";
        }//echo $data[0] ."<br />";
        $d= $data[0];
        $file1 ='img/'.$d;

        echo "<a href=\"$file1\">$d смотреть файл</a>" . "<br />" ;
    }
    fclose($handle);
}
?>
</body>
</html>