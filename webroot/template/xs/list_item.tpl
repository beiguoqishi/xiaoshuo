<%function list_item data = null%>
    <%if $data%>
    <span class="list-item" id="<%$data.id%>">
    <a class="poster history-cookie" href="<%$data.url%>" title="<%$data.title%>" target="_blank" id="poster_<%$data.id%>">
        <img src="<%$data.poster%>" title="<%$data.title%>"/>
        <span class="status-bar"></span>
        <span class="status-text"><%$data.word_count%>&nbsp;&nbsp;<%$data.status%></span>
    </a>

    <div class="book-info">
        <h3>
            <a href="<%$data.url%>" class="title-link history-cookie" id="title_<%$data.id%>" title="<%$data.title%>" target="_blank"><%$data.title|cmsescape:':h:20':'…'%></a>
        </h3>
        <dl>
            <dt class="item-key">作者：</dt>
            <dd class="item-value"><a href="<%$data.author_url%>" class="author-link" target="_blank" book_id="<%$data.id%>" id="author_<%$data.author_id%>"><%$data.author|cmsescape:':h:20':'…'%></a></dd>
            <dd class="hr"></dd>
            <dt class="item-key">最新章节：</dt>
            <dd class="item-value"><%$data.update_status|cmsescape:':h:28':'…'%></dd><dd class="hr"></dd>
            <dt class="item-key book-desc">简介：</dt>
            <dd class="item-value book-desc"><%$data.desc|cmsescape:':h:70':'…'%></dd><dd class="hr"></dd>
        </dl>
    </div>
    </span>
    <%/if%>

<%/function%>