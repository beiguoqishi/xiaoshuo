<%function list_item data = null%>
    <%if $data%>
    <span class="list-item">
    <a class="poster history-cookie" href="<%$data.url%>" title="<%$data.title%>" target="_blank">
        <img src="<%$data.poster%>" title="<%$data.title%>"/>
        <span class="status-bar"></span>
        <span class="status-text"><%$data.word_count%>&nbsp;&nbsp;<%$data.status%></span>
    </a>

    <div class="book-info">
        <h3>
            <a href="<%$data.url%>" class="title-link history-cookie" title="<%$data.title%>" target="_blank"><%$data.title%></a>
        </h3>
        <dl>
            <dt class="item-key">作者：</dt>
            <dd class="item-value"><%$data.author%></dd>
            <dd class="hr"></dd>
            <dt class="item-key">最新章节：</dt>
            <dd class="item-value"><%$data.update_status%></dd><dd class="hr"></dd>
            <dt class="item-key book-desc">简介：</dt>
            <dd class="item-value book-desc"><%$data.desc|cmsescape:':h:70':'…'%></dd><dd class="hr"></dd>
        </dl>
    </div>
    </span>
    <%/if%>

<%/function%>