class Ajax {
    static request(args) {
        if (Object.prototype.toString.call(args) !== '[object Object]') {
            return undefined;
        }

        var url = args.url || '';
        var data = args.data || {};
        var type = args.type || 'json';
        var method = args.method ? args.method.toUpperCase() : 'GET';

        var xhr;
        if (window.XMLHttpRequest) {
            // IE7+, Firefox, Chrome, Opera, Safari 代码
            xhr = new XMLHttpRequest();
        } else {
            // IE6, IE5 代码
            xhr = new ActiveXObject("Microsoft.XMLHTTP")
        }

        xhr.responseType = type;

        xhr.withCredentials = false; //指示是否应使用Cookie或授权表头等凭据进行跨站点访问控制请求

        xhr.open("GET", url, true)
        if ('POST' === method) {
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
        }
        xhr.send('POST' === method ? data : null);

        xhr.onreadystatechange = function () {
            //console.log("http.readyState:" + xhr.readyState + " http.status=" + xhr.status);
            if (4 === xhr.readyState) {
                if (200 === xhr.status) {
                    console.log('ok');
                    if (args.success && 'function' === typeof args.success) {
                        args.success(xhr.response);
                    }
                } else {
                    if (args.error && 'function' === typeof args.error) {
                        args.error(new Error(xhr.statusText));
                    }
                }
            }
        }
    }
}