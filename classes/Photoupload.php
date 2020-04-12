<?php

    class Photoupload{

        private $maxSize    = '';
        private $fileType   = array();
        private $uploadPath = '';
        private $fileName   = array();
        public  $response   = '';

        

        public function __construct($params = array()){
            if (count($params) > 0){ 
               $this->imgInit($params);         
            } 
            $this->imgValidation();
        }

        public function imgInit($params = array()){
            
            if(count($params)>0):
                foreach($params as $key => $val):
                    if(isset($this->$key)):
                       $this->$key = $val;
                    endif;
                endforeach;
            endif;
           
        }
 
        public function imgValidation(){
            $files = $this->fileName;
           
      
                for($i =0; $i < count($files['name']); $i++){
                        $maxSize = $this->maxSize;
                        $accepted = $this->fileType;
                        $dir = $this->uploadPath;
                      
                        $ext = pathinfo($files['name'][$i],PATHINFO_EXTENSION);
                        $ext = strtolower($ext);
                        
                    
                        if($files['size'][$i] > $maxSize || $files['size'][$i] <= 0){
                            
                            $status = array(
                                    'upload' => false,
                                    'msg'    => $files['name'][$i]." file larger than 1MB"   
                                );

                            return $this->response = json_encode($status);
                            exit;
                        
                        }elseif(!in_array($ext,$accepted)){
                            $status = array(
                                    'upload' => false,
                                    'msg'    => 'Only jpg, Jpeg and png file format allowed'   
                                );
                            return $this->response = json_encode($status);
                            exit;
                        }else{
                                $files['name'][$i] = uniqid().".".$ext;
                                
                                move_uploaded_file($files['tmp_name'][$i],$dir.$files['name'][$i]); 
                                $status = array(
                                    'upload' => true,
                                    'msg'    => 'file uploaded' ,
                                    'filesname' => $files['name'],
                                    'path'  => $dir,
                                );
                            }
                    }
                        
                    return $this->response = json_encode($status);
                    
        }

    }

?>