    var userAgent = navigator.userAgent.toLocaleLowerCase();
    var isFireFox = /mozilla/.test(userAgent) && !/(compatible|webkit)/.test(userAgent);
    if(isFireFox){
        window.showModelessDialog() = function(url)
        {
            alert(222);
            var windowName = (arguments[1] == null ? "" : arguments[1].toString());
            var feature = (arguments[2] == null ? "" : arguments[2].toString());
            var OpenedWindow = window.open(url,windowName,feature);
            window.addEventListener('click',function(){OpenedWindow.focus();},false);
            return OpenedWindow;
        }
    }else{
        var originFn = window.showModelessDialog
            window.showModelessDialog = function(url){
            var OpenedWiondow = originFn(url,arguments[1],arguments[2]);
            OpenedWiondow.opener = window
        }
    }


function popW(s){
    var OpenedWiondow = window.showModelessDialog(s,'','dialogLeft:380px;dialogTop:365px;dialogWidth:759px;dialogHeight:5px');
}
//-->