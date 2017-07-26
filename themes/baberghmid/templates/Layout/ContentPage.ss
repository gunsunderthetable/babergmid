<div class="twelve columns">
    <div class="row">
     $Breadcrumbs 
    </div>
    <div class="row">
    
        <div id="standardPage">
            <div class="pageContent">
                <h1>$Title</h1>
                <% if $Intro %><p class="intro">$Intro</p><% end_if %>
                $Content
                <% if hasMap %>
                <div class="map">
                    <div id="map_canvas" style="width:100%; height:431px;"></div>
                </div>
                <% end_if %>
                $HTMLBodySnippet
                $Form
                $PageComments
            </div>
            <div class="rightPanel">
                <% include NavImage %>
                <% include SubNav %>
                <% include OnlineNav %>
                <% include ContactNav %>
                $MyWidgetArea
            </div>
        </div>
            
    </div>
        
</div>