<?php
/**
 * Пример компонента
 *
 * PHP version 5
 *
 * @package
 * @author  Andrey Filippov <afi@i-loto.ru>
 */

namespace App\View\Component;

use App\View\BaseView;
use Solo\Core\UI\IComponent;

class TestComponentView extends BaseView implements IComponent
{
	/**
	 * Какое-то значение
	 *
	 * @var string
	 */
	public $compValue = null;

	/**
	 * Получение данных для шаблона
	 *
	 * @return void
	 */
	public function render()
	{
		$this->compValue = "Это значение определено как публичное свойство TestComponentView";
	}
}
?>
