<div id="subNav" class="sidrNav">
    <ul>
        <% loop Menu(1) %>
        <li>
            <a href="$Link" title="$Title" class="$LinkingMode">$MenuTitle</a>

        </li>
        <% end_loop %>
    </ul>
</div>