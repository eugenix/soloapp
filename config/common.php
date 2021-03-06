<?php
return array
(
	//
	// Компоненты приложения
	//
	"components" => array
	(
		//
		// Подключение к базе данных
		//
		"db" => array
		(
			"@class" => "Solo\\Core\\DB\\PDOAdapter",

			// строка подлючения
			"dsn" => "mysql:host=localhost;dbname=database",
			"username" => "root",
			"password" => "password",
			"isDebug" => true,

			// Список команд, выполняемых сразу после подключения к серверу
			"initialCommands" => array
			(
				"SET NAMES utf8",
			),

			// Настройки драйвера
			"driverOptions" => array()
		),

		"session.files" => array
		(
			"@class" => "Solo\\Core\\Web\\Session\\FileSessionProvider"
		),

		"clientscript" => array
		(
			"@class" => "Solo\\Lib\\Web\\ClientScript",
			"revision" => "0"
		),
	),

	//
	// Настройки приложения
	//
	"application" => array
	(
		// имя сессии
		"sessionname" => "application_name",

		// путь к файлу, где описываются правила маршрутизации
		"routing" => BASE_DIRECTORY . "/config/routing.php",

		// имя компонента приложения, реализующего провайдер сессии
		"session.provider" => "session.files",

		// будем ли отправлять заголовки запрещающие кэширование
		"nocache" => true,

		// кодировка
		"encoding" => "utf-8",

		// режим отладки
		"debug" => true,

		// путь к каталогу для временных файлов
		"directory.temp" => BASE_DIRECTORY."/var/tmp",

		// XML файл, который содержит номер текущей ревизии
		//"file.revision" => BASE_DIRECTORY ."/version.xml",

		// Каталог, где хранятся шаблоны для
		// макетов страниц Layouts (относительно каталога приложения)
		"directory.layouts" => BASE_DIRECTORY ."/src/apps/App/templates/layouts",

		// Каталог, где хранятся шаблоны для
		// контролов (относительно каталога приложения)
		"directory.templates" => BASE_DIRECTORY ."/src/apps/App/templates",

		# Классы представлений для отображения ошибок приложения
		# Можно использовать один и тот же класс
		"error404class" => "\\App\\View\\Error404View",
		"errorClass" => "\\App\\View\\ErrorView",

		# Подключаем обработчики
		"handlers" => array(

			// Старт сессии
			"Solo\\Core\\Handler\\SessionHandler" => array(),
		)
	),


	//
	// Настройки шаблонизатора Smarty
	//
	"smarty" => array
	(
		// При каждом вызове РНР-приложения Smarty проверяет, изменился или нет текущий шаблон с момента
		// последней компиляции. Если шаблон изменился, он перекомпилируется. В случае, если шаблон еще не
		// был скомпилирован, его компиляция производится с игнорированием значения этого параметра.
		// По умолчанию эта переменная установлена в true. В момент, когда приложение начнет работать в реальных условиях
		// (шаблоны больше не будут изменяться), этап проверки компиляции становится ненужным.
		"compile.check" => true,


		// Активирует debugging console - окно браузера, содержащее информацию о подключенных шаблонах
		// и загруженных переменных для текущей страницы.
		"debugging" => false,

		// Сообщает Smarty, будет или нет кэшироваться вывод шаблонов
		// http://www.smarty.net/docsv2/ru/variable.caching.tpl
		"caching" => 0,

		// Указывает Smarty (пере)компилировать шаблоны при каждом вызове.
		// Этот параметр перекрывает действие $compile_check и по умолчанию не активирован
		"forceCompile" => false,


		//; Установка уровня ошибок, которые будут отображены. Соответствует уровням ошибок PHP
		"error.reporting" => E_ALL & ~E_NOTICE & ~E_STRICT,


		//; Путь к каталогу для скомпилированных шаблонов
		"compile.dir" => BASE_DIRECTORY . "/var/compile",


		// Каталог для хранения конфигурационных файлов, используемых в шаблонах.
		// По умолчанию установлено в "./configs", т.е. поиск каталога с конфигурационными файлами
		// будет производиться в том же каталоге, в котором выполняется скрипт
		"config.dir" => "",


		// Имя каталога, в котором хранится кэш шаблонов. По умолчанию установлено в "./cache".
		// Это означает, что поиск каталога с кэшем будет производиться в том же каталоге, в котором
		// выполняется скрипт. Вы также можете использовать собственную функцию-обработчик для управления
		// файлами кэша, которая будет игнорировать этот параметр
		"cache.dir" => BASE_DIRECTORY . "/var/cache",


		// Это директория (или директории), в которых Smarty будет искать необходимые ему плагины.
		// По умолчанию это поддиректория "plugins" директории куда установлен Smarty. Если вы укажете относительный путь,
		// Smarty будет в первую очередь искать относительно SMARTY_DIR, затем оносительно текущей рабочей директории
		// (cwd, current working directory), а затем относительно каждой директории в PHP-директиве include_path.
		// Если $plugins_dir является массивом директорий, Smarty будет искать ваш плагин в каждой директории плагинов
		// в том порядке, в котором они указаны.
		"user.plugins" => array(
			BASE_DIRECTORY . "/src/apps/App/smarty.plugins", // плагины, специфичные для этого проекта
			BASE_DIRECTORY . "/src/libs/smarty.plugins" // плагины, общие для всех проектов
		),

		//; Настройки безопасности Smarty. Рекомендуется значение TRUE
		"security" => true,

		// класс, реализующий настройки безопасности Smarty
		"securityClass" => "",// для примера, нужно создать "App\\SmartySecurity", see http://www.smarty.net/docs/en/advanced.features.tpl

		// опции безопасности, используются в том случае, если не задан "securityClass"
		// см. класс Smarty_Security
		"securityOptions" => array(
			"secure_dir" => array(BASE_DIRECTORY . "/src/apps/App/templates"),			
		),

		//; Левый разделитель тегов Smarty
		"leftDelimiter" => "{",

		//; Правый разделитель тегов Smarty
		"rightDelimiter" => "}",
		
		// подключение фильтров (см. документацию к методу setAutoloadFilters)
		"filters" => array()
	),

	//
	// Настройки логирования
	//
	"logger" => array
	(
		"logger.dir" => BASE_DIRECTORY . "/var/logs"
	)
);
?>
