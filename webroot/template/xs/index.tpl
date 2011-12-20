<!doctype html>
<%include file = 'public/module.tpl' inline = 'true'%>

<%call module module = 'head'%>
<%call module module = 'common_banner'%>
<%call module module = 'favsites'%>
<%call module namespace = 'xs' module = 'content'%>
<%call module namespace = 'xs' module = 'sidebar'%>
<%call module namespace = 'xs' module = 'xsjs'%>
<html>
<head>
<%$common_css = "static/public/css/common.css"%>
<%$head_base = "static/public/css/head-base.css"%>
<%$xs_css = 'static/xs/css/xs.css'%>
    <%call head csses = [$common_css,$head_base,$xs_css]%>
</head>
<body>
<%call common_banner%>
<%call favsites favsites = $root.favsites%>
<div class="wrapper clearfix">
<%call content%>
<%call sidebar recommends = $root.recommends%>
</div>
<%include file="public/footer.tpl"%>
<%call xsjs jses = ['static/xs/js/common.js','http://s0.hao123.com/global/js/widget/g.sug.js','static/xs/js/head-base.js','static/xs/js/xs.js']%>
<script id="sug_result_script" type="text/javascript"></script>
<%if $smarty.get.firebuglite == 'true'%>
<script src="https://getfirebug.com/firebug-lite.js"></script>
<%/if%>

</body>
</html>