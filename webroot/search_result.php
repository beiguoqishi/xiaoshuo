<?php
/**
 * Created by JetBrains PhpStorm.
 * User: liupengtao
 * Date: 11-12-11
 * Time: ÉÏÎç10:39
 * To change this template use File | Settings | File Templates.
 */
date_default_timezone_set('PRC');
global $smarty;
require_once(getcwd() . DIRECTORY_SEPARATOR . "smarty/Smarty.class.php");
$smarty = new Smarty();
$smarty->left_delimiter = '<%';
$smarty->right_delimiter = '%>';
$smarty->template_dir = 'template';
//$smarty->display("xs/index.tpl");
require("data/data.php");
show($smarty, "xs/search_result_index.tpl", $arr);

function show($smarty, $path, $root){
    $smarty->assign("root", $root);
    $smarty->display($path);
}
?>