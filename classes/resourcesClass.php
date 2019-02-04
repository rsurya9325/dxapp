<?php

class resourceClass{

    public function userLogin($userid,$password){
        try{
            $db = getDB();
            $pass = $password;
            $stmt = $db ->prepare("SELECT id FROM resources WHERE resource_id=:re_id AND resource_password=:re_password");
            $stmt -> bindParam("re_id",$userid,PDO::PARAM_STR);
            $stmt -> bindParam("re_password",$pass,PDO::PARAM_STR);
            $stmt -> execute();
            $count = $stmt -> rowCount();
            $data = $stmt -> fetch(PDO::FETCH_OBJ);
            $db = null;
            if($count > 0){
                $_SESSION['uid'] = $data -> id;
                return true;
            }
            else{
                return false;
            }

        }

        catch(PDOException $e){
            echo $e->getMessage();
        }
        


    }

public function userDetails($uid){
try{
$db = getDB();
$stmt = $db->prepare("SELECT * FROM resources WHERE id=:uid"); 
$stmt->bindParam("uid", $uid, PDO::PARAM_INT);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_OBJ); //User data
return $data;
}
catch(PDOException $e) {
echo '{"error":{"text":'. $e->getMessage() .'}}';
}
}

}

?>