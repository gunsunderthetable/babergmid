<?php
class HomePage extends Page {

            public static $db = array(
                "NumberOfNewsItems" => "Text", 
                "NumberOfFeatureItems" => "Text"             
            );
            public static $has_many = array(
                "Boxes" => "Box",
                "Links" => "Link"
            );  
            public static $defaults = array(
                "NumberOfNewsItems" => '3',
                "NumberOfFeatureItems" => '3'
            );

            public function getCMSFields() {
              $fields = parent::getCMSFields();
              $fields->removeFieldFromTab('Root.Main', "TopTask");
              $fields->removeFieldFromTab('Root.Main', "ShowChildren");
              $fields->addFieldsToTab('Root.NewsFeatures',new TextField("NumberOfNewsItems","Number of news items"));
              $fields->addFieldsToTab('Root.NewsFeatures',new TextField("NumberOfFeatureItems","Number of features"));
              
              $gridFieldBoxConfig = GridFieldConfig::create()->addComponents(
                new GridFieldSortableRows('SortOrder'),                         
                new GridFieldToolbarHeader(),
                new GridFieldAddNewButton('toolbar-header-right'),
                new GridFieldSortableHeader(),
                new GridFieldDataColumns(),
                new GridFieldPaginator(50),
                new GridFieldEditButton(),
                new GridFieldDeleteAction(),
                new GridFieldDetailForm()
              );

              $gridField = new GridField("Boxes", "Boxes for homepage:", $this->Boxes(), $gridFieldBoxConfig);
              $fields->addFieldToTab("Root.Boxes", $gridField);

              $gridFieldBoxConfig = GridFieldConfig::create()->addComponents(
                new GridFieldSortableRows('SortOrder'),                         
                new GridFieldToolbarHeader(),
                new GridFieldAddNewButton('toolbar-header-right'),
                new GridFieldSortableHeader(),
                new GridFieldDataColumns(),
                new GridFieldPaginator(50),
                new GridFieldEditButton(),
                new GridFieldDeleteAction(),
                new GridFieldDetailForm()
              );

              $gridField = new GridField("Links", "Quick Links:", $this->Links(), $gridFieldBoxConfig);
              $fields->addFieldToTab("Root.QuickLinks", $gridField);                  
              return $fields;
            }  

            public function getTopTaskBoxes() {
                $boxes = Box::get()->filter(array('TopTask' => true,'HomePageID' => $this->ID)); 
                return $boxes;               
            }
            public function getTheOtherBoxes() {
                $boxes = Box::get()->filter(array('TopTask' => false,'HomePageID' => $this->ID)); 
                return $boxes;                   
            }
            public function getFeatures($num=3) {
                 $num=$this->NumberOfFeatureItems;
                 $holder = FeatureHolder::get()->First();
                 return ($holder) ? FeaturePage::get()->filter('ParentID', $holder->ID)->limit($num) : false;
                 
            }
            
            public function getFeatureHolder() {
                 $holder = FeatureHolder::get()->First();
                 return $holder;
            }
            
            public function getNews($num=3) {
                 $num=$this->NumberOfNewsItems;
                
                 if ($holder = BlogHolder::get()->First()) {
                     return ($holder) ? BlogEntry::get()->filter('ParentID', $holder->ID)->sort('Date','DESC')->limit($num) : false;
                 }
            }
            
            public function getNewsHolder() {
                 $holder = BlogHolder::get()->First();
                 return $holder;
            }            

}

class HomePage_Controller extends Page_Controller {
	
}
