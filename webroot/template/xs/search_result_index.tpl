<!doctype html>
<%include file="public/module.tpl" inline='true'%>
<%call module module='head'%>
<%call module namespace = 'xs' module='search_result_banner'%>
<%call module namespace = 'xs' module='search_result_titlebar'%>
<%call module namespace = 'xs' module='search_result_content'%>
<html>
<head>
<%$common_css = "static/public/css/search_result_common.css"%>
<%$search_result_css = "static/xs/css/search_result.css"%>
<%call head csses=[$common_css,$search_result_css]%>
</head>
<body>
<%call search_result_banner%>
<%call search_result_titlebar%>
<div class="wrapper clearfix">
    <%call search_result_content%>
    <%include file='public/page.tpl' pn=$root.page.pn rn=$root.page.rn count=$root.page.count href_suffix='' href_prefix="/index?&pn=" pageUnit=10%>
</div>
<%include file="public/footer.tpl"%>
</body>
</html>