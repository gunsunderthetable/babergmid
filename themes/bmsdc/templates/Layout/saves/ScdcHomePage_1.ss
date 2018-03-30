<div class="row">
    <div class="four columns sideBar">
        <h2>Features</h2>
    </div>


    <div class="eight columns hpBoxes">
            <% loop $Boxes %>
                <div class="box $EvenOdd desktop-$Modulus(5) mobile-$Modulus(2) phone-$Modulus(4)" onclick="<% if $ExternalLink %>window.open('$ExternalLink')<% else %>location.href='$LinkPage.Link';<% end_if %>">
                    <% with $Icon %>
                        <img class="boxIcon"src="$CroppedImage(127,127).URL" alt="$Title" />
                    <% end_with %>
                </div>
            <% end_loop %>
    </div>      
</div>

<% require javascript(mysite/javascript/jquery.flexslider.js) %>
<% require javascript(mysite/javascript/site_home.js) %>

<% require css(themes/scdc/css/flexslider.css) %>