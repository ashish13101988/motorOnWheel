<?php
spl_autoload_register(function ($className) {
    include($_SERVER['DOCUMENT_ROOT']."MOTORONWHEELS/classes/".$className.".php");
});

function url_encode($str){
   $str = serialize($str);
   $str = urlencode($str);
   return $str;
}

function url_decode($str){
   return unserialize(urldecode($str));;
}

function isLogIn(){
   if(!isset($_SESSION['id'])){
      header('location:login.php');
   }
}

function isAdmin(){
   if(!isset($_SESSION['id']) || $_SESSION['role'] != 'admin'){
      header('location:../login.php');
   }
}

function showOptions($array){
   foreach($array as $value){
      echo "<option value='$value'>".ucfirst($value)."</option>";
   }
}


function fetchResult($sql){
      global $db;
      $stmt = $db->prepare($sql);
      $stmt->execute();

      $result = $stmt->get_result();
      $rows = $result->fetch_all();
      return $rows;
}

function getResult($sql){
   global $db;
    $result = $db->query($sql);
    $rows =$result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}


function emptyFields($array){
    global $db;
   if(is_array($array)){
      foreach($array as $value){
        if(empty($value)){
         return true;
        }
      }
   }
}


function dateCreate($date){
  $original_date = $date;
  $timestamp = strtotime($original_date);

  $new_date = date("d-m-Y", $timestamp);

return $new_date; 
}
///date time format for sql query
function createTimeFormat($date){
   $date = date_create_from_format('m/d/Y', $date);
   return date_format($date, 'Y-m-d');
}


function getSingleView($sql,$id){
   global  $db;
   
   $stmt = $db->prepare($sql);
   $stmt->bind_param('i',$id);
   $stmt->execute();
   $result =  $stmt->get_result();
   $stmt->close();
   return $result->fetch_assoc();
   


}

 function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
   }

function createToken($len=25){
   $token = bin2hex(openssl_random_pseudo_bytes($len));
   return $token;
}

function userExist($email){
   global $db;
   $sql = "SELECT `email` FROM `users` WHERE `email` = ?";
         $stmt = $db->prepare($sql);
         $stmt->bind_param('s',$email);
         $stmt->execute();
         $result = $stmt->get_result();
         $stmt->close();
         if($result->num_rows > 0){
            return true;
         }else{
            return false;
         }
}



	
function isJson($string){
   return is_string($string) && is_array(json_decode($string, true)) && (json_last_error() == JSON_ERROR_NONE) ? true : false;
}
