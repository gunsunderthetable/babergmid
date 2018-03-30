<?php
class Page extends SiteTree {

	private static $db = array(
            'HTMLHeaderSnippet' => 'HTMLText',
            'HTMLBodySnippet' => 'HTMLText',
            'ShowChildren' => 'Boolean',
            'TopTask' => 'Boolean'
	);
        
	private static $has_one = array(
            "MyWidgetArea" => "WidgetArea",
            'MainImage' => 'Image',
            'ContactPage' => 'SiteTree'
        );

        function canDelete($Member = null){
            if(permission::check('ADMIN')){
                return true;
            }else{
                return false;
            }
        }
        
        public function getCMSFields() {
            $fields = parent::getCMSFields();
            $fields->addFieldToTab('Root.Main', new CheckBoxField("ShowChildren", "Right hand nav will show this page's children if checked"),'Content');    
            // $fields->addFieldToTab('Root.Main', new CheckBoxField("TopTask", "Top task page"),'Content');    
           
            $fields->addFieldToTab('Root.Main', UploadField::create("MainImage", "Main page image"), "Content");    
            //$fields->addFieldToTab('Root.Main', new LiteralField("PageID", "<h3>Page id for this page is ".$this->ID."</h3>"), "Title");    
            $tree = new TreeDropdownField('ContactPageID','Contact Page', 'SiteTree');
            $fields->addFieldToTab("Root.Main", $tree, "Content");
            $fields->addFieldToTab("Root.Widgets", new WidgetAreaEditor("MyWidgetArea"));
            return $fields;
        }
        
        public function getTopLevelPage() {
            return $this->Level(1)->ClassName;
        }
        
        public function getNews($num=5) {
            $holder = BlogHolder::get()->First();
            return ($holder) ? BlogEntry::get()->filter('ParentID', $holder->ID)->limit($num) : false;
        }
        
        public function getSiteOoAZPage() {
            if ($AZPage = OoAZPage::get()) {
                $first = $AZPage->first();
                $AZPageLink = $first->Link();
                return $AZPageLink;                
            } else {
                return false;
            }

        }

        function getFooterLinks() {
            //return ContentController::current_site_config()->FooterLinks ? $this->parseRawLinks(ContentController::current_site_config()->FooterLinks) : '';
            $config = SiteConfig::current_site_config(); 
            if($footerLinks=$config->FooterLinks) {
                $set = new ArrayList();
                $f = explode("\n", $footerLinks);
                foreach ($f as $p) {
                    $firstSpace = strpos($p, " ");
                    $url = substr($p, 0, $firstSpace);
                    $linkText = substr($p, $firstSpace);

                    $data = new ArrayData(array(
                             'URL' => $url,
                             'LinkText' => htmlspecialchars($linkText)
                         )        
                    );        
                    $set->add($data);  
                }
                return $set;
            };
        }        
        function getHeaderLinks() {
            //return ContentController::current_site_config()->FooterLinks ? $this->parseRawLinks(ContentController::current_site_config()->FooterLinks) : '';
            $config = SiteConfig::current_site_config(); 
            if($headerLinks=$config->HeaderLinks) {
                $set = new ArrayList();
                $f = explode("\n", $headerLinks);
                foreach ($f as $p) {
                    $firstSpace = strpos($p, " ");
                    $url = substr($p, 0, $firstSpace);
                    $linkText = substr($p, $firstSpace);

                    $data = new ArrayData(array(
                             'URL' => $url,
                             'LinkText' => htmlspecialchars($linkText)
                         )        
                    );        
                    $set->add($data);  
                }
                return $set;
            };
        }          
  
        
}
class Page_Controller extends ContentController {

	private static $allowed_actions = array (
	);

	public function init() {
		parent::init();
                // $this->response->addHeader('X-Frame-Options', 'SAMEORIGIN');
                // $this->response->addHeader('X-XSS-Protection', '1; mode=block');
                Requirements::javascript('mysite/javascript/jquery-1.11.0.min.js');
                Requirements::javascript('mysite/javascript/jquery.sidr.min.js');                
                Requirements::javascript('mysite/javascript/site.js');
                
		if($this->hasMap()){
			$this->MakeGoogleMap();
		}                
	}

	public function hasMap(){
		return ($this->Address || ($this->Latitudes && $this->Longitudes));
	}       
}
