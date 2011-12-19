/**
 * Created by JetBrains PhpStorm.
 * User: liupengtao
 * Date: 11-12-19
 * Time: 下午12:28
 * To change this template use File | Settings | File Templates.
 */
(function () {

    var on = document.addEventListener ? function (el, type, callback) {
        el.addEventListener(type, callback, !1);
    } : function (el, type, callback) {
        el.attachEvent("on" + type, callback);
    };

    var searchConfig = {

        web:{

            action:"http://www.baidu.com/s", //for form
            q:"word", //for input name
            params:{
                tn:"sitehao123"
            },

            sug:{        //for sug
                requestQuery:"wd",
                url:"http://suggestion.baidu.com/su",
                callbackFn:"baidu.sug",
                callbackDataKey:"s",
                requestParas:{
                    sc:"hao123"
                }
            }
        },
        mp3:{
            action:"http://mp3.baidu.com/m",
            q:"word",
            params:{
                tn:"baidump3",
                ct:"134217728",
                sc:"hao123",
                ie:'utf-8'
            },

            sug:{
                requestQuery:"wd",
                url:"http://nssug.baidu.com/su",
                callbackFn:"baidu.sug",
                callbackDataKey:"s",
                requestParas:{
                    prod:"mp3",
                    sc:"hao123"
                }
            }
        },
        video:{

            action:"http://video.baidu.com/v",
            q:"word",
            params:{
                sc:"hao123",
                ie:'utf-8'
            },

            sug:{
                requestQuery:"wd",
                url:"http://nssug.baidu.com/su",
                callbackFn:"baidu.sug",
                callbackDataKey:"s",
                requestParas:{
                    prod:"video",
                    sc:"hao123"
                }
            }
        },
        image:{

            action:"http://image.baidu.com/i",
            q:"word",
            params:{
                tn:"baiduimage",
                ct:"201326592",
                cl:"2",
                lm:"-1",
                fm:"hao123",
                ie:'utf-8'
            },

            sug:{
                requestQuery:"wd",
                url:"http://nssug.baidu.com/su",
                callbackFn:"baidu.sug",
                callbackDataKey:"s",
                requestParas:{
                    prod:"image",
                    sc:"hao123"
                }
            }
        },
        tieba:{

            action:"http://tieba.baidu.com/f",
            q:"kw",
            params:{
                sc:"hao123"
            },

            sug:{
                requestQuery:"query",
                url:"http://tieba.baidu.com/sug",
                callbackFn:"baiduSugTieba", //tieba 不支持链式callback
                callbackDataKey:"msg",
                requestParas:{
                    callback:"baiduSugTieba",
                    sc:"hao123"
                }
            }
        },
        zhidao:{
            action:"http://zhidao.baidu.com/q",
            q:"word",
            params:{
                tn:"ikaslist",
                ct:"17",
                sc:"hao123",
                rn:"20"
            },

            sug:{
                requestQuery:"wd",
                url:"http://nssug.baidu.com/su",
                callbackFn:"baidu.sug",
                callbackDataKey:"s",
                requestParas:{
                    prod:"zhidao",
                    sc:"hao123"
                }
            }
        },
        news:{
            action:"http://news.baidu.com/ns",
            q:"word",
            params:{
                tn:"news",
                sc:"hao123",
                ie:'utf-8'
            },

            sug:{
                requestQuery:"wd",
                url:"http://nssug.baidu.com/su",
                callbackFn:"baidu.sug",
                callbackDataKey:"s",
                requestParas:{
                    prod:"news",
                    sc:"hao123"
                }
            }
        },
        map:{
            action:"http://map.baidu.com/m",
            q:"word",
            params:{
                c:1, //cityId c ==> 全国
                sc:"hao123"
            }
        },
        allsearch:{ //整站检索,象这样没有TAB的建议把action,直接写在页面中,这里只给出sug参数
            sug:{
                url:"http://nssug.baidu.com/su",
                requestParas:{
                    prod:"hao123allsearch"
                },
                isSwitchForHotword:false //default is true
            }
        }
    };

    var search_input_word = $('search_input_word'),
        search_form = $('baidu_search_form'),
        sugResult = $('sug_result'),
        resultReg = /<span[^>]*>|<\/span>/ig,
        currentValue = '';
    window.baidu = {};
    window.baidu.sug = function (result) {
        var sugContent = ['<ol class="sug-result-list">'],
            sugList = result.s, index;

        if (sugList.length === 0) {
            sugResult.style.display = 'none';
            return;
        }

        index = search_input_word.value.length;

        for (var i = 0, len = sugList.length; i < len; i++) {
            sugContent.push('<li><span style="font-weight: normal;">' + search_input_word.value + '</span>' + sugList[i].substring(index) + '</li>');
        }
        sugContent.push('</ol>');
        sugResult.innerHTML = sugContent.join('');
        sugResult.style.display = 'block';
    };

    on(sugResult, 'mouseover', function (event) {
        event = event || window.event;
        var target = event.target || event.srcElement;
        if (target.nodeType && target.nodeType == 1 && target.nodeName.toLowerCase() === 'li') {
            var results = sugResult.getElementsByTagName('li');
            for (var i = 0, len = results.length; i < len; i++) {
                results[i].className = '';
            }
            target.className = 'sug-item-over';
        }
    });

    on(sugResult, 'mouseout', function (event) {
        event = event || window.event;
        var target = event.target || event.srcElement;
        if (target.nodeType && target.nodeType == 1 && target.nodeName.toLowerCase() === 'li') {
            target.className = '';
        }
    });

    on(sugResult, 'click', function (event) {
        event = event || window.event;
        var target = event.target || event.srcElement;
        if (target.nodeType && target.nodeType == 1 && target.nodeName.toLowerCase() === 'li') {
            search_input_word.value = target.innerHTML.replace(resultReg, '');
            search_form.submit();
            sugResult.style.display = 'none';
        }
    });


    on(search_input_word, 'keyup', function (event) {
        event = event || window.event;
        var target = event.target || event.srcElement,
            keyCode = event.keyCode,
            sugItem, script,
            requestParas,
            searchArgs, searchArg;
        if ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 65 && keyCode <= 90) || (keyCode >= 96 && keyCode <= 105) || keyCode == 8 || keyCode == 32 || keyCode == 13) {
            sugItem = searchConfig[search_form.getAttribute('search_des')].sug;
            requestParas = sugItem.requestParas;
            searchArgs = encodeURIComponent(sugItem.requestQuery) + '=' + encodeURIComponent(target.value);
            for (searchArg in requestParas) {
                searchArgs += '&' + encodeURIComponent(searchArg) + '=' + encodeURIComponent(requestParas[searchArg]);
            }

            script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = sugItem.url + '?' + searchArgs;
            document.body.replaceChild(script, document.body.lastChild);
            currentValue = search_input_word.value;
        }


    });

    on(search_input_word, 'keydown', function (event) {
        event = event || window.event;
        if (event.keyCode === 13) {
            sugResult.style.display = 'none';
        }
        if (sugResult.style.display !== 'none') {
            var results = sugResult.getElementsByTagName('li'),
                current = getElementsByClassName(sugResult, 'sug-item-over');
            if (event.keyCode === 38) {//上箭头
                if (current.length === 0) {
                    var last = results[results.length - 1];
                    last.className = 'sug-item-over';
                    search_input_word.value = last.innerHTML.replace(resultReg, '');
                }
                else {
                    current = current[0];
                    if (current == results[0]) {
                        current.className = '';
                        search_input_word.value = currentValue;
                    }
                    else {
                        for (var i = 1, len = results.length; i < len; i++) {
                            if (current == results[i]) {
                                current.className = '';
                                results[i - 1].className = 'sug-item-over';
                                search_input_word.value = results[i - 1].innerHTML.replace(resultReg, '');
                            }
                        }
                    }
                }
            }

            if (event.keyCode === 40) {//下箭头
                if (current.length === 0) {
                    results[0].className = 'sug-item-over';
                    search_input_word.value = results[0].innerHTML.replace(resultReg, '');
                }
                else {
                    current = current[0];
                    if (current === results[results.length - 1]) {
                        current.className = '';
                        search_input_word.value = currentValue;
                    }
                    else {
                        for (var i = 0, len = results.length - 1; i < len; i++) {
                            if (current == results[i]) {
                                current.className = '';
                                results[i + 1].className = 'sug-item-over';
                                search_input_word.value = results[i + 1].innerHTML.replace(resultReg, '');
                            }
                        }
                    }
                }
            }
        }
    });
    on(document.body, 'mousedown', function (event) {
        sugResult.style.display = 'none';
    });
    on(sugResult, 'mousedown', function (event) {
        preventDefault(getEvent(event));
    });
    var sethome = $('set_home');

    var UA = (function (WIN, UA) {
        var key = {        //关键字常量
            ie:"msie",
            sf:"safari",
            tt:"tencenttraveler"
        },

            //正则列表
            reg = {
                browser:"(" + key.ie + "|" + key.sf + "|firefox|chrome|opera)",
                shell:"(maxthon|360se|theworld|se|theworld|greenbrowser|qqbrowser)",
                tt:"(tencenttraveler)",
                os:"(windows nt|macintosh|solaris|linux)"
            },

            //ua匹配方法
            uaMatch = function (str) {
                var reg = new RegExp(str + "\\b[ \\/]?([\\w\\.]*)", "i"),
                    result = UA.match(reg);
                return result ? result.slice(1) : ["", ""];
            },

            //特殊浏览器检测
            is360 = function () {

                //高速模式
                var result = UA.toLowerCase().indexOf("360chrome") > -1 ? !!1 : !1,
                    s;

                //普通模式
                try {
                    if (WIN.external && WIN.external.twGetRunPath) {
                        s = WIN.external.twGetRunPath;
                        if (s && s.toLowerCase().indexOf("360se") > -1) {
                            result = !!1;
                        }
                    }
                } catch (e) {
                    result = !1
                }
                return result;
            }(),

            //特殊检测maxthon返回版本号
            maxthonVer = function () {
                try {
                    if (/(\d+\.\d)/.test(external.max_version)) {
                        return parseFloat(RegExp['\x241']);
                    }
                } catch (e) {
                }
            }(),

            browser = uaMatch(reg.browser),
            shell = uaMatch(reg.shell),
            os = uaMatch(reg.os);

        //修正部分IE外壳浏览器
        if (browser[0].toLowerCase() === key.ie) {

            //360
            if (is360) {
                shell = ["360se", ""];
            } else if (maxthonVer) {
                shell = ["maxthon", maxthonVer];
            } else if (shell == ",") {
                shell = uaMatch(reg.tt);
            }
        } else if (browser[0].toLowerCase() === key.sf) {

            //特殊处理sf的version
            browser[1] = uaMatch("version") + "." + browser[1];
        }

        return {
            browser:browser.join(","),
            shell:shell.join(","),
            os:os.join(",")
        };
    })(window, navigator.userAgent);

    var indexSetHome = {

        //配置跳转锚点
        config:{

            //配置帮助页面地址
            helpUrl:"http://www.hao123.com/redian/sheshouyef.htm",

            //外壳浏览器
            shell:{
                //360
                "360se":"02",
                "maxthon":"03",
                //搜狗
                "se":"04",
                "qqbrowser":"05",
                "theworld":"10",
                "greenbrowser":"12"
            },

            //内核浏览器
            browser:{
                "firefox":"ff",
                "chrome":"08",
                "opera":"09",
                "safari":"11"
            }
        },

        //设置主页或跳转方法
        set:function (el, url) {

            //浏览器
            var browser = UA.browser.split(",")[0].toLowerCase(),

                //外壳
                shell = UA.shell.split(",")[0].toLowerCase(),

                config = this.config,

                helpUrl = config.helpUrl,

                errorTip = "\u60A8\u7684\u6D4F\u89C8\u5668\u4E0D\u652F\u6301\uFF0C\u8BF7\u624B\u52A8\u8BBE\u7F6E",

                setForIE = function () {
                    try {
                        el.style.behavior = 'url(#default#homepage)';
                        el.setHomePage(url);
                    } catch (e) {
                        alert(errorTip);
                    }
                };

            if (browser === "msie" && (!shell || shell === "tencenttraveler")) {
                setForIE();
                return false;
            } else if (shell && config.shell[shell]) {

                //alert(shell)
                helpUrl += "#" + config.shell[shell];

                //测试发现maxthon也会注入UA
                if (shell === "maxthon") {
                    try {
                        if (external.max_version) {
                            window.open(helpUrl);
                            return false;
                        } else {
                            setForIE();
                            return false;
                        }
                    } catch (e) {
                        setForIE();
                        return false;
                    }
                } else {
                    window.open(helpUrl);
                    return false;
                }
            } else if (config.browser[browser]) {
                //测试发现maxthon3跳至chrome
                if (browser === "chrome") {
                    try {
                        if (external.max_version) {
                            helpUrl += "#" + "03";
                            window.open(helpUrl);
                            return false;
                        } else {
                            helpUrl += "#" + config.browser[browser];
                            window.open(helpUrl);
                            return false;
                        }
                    } catch (e) {
                        helpUrl += "#" + config.browser[browser];
                        window.open(helpUrl);
                        return false;
                    }
                } else {
                    helpUrl += "#" + config.browser[browser];
                    window.open(helpUrl);
                    return false;
                }
            } else {
                alert(errorTip);
                return false;
            }
        },

        //绑定对象接口
        bind:function (el, url) {

            //允许id或dom
            el = typeof el === "string" ? document.getElementById(el) : el;

            url = url || 'http://www.hao123.com';

            var that = this;


            on(el, "click", function () {
                that.set(el, url);
                return false;
            });

            //允许链式绑定多个dom对象
            return this;
        }
    };
    if (sethome) {
        indexSetHome.bind(sethome);
    }
})();