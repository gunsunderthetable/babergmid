<div class="twelve columns">
    <div class="row">
     $Breadcrumbs 
    </div>
    <div class="row">
    
        <div id="standardPage">
            <div class="pageContent">
                <h1>$Title</h1>
                $Content
                <% if SelectedTag %>
                        <h3><% _t('BlogHolder_ss.VIEWINGTAGGED', 'Viewing entries tagged with') %> '$SelectedTag'</h3>
                <% else_if SelectedDate %>
                        <h3><% _t('BlogHolder_ss.VIEWINGPOSTEDIN', 'Viewing entries posted in') %> $SelectedNiceDate</h3>
                <% else_if SelectedAuthor %>
                        <h3><% _t('BlogHolder_ss.VIEWINGPOSTEDBY', 'Viewing entries posted by') %> $SelectedAuthor</h3>
                <% end_if %>
                <% if BlogEntries %>
                        <% loop BlogEntries %>
                                <% include BlogSummary %>
                        <% end_loop %>
                <% else %>
                        <h2><% _t('BlogHolder_ss.NOENTRIES', 'There are no blog entries') %></h2>
                <% end_if %>

                <% include BlogPagination %>                
                $Form
                $PageComments
            </div>
            <div class="rightPanel">
                <% include BlogSideBar %>
                <% include OnlineNav %>
                <% include ContactNav %>
                
                $MyWidgetArea
            </div>
        </div>
            
    </div>
        
</div>

