<?php
class MemberSearchPage extends Page 
{
	
}
class MemberSearchPage_Controller extends Page_Controller 
{
	private static $allowed_actions = array(
		'MemberSearchForm',
		'results'
	);
	
	
	public function MemberSearchForm()
	{
            $wardField=DropdownField::create("Ward","Ward",$this->getWards());
            $wardField->setEmptyString('Select a ward');
            $partyField=DropdownField::create("Party","Party",$this->getParties());
            $partyField->setEmptyString('Select a party');
            $committeeField=DropdownField::create("Committee","Committee",$this->getCommittees());
            $committeeField->setEmptyString('Select a Committee');
            $fields = new FieldList(
                    $wardField,
                    $partyField,
                    $committeeField,
                    new TextField('Parish','Parish')
            );

            $actions = new FieldList(
                FormAction::create("results")->setTitle("Search")
            );

            $form = new Form($this, 'MemberSearchForm', $fields, $actions);
            return $form;  
	}

	public function results($data, Form $form) {
            
            
            $ward=$data['Ward'];
            $party=$data['Party'];
            $committee=$data['Committee'];
            $parish=$data['Parish'];
            
            $filter=array();
            $join=array();
            if ($ward) {
                $filter['WardID']=$ward;
            }
            if ($party) {
                $filter['PartyID']=$party;
            }
            if ($parish) {
                $filter['Parishes:PartialMatch']=$parish;
            }
            if ($committee) {
                //$join["CouncillorPage_Committees"]="\"CouncillorPageCommittees\".\"CouncillorPageID\" = \"CouncillorPage\".\"ID\"";
                $filter['CouncillorPage_Committees.CommitteeID']=$committee;
            }
            $results = CouncillorPage::get()->sort(array(
                'Surname'=>'ASC',
                'FirstName'=>'ASC'))->filter($filter)->leftjoin("CouncillorPage_Committees", "\"CouncillorPage_Committees\".\"CouncillorPageID\" = \"CouncillorPage\".\"ID\"");
            
//            if ($committee) {
//                $results->leftJoin("CouncillorPageCommittees", "\"CouncillorPageCommittees\".\"CouncillorPageID\" = \"CouncillorPage\".\"ID\"");
//                $results->filter('CouncillorPageCommittees.CommitteeID', $committee);
//            }
            $output=array(
                    'Title' => 'Search results',
                    'Results' => $results,
                    'Query' => 'Query is cttee = '.$committee
            );
            return $this->owner->customise($output)->renderWith(array('MemberSearchPage_results', 'Page'));
            

        }
	
        public function getWards() {
            if($wards = Ward::get()->sort('Name')) {
                return $wards->map('ID', 'Name', 'Please select a ward');
            } else {
                return array('no wards could be found');
            }
        }
        
        public function getParties() {
            if($parties = Party::get()->sort('Name')) {
                return $parties->map('ID', 'Name', 'Please select a party');
            } else {
                return array('no parties could be found');
            }
        }
        public function getCommittees() {
            if($committees = Committee::get()->sort('Name')) {
                return $committees->map('ID', 'Name', 'Please select a committee');
            } else {
                return array('no committees could be found');
            }
        }

}