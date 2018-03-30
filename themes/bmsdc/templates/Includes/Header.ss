<div class="row">
    <div class="twelve columns headerPanel">
        <div id="headerText">
            <a href="$BaseHref"><img src="$ThemeDir/images/header.png" alt="click for the homepage" title="click for the homepage" /></a>
        </div>
        <div id="headerTools">
            <a class="menuButton mobileNav" id="sidr-menu" href="#sidr"><img src="$ThemeDir/images/mobile_menu.png" alt="mobile menu button" /></a>
            <p>
                <% loop $HeaderLinks %>
                    <a href="$URL" title="$LinkText">$LinkText</a><% if Last %><% else %>&nbsp;|&nbsp;<% end_if %>        
                <% end_loop %>    
            </p>
            <div id="socialButtons">
                <% if $SiteConfig.TwitterLink %><a href="$SiteConfig.TwitterLink" target="_blank" alt="twitter"><img src ="$ThemeDir/images/twitter.png" /></a><% end_if %>
                <% if $SiteConfig.LinkedInLink %><a href="$SiteConfig.LinkedInLink" target="_blank" alt="linkedin"><img src ="$ThemeDir/images/linkedin.png" /></a><% end_if %>
                <% if $SiteConfig.FacebookLink %><a href="$SiteConfig.FacebookLink" target="_blank" alt="facebook"><img src ="$ThemeDir/images/facebook.png" /></a><% end_if %>
                <% if $SiteConfig.YouTubeLink %><a href="$SiteConfig.YouTubeLink" target="_blank" alt="facebook"><img src ="$ThemeDir/images/youtube.png" /></a><% end_if %>
                <% if $SiteConfig.StreetLifeLink %><a href="$SiteConfig.StreetLifeLink" target="_blank" alt="facebook"><img src ="$ThemeDir/images/streetlife.png" /></a><% end_if %>
            </div>
            <% include Search %>
            <% if $SiteConfig.Boxes %>
            <div id="actionButtons">
                <% loop $SiteConfig.Boxes %>
                    <div class="box headerBox $FirstLast" onclick="location.href='$LinkPage.Link';">
                        <div class="content">
                            <% with $Icon %>
                            <img class="icon" src="$CroppedImage(350,255).URL" alt="$Title" />
                            <% end_with %>
                            <div class="boxText">
                                <h2>$Title</h2>
                            </div>             
                        </div>       
                    </div>
                <% end_loop %>
            </div>

            <% end_if %>
        </div>
    </div>      
</div>