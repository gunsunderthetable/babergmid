<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <% base_tag %>
        <title><% if $MetaTitle %>$MetaTitle &raquo;<% else_if $Title=="Home" %><% else %>$Title &raquo;<% end_if %> $SiteConfig.Title</title>
        <script src="https://use.typekit.net/eyi6qhf.js"></script>
        <script>try{Typekit.load({ async: true });}catch(e){}</script>     
        <meta name="description" content="Babergh MidSuffolk">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="$BaseHref/favicon.ico?v=2" />        
        <link rel="stylesheet" type="text/css" media="screen" href="$ThemeDir/css/jquery.sidr.light.css">        
        <link rel="stylesheet" type="text/css" media="screen" href="$ThemeDir/css/normalize.css">
        <link rel="stylesheet" type="text/css" media="screen" href="$ThemeDir/css/skeleton.css">
        <link rel="stylesheet" type="text/css" media="screen" href="$ThemeDir/css/site.css">
        $SiteConfig.HTMLHeaderSnippet
        <% include GoogleAnalytics %>
    </head>
    <body class="$ClassName">
        <div id="sidr">
            <% include MobileNav %>
        </div>         
        <div class="container">
            <% include Header %>
            $Layout
            <% include Footer %>
        </div>
        <script>
            jQuery(document).ready(function() {
              jQuery('#sidr-menu').sidr({side: 'left'});
            });
        </script>         
    </body>
</html>