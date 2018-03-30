<div class="twelve columns">
    <div class="row">
     $Breadcrumbs 
    </div>
    <div class="row">
    
        <div id="standardPage">
            <div class="pageContent">
                <h1>$Title</h1>

                <% if $Query %>
                    <p class="searchQuery">You searched for &quot;{$Query}&quot;</p>
                <% end_if %>

                <% if $Results %>
                <ul id="SearchResults">
                    <% loop $Results %>
                    <li>
                        <h4>
                            <a href="$Link">
                                <% if $MenuTitle %>
                                $MenuTitle
                                <% else %>
                                $Title
                                <% end_if %>
                            </a>
                        </h4>
                        <% if $Content %>
                            <p>$Content.LimitWordCountXML</p>
                        <% end_if %>
                        <a class="readMoreLink" href="$Link" title="Read more about &quot;{$Title}&quot;">Read more about &quot;{$Title}&quot;...</a>
                    </li>
                    <% end_loop %>
                </ul>
                <% else %>
                <p>Sorry, your search query did not return any results.</p>
                <% end_if %>

                <% if $Results.MoreThanOnePage %>
                <div id="PageNumbers" class="searchResults">
                    <div class="pagination">
                        <% if $Results.NotFirstPage %>
                        <a class="prev" href="$Results.PrevLink" title="View the previous page">&larr;</a>
                        <% end_if %>
                        <% loop $Results.Pages %>
                            <% if $CurrentBool %>
                            <span class="noLink">$PageNum</span>
                            <% else %>
                            <a href="$Link" title="View page number $PageNum" class="go-to-page">$PageNum</a>
                            <% end_if %>
                        <% end_loop %>
                        <% if $Results.NotLastPage %>
                        <a class="next" href="$Results.NextLink" title="View the next page">&rarr;</a>
                        <% end_if %>
                    </div>
                    <p class="pageCount">Page $Results.CurrentPage of $Results.TotalPages</p>
                </div>
                <% end_if %>                
                </div>
            </div>

        </div>

    </div>


