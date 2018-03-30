<?php

class SiteConfigExtension extends DataExtension {
    private static $db = array(
     
        'FooterLinks' => 'Text',
        'HeaderLinks' => 'Text',
        'CommunityEnablingHeader' => 'Text',
        'TaglineExtra' => 'Text',
        'SearchText' => 'Text',
        'LinkedInLink' => 'Text',
        'TwitterLink' => 'Text',
        'FacebookLink' => 'Text',
        'YouTubeLink' => 'Text',
        'HTMLHeaderSnippet' => 'HTMLText',
        'GoogleAnalyticsAccountCode' => 'Text'        
    );
    
    private static $has_one = array(
        'Favicon' => 'File'
    );

    private static $has_many = array(
        'Boxes' => 'Box'
    );


    public function updateCMSFields(FieldList $fields)  { 
        $fields->addFieldToTab('Root.Main', new TextField('GoogleAnalyticsAccountCode', 'Google Analytics account code'),'Theme');
        $fields->addFieldToTab('Root.SocialMedia', new TextField('LinkedInLink', 'link to LinkedIn (include http)'));
        $fields->addFieldToTab('Root.SocialMedia', new TextField('TwitterLink', 'link to Twitter (include http)'));
        $fields->addFieldToTab('Root.SocialMedia', new TextField('FacebookLink', 'link to Facebook (include http)'));
        $fields->addFieldToTab('Root.SocialMedia', new TextField('YouTubeLink', 'link to YouTube (include http)'));
        $fields->addFieldToTab('Root.HTML', new TextAreaField('HTMLHeaderSnippet', 'HTML to include in the Header of the site'));

        $fields->addFieldToTab('Root.Footer', new TextareaField('FooterLinks', 'Footer links - one link per line. The format is: Page or external web address&lt;space&gt;Text to use as the link<br>For example - /about-us About our organisation <br>or http://www.google.co.uk Google'));
        $fields->addFieldToTab('Root.Header', new TextareaField('HeaderLinks', 'Header links - one link per line. The format is: Page or external web address&lt;space&gt;Text to use as the link<br>For example - /about-us About our organisation <br>or http://www.google.co.uk Google'));
       
        $boxConfig = GridFieldConfig::create()->addComponents(
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

        $gridField = new GridField("Boxes", "Boxes", $this->owner->Boxes(), $boxConfig);
        $fields->addFieldToTab("Root.HeaderBoxes", $gridField); 


    }     

}
