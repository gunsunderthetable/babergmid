<?php
class FinancialYear extends DataObject {
    private static $db = array(
      'Name' => 'Varchar'
    );
    private static $has_many = array(
       'BudgetLines' => 'BudgetLine'
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