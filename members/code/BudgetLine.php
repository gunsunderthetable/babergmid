<?php
class BudgetLine extends DataObject {
    private static $db = array(
        'SortOrder' => 'Int',
        'Organisation' => 'Text',
        'Project' => 'Text',
        'Amount' => 'Text'
    );
    
    private static $has_one = array(
        'CouncillorPage' => 'CouncillorPage',
        'FinancialYear' => 'FinancialYear'
    );
    
    public function getCMSFields(){
        $yearField=DropdownField::create('FinancialYearID', 'FinancialYear', FinancialYear::get()->map('ID', 'Name'));
        $yearField->setEmptyString('Select a year');        
        return new FieldList(
                $yearField,
                new TextField('Organisation', 'Organisation'),
                new TextField('Project', 'Project'),
                new TextField('Amount','Amount')
        );
    }
    public function getNiceBudgetYear() {
        $finYear = FinancialYear::get()->byID($this->FinancialYearID);
        return $finYear->Name;
        return count($finYear);
    }
    
}