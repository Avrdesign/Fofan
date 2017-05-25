
<?php
/**
 * Created by PhpStorm.
 * User: st
 * Date: 23.05.2017
 * Time: 20:08
 */

echo '<pre>';
//$ft = fopen("admin/DB/data.json","r");
//while(!feof($ft)){
//    $buffer = fgets($ft);
//    echo $buffer;
//}
//
//fclose($ft);


$out = fopen('admin/DB/data.csv', 'a');
fputcsv($out, array('this','is some', 'csv "stuff", you know.'));
fclose($out);

echo '</pre>';

