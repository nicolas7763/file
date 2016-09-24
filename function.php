<?php
// аргументов функции будет путь к файлу
function get_filesize($file)
{
    // идем файл
    if(!file_exists($file)) return "Файл  не найден";
   // теперь определяем размер файла в несколько шагов
  $filesize = filesize($file);
   // Если размер больше 1 Кб
   if($filesize > 1024)
   {
       $filesize = ($filesize/1024);
       // Если размер файла больше Килобайта
       // то лучше отобразить его в Мегабайтах. Пересчитываем в Мб
       if($filesize > 1024)
       {
            $filesize = ($filesize/1024);
           // А уж если файл больше 1 Мегабайта, то проверяем
           // Не больше ли он 1 Гигабайта
           if($filesize > 1024)
           {
               $filesize = ($filesize/1024);
               $filesize = round($filesize, 1);
               return $filesize." Gb";       
           }
           else
           {
               $filesize = round($filesize, 1);
               return $filesize." Mb";   
           }       
       }
       else
       {
           $filesize = round($filesize, 1);
           return $filesize." Kb";   
       }  
   }
   else
   {
       $filesize = round($filesize, 1);
       return $filesize." byte";   
   }
}
?>