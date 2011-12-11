<?php
/**
 * Created by JetBrains PhpStorm.
 * User: liupengtao
 * Date: 11-12-9
 * Time: ÏÂÎç8:09
 * To change this template use File | Settings | File Templates.
 */
require_once(getcwd() . DIRECTORY_SEPARATOR . "smarty/Smarty.class.php");
$smarty = new Smarty();
$smarty->left_delimiter = '<%';
$smarty->right_delimiter = '%>';
$smarty->display('test.tpl');