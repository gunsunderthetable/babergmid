<div class="twelve columns">
    <div class="row">
     $Breadcrumbs 
    </div>
    <div class="row">
    
        <div id="standardPage">
            <div class="pageContent">
                <h1>Testing jobs</h1>
                <% if $Intro %><p class="intro">$Intro</p><% end_if %>
                $Content
                
                
        <div id="azResults">
            <h2>Jobs then?</h2>
            <ul>
            <% loop MyJobs %>
                <li><a href="$Link">$Title</a></li>
            <% end_loop %>
            </ul>

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