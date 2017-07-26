<?php

class EastSuffolkAdmin extends ModelAdmin {
    
  public static $managed_models = array(   //since 2.3.2
      'Party',
      'Committee',
      'Ward',
      'FinancialYear'
   );
 
  static $url_segment = 'party'; // will be linked as /admin/party
  static $menu_title = 'East Suffolk Admin';
 
}

