<?php
if ($asyncRequest) {
    require_once '../core/IConfigCore.php';
} else {
    require_once './core/IConfigCore.php';
}
class Connection implements IConfigCore
{
    private static $instance = null;
    public static $conn;
    private function __construct()
    {
        define(
            'DSN',
            sprintf(
                '%s:dbname=%s;host=%s',
                self::DRIVER,
                self::DATABASE,
                self::HOST
            )
        );
        try {
            self::$conn = new PDO(DSN, self::USER, self::PASS);
        } catch (Exception $ex) {
            var_dump('Error: ' . $ex);
        }
    }
    public static function build()
    {
        if (self::$instance == null) {
            self::$instance = new Connection();
        }
        return self::$instance;
    }
    public function connect()
    {
        return self::$conn;
    }
    public function close()
    {
        self::$conn = null;
    }
}
/*if ($asyncRequest) {
    require_once '../core/configCore.php';
} else {
    require_once './core/configCore.php';
}
class Connection {
    protected function connectar() {

    }
}*/
?>
