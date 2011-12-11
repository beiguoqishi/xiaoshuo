<?php
/**
 * Created by JetBrains PhpStorm.
 * User: liupengtao
 * Date: 11-12-5
 * Time: ÏÂÎç2:30
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
show($smarty, "xs/index.tpl", $arr);

function show($smarty, $path, $root){
    $smarty->assign("root", $root);
    $smarty->display($path);
}
?>