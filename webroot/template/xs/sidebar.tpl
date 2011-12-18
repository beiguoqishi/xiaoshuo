<%call module namespace = 'xs' module = 'history'%>
<%function sidebar recommends = null%>
<div class="sidebar">
    <div class="history show" id="one_history">
        <h4>ä¯ÀÀ¼ÇÂ¼£º</h4>
        <a class="history-tip" id="first_history" target="_blank"></a>
        <a class="history-tip" id="no_record" href="javascript:void(0);">ÔÝÎÞä¯ÀÀ¼ÇÂ¼</a>
        <a class="history-expand history-switch" id="history_expand"></a>
    </div>
    
    <%call history%>
    <ul class="recommends">
        <%foreach $recommends as $recommend%>
            <li class="recommend-type">
                <h2 class="recommend-<%$recommend@key%>-title"></h2>

                <ul>
                    <%foreach $recommend as $recommend_item%>
                        <li class="recommend-item">
                            <span class="recommend-item-index"><%$recommend_item@index + 1%></span>
                            <span class="recommend-item-type">[<%$recommend_item.type%>]</span>
                            <a href="<%$recommend_item.url%>" title="<%$recommend_item.title%>" target="_blank" class="<%$recommend@key%>">
                                <%$recommend_item.title%>
                            </a>
                        </li>
                    <%/foreach%>
                </ul>
            </li>
        <%/foreach%>

    </ul>
</div>
<%/function%>