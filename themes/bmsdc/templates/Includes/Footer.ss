<div class="row">
    <div class="twelve columns footer">
        <div class="row">
            <div id="colophonFooter">
                <div class="colophon left">
                    <p>&copy; $Now.Year Babergh District Council and Mid-Suffolk District Council</p>
                </div>
                <div class="colophon right">
                    <p>
                        <% loop $FooterLinks %>
                        <a href="$URL" title="$LinkText">$LinkText</a><% if Last %><% else %>&nbsp;|&nbsp;<% end_if %>        
                        <% end_loop %>
                    </p>
                </div>            
            </div>
        </div>
        

    </div>
    <div id="translateWrap">
        <div id="google_translate_element"></div><script type="text/javascript">
        function googleTranslateElementInit() {
          new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, gaTrack: true, gaId: 'UA-86645350-1'}, 'google_translate_element');
        }
        </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>            
    </div>
</div>
