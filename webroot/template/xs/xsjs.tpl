<%function xsjs jses = []%>
<%if $jses%>
    <%foreach $jses as $js%>
        <script type="text/javascript" src="<%$js%>?v=<%filemtime("static/xs/js/xs.js")%>"></script>
    <%/foreach%>
<%/if%>
<%/function%>