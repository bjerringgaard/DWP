<?php /* We don't use this, but i'm too scared to delete it
class DBController
{
    private $connection;
    private static $instance;
    public $readResults;
    function __construct()
    {
        $dsn = 'mysql:host=' . Config::read('db.host') .
               ';dbname='    . Config::read('db.basename') .
                ';connect_timeout=15';
        // getting DB user from config
        $user = Config::read('db.user');
        // getting DB password from config
        $password = Config::read('db.password');

        $this->connection = new PDO($dsn, $user, $password);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            $object = __CLASS__;
            self::$instance = new $object;
        }
        return self::$instance;
    }

    public function runReadQuery($query)
    {
        try {
            $DBCon = DBController::getInstance();
            $stmt = $DBCon->connection->prepare($query);

            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_ASSOC);;

                while ($row = $stmt->fetch()) {
                $this->readResults[] = $row;
                }
                if (!empty($this->readResults)){}
                //return $this->readResults;
            }}catch (PDOException $exception){
            echo $exception->getMessage();
        }
    }
    public function runNewUserWriteQuery($username, $hashed_password){
        try {
            $DBCon = DBController::getInstance();
            $stmt = $DBCon->connection->prepare("INSERT INTO User (UserID, UserPassword) VALUES (?,?)");
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $hashed_password);
        if(!$stmt->execute())
        {
            return 0;
        }else{
            return 1;
        }
        }catch (PDOException $exception){
            echo $exception->getMessage();
        }
    }
} 