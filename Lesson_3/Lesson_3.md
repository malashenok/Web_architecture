В следующем методе авторизации 

```php
    public function actionLogin() {

        $this->request = new Request();

        $login = $this->request->getParams()['login'];
        $pass = $this->request->getParams()['pass'];
        $save = $this->request->getParams()['save'];

        if ((new UserRepository())->auth($login, $pass, $save)) {
            header("Location: /news");
        } else {
            die("Неверный логин или пароль<br> Вы можете продолжить как <a href='/news'>Guest</a>");
        }
    }
```


есть следующие антипаттерны
"Слепая вера" 

```php
        $login = $this->request->getParams()['login'];
        $pass = $this->request->getParams()['pass'];
        $save = $this->request->getParams()['save'];
```

данные полученные из формы не проверяются, в данном случае нужно дополнительно выполнять предварительную обработку входящих данных 
с помощью одного из популярных классов для фильтрации данных.

и "Заглушка"

```php
        if ((new UserRepository())->auth($login, $pass, $save)) {
            header("Location: /news");
        } else {
            die("Неверный логин или пароль<br> Вы можете продолжить как <a href='/news'>Guest</a>");
        }
```

в данном случае, если авторизация не прошла, нужно выполнить переход на заранее определенную страницу.


В следующем коде

```php
	class Db
	{    
		private $config = [
			'driver' => 'mysql',
			'host' => 'localhost',
			'login' => 'root',
			'password' => '',
			'database' => 'shop',
			'charset' => 'utf8'
		];
```		
используется "Жёсткое кодирование", в данном случае нужно вынести параметры подключения в отдельный файл config.php