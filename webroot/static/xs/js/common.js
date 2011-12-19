/**
 * Created by JetBrains PhpStorm.
 * User: liupengtao
 * Date: 11-12-19
 * Time: ÏÂÎç6:37
 * To change this template use File | Settings | File Templates.
 */
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
            fn(array[i], i, array);
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