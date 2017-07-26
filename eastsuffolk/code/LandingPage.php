<?php
class LandingPage extends Page {
    private static $icon = "cms/images/treeicons/page-gold-file.gif";

    public static $db = array(
        'Intro' => 'Text'
    ); 

    public function getCMSFields() {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab('Root.Main', new TextField("Intro", "Main page intro text"), "Content");    
        return $fields; 
    }
    
    public function getTopTaskChildren() {
        $children = Page::get()->filter(array('TopTask' => true,'ParentID' => $this->ID))->sort('Title'); 
        return $children;
    }
    
    public function getLandingChildren() {
        $children = Page::get()->filter(array('TopTask' => false,'ParentID' => $this->ID))->sort('Title'); 
        return $children;
   }    
       
    public function LandingChildColumns($numCols = 1) {
        $children = Page::get()->filter(array('TopTask' => false,'ParentID' => $this->ID)); 

        $childrenArr = $children->toArray();
        $count = ceil(count($childrenArr)/$numCols);
        
        $childrenChunks = array_chunk($childrenArr, $count);
        $columnarChildren = array();
        foreach ($childrenChunks as $key => $val) {
            $set = new DataObject();
            $set->Children = new ArrayList($val);
            $columnarChildren[] = $set;
        }
        return new ArrayList($columnarChildren);
   } 
   // accompanying template code for this columns finction
//        <div id="landingChildren">
//            <% loop LandingChildColumns(2) %>
//                <ul class="childrenColumn column-$Pos">
//                    <% loop $Children %>
//                        <li class="signpost-item $EvenOdd $FirstLast $Color">
//                            <a href="$Link">$Title</a>
//                        </li>
//                    <% end_loop %>
//                </ul>
//            <% end_loop %>                              
//        </div>   
}

class LandingPage_Controller extends Page_Controller {

	
}
