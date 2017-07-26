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
                
                
        <% include AzLetters %>
        <div id="azResults">
            <% if AzContent %>
            $AzContent
            <% else %>
                <p>Sorry - no entries found...</p>
            <% end_if %>
        </div>  
        
        
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

<% require css(openobjectsatoz/css/ooatoz.css) %>