/**
 * Created by JetBrains PhpStorm.
 * User: liupengtao
 * Date: 11-12-6
 * Time: ����1:23
 * To change this template use File | Settings | File Templates.
 */
(function () {

    function getElementsByClassName(el, className) {
        if (typeof el.getElementsByClassName === 'function') {
            return el.getElementsByClassName(className);
        }
        var childNodes = el.getElementsByTagName('*'),
            resultNodes = [],
            node;
        for (var i = 0 , len = childNodes.length; i < len; i++) {
            node = childNodes[i];
            if (node.nodeType === 1) {
                if (node.className.indexOf(className) > -1) {
                    resultNodes.push(node);
                }
            }
        }
        return resultNodes;
    }

    var Arr = {},
        slice = Array.prototype.slice;
    Arr.forEach = function (array, fn) {
        if (typeof array.forEach === 'function') {
            array.forEach(fn);
        }
        else {
            for (var i = 0, len = array.length; i < len; i++) {
                fn.call(array, array[i], i, array);
            }
        }
    };

    Arr.indexOf = function (array, value) {
        if (typeof array.indexOf === 'function') {
            return array.indexOf(value);
        }
        for (var i = 0, len = array.length; i < len; i++) {
            if (array[i] === value) {
                return i;
            }
        }
        return -1;
    };

    function $(id) {
        return document.getElementById(id);
    }

    function toggle(el, srcReg, destStr) {
        el.className = el.className.replace(srcReg, destStr);
    }

    function bind(fn, context) {
        var outerArgs = slice.call(arguments, 2);
        return function () {
            var innerArgs = slice.call(arguments);
            var finalArgs = innerArgs.concat(outerArgs);
            return fn.apply(context, finalArgs);
        }
    }

    function addEventListener(el, type, listener, capture) {
        if (el.addEventListener) {
            el.addEventListener(type, listener, capture);
        }
        else if (el.attachEvent) {
            el.attachEvent('on' + type, listener);
        }
        else {
            el['on' + type] = listener;
        }
    }

    function getEvent(event) {
        return event ? event : window.event;
    }

    function getTarget(event) {
        return event.target || event.srcElement;
    }

    function preventDefault(event) {
        if (event.preventDefault) {
            event.preventDefault();
            event.stopPropagation();
        }
        else {
            event.returnValue = false;
            event.cancelBubble = true;
        }
    }

    /**
     * cookie����
     */
    var hao = {};
    hao.xs = {};
    hao.xs.cookie = {
        /*
         �������ƣ�hao.cartoon.cookie.get([string name])
         �������ܣ��õ�Cookie
         ������name ��ѡ�Ҫȡ�õ�Cookie����
         ˵����nameΪ��ʱ��ͨ��������ʽ����ȫ��Cookie��name��Ϊ��ʱ���ش�Cookie���Ƶ�ֵ��û���κ�ֵʱ����undefined
         */
        get:function (name) {
            var cv = document.cookie.split("; ");//ʹ��"; "�ָ�Cookie
            var cva = [], cvat = [], cvam = [], temp;
            /*ѭ���ĵõ�Cookie������ֵ*/
            for (i = 0; i < cv.length; i++) {
                temp = cv[i].split("=");//��"="�ָ�Cookie��������ֵ
                if (temp[0].indexOf("_divide_") > 0) {
                    cvam[temp[0]] = (temp[1] || "");
                } else {
                    if (temp[0] != "") cvat[i] = [temp[0], temp[1] || ""];
                }
            }
            for (i = 0; i < cvat.length; i++) {
                if (cvat[i]) {
                    if (cvat[i][1].substr(0, 8) != "^divide|") {
                        /*С��4K��Cookie����*/
                        cva[cvat[i][0]] = unescape(cvat[i][1]);
                    } else {
                        /*����4K��Cookie����*/
                        var sta = cvat[i][1].indexOf("$"), tot = cvat[i][1].substring(8, sta);
                        cva[cvat[i][0]] = cvat[i][1].substring(sta + 1);
                        for (j = 1; j < tot; j++) {
                            cva[cvat[i][0]] += cvam[cvat[i][0] + "_divide_" + j];
                        }
                        cva[cvat[i][0]] = unescape(cva[cvat[i][0]]);
                    }
                }
            }
            if (name) return cva[name];//�����name��������name��Cookieֵ
            else return cva;//���û��name�����������Ϊkey��ֵΪValue������
        },
        /*
         �������ƣ�hao.cartoon.cookie.set(string name, string   value[, int expires[, string path[, string domain[, string secure]]]])
         �������ܣ�����Cookie
         ������name ��Ҫ�Ҫ�����Cookie����
         value ��Ҫ�Ҫ�����Cookie���ƶ�Ӧ��ֵ
         expires ��ѡ�Cookie�Ĺ���ʱ�䣬������������Ϊ��λ�ı���ʱ�䣬Ҳ�����������ڸ�ʽ��wdy, DD-Mon-YYYY HH:MM:SS GMT���ĵ���ʱ��
         path ��ѡ�Cookie�ڷ������˵���Ч·��
         domain ��ѡ���Cookie����Ч����
         secure ��ѡ� ָ��Cookie �Ƿ��ͨ����ȫ�� HTTPS ���Ӵ��ͣ�0��false���ʱΪ��
         ˵��������ɹ��򷵻�true������ʧ�ܷ���false
         */
        set:function (name, value, expires, path, domain, secure, divide) {
            if (!divide) var value = escape(value);
            if (!name || !value) return false;//���û��name��value�򷵻�false
            if (name == "" || value == "") return false;//���name��valueΪ���򷵻�false
            /*���ڹ���ʱ��Ĵ���*/
            if (expires) {
                /*��������������GMTʱ�䣬��ǰʱ���������Ϊ��λ��expires*/
                if (/^[0-9]+$/.test(expires)) {
                    var today = new Date();
                    expires = new Date(today.getTime() + expires * 1000).toGMTString();
                    /*�ж�expires��ʽ�Ƿ���ȷ������ȷ��ֵΪundefined*/
                } else if (!/^wed, \d{2} \w{3} \d{4} \d{2}\:\d{2}\:\d{2} GMT$/.test(expires)) {
                    expires = undefined;
                }
            }
            if (name.indexOf("_divide_") < 1 && !divide) {
                this.del(name, path, domain);//ɾ��ǰһ�δ����Cookie
            }
            /*�ϲ�cookie�����ֵ*/
            var cv = name + "=" + value + ";"
                + ((expires) ? " expires=" + expires + ";" : "")
                + ((path) ? "path=" + path + ";" : "")
                + ((domain) ? "domain=" + domain + ";" : "")
                + ((secure && secure != 0) ? "secure" : "");
            /*�ж�Cookie�ܳ����Ƿ����4K*/
            if (cv.length < 4096) {
                document.cookie = cv;//д��cookie
            } else {
                /*���ڴ���4K��Cookie�Ĳ���*/
                var max = Math.floor(value.length / 3800) + 1;
                for (i = 0; i < max; i++) {
                    if (i == 0) {
                        this.Set(name, '^divide|' + max + '$' + value.substr(0, 3800), expires, path, domain, secure, true);
                    } else {
                        this.Set(name + "_divide_" + i, value.substr(i * 3800, 3800), expires, path, domain, secure, true);
                    }
                }
            }
            return true;
        },
        /*
         �������ƣ�hao.cartoon.Cookie.del(string name[, string path[, string domain]])
         �������ܣ�ɾ��Cookie
         ������name ��Ҫ�Ҫɾ����Cookie����
         path ��ѡ�Ҫɾ����Cookie�ڷ������˵���Ч·��
         domain ��ѡ�Ҫɾ����Cookie����Ч����
         ˵����ɾ���ɹ�����true��ɾ��ʧ�ܷ���false
         */
        del:function (name, path, domain) {
            if (!name) return false;//���û��name�򷵻�false
            if (name == "") return false;//���nameΪ���򷵻�false
            if (!this.get(name)) return false;//���Ҫɾ����nameֵ�������򷵻�false
            /*���ڴ���4K��Cookie���д���*/
            if (escape(this.get(name)).length > 3800) {
                var max = Math.floor(escape(this.get(name)).length / 3800) + 1;
                for (i = 1; i < max; i++) {
                    /*�ϲ�Cookie�����ֵ����ɾ��*/
                    document.cookie = name + "_divide_" + i + "=;"
                        + ((path) ? "path=" + path + ";" : "")
                        + ((domain) ? "domain=" + domain + ";" : "")
                        + "expires=Thu, 01-Jan-1970 00:00:01 GMT;";
                }
            }
            /*�ϲ�Cookie�����ֵ����ɾ��*/
            document.cookie = name + "=;"
                + ((path) ? "path=" + path + ";" : "")
                + ((domain) ? "domain=" + domain + ";" : "")
                + "expires=Thu, 01-Jan-1970 00:00:01 GMT;";
            return true;
        }
    };

    function XS() {
    }

    var XS = {
        /**
         * ����С˵��վ����չ���۵�
         */
        _H_XS_COOKIE:'hao_xs_history',
        showReg:/\bshow\b/,
        hiddenReg:/\bhidden\b/,
        showClass:'show',
        hiddenClass:'hidden',
        historyList:$('history_list'),
        init:function () {
            this.searchItemSwitch();
            this.favsitesSwitch();
            this.initHistoryEvent();
            this.historySwitch();
            this.showFirstHistory();
            this.refreshHistory();
            this.initPageGoEvent();
        },
        favsitesSwitch:function () {
            var partialSitesDiv = $('partial_sites'),
                allSitesDiv = $('all_sites'),
                partialSitesOperation = $('partial_sites_operation'),
                allSitesOperation = $('all_sites_operation'),
                that = this;

            addEventListener(partialSitesOperation, 'click', bind(function (event) {
                toggle(partialSitesDiv, this.showReg, this.hiddenClass);
                toggle(allSitesDiv, this.hiddenReg, this.showClass);
                preventDefault(getEvent(event));
            }, that), false);

            addEventListener(allSitesOperation, 'click', bind(function (event) {
                toggle(allSitesDiv, this.showReg, this.hiddenClass);
                toggle(partialSitesDiv, this.hiddenReg, this.showClass);
                preventDefault(getEvent(event));
            }, that), false);
        },
        searchItemSwitch:function () {
            var searchNav = $('search_list'),
                searchArgsContainer = $('search_args'),
                searchForm = $('baidu_search_form'),
                that = this;
            addEventListener(searchNav, 'click', bind(function (event) {
                var target = getTarget(getEvent(event)),
                    searchArgMaps, searchArgMap, searchArgArr = [], i, len;
                if (target && target.nodeType && target.nodeName.toLowerCase() === 'a') {
                    var li = target.parentNode;
                    if (!li.className.match(/\bselected\b/)) {
                        Arr.forEach(searchNav.getElementsByTagName('li'), function (item) {
                            toggle(item, /\bselected\b/, '');
                        });

                        li.className = li.className.replace(/^\s+|\s+$/g, '') + ' selected';
                        searchArgMaps = target.search.slice(1).split('&');
                        for (i = 0, len = searchArgMaps.length; i < len; i++) {
                            searchArgMap = searchArgMaps[i].split('=');
                            searchArgArr.push('<input type="hidden" name="' + searchArgMap[0] + '" value = "' + searchArgMap[1] + '"/>');
                        }
                        searchForm.action = target.href;
                        searchArgsContainer.innerHTML = searchArgArr.join('');
                    }
                }
                preventDefault(getEvent(event));
            }, that), false);
        },
        historySwitch:function () {
            var allHistoryContainer = $('all_history'),
                oneHistoryContainer = $('one_history'),
                history_expand = $('history_expand'),
                history_collapse = $('history_collapse'),
                that = this;

            addEventListener(history_expand, 'click', bind(function (event) {
                toggle(oneHistoryContainer, this.showReg, this.hiddenClass);
                toggle(allHistoryContainer, this.hiddenReg, this.showClass);
            }, that), false);
            addEventListener(history_collapse, 'click', bind(function (event) {
                toggle(allHistoryContainer, this.showReg, this.hiddenClass);
                toggle(oneHistoryContainer, this.hiddenReg, this.showClass);
            }, that), false);
        },
        refreshHistory:function () {
            var historyCookies = this.getHistoryValue(XS._H_XS_COOKIE),
                historys = [],
                historyCookie;
            if (historyCookies) {
                if ((historyCookies = historyCookies.split('&')).length > 0) {
                    for (var i = 0, len = historyCookies.length; i < len; i++) {
                        historyCookie = historyCookies[i].split(',');

                        historys.push('<li class="history-item"><span class="history-index">' + (i + 1) + '</span><a class="history-title" href="' + historyCookie[1] + '" target="_blank">' + historyCookie[0] + '</a><a title="ɾ��" class="delete-history"></a></li>')
                    }
                    this.historyList.innerHTML = historys.join('');
                }
            }
            else {
                this.historyList.innerHTML = '';
            }
            this.showFirstHistory();
        },
        showFirstHistory:function () {
            var firstHistory = $('first_history'),
                historyCookies = this.getHistoryValue(XS._H_XS_COOKIE);

            if (historyCookies) {
                if ((historyCookies = historyCookies.split('&')).length > 0) {
                    var item = historyCookies[0].split(',');
                    firstHistory.innerHTML = item[0];
                    firstHistory.href = item[1];
                    firstHistory.target = '_blank';
                    return;
                }
            }

            firstHistory.innerHTML = '���������¼';
            firstHistory.href = '';
            delete firstHistory.target;
        },
        initHistoryEvent:function () {
            var bookLinks = getElementsByClassName($('data_list'), 'history-cookie'),
                that = this;

            //ΪС˵������Ӽ�¼�����ʷ�¼�
            Arr.forEach(bookLinks, function (item) {
                addEventListener(item, 'click', bind(function (event) {
                    var historys = hao.xs.cookie.get(XS._H_XS_COOKIE);
                    if (typeof historys === 'string') {
                        historys = historys.split(';');
                        if (historys.length >= 5) {
                            return;
                        }
                        if (Arr.indexOf(historys, item.title + ',' + item.href) === -1) {
                            historys.push(item.title + ',' + item.href);
                        }
                        else {
                            return;
                        }

                        hao.xs.cookie.set(XS._H_XS_COOKIE, historys.join('&'), '999999999');
                    } else {
                        hao.xs.cookie.set(XS._H_XS_COOKIE, item.title + ',' + item.href, '999999999');
                    }
                    this.refreshHistory();
                }, that), false);
            });

            //ɾ������cookie�����¼
            addEventListener(this.historyList, 'click', bind(function (event) {
                var target = getTarget(getEvent(event));
                if (target.nodeType && target.nodeName.toLowerCase() === 'a' && target.className.indexOf('delete-history') > -1) {
                    var li = target.parentNode,
                        title, url, preNode, index;
                    while ((preNode = target.previousSibling) != null && preNode.nodeType !== 1);
                    title = preNode.innerHTML;
                    url = preNode.href;

                    var historyCookies = hao.xs.cookie.get(XS._H_XS_COOKIE).split(';');
                    historyCookies.splice(Arr.indexOf(historyCookies, title + ',' + url), 1);
                    if (historyCookies.length === 0) {
                        hao.xs.cookie.del(XS._H_XS_COOKIE);
                    } else {
                        hao.xs.cookie.set(XS._H_XS_COOKIE, historyCookies.join(';'));
                    }
                    this.refreshHistory();
                }
            }, that), false);
            //�����ʷ��¼
            addEventListener($('clear-historys'), 'click', bind(function (event) {
                hao.xs.cookie.del(XS._H_XS_COOKIE);
                this.refreshHistory();
            }, that), false);
        },
        getHistoryValue:function (name) {
            var cookie = hao.xs.cookie.get(name),
                cookieValue = null, index;
            if (typeof cookie === 'string') {
                index = cookie.indexOf(';');
                cookieValue = cookie.substring(0, index === -1 ? cookie.length : index);
            }
            return cookieValue;
        },
        initPageGoEvent:function () {
            var go = $('go'),
                pageNum = $('pageNum'),
                that = this,
                count = parseInt(go.getAttribute('count')),
                pagego;
            addEventListener(go, 'click', bind(function (event) {
                pagego = parseInt(pageNum.value);
                if (!/^[1-9]\d*$/.test(pagego)) {
                    alert('��������ȷ��ҳ��');
                    preventDefault(getEvent(event));
                    return;
                }

                if (pagego < 1) {
                    pagego = 1;
                }
                if (pagego > count) {
                    pagego = count;
                }
                location.href = go.getAttribute('href_prefix') + pagego;
            }, that), false);
        }
    };

    XS.init();
})();
