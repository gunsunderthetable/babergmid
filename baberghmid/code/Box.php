<?php
	class Box extends DataObject{
		
            public static $db = array(
                'Title' => 'Varchar(200)',
                'ExternalLink' => 'Text',
                'SortOrder' => 'Int',
                'TopTask' => 'Boolean'

            );
            
            public static $default_sort='SortOrder';
            
            public static $has_one = array(
                'HomePage' => 'HomePage',
                'SiteConfig' => 'SiteConfig',
                'Icon' => 'Image',
                'LinkPage' => 'SiteTree'
            );		

            public function getCMSFields(){
                return new FieldList(
                        new TextField('Title', 'Box title'),
                        new UploadField('Icon', 'Icon image for the box'),
                        new TreeDropdownField("LinkPageID", "Choose a page to link to", "SiteTree"),
                        new TextField('ExternalLink','Use an external link with http://..this overrides the page link')

                );
            }
            
            
	}

        
