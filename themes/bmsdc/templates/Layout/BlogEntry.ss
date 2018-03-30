
<div class="twelve columns">
    <div class="row">
     $Breadcrumbs 
    </div>
    <div class="row">
    
        <div id="standardPage">
            <div class="pageContent">
                <h1>$Title</h1>

                <div class="blogEntry">
                        <p class="authorDate"><% _t('BlogEntry_ss.POSTEDBY', 'Posted by') %> $Author.XML <% _t('BlogEntry_ss.POSTEDON', 'on') %> $Date.Long | $Comments.Count <% _t('BlogEntry_ss.COMMENTS', 'Comments') %></p>
                        <% if TagsCollection %>
                                <p class="tags">
                                         <% _t('BlogEntry_ss.TAGS', 'Tags:') %> 
                                        <% loop TagsCollection %>
                                                <a href="$Link" title="<% _t('BlogEntry_ss.VIEWALLPOSTTAGGED', 'View all posts tagged') %> '$Tag'" rel="tag">$Tag</a><% if not Last %>,<% end_if %>
                                        <% end_loop %>
                                </p>
                        <% end_if %>		
                        $Content		
                </div>
	
                <% if IsOwner %><p class="edit-post"><a href="$EditURL" id="editpost" title="<% _t('BlogEntry_ss.EDITTHIS', 'Edit this post') %>"><% _t('BlogEntry_ss.EDITTHIS', 'Edit this post') %></a> | <a href="$Link(unpublishPost)" id="unpublishpost"><% _t('BlogEntry_ss.UNPUBLISHTHIS', 'Unpublish this post') %></a></p><% end_if %>
	
                $Form
                $PageComments
            </div>
            <div class="rightPanel">
                <% include NavImage %>
                <% include ContactNav %>
                
                $MyWidgetArea
            </div>
        </div>
            
    </div>
        
</div>

