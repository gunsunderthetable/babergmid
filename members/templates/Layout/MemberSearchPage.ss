<div class="twelve columns">
    <div class="row">
        $Breadcrumbs 
    </div>
    <div class="row">
        <div id="standardPage">
            <div class="pageContent">
                <% if $Intro %><p class="intro">$Intro</p><% end_if %>
                <h1>$Title</h1>
                $Content
                <div id="memberSearch">
                    $MemberSearchForm
                </div>
            </div>
            <div class="rightPanel">
                <% include NavImage %>
                <% include ParentNav %>
                <% include OnlineNav %>
                <% include ContactNav %>
                $MyWidgetArea
            </div>
        </div>
            
    </div>
        
</div>