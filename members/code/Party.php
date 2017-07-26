<?php
class Party extends DataObject {
 
    private static $db = array(
      'Name' => 'Varchar'
    );
    private static $has_one = array(
       'CouncillorPage' => 'CouncillorPage'
    );   
    private static $searchable_fields = array(
      'Name'
    );
    private static $summary_fields = array (
      'Name'
    );
    public function getCMSFields(){
        return new FieldList(
                new TextField('Name', 'Name')
        );
    }    
}