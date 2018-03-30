<div class="row">
    <div id="pagePanel">
        <div class="row">
            <% if TopTaskBoxes %>
            <% loop $TopTaskBoxes %>
                <div class="box $EvenOdd mobile-$Modulus(2) tablet-$Modulus(3)" onclick="<% if $ExternalLink %>window.open('$ExternalLink')<% else %>location.href='$LinkPage.Link';<% end_if %>">
                    <% with $Icon %>
                        <img class="icon" src="$CroppedImage(350,350).URL" alt="$Title" />
                    <% end_with %>
                    <div class="boxText">
                        <h2>$Title</h2>
                    </div>
                </div>
            <% end_loop %>
            <div id="landingPageBreak"></div>           
            <% end_if %>
            <% loop $TheOtherBoxes %>
                <div class="box $EvenOdd mobile-$Modulus(2) tablet-$Modulus(3)" onclick="<% if $ExternalLink %>window.open('$ExternalLink')<% else %>location.href='$LinkPage.Link';<% end_if %>">
                    <% with $Icon %>
                        <img class="icon" src="$CroppedImage(350,350).URL" alt="$Title" />
                    <% end_with %>
                    <div class="boxText">
                        <h2>$Title</h2>
                    </div>
                </div>
            <% end_loop %>            
        </div>
        <hr/>
        <div id="features">
            <% if Features %>
            <h1>Features</h1>
            <% loop Features(3) %>
            <a href="$Link"><h2>$Title</h2></a>
            <p>$Content.FirstSentence</p>
            <% end_loop %>
            <a class="readMore" href="$FeatureHolder.Link" alt="see more news" title="see more features">Read more features</a>
            <% end_if %>
        </div>
        <div id="news">
            <h1>Latest news</h1>
            <% loop $News(1) %>
            <a href="$Link"><h2>$Title</h2></a>
            <p>$Content.FirstSentence</p>
            <% end_loop %>
            <a class="readMore" href="$NewsHolder.Link" alt="see more news" title="see more news">Read more news</a>
        </div>
        <div id="homePageWidgets">
            $MyWidgetArea
        </div>
    </div>
</div>

<% require javascript(mysite/javascript/site_home.js) %>
