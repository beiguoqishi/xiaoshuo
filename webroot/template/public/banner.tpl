<%function banner_html banner_id = 'banner' logo_url = ''%>
<div class="head-bar">
    <div class="head-bar-content relative">
        <div class="head-bar-position">
            <span>��ǰλ�ã�</span>
            <a href="http://www.hao123.com">��ҳ</a>
            <span class="head-bar-position-sep">&gt;</span>
            <span>С˵</span>
        </div>

        <ul class="head-bar-tool">
            <li class="head-bar-tool-sethome"><a id="set_home" target="_self" href="#">��hao123Ϊ��ҳ</a></li>
            <li class="sep">|</li>
            <li class="head-bar-tool-feedback"><a href="http://feedback.hao123.com/?catalog_id=4">�������</a></li>
            <li class="sep">|</li>
            <li class="head-bar-tool-old"><a href="http://www.hao123.com/book.htm" target="_blank">���ؾɰ�</a></li>
        </ul>
    </div>
</div>

<div class="head-nav">
    <div class="head-nav-logo">
        <div class="logo-container">
            <h1>
                <a class="index-logo" href="http://www.hao123.com" title="hao123��ҳ"></a>
                <a class="erji-logo" href="/xiaoshuo" title="С˵"></a>
            </h1>
        </div>

        <form method="get" class="baidu-search-con" role="search" action="http://www.baidu.com/s" target="_blank"
              id="baidu_search_form" search_des = 'web'>
            <fieldset>
                <legend class="hide-offscreen">�ٶ�����</legend>
                <ul class="search-text clearfix" id="search_list">
                    <li class="first selected"><a search_des="web" href="http://www.baidu.com/s?tn=sitehao123"
                                                  target="_blank">��ҳ</a></li>
                    <li><a search_des="video" href="http://video.baidu.com/v?sc=hao123" target="_blank">��Ƶ</a>
                    </li>
                    <li class="mp3"><a search_des="mp3"
                                       href="http://mp3.baidu.com/m?tn=baidump3&ct=134217728&sc=hao123"
                                       target="_blank">MP3</a></li>
                    <li><a search_des="image"
                           href="http://image.baidu.com/i?tn=baiduimage&ct=201326592&cl=2&lm=-1&fm=hao123"
                           target="_blank">ͼƬ</a></li>
                    <li><a search_des="tieba" href="http://tieba.baidu.com/f?kw=aaa&sc=hao123"
                           target="_blank">����</a></li>
                    <li><a search_des="zhidao" href="http://zhidao.baidu.com/q?tn=ikaslist&ct=17&sc=hao123&rn=20"
                           target="_blank">֪��</a></li>
                    <li><a search_des="news" href="http://news.baidu.com/ns?tn=news&sc=hao123"
                           target="_blank">����</a></li>
                </ul>
                <div id="search_args" style="display:none">
                    <input type="hidden" name="tn" value="sitehao123">
                </div>
                <div class="search-wrapper clearfix">
                    <span class="search-shadow"></span>
                    <input type="text" autocomplete="off" value="" class="search-input" name="word"
                           id="search_input_word"/>
                        <span class="search-button-wrapper">
                            <button type="submit" value="�ٶ�һ��" class="searchsubmit">�ٶ�һ��</button>
                        </span>
                    <div class="sug-result clearfix" id="sug_result" style="display: none;"></div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
<%/function%>