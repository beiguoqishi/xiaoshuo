<%function head title = "" keywords = "" description = "" csses = []%>
<meta http-equiv="Content-Type" content="text/html; charset=gbk"/>
<meta name="keywords" content="<%$keywords%>"/>
<meta name="description" content="<%$description%>"/>
<title><%$title%></title>
    <%foreach $csses as $css%>
    <link rel="stylesheet" type="text/css" href="<%$css%>"/>
    <%/foreach%>
<link rel="icon" type="image/ico" href="static/favicon.ico"/>
<link rel="shortcut icon" href="static/favicon.ico"/>
<!--[if IE 6]>
<script type="text/javascript">
try{ document.execCommand("BackgroundImageCache",false,true) }catch(e){ }
</script>
<![endif]-->
<%/function%>