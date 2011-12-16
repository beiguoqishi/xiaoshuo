<%function favsites favsites = null operation_name = '¸ü¶à' operation_id = 'partial_sites' operation_class = 'expand-sites' display_class = 'show' align_right = ''%>
    <%if $favsites%>
        <div class="favsites <%$display_class%>" id="<%$operation_id%>">
            <dl class="favsites-list">
                <%foreach $favsites as $fav%>
                    <dt class="fav-title">[<%$fav@key%>]</dt>
                    <dd class="fav-links">
                        <%foreach $fav as $fav_link%>
                            <%if $fav_link@key == "<%$operation_name%>"%>
                                <span class="clear-padding <%$align_right%>">
                                    <a class="operation-favsites <%$operation_class%> " id="<%"`$operation_id`_operation"%>" href="javascript:return false;" ><%$fav_link@key%></a>
                                </span>
                            <%else%>
                                <span class="fav-link">
                                    <a href="<%$fav_link%>" target="_blank"><%$fav_link@key%></a>
                                </span>
                            <%/if%>
                        <%/foreach%>
                    </dd>
                <%/foreach%>
            </dl>
        </div>
    <%/if%>
<%/function%>