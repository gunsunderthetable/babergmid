<div class="twelve columns">
    <div class="row">
     $Breadcrumbs 
    </div>
    <div class="row">
    
        <div id="standardPage">
            <div class="pageContent">
                <h1>$Title</h1>
                <p class="intro">$Intro</p>
                $Content
                <% loop $Children %>
                    <h2>$Title</h2>
                    <p>$Content.FirstSentence</p>
                    <a class="readMore" href="$Link" alt="$Title" title="$Title">Read more</a>
                    <hr>
                <% end_loop %>
                $Form
                $PageComments
            </div>
            <div class="rightPanel">
                <% include NavImage %>
                <% include SubNav %>
                <% include OnlineNav %>
                <% include ContactNav %>
                
                $WidgetArea
            </div>
        </div>
            
    </div>
        
</div>