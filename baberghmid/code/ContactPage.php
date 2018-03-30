<?php
class ContactPage extends Page {
            public static $db = array(
                'Intro' => 'Text'
            ); 
            public static $has_many = array(
                'Links' => 'Link'
            ); 
   
            private static $hide_ancestor = 'Page';

            public function getCMSFields() {
                $fields = parent::getCMSFields();
                $fields->addFieldToTab('Root.Main', UploadField::create("MainImage", "Main page image"), "Content");    
                $fields->addFieldToTab('Root.Main', new TextField("Intro", "Main page intro text"), "Content");  

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

                $gridField = new GridField("Links", "Do it online:", $this->Links(), $gridFieldBoxConfig);
                $fields->addFieldToTab("Root.DoItOnline", $gridField);                
                
                return $fields; 
            }     	

}

class ContactPage_Controller extends Page_Controller {

	
}
