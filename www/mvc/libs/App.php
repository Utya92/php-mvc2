<?php

class App {
    public function __construct() {
        if (isset($_GET['url'])) {
            $url = explode('/', rtrim($_GET['url'], '/'));//получаем введённый нами урл с удаленным слешем и разбитой строкой Array ( [0] => catalog [2] => bbb)
        } else {
            $url[0] = 'index'; // если урл mvc/ будет пустым после слеша то автоматом будет грузить индекс
        }

        $file_name = 'controllers/'.$url[0].'.php';
        if (file_exists($file_name)) {
            //подключение контроллера
            require_once $file_name;
            $controller = new $url[0];//catalog
            //вызов метода из подключенного контроллера, который находится во втором эелементе массива(в первом находится имя контроллера на 0вом индексе)
            if (isset($url[1])) {
                if (method_exists($controller, $url[1])) {
                    //передача параметров в метод
                    if (isset($url[2])) {
                        $controller->{$url[1]}($url[2]);//вызов контроллер-метод-параметры (все данные из массива)
                    } else {
                        $controller->{$url[1]}(); //если метод существует вызываем контрллер и на нем метод() обернутый в {} дабы он не определялся как строка
                    }
                } else {
                    echo "method doesnt exist";
                }
            }else{
                $controller->index();
            }

        } else {
            echo "error file doesnt exist";
        }
    }
}