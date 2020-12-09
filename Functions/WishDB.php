<?php

class WishDB extends mysqli {
    
    // single instance of self shared among all instances
    private static $instance = null;

    // db connection config vars
    private $user = "root";
    private $pass = "root";
    private $dbName = "FUN";
    private $dbHost = "localhost";
    
    //This method must be static, and must return an instance of the object if the object does not already exist.
    public static function getInstance() {
        if (!self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    // The clone and wakeup methods prevents external instantiation of copies of the Singleton class,
    // thus eliminating the possibility of duplicate objects.
    public function __clone() {
        trigger_error('Clone is not allowed.', E_USER_ERROR);
    }

    public function __wakeup() {
        trigger_error('Deserializing is not allowed.', E_USER_ERROR);
    }

    // public constructor
    public function __construct() {
        parent::__construct($this->dbHost, $this->user, $this->pass, $this->dbName);
        if (mysqli_connect_error()) {
            exit('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }
        parent::set_charset('utf-8');
    }
    
    // verify credentials
    public function verify_credentials($name, $password) {
        $name = $this->real_escape_string($name);
        $password = $this->real_escape_string($password);
        $result = $this->query("SELECT 1 FROM user where name = '".$name."' AND password = '".$password."'");
        return $result->data_seek(0);
        mysqli_free_result($result);
    }
    
    // create credentials
    public function create_credentials($name, $password) {
        $name = $this->real_escape_string($name);
        $password = $this->real_escape_string($password);
        $result = $this->query("INSERT INTO user (name, password) VALUES ('".$name."', '".$password."')");
        if (!$result) {
            die("Cannot Create Account");
        }
    }
    
    // reset primary key
    public function reset_key() {
        $result = $this->query("ALTER TABLE user AUTO_INCREMENT = 1");
        if (!$result) {
            die ("Not Successful alter");
        }
    }
    
    // get user's power
    public function get_user_power($user) {
        $user = $this->real_escape_string($user);
        $result = $this->query("SELECT power FROM user where name = '".$user."'");
        $row = $result->fetch_array(MYSQLI_NUM);
        if (!$result) {
            die ("Not Successful");
        } else {
            return $row[0];
        }
        mysqli_free_result($result);
    }
    
    // get admin
    public function get_admin() {
        $query = "SELECT name, power FROM user";
        return $this->query($query);
    }
    
}

?>

