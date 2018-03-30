<?php

global $environment, $databaseConfig, $smtpConfig, $project, $proxy;

Director::set_environment_type($environment);

/**
 * If there is a proxy server set in the _ss_environment.php file we'll add the CURL_PROXY to the cURL resource configuration.
 */
if ($proxy) {
    define('HTTP_PROXY', $proxy);
    define('HTTPS_PROXY', $proxy);
}

// Set the site locale
i18n::set_locale('en_GB');


// enable google maps for all pages
Object::add_extension('Page', 'GoogleMapsDecorator');

Security::setDefaultAdmin('admin', 'aVr9b?5xbtc4');
//PFutYJtJ?qNbfpzqd
//extend config
DataObject::add_extension('SiteConfig', 'SiteConfigExtension');

//the search
FulltextSearchable::enable(array('SiteTree'));

SS_Log::add_writer(new SS_LogFileWriter('/srv/beta.baberghmidsuffolk.gov.uk/log/silverstripe-errors-warnings.log'), SS_Log::ERR);

