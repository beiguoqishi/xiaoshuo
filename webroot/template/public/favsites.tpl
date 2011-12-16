<%function favsites favsites = null%>
    <%if $favsites%>
    <div class="favsites" id="favsites">
        <dl class="favsites-list">
            <%foreach $favsites as $fav%>
                <dt class="fav-title">[<%$fav@key%>]</dt>
                <dd class="fav-links">
                    <%foreach $fav as $fav_link%>
                        <span class="fav-link <%if $fav_link@index > 12%>hidden<%/if%>">
                                    <a href="<%$fav_link%>" target="_blank"><%$fav_link@key%></a>
                        </span>
                    <%/foreach%>
                    <span class="align-right">
                                    <a class="operation-favsites collapse-sites"
                                       id="favsites_switch" status='collapse'
                                       href="javascript:return false;">����</a>
                    </span>
                </dd>
            <%/foreach%>
        </dl>
    </div>
    <%/if%>
<%/function%>