<%call module namespace = 'xs' module = 'titlebar'%>
<%call module namespace = 'xs' module = 'filters'%>
<%call module namespace = 'xs' module = 'list_item'%>

<%function content%>
<div class="content">
    <div class="data-list" id="data_list">
        <%call titlebar src_count = 4 total = 36745%>
        <%call filters filters = $root.filters%>
        <%foreach $root.datas as $data%>
            <%call list_item data = $data%>
            <%if $data@index % 2 != 0 && !$data@last%>
                <span class="hr"></span>
            <%/if%>
        <%/foreach%>
    </div>
    <div class="clear">
        <%$curfilters = $root.curfilters%>
        <%$cur_url_prefix = ''%>
        <%foreach $root.curfilters as $filter%>
            <%$cur_url_prefix = "`$cur_url_prefix`&`$filter@key|cmsescape:':h'`=`$filter|cmsescape:':h'`"%>
        <%/foreach%>
    <%include file="public/page.tpl" pn=$root.page.pn rn=$root.page.rn count=$root.page.count href_suffix='' href_prefix="/index?<%$cur_url_prefix%>&pn=" pageUnit=10%>
    </div>

</div>

<%/function%>