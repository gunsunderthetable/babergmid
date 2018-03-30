<% if $MainImage %>
<div id="navImage" class="desktop">
    <div id ="mainImage">
        <% with Mainimage %><img src="$CroppedImage(350,250).URL" alt="$Title" /><% end_with %>
    </div>    
</div>
<% end_if %>



