<%call module namespace='xs' module='list_item'%>
<%function search_result_content%>
<div class="search-result-content clearfix">
    <%foreach $root.datas as $data%>
        <%call list_item data = $data%>
        <%if $data@index % 2 != 0 && !$data@last%>
            <span class="hr"></span>
        <%/if%>
    <%/foreach%>
</div>
<%/function%>