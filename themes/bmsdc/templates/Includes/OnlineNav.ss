<% if $Links %>
<div id="onlineNav" class="nav desktop">
    <p><strong>Do it online</strong></p>
    <ul>
        <% loop $Links %>
        <li>
            <% if $ExternalLink %>
                <a href="$ExternalLink" title="$Title" target="_blank">$Title</a>
            <% else %>
                <a href="$LinkPage.Link" title="$Title">$Title</a>
            <% end_if %>
        </li>
        <% end_loop %>
    </ul>
</div>
<% end_if %>


