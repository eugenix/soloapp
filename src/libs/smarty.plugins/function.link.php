<?php
/**
 * Построение URL
 * 
 * Этот тег может быть общим для всех проектов, а может иметь специфичную реализацию
 * для каждого проекта, тогда его нужно перенести в каталог проекта /smarty.plugins
 *
 * PHP version 5
 *
 * @example
 * {link action=test id=435435 name=abc}
 * action/test/id/435435/name/abc
 *
 *
 * @package SmartyTag
 * @author   Eugene Kurbatov <ekur@i-loto.ru>
 */

/**
 * @param $params
 * @param $smarty
 *
 * @return string
 */
function smarty_function_link($params, $smarty)
{
	$str = "";
	foreach ($params as $k => $v)
	{
		$str .= "{$k}/{$v}/";
	}

	return $str;
}
?>
