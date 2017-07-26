<?php
	class Link extends DataObject{
		
            public static $db = array(
                'Title' => 'Varchar(200)',
                'ExternalLink' => 'Text',
                'SortOrder' => 'Int'
            );
            
            public static $default_sort='SortOrder';
            
            public static $has_one = array(
                'ContentPage' => 'ContentPage',
                'HomePage' => 'HomePage',
                'LinkPage' => 'SiteTree'
            );		

            public function getCMSFields(){
                return new FieldList(
                        new TextField('Title', 'Link title'),
                        new TreeDropdownField("LinkPageID", "Choose a page to link to", "SiteTree"),
                        new TextField('ExternalLink','Use an external link with http://..this overrides the page link')

                );
            }
            
            
	}

        
