<%function filters filters = null%>
    <%if $filters%>
        <%foreach $root.filters as $filter%>
            <%$fk = $filter@key|cmsescape:':u'%>
            <%$u_<%$fk%> = '' scope='global'%>
            <%foreach $root.curfilters as $curfilter%>
                <%$ck = $curfilter@key|cmsescape:':u'%>
                <%if $ck != $fk%>
                    <%$value = $curfilter|cmsescape:':u'%>
                    <%$u_<%$fk%> = "`$u_<%$fk%>`&`$ck`=`$value`" scope='global'%>
                <%/if%>
            <%/foreach%>
        <%/foreach%>
    <%$curfilters = $root.curfilters%>
    <dl class="filters" id="filters">
        <%foreach $filters as $filter%>
            <dt>
            <h4><%$filter.name%>:</h4>
            </dt>
            <dd id="<%$filter.id%>">
                <%foreach $filter.items as $filter_item%>
                    <span class="filter-item">
                        <a class="<%if $root.curfilters[$filter@key] == $filter_item@key || (!$root.curfilters[$filter@key] && $filter_item@key == 'default')%>filter-cur<%/if%>" href="index.php?<%if $filter_item@key != 'default'%><%$filter@key|cmsescape:':u:h'%>=<%$filter_item@key|cmsescape:':u:h'%><%/if%><%$u_<%$filter@key%>|cmsescape:':h'%>"><%$filter_item|cmsescape:':h'%></a>
                    </span>
                <%/foreach%>
            </dd>
        <%/foreach%>
    </dl>
    <%/if%>

<%/function%>