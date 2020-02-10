<?php


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


function insertQuery($sql){
   global $db;
   
}

function escapeString($name){
   global $db;
   if(is_array($name)){
      foreach($name as $value){
         $db->real_escape_string($value);
      }
   }

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




/* function imgUpload($file,$carname){
      $fileSize   = $file['size'];
            $maxSize    = 1024*512;
            $fileAllowed = array('jpg','jpeg','png');
            if(empty($file['name'])):
                $error['name'] = 'empty feilds';
                $error['upload'] = 'false';
                return json_encode($error);
            else:
                $fileName  = $file['name'];
                $ext = pathinfo($fileName,PATHINFO_EXTENSION);
                $ext = strtolower($ext);
                    if(!in_array($ext, $fileAllowed)):
                        $error['name']= 'Only jpeg, png, jpg allowed';
                        $error['upload'] = false;
                        return json_encode($error);
                    elseif($fileSize > $maxSize || $fileSize <= 0 ):
                         $error['name'] = 'Only 512KB allowed';
                        $error['upload'] = false;
                        return json_encode($error);
                    else:
                        $changeFileName = strtolower($carname).'.'.$ext;
                        $upload = '../cars/logos/';
                        if(file_exists($upload.$changeFileName)):
                           unlink($upload.$changeFileName);
                        endif;
                        if( move_uploaded_file($file['tmp_name'],$upload.$changeFileName)):
                             $error['name'] = $changeFileName;
                             $error['upload'] = true;
                             return json_encode($error);
                        else:
                             $error['name'] ='something went wrong please try again';
                             $error['upload'] = false;
                             return json_encode($error);
                        endif;
                    endif;//ext checking if      
            endif; //empty if
} */

