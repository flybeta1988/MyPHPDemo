<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Http Basic Authorization</title>
    <script src="/public/js/base64.js"></script>
    <script src="/public/js/jquery-3.3.1.js"></script>
    <script type="text/javascript">

        //需要Base64见：http://www.webtoolkit.info/javascript-base64.html
        function make_basic_auth(user, password) {
            var tok = user + ':' + password;
            var hash = Base64.encode(tok);
            return "Basic " + hash;
        }

        var auth = make_basic_auth('flybeta','123456');
        var url = '/auth/ajax.php';

        function test() {

            $.ajax({
                url : url,
                method : 'POST',
                beforeSend : function(req) {
                    req.setRequestHeader('Authorization', auth);
                }
            });
        }

    </script>
</head>
<body>
<a href="javascript:;" onclick="test();">测试</a>
</body>
</html>