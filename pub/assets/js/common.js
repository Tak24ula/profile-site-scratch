
/* ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 *
 *
 *
 *      Browser 判定
 *
 *
 *
 :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */

var ua = navigator.userAgent.toLowerCase();
var ver = navigator.appVersion.toLowerCase();

// IE(11以外)
var isMSIE = (ua.indexOf('msie') > -1) && (ua.indexOf('opera') == -1);
// IE6
var isIE6 = isMSIE && (ver.indexOf('msie 6.') > -1);
// IE7
var isIE7 = isMSIE && (ver.indexOf('msie 7.') > -1);
// IE8
var isIE8 = isMSIE && (ver.indexOf('msie 8.') > -1);
// IE9
var isIE9 = isMSIE && (ver.indexOf('msie 9.') > -1);
// IE10
var isIE10 = isMSIE && (ver.indexOf('msie 10.') > -1);
// IE11
var isIE11 = (ua.indexOf('trident/7') > -1);
// IE
var isIE = isMSIE || isIE11;
// Edge
var isEdge = (ua.indexOf('edge') > -1);

// Google Chrome
var isChrome = (ua.indexOf('chrome') > -1) && (ua.indexOf('edge') == -1);
// Firefox
var isFirefox = (ua.indexOf('firefox') > -1);
// Safari
var isSafari = (ua.indexOf('safari') > -1) && (ua.indexOf('chrome') == -1);
// Opera
var isOpera = (ua.indexOf('opera') > -1);


/* ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 *
 *
 *
 *      common function
 *
 *
 *
 :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */

/*
 *  関数　判定
 *
 * @param {type} obj
 * @returns {Boolean}
 */
var isFunction = function (obj) {
    return typeof(obj) === "function";
},

/*
 *  JSON形式　判定
 *
 * @param {type} jsondata
 * @returns {Boolean}
 */
isJson = function( jsondata ){
    if(!jsondata) return false;
    if(!JSON) return false;
    try{
         JSON.parse(jsondata);
    }catch(e){
        return false;
    }
    return true;
};

/*
 * Document要素取得の短縮
 *
 * @returns {xhr_request2}
 */
var $$ = (function(id){
    return document.getElementById(id);
});

/* ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 *
 *
 *
 *      Post Form Class Function
 *
 *
 *
 :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */

/*
 * XMLHttpRequest Form送信 ( クラス関数 )
 *
 * @returns {xhr_request2}
 */
function xhr_request2(){}
(function (xreqproto){
    var xhreq, form, case0, case1, case2, case3, case4, xdefault, xmethod, xaction, xbool;

    var funcs = {
        init : function( action, method, bool ){
            if( action == null ) action =  "./";
            if( method == null ) method =  "GET";
            if( bool == null ) bool =  true;

            form = new FormData(),
            xhreq = new XMLHttpRequest();
            xhreq.open( method, action, bool );
            xmethod = method;
            xaction = action;
            xbool = bool;
        },
        param : function( name , value ){
            form.append( name , value );
        },
        fileset : function( filename , bin , type ){
            if( type == null ) type =  "text/xml";

            var blob = new Blob([bin], { type: type });
            form.append( filename , blob );
        },
        send : function(data){
            xhreq.onreadystatechange = function(){
                xhr_onreadystatechange(xhreq);
            };
            ( data )? xhreq.send( data ) : xhreq.send( form );
        }
    },
    orsc = {
        state : function(casex , func){
            if( casex === 0 ) case0 = func ;
            if( casex === 1 ) case1 = func ;
            if( casex === 2 ) case2 = func ;
            if( casex === 3 ) case3 = func ;
            if( casex === 4 ) case4 = func ;
        }
    },
    xhr_onreadystatechange = function(xhreq){
        switch( xhreq.readyState){
            case 0: if( isFunction(case0) ) case0( xhreq ) ; break;
            case 1: if( isFunction(case1) ) case1( xhreq ) ; break;
            case 2: if( isFunction(case2) ) case2( xhreq ) ; break;
            case 3: if( isFunction(case3) ) case3( xhreq ) ; break;
            case 4: if( isFunction(case4) ) case4( xhreq ) ; break;
            default: if( isFunction(xdefault) ) xdefault( xhreq ) ; break;
        }
    };

    xreqproto.orsc = orsc;
    xreqproto.func = {
        fileset: funcs.fileset,
        param: funcs.param,
        send : funcs.send,
        init : funcs.init
    };

})(xhr_request2.prototype);
