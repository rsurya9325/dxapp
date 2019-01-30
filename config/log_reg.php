<?php 
class Registration{
    
    private $db;
    
    function __construct($DB_con){

        $this -> db = $DB_con;

    }

    public function register($fullname,$empid,$desgn,$dept,$uname,$pwd){

        try{
        $en_pwd = md5($pwd);

        $stmt = $this -> db ->prepare("INSERT INTO registration(username,upassword,fullname,designation,department,empid) VALUES (:uname,:upwd,:fullname,:desgn,:dept,:empid)");
        $stmt -> bindparam(":fullname",$fullname);
        $stmt -> bindparam(":empid",$empid);
        $stmt -> bindparam(":desgn",$desgn);
        $stmt -> bindparam(":dept",$dept);
        $stmt -> bindparam(":uname",$uname);
        $stmt -> bindparam(":upwd",$en_pwd);
        $stmt -> execute();

        return $stmt;
        }
        catch(PDOException $e){
            echo $e -> getMessage();
        }

    }

    public function adduser($fullname,$empid,$desgn,$dept,$uname,$pwd,$urole){

        try{
        $en_pwd = md5($pwd);
        $stmt = $this -> db ->prepare("INSERT INTO registration(username,upassword,fullname,designation,department,empid,urole) VALUES (:uname,:upwd,:fullname,:desgn,:dept,:empid,:urole)");
        $stmt -> bindparam(":fullname",$fullname);
        $stmt -> bindparam(":empid",$empid);
        $stmt -> bindparam(":desgn",$desgn);
        $stmt -> bindparam(":dept",$dept);
        $stmt -> bindparam(":uname",$uname);
        $stmt -> bindparam(":upwd",$en_pwd);
        $stmt -> bindparam(":urole",$urole);
        $stmt -> execute();

        return $stmt;
        }
        catch(PDOException $e){
            echo $e -> getMessage();
        }

    }

    public function login($usname,$uspwd){

        try{
        $de_pwd = md5($uspwd);    
        $stmt = $this -> db ->prepare("SELECT * FROM resources WHERE resource_id = :uname and resource_password = :uspwd ");
        $stmt -> execute(array(':uname' => $usname, ':uspwd' => $de_pwd));
        $loginuser = $stmt -> fetch(PDO::FETCH_ASSOC);
        
        if($stmt -> rowcount() > 0 ){

            $_SESSION['logged_user'] = $loginuser['id'];
           
            return true;

        }
        else{
            return false;
        }

        }
        catch(PDOException $e){
            echo $e -> getMessage();
        }

    }

    public function viewuser(){

        try{
            $stmt = $this -> db ->prepare("SELECT * FROM registration");
            $stmt -> execute();
            $viewuser = $stmt ->fetchAll(PDO::FETCH_ASSOC);
            return $viewuser;
        }
        catch(PDOException $e){
            echo $e -> getMessage();
        }
        

    }

    public function is_login(){
        if(isset($_SESSION['logged_user'])){
            return true;
        }
    }

    public function redirect($url){
        header("Location:$url");
    }
    public function logout(){
        session_destroy();
        unset($_SESSION['logged_user']);
        return true;
    }

}

?>