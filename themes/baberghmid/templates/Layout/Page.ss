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
                $HTMLBodySnippet
                
                $Form
                $PageComments
            </div>
            <div class="rightPanel">
                <% include SubNav %>
                $MyWidgetArea
            </div>
        </div>
    </div>
        
</div>