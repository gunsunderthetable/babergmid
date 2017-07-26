<?php
class CouncillorPage extends Page {
    private static $db = array(
        'FirstName' => 'Varchar',
        'Surname' => 'Varchar',
        'MemberTitle' => 'Varchar',
        'Address1' => 'Varchar',
        'Address2' => 'Varchar',
        'Address3' => 'Varchar',
        'Address4' => 'Varchar',
        'Telephone' => 'Varchar',
        'Email' => 'Varchar',
        'Parishes' => 'Text',
        'IsCabinetMember' => 'Boolean',
        'Notes' => 'HTMLText'    
    );
    private static $has_one = array(
        'Party' => 'Party',
        'Ward' => 'Ward',
        'Portrait' => 'Image'
    );
    private static $has_many = array(
        "BudgetLines" => "BudgetLine"
    );
    private static $many_many = array(
        "Committees" => "Committee"
    );

    function getCMSFields(){

        $fields = parent::getCMSFields();
        $fields->removeFieldFromTab('Root.Main','MainImage');
        $wardField=DropdownField::create('WardID', 'Ward', Ward::get()->map('ID', 'Name'));
        $wardField->setEmptyString('Select a ward');
        $partyField=DropdownField::create('PartyID', 'Party', Party::get()->map('ID', 'Name'));
        $partyField->setEmptyString('Select a party');
        $fields->addFieldToTab('Root.MemberDetails', $wardField);
        $fields->addFieldToTab('Root.MemberDetails', $partyField);
        $fields->addFieldToTab('Root.Main', UploadField::create("Portrait", "Member portrait image"), "Content");    
        $fields->addFieldToTab('Root.MemberDetails', new CheckboxField('IsCabinetMember', 'Cabinet member',''));
        $fields->addFieldToTab('Root.MemberDetails', new TextField('MemberTitle', 'Title'));    
        $fields->addFieldToTab('Root.MemberDetails', new TextField('FirstName', 'First name'));
        $fields->addFieldToTab('Root.MemberDetails', new TextField('Surname', 'Surname'));                
        $fields->addFieldToTab('Root.MemberDetails', new TextField('Address1', 'Address line one'));
        $fields->addFieldToTab('Root.MemberDetails', new TextField('Address2', 'Address line two'));
        $fields->addFieldToTab('Root.MemberDetails', new TextField('Address3', 'Address line three'));
        $fields->addFieldToTab('Root.MemberDetails', new TextField('Address4', 'Address line four'));
        $fields->addFieldToTab('Root.MemberDetails', new TextField('Telephone', 'Telephone'));
        $fields->addFieldToTab('Root.MemberDetails', new TextField('Parishes', 'Parishes'));
        $fields->addFieldToTab('Root.MemberDetails', new TextField('Email', 'Email'));
        $fields->addFieldToTab('Root.MemberNotes', new HtmlEditorField('Notes', 'Notes'));

        $gridField = new GridField(
            'Committees',
            'Committees',
            $this->Committees(),
            GridFieldConfig_RelationEditor::create()
        );
        $fields->addFieldToTab('Root.Committees', $gridField);
        
        $gridFieldBoxConfig = GridFieldConfig::create()->addComponents(
            new GridFieldSortableRows('SortOrder'),                         
            new GridFieldToolbarHeader(),
            new GridFieldAddNewButton('toolbar-header-right'),
            new GridFieldSortableHeader(),
            new GridFieldDataColumns(),
            new GridFieldPaginator(10),
            new GridFieldEditButton(),
            new GridFieldDeleteAction(),
            new GridFieldDetailForm()
        );
        //pretty up the gridfield tabular display...
        $dataColumns = $gridFieldBoxConfig->getComponentByType('GridFieldDataColumns');
        $dataColumns->setDisplayFields(array(
            'Organisation' => 'Organisation',
            'Project'=> 'Project',
            'Amount' => 'Amount'
        ));
        
        $gridField = new GridField("BudgetLines", "Community enabling budget lines:", $this->BudgetLines(), $gridFieldBoxConfig);
        $fields->addFieldToTab("Root.CommunityEnabling", $gridField);            

        return $fields;
        }   
        
        public function getBudgetLinesByYear() {
            $lines=$this->BudgetLines();
            return $lines;
        }
        
        public function getGroupedYearsByYear() {
            return GroupedList::create(BudgetLine::get()->filter(array('CouncillorPageId'=>$this->ID))->sort('FinancialYearID','DESC'));
        }      
        
         

}

class CouncillorPage_Controller extends Page_Controller {

	
}