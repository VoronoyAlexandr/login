<?php

class DataBase
{
    static public $PDOInstance;
    static protected $host = 'localhost';
    static protected $user = 'root';
    static protected $pwd = '';
    static protected $db = 'users';

    public static function connect()
    {
        if (empty(self::$PDOInstance)) {
            try {
                self::$PDOInstance = new PDO('mysql:dbname=' . self::$db . ';host=' . self::$host, self::$user, self::$pwd);
                return self::$PDOInstance;
            } catch (PDOException $exc) {
                echo "Проверить реквизиты!";
                file_put_contents('PDOErrors.txt', $exc->getMessage(), FILE_APPEND);
            }
        }
    }

    public function Query($l, $p)
    {

        $result = self::$PDOInstance->prepare("SELECT * FROM user WHERE login = :login AND password = :password");
        $result->bindParam(':login', $l);
        $result->bindParam(':password', $p);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

}

