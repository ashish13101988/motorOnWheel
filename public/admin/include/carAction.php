<?php
   require_once('../../../resources/templates/config.php');

   //logo upload

    if(isset($_POST['logoUpload'])):
        $file = $_FILES['logo'];
        $carname = $db->real_escape_string($_POST['carname']);
        if(empty($carname) || empty($file['name'])){
            $addCar['status'] = 'Empty fields';
            echo json_encode($addCar);
            exit;
            
        } 
        $imgUploadStatus = ImgUpload($file,$carname);
        $imgUploadStatus = json_decode($imgUploadStatus);

       
        
        if($imgUploadStatus->upload){
            $carImgName =  $imgUploadStatus->name;
            $carname = strtolower($carname);
            $sql = "INSERT INTO `carbrands` (`brandname`,`logo`) VALUES('$carname','$carImgName')";
            
            $result =  $db->query($sql);
            
            if($result){
                $addCar['status'] = 'success';
                echo json_encode($addCar);
                exit;
            }

        }else{
                $addCar['status'] = $imgUploadStatus->name;
                echo json_encode($addCar);
                exit;
        }

    endif;//isset if
       
                       
    if(isset($_POST['bodytype'])){
        
        $file = $_FILES['bodyTypeImg'];
        
        $carname = $db->real_escape_string($_POST['bodytypename']); 
         if(empty($carname) || empty($file['name'])){
            $addCar['status'] = 'Empty fields';
            echo json_encode($addCar);
            exit;
           
        } 
        $imgUploadStatus = ImgUpload($file,$carname);
        $imgUploadStatus = json_decode($imgUploadStatus);
      
        if($imgUploadStatus->upload == true){
            $carImgName =  $imgUploadStatus->name;
            $carname = strtolower($carname);
            $sql = "INSERT INTO `bodytype` (`bodytype`,`bodyimg`) VALUES('$carname','$carImgName')";
            
            $result =  $db->query($sql);
            
            if($result){
                $addCar['status'] = 'success';
                echo json_encode($addCar);
                exit;
            }
        }else{
                $addCar['status'] = $imgUploadStatus->name;
                echo json_encode($addCar);
                exit;
        }
                      
}               






function ImgUpload($file,$carname){
            $fileSize   = $file['size'];
            $maxSize    = 1024*512;
            $fileAllowed = array('jpg','jpeg','png');
            if(empty($file['name'])):
                $error['name'] = 'empty fields';
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
            endif;

}

?>