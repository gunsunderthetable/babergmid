<?php
class Ward extends DataObject {
 
    private static $db = array(
      'Name' => 'Varchar'
    );
    private static $has_one = array(
       'CouncillorPage' => 'CouncillorPage'
    );
    static $searchable_fields = array(
      'Name'
    );
    static $summary_fields = array (
      'Name'
    );
    public function getCMSFields(){
        return new FieldList(
                new TextField('Name', 'Name')
        );
    }    
}