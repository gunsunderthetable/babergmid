<div class="twelve columns">
    <div class="row">
        $Breadcrumbs 
    </div>
    <div class="row">
        <div id="standardPage">
            <div class="pageContent">
                <% if Results.Count %>
                    <p>$Results.Count members found.</p>
                    <ul id="councillorResults">
                      <% loop Results %>
                        <li class="$FirstLast">
                            <a href="$Link">$Surname, $MemberTitle $FirstName</a></br>
                            <% with $Party %><strong>Party:</strong> $Name<% end_with %><% with $Ward %>, <strong>Ward:</strong> $Name<% end_with %><% if Committees %> <strong>Committees: </strong><% loop $Committees %><span class="$FirstLast">$Name</span><% end_loop %><% end_if %><% if $Parishes %></br><strong>Parishes: </strong> $Parishes<% end_if %>
                        </li>
                      <% end_loop %>
                    </ul>
                 <% else %>
                    <p>Sorry, your search query did not return any results</p>
                 <% end_if %>

                <h2>Search again</h2>
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