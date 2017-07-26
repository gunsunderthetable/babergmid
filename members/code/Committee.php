<?php
class Committee extends DataObject {
    private static $db = array(
      'Name' => 'Varchar'
    );
    private static $summary_fields = array (
        'Name'
    );
    private static $belongs_many_many = array(
        'CouncillorPages' => 'CouncillorPage'
    );
    public function getCMSFields(){
        return new FieldList(
                new TextField('Name', 'Name')
        );
    }
}
