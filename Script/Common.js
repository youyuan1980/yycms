﻿//获取Request参数值
function GetRequest(s) {
    var url = location.search;
    if (url.length == 0) {
        return "";
    }
    if (url.indexOf("?") != -1) {
        var str = url.substr(1)     //去掉?号   
        var Request = new Object();
        strs = str.split("&");
        for (var i = 0; i < strs.length; i++) {
            Request[strs[i].split("=")[0].toUpperCase()] = unescape(strs[i].split("=")[1]);
        }
    }
    return Request[s.toUpperCase()];
}

function log(s) {
    console.log(s);
}

/**
* 删除左右两端的空格
*/
String.prototype.trim=function()
{
     return this.replace(/(^\s*)(\s*$)/g, '');
}


function ts(text) {
    if (confirm(text))
    { return true; }
    else {return false;}
}

function back() {
    var url = GetRequest("source");
    location.href = url;
}