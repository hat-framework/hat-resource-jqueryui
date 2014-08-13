<?
require_once '../../../../init.php';
require_once 'acModel.php';
$model = new acModel();
$_REQUEST['campo'] = explode("-",$_REQUEST['campo']);
$array = $model->complete($_REQUEST['model'], $_REQUEST['campo'], $_REQUEST['q'], 10);
foreach ($array as $var){
    echo $var['id']."|".$var['name']."\n";
}

?>