<% if BlogEntries.MoreThanOnePage %>
<div class="pagination">
    <ul class="PageNumbers">
        <% if BlogEntries.NotFirstPage %>
        <li class="prev">
            <a class="paginate-left" href="$BlogEntries.PrevLink" title="View the previous page">&lt; Newer</a>
	</li>
	<% else %>	
	<li class="prev disabled">
            <a class="paginate-left disabled">&lt; Newer</a>
	</li>
	<% end_if %>
	
    	<% loop BlogEntries.PaginationSummary(4) %>
            <% if CurrentBool %>
            <li class="active"><a class="disabled $FirstLast">$PageNum</a></li>
                <% else %>
		<% if Link %>
		<li>
                    <a class="<% if BeforeCurrent %>paginate-left<% else %>paginate-right<% end_if %> $FirstLast" href="$Link">$PageNum</a>
		</li>
		<% else %>
		<li class="disabled"><a class="disabled $FirstLast">&hellip;</a></li>						
		<% end_if %>
		<% end_if %>
		<% end_loop %>
	
		<% if BlogEntries.NotLastPage %>
		<li class="next">
                    <a class="next paginate-right" href="$BlogEntries.NextLink" title="View the next page">Older &gt;</a>
		</li>
		<% else %>
		<li class="next disabled">
                    <a class="next paginate-right disabled">Older &gt;</a>
		</li>
		<% end_if %>
	</ul>
</div>
<% end_if %>