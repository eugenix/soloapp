<?php
/**
 * Пример действия
 *
 * PHP version 5
 *
 * @package
 * @author  Andrey Filippov <afi@i-loto.ru>
 */

namespace App\Action;

use App\Application;
use Solo\Core\Action;
use Solo\Core\Request;
use Solo\Lib\Validator\Validator;
use Solo\Lib\Web\FormRestore;

class TestAction extends Action
{
	/**
	 * Выполнение действия
	 *
	 * @return void
	 */
	public function execute()
	{
		$val = new Validator();

		// проверяем текстовое поле
		$val->check(Request::get("text"), "Поле Text: ")
			->required(true, "обязательное")
			->minLength(3, "длина значения должна быть больше 3 символов");

		// проверям, выбрал ли чекбокс
		$val->check(Request::get("agree"))
			->required(true, "Не выбран agree");

		// В зависимости от результата валидации формы делаем редирект
		if (!$val->isValid())
		{
			FormRestore::saveData("upload_form");
			Application::getInstance()->redirectBack($val->getMessages());
		}
		else
			Application::getInstance()->redirect("/", "Действие успешно выполнено");


	}
}
?>
