<div id="subNav" class="nav desktop">
   <p><strong>In this section</strong></p>

   <ul>
        <% if ShowChildren %>
            <% loop Children.sort(Title, ASC) %>
            <li>
                <a href="$Link" title="$Title" class="$LinkingMode">$MenuTitle</a>
            </li>
            <% end_loop %>                
        <% else %>
            <% with Parent %>
            <% loop Children.sort(Title, ASC) %>
            <li>
                <a href="$Link" title="$Title" class="$LinkingMode">$MenuTitle</a>
            </li>
            <% end_loop %>
            <% end_with %>
        <% end_if %>

    </ul>
</div>


