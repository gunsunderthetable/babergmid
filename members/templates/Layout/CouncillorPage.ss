<div class="twelve columns">
    <div class="row">
        $Breadcrumbs 
    </div>
    <div class="row">
    
        <div id="standardPage">
            <div class="pageContent">
                <% if $Intro %><p class="intro">$Intro</p><% end_if %>
                $Content
                <div id="councillorBanner" class="clearFix">
                    <div id="councillorBannerText">
                        <h1>$Title</h1>
                       <p>
                       <strong>Name: </strong>$MemberTitle $FirstName $Surname</br>
                       <% with $Party %>
                       <strong>Party: </strong>$Name<br />
                       <% end_with %>
                       <% with $Ward %>
                       <strong>Ward: </strong>$Name<br />
                       <% end_with %>                   
                        <Strong>Parish(es): </strong>$Parishes</br>
                        </p>                    
                    </div>
                    <div id="councillorPortrait">
                        <% if Portrait %>
                            <% with Portrait %><img src="$CroppedImage(160,200).URL" alt="$Title" /><% end_with %>
                        <% else %>
                            <div id="noCouncillorPortrait">
                                <p>No image available</p>
                            </div>
                        <% end_if %>
                    </div>
                </div>
                <div id="councillorCopy">
                    <p>
                    <strong>Address:</strong></br>
                    $Address1</br>
                    <% if $Address2 %>$Address2</br><% end_if %>
                    <% if $Address3 %>$Address3</br><% end_if %>
                    <% if $Address4 %>$Address4</br><% end_if %>
                    </p>
                    <p>
                    <% if $Telephone %>
                    <strong>Telephone: </strong>$Telephone</br>
                    <% end_if %>
                    </p>
                    <p>
                    <% if $Email %>
                        <strong>Email: </strong><a href="mailto:$Email">$Email</a>
                    <% end_if %>
                    </p>
                    <p>   <strong>Cabinet member: </strong><% if IsCabinetMember %>Yes<% else %>No<% end_if %></p>
                    <% if $Committees %>
                    <p>
                        <strong>Committee membership: </strong>
                        <p>
                        <% loop $Committees %>
                        <% if not $First %>, $Name<% else %>$Name<% end_if %>
                        <% end_loop %>
                        </p>
                </p>
                    <% end_if %>
                    <p>
                    <% if $Notes %><strong>Notes:</br></strong>$Notes<% end_if %>
                    </p>

                    <% if BudgetLines %>
                    <p><strong>$SiteConfig.CommunityEnablingHeader</strong></p>
                    <% end_if %>
                    <% loop $GroupedYearsByYear.GroupedBy(NiceBudgetYear) %>
                    <% if $NiceBudgetYear == '' %>
                        <h3> no year </h3>
                    <% else %>
                        <h3>$NiceBudgetYear</h3>
                    <% end_if %>
                        <table id="budgetLines">
                            <% loop $Children %>
                                <tr>
                                    <td class="budgetOrganisation">$Organisation</td><td class="budgetProject">$Project</td><td>$Amount</td>
                                </tr>
                            <% end_loop %>
                        </table>
                    <% end_loop %>                
                    
                    $Form
                    $PageComments
                </div>                
                $Form
                $PageComments
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
