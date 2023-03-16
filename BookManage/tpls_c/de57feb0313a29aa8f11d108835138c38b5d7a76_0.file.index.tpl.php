<?php
/* Smarty version 4.0.0, created on 2022-02-28 14:07:44
  from '/home/flybeta/dev/code/php/MyPHPDemo/BookManage/tpls/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_621c66b061d100_01436109',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'de57feb0313a29aa8f11d108835138c38b5d7a76' => 
    array (
      0 => '/home/flybeta/dev/code/php/MyPHPDemo/BookManage/tpls/index.tpl',
      1 => 1643003108,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_621c66b061d100_01436109 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2000261093621c66b061b635_18582758', "title");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layout.tpl');
}
/* {block "title"} */
class Block_2000261093621c66b061b635_18582758 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_2000261093621c66b061b635_18582758',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
首页<?php
}
}
/* {/block "title"} */
}
