<?php

class OoAZPage extends Page{

        function canDelete($Member = null){
            if(permission::check('SUPERUSER')){
                return true;
            }else{
                return false;
            }
        }		

}

class OoAZPage_Controller extends Page_Controller{

    public function AzContent() {
         if ($searchLetter=$this->getRequest()->getVar('SearchLetter')) {
            // 
        }  else {
            // default to a
            $searchLetter = 'a';
        }

        $fetch = new RestfulService(
            'https://api.openobjects.com/rest/v1/suffolkatoz/records'                        
        );

        $query = '(showon:waveney) AND titleletter:'.$searchLetter;
        //$query = '(showon:suffolk OR showon:waveney OR showon:suffolkcoastal) AND titleletter:'.$searchLetter;

        $fetch->setQueryString(array(
            'key' => 'cfe205e7-de10-4b5b-89f1-262b154619f2',
            'sortField' => 'title',
            'sortType' => 'field', 
            'sortOrder' => '0',
            'query' => $query
        ));

        // perform the query
        $conn = $fetch->request();

        $msgs = $fetch->getValues($conn->getBody(), "record");

        // generate output for the template
        $output         = '';
        $previousHeader = '';
        $pageTitle=$this->Title;
        
        if($msgs) {

            $heading     = '';
            $old_title   = '';
            
            foreach($msgs as $msg) {
                // check if we have completed a section... if so output it..
                if ($msg->title != $old_title) {
                    if ($old_title='') {
                        $prefix='';
                    } else {
                        $prefix='</ul>';
                    }
                    $heading = $prefix.'<h4>'.$msg->title.'</h4><ul class="sortable">';
                    $output.= $heading;
                    $old_title=$msg->title;
                } 
                if (!$msg->synonym_service_tag_title) {
                    $output.= '<li><a href="'.$msg->url.'">'.$msg->entry_title.'</a></li>';
                }  else {
                    //if this is a synonym line then...
                    $output.= '<li><a href="'.$this->Link().'/?SearchLetter='.substr($msg->synonym_service_tag_title,0,1).'">See '.$msg->synonym_service_tag_title.'</a> </li>';
                }

            }

        }                 
        return $output;                
     }     


}
