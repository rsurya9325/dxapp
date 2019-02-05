<?php

$db = getDB();

class resourceClass{

    public function userLogin($userid,$password){
		global $db;
        try{
           
            $pass = $password;
            $stmt = $db -> prepare("SELECT id FROM resources WHERE resource_id=:re_id AND resource_password=:re_password");
			
            $stmt -> bindParam("re_id", $userid,PDO::PARAM_STR);
            $stmt -> bindParam("re_password",$pass,PDO::PARAM_STR);
            $stmt -> execute();
			
            $count = $stmt -> rowCount();
			
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
			
			
			 if($data === false){
				 return false;
			 } else {
				 $_SESSION['uid'] = $data['id'];
                 return true;
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