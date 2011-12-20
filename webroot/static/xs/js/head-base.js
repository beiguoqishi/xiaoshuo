/**
 * Created by JetBrains PhpStorm.
 * User: liupengtao
 * Date: 11-12-20
 * Time: ����10:11
 * To change this template use File | Settings | File Templates.
 */
(function () {
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
                callbackFn:"baiduSugTieba", //tieba ��֧����ʽcallback
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
                c:1, //cityId c ==> ȫ��
                sc:"hao123"
            }
        },
        allsearch:{ //��վ����,������û��TAB�Ľ����action,ֱ��д��ҳ����,����ֻ����sug����
            sug:{
                url:"http://nssug.baidu.com/su",
                requestParas:{
                    prod:"hao123allsearch"
                },
                isSwitchForHotword:false //default is true
            }
        }
    };

    var doc = document,
        hotWord = doc.getElementById('m-hd-link'),
        searchWord = doc.getElementById('m-hd-word'),
        sethome = doc.getElementById('sethome'),
        tab = doc.getElementById('m-hd-tab'),

        curTabClass = 'cur',
        sugObj,
        searchArgs = doc.getElementById('m-hd-args'),
        searchForm = doc.getElementById('m-hd-form'),
        curTabObj = null;

    if (tab) {
        var tabLink = tab.children,
            tabLinkLength = tabLink.length;
    }
    var curTab = (function () {
        for (var i = 0; i < tabLinkLength; i++) {
            if (tabLink[i].className == curTabClass) {
                curTabObj = tabLink[i];
                return tabLink[i].getAttribute('data-t');
            }
        }
        //ִ�е���˵��û��TAB�������data-tд��form��
        return searchForm.getAttribute('data-t') || 'web';

    })();


    var sugArgDefaut = {                                //input����id(string)��dom
        classNameWrap:"sug-wrap", //��ʾ�������ʽ�ӿ�
        classNameQuery:"sug-query", //��ѯƥ����ʽ
        classNameSelect:"sug-select", //�б�ѡ����ʽ
        classNameClose:"sug-close", //�رհ�ť��ʽ
        classNameQueryNull:"sug-querynull",
        autoFocus:false, //�Զ���
        delay:200, //����������Ӧʱ��
        charset:"gbk", //��������
        n:10, //�����ʾ�б���
        requestQuery:"wd", //��ѯ����
        requestParas:{                                            //�������
            prod:"hao123s"
        },
        url:'http://suggestion.baidu.com/su', //���ݽӿڵ�ַ

        callbackFn:"baidu.sug", //�ص��ӿ�
        callbackDataKey:"s", //�ص�key
        query:"wd"
    };
    var on = doc.addEventListener ? function (el, type, fun) {
        el.addEventListener(type, fun, false);
    } : function (el, type, fun) {
        el.attachEvent("on" + type, fun);
    }
    if (tab) {
        on(tab, 'click', function (e) {
            e = fineEvent(e);
            if (e.targetName == 'a' && searchWord) {
                curTab = e.target.getAttribute('data-t');
                curTabObj.className = '';
                curTabObj = e.target;
                curTabObj.className = curTabClass;
                switchSearcArgs(curTab);
            }
        });
    }
    function switchSearcArgs(curTabPRA) {
        var configData = searchConfig[curTabPRA];
        searchForm.action = configData.action;
        searchWord.name = configData.q;
        //reset form
        searchArgs.innerHTML = (function () {
            var ret = [];
            for (var name in configData.params) {
                ret.push('<input type="hidden" name="' + name + '" value="' + configData.params[name] + '"/>');
            }
            return ret.join("");

        })();
        sugObj && sugObj.reset(configData.sug);
    }

    //�������SUG,��Ҫ����ͬ��Ĭ��ֵ
    window.sugArgDefautl_base = sugArgDefaut;
    //sug��ʾ
    if (window.G) {
        sugObj = G.sug(searchWord, sugArgDefaut);
        sugObj.reset(searchConfig[curTab].sug);
    }
    //���Ѵ�
    if (hotWord) {
        on(hotWord, 'click', function (e) {
            e = fineEvent(e);
            if (e.targetName == 'a') {
                searchWord.value = e.target.innerHTML;
                if (curTab != 'web' && searchConfig[curTab].sug.isSwitchForHotword) {
                    switchSearcArgs('web');
                    searchForm.submit();
                    /*�ָ�ԭ������������*/
                    switchSearcArgs(curTab);
                }
                else {
                    searchForm.submit();
                }
                return false;
            }
        });
    }
    //��Ϊ��ҳ

    var UA = (function (WIN, UA) {
        var key = {        //�ؼ��ֳ���
            ie:"msie",
            sf:"safari",
            tt:"tencenttraveler"
        },

            //�����б�
            reg = {
                browser:"(" + key.ie + "|" + key.sf + "|firefox|chrome|opera)",
                shell:"(maxthon|360se|theworld|se|theworld|greenbrowser|qqbrowser)",
                tt:"(tencenttraveler)",
                os:"(windows nt|macintosh|solaris|linux)"
            },

            //uaƥ�䷽��
            uaMatch = function (str) {
                var reg = new RegExp(str + "\\b[ \\/]?([\\w\\.]*)", "i"),
                    result = UA.match(reg);
                return result ? result.slice(1) : ["", ""];
            },

            //������������
            is360 = function () {

                //����ģʽ
                var result = UA.toLowerCase().indexOf("360chrome") > -1 ? !!1 : !1,
                    s;

                //��ͨģʽ
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

            //������maxthon���ذ汾��
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

        //��������IE��������
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

            //���⴦��sf��version
            browser[1] = uaMatch("version") + "." + browser[1];
        }

        return {
            browser:browser.join(","),
            shell:shell.join(","),
            os:os.join(",")
        };
    })(window, navigator.userAgent);

    var indexSetHome = {

        //������תê��
        config:{

            //���ð���ҳ���ַ
            helpUrl:"http://www.hao123.com/redian/sheshouyef.htm",

            //��������
            shell:{
                //360
                "360se":"02",
                "maxthon":"03",
                //�ѹ�
                "se":"04",
                "qqbrowser":"05",
                "theworld":"10",
                "greenbrowser":"12"
            },

            //�ں������
            browser:{
                "firefox":"ff",
                "chrome":"08",
                "opera":"09",
                "safari":"11"
            }
        },

        //������ҳ����ת����
        set:function (el, url) {

            //�����
            var browser = UA.browser.split(",")[0].toLowerCase(),

                //���
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

                //���Է���maxthonҲ��ע��UA
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
                //���Է���maxthon3����chrome
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

        //�󶨶���ӿ�
        bind:function (el, url) {

            //����id��dom
            el = typeof el === "string" ? document.getElementById(el) : el;

            url = url || 'http://www.hao123.com';

            var that = this;
            on = document.addEventListener ? function (el, type, callback) {
                el.addEventListener(type, callback, !1);
            } : function (el, type, callback) {
                el.attachEvent("on" + type, callback);
            };

            on(el, "click", function () {
                that.set(el, url);
                return false;
            });

            //������ʽ�󶨶��dom����
            return this;
        }
    };
    if (sethome) {
        indexSetHome.bind(sethome);
    }
    /*--------------------------------------------------*/
    function fineEvent(e) {
        e = e || window.event;
        if (!e.target) {
            e.target = e.srcElement;
        }
        e.targetName = e.target.nodeName.toLowerCase();
        return e;
    }
})();