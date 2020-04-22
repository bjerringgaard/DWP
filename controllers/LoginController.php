<?php
class LoginController{

    private $DBCon;
    public function __construct()
    {
        session_start();
        $this->DBCon = new DBController();

    }
    public static function redirect_to($location){
        header("Location: {$location}");
        exit;
    }
    public static function logged_in(){
        return isset($_SESSION['user_id']);
    }

    public static function confirm_logged_in(){
        if (!self::logged_in()){
            self::redirect_to("login.php");
        }
    }

    public function logMeIn($userDBResult,$password){
            $found_user = $userDBResult[0];
            if(!password_verify($password, $found_user['UserPassword'])){
                MsgController::setMessage("User/Pass combination incorrect.");
                return 0;
            }else{
                $_SESSION['user_id'] = $found_user['UserID'];
                $_SESSION['user'] = $found_user['UserEmail'];
                return 1;
            }
        }
    public function logMeOut(){
        $_SESSION = array();
        if(isset($_COOKIE[session_name()])){
            setcookie(session_name(),"", time()-999);
        }
        session_destroy();
        self::redirect_to("login.php?logout=1");
    }

    public function createNewUser($username, $password){
        $username = trim(htmlspecialchars($username));
        $password = trim(htmlspecialchars($password));
        $iterations = ['cost' => 15];
        $hashed_password = password_hash($password, PASSWORD_BCRYPT, $iterations);
        if($this->DBCon->runNewUserWriteQuery($username,$hashed_password)==0)
        {
            return 0;
        }else{
            return 1;
        }
    }
}