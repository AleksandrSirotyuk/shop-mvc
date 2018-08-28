<?php
class Router{
	private $routes;
	public function __construct(){
		$routesPath = ROOT.'/config/routes.php';
		$this->routes = include($routesPath);
	}

	/* 
		Returns request string
		$return string
	*/
	private function getUri(){
			if (!empty($_SERVER['REQUEST_URI']))
				$uri = trim($_SERVER['REQUEST_URI'], '/');
			return $uri;
	}
	public function run(){
		// Получить строку запроса
		$uri = $this->getUri();
		//echo $uri;

		// Проверить наличие такого запроса в файле routes.php
		foreach ($this->routes as $uriPattern => $path) {
			//echo "<br>$uriPattern -> $path";
			if (preg_match("~^$uriPattern$~", $uri)){
				// Внутренний путь из внешнего согласно правилу
				$internalRoute = preg_replace("~^$uriPattern$~", $path, $uri);
				/*echo $internalRoute;
				echo '<br/>';*/
				// Если есть совпадение, то определить какой контроллер и action обрабатывает запрос
				$segments = explode('/', $internalRoute);
				$controllerName = array_shift($segments).'Controller';
				$controllerName = ucfirst($controllerName);
				
				$actionName = 'action'.ucfirst(array_shift($segments));
				
				/*echo '<br>Класс: '.$controllerName;
				echo '<br>Метод: '.$actionName;
				echo '<br/>';*/
				$parameters = $segments;
				//print_r($parameters);
				// Подключить файл класса-контроллера
				$controllerFile = ROOT. "\controllers" .'\\' . $controllerName . ".php";
				if (file_exists($controllerFile)){
					include_once($controllerFile);
				}
				// Создать объект и вызвать метод (action)
				$controllerObject = new $controllerName;
				$result = call_user_func_array(array($controllerObject, $actionName), $parameters);
				if ($result != null)
					break;
			}
		}
	}
}
?>