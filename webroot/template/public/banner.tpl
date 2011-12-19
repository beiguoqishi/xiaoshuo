<%function banner_html banner_id = 'banner' logo_url = ''%>
<div class="head-bar">
    <div class="head-bar-content relative">
        <div class="head-bar-position">
            <span>当前位置：</span>
            <a href="http://www.hao123.com">主页</a>
            <span class="head-bar-position-sep">&gt;</span>
            <span>小说</span>
        </div>

        <ul class="head-bar-tool">
            <li class="head-bar-tool-sethome"><a id="set_home" target="_self" href="#">设hao123为首页</a></li>
            <li class="sep">|</li>
            <li class="head-bar-tool-feedback"><a href="http://feedback.hao123.com/?catalog_id=4">意见反馈</a></li>
            <li class="sep">|</li>
            <li class="head-bar-tool-old"><a href="http://www.hao123.com/book.htm" target="_blank">返回旧版</a></li>
        </ul>
    </div>
</div>

<div class="head-nav">
    <div class="head-nav-logo">
        <div class="logo-container">
            <h1>
                <a class="index-logo" href="http://www.hao123.com" title="hao123首页"></a>
                <a class="erji-logo" href="/xiaoshuo" title="小说"></a>
            </h1>
        </div>

        <form method="get" class="baidu-search-con" role="search" action="http://www.baidu.com/s" target="_blank"
              id="baidu_search_form" search_des = 'web'>
            <fieldset>
                <legend class="hide-offscreen">百度搜索</legend>
                <ul class="search-text clearfix" id="search_list">
                    <li class="first selected"><a search_des="web" href="http://www.baidu.com/s?tn=sitehao123"
                                                  target="_blank">网页</a></li>
                    <li><a search_des="video" href="http://video.baidu.com/v?sc=hao123" target="_blank">视频</a>
                    </li>
                    <li class="mp3"><a search_des="mp3"
                                       href="http://mp3.baidu.com/m?tn=baidump3&ct=134217728&sc=hao123"
                                       target="_blank">MP3</a></li>
                    <li><a search_des="image"
                           href="http://image.baidu.com/i?tn=baiduimage&ct=201326592&cl=2&lm=-1&fm=hao123"
                           target="_blank">图片</a></li>
                    <li><a search_des="tieba" href="http://tieba.baidu.com/f?kw=aaa&sc=hao123"
                           target="_blank">贴吧</a></li>
                    <li><a search_des="zhidao" href="http://zhidao.baidu.com/q?tn=ikaslist&ct=17&sc=hao123&rn=20"
                           target="_blank">知道</a></li>
                    <li><a search_des="news" href="http://news.baidu.com/ns?tn=news&sc=hao123"
                           target="_blank">新闻</a></li>
                </ul>
                <div id="search_args" style="display:none">
                    <input type="hidden" name="tn" value="sitehao123">
                </div>
                <div class="search-wrapper clearfix">
                    <span class="search-shadow"></span>
                    <input type="text" autocomplete="off" value="" class="search-input" name="word"
                           id="search_input_word"/>
                        <span class="search-button-wrapper">
                            <button type="submit" value="百度一下" class="searchsubmit">百度一下</button>
                        </span>
                    <div class="sug-result clearfix" id="sug_result" style="display: none;"></div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
<%/function%>