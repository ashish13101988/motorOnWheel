<?php

    class Pagination{

        public $baseUrl        = '';
        public $totalRows      = ''; 
        public $perPage        =  2; 
        public $currentPage    =  0;
        public $limits         =  0;
        public $firstLink      = '&lsaquo; First'; 
        public $nextLink       = '&gt;'; 
        public $prevLink       = '&lt;'; 
        public $lastLink       = 'Last &rsaquo;'; 
        
       
        public function __construct($params = array()){
            if (count($params) > 0){ 
                $this->initialize($params);         
            } 
            $this->createLinks();
        }
       
        public function initialize($params = array()){
            if(count($params)>0):
                foreach($params as $key => $val):
                    if(isset($this->$key)):
                       $this->$key = $val;
                    endif;
                endforeach;
            endif;
        }
        
        public function createLinks(){
            
            // If total number of rows is zero, do not need to continue 
            if ($this->totalRows == 0 || $this->perPage == 0):
                return ''; 
            endif; 
            $totalPages = ceil($this->totalRows / $this->perPage);
            $currentOffset = $totalPages-$this->perPage;

            //if total number of pages less than 2 no need to continue;
            if($totalPages < 2):
                return '';
            endif;
            
            if (!is_numeric($this->currentPage)):
                 $this->currentPage = 0; 
            endif;
        
            //previous link
           

        echo "<nav aria-label='Page navigation example'>
                <ul class='pagination justify-content-center'>
                    <li class='page-item '>
                        <a class='page-link' data-index=1 href='{$this->baseUrl}page=1'>
                            {$this->firstLink}
                        </a>
                    </li>
                    <li class='page-item '>";

                        if($this->currentPage > 1 ){
                        $this->currentPage =  $this->currentPage - 1;
                            echo "<a class='page-link ' data-index='$this->currentPage' href={$this->baseUrl}page={$this->currentPage}>{$this->prevLink}</a>
                    </li>";
                        $this->currentPage =  $this->currentPage +1;
                    }

                     

        for($i = 1; $i <= $totalPages; $i++):
                    $active = '';
                if($i == $this->currentPage): $active = 'active';endif;
            echo "<li class='page-item {$active}'><a class='page-link' data-index='$i' href={$this->baseUrl}page=$i>$i</a></li>";
        endfor;

                  
        echo "<li class='page-item'>";
             if($this->currentPage < $totalPages){
                       $this->currentPage =  $this->currentPage + 1;
                        echo "<a class='page-link' data-index='$this->currentPage' href={$this->baseUrl}page={$this->currentPage}>{$this->nextLink}
                        </a>";
                        $this->currentPage =  $this->currentPage - 1;
                    }
        echo  "</li>
                <li class='page-item '>
                    <a class='page-link' data-index='$totalPages' href={$this->baseUrl}page=$totalPages>{$this->lastLink}
                    </a>
                </li>
            </ul>
        </nav>"; 
                       

    
   
                           

           


 
           
        }

    
       
       


    }

?>