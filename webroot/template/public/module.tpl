<%if !isset($MODULES)%>
    <%$MODULES = [] scope='global'%>
    <%function module namespace = 'public' module = null%>
        <%if !isset($MODULES.$module)%>
        <%include file = "`$namespace`/`$module`.tpl" inline = 'true'%>
        <%/if%>
    <%/function%>
<%/if%>