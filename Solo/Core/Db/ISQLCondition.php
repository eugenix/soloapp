<?php
/**
 *
 *
 * PHP version 5
 *
 * @package
 * @author  Andrey Filippov <afi.work@gmail.com>
 */

namespace Solo\Core\Db;

interface ISQLCondition
{
	/**
	* Формирует SQL запрос
	*
	* @return string SQL запрос
	*/
	public function buildSQL();

	public function getParams();

}
?>
