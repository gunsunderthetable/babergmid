<div id="subNav" class="nav desktop">
   <h3>In this section</h3>
   <ul>
        <% with Parent %>
            <% with Parent %>
                <% loop Children %>
        <li>
            <a href="$Link" title="$Title" class="$LinkingMode">$MenuTitle</a>
        </li>
                <% end_loop %>
            <% end_with %>
        <% end_with %>
    </ul>
</div>


