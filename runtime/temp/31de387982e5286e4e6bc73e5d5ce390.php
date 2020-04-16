<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"D:\phpStudy\PHPTutorial\WWW\Tst\public/../application/admin\view\login\index.html";i:1586999863;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>登录</title>
    <link rel="stylesheet" href="/static/frame/layui/css/layui.css">
    <link rel="stylesheet" href="/static/frame/static/css/style.css">
    <link rel="icon" href="/static/frame/static/image/code.png">
    <script type="text/javascript" src="/static/js/jquery.min.js"></script>
    <script type="text/javascript" src="/static/js/jsencrypt.min.js"></script>
</head>

<body class="login-body body">



<div class="login-box">

    <form class="layui-form layui-form-pane" method="post" action="return false">

        <div class="layui-form-item">

            <h3>仕途学校---营销系统</h3>

        </div>

        <div class="layui-form-item">

            <label class="layui-form-label">账号：</label>



            <div class="layui-input-inline">

                <input type="text" name="account" class="layui-input" lay-verify="account" placeholder="账号"

                       autocomplete="on" maxlength="20"/>

            </div>

        </div>

        <div class="layui-form-item">

            <label class="layui-form-label">密码：</label>



            <div class="layui-input-inline">

                <input type="password" name="password" class="layui-input" lay-verify="password" placeholder="密码"

                       maxlength="20"/>

            </div>

        </div>

        <div class="layui-form-item">

            <label class="layui-form-label">验证码：</label>



            <div class="layui-input-inline">

                <input type="number" name="code" class="layui-input" lay-verify="code" placeholder="验证码" maxlength="4"/><img src="<?php echo url('Login/verify'); ?>" alt="" onclick="this.src='<?php echo url('Login/verify'); ?>'">

            </div>

        </div>

        <div class="layui-form-item">  
            <!--<button type="reset" class="layui-btn layui-btn-danger btn-reset">重置</button>-->
            <button type="button" class="layui-btn btn-submit" lay-submit="" lay-filter="sub" style="width:300px;">立即登录</button>
        </div>

    </form>

</div>



<script type="text/javascript" src="/static/frame//layui/layui.js"></script>

<script type="text/javascript">

    layui.use(['form', 'layer'], function () {



        // 操作对象

        var form = layui.form

                , layer = layui.layer

                , $ = layui.jquery;



        // 验证

        form.verify({

            account: function (value) {

                if (value == "") {

                    return "请输入用户名";

                }

            },

            password: function (value) {

                if (value == "") {

                    return "请输入密码";

                }

            },

            code: function (value) {

                if (value == "") {

                    return "请输入验证码";

                }

            }

        });



        // 提交监听

        form.on('submit(sub)', function (data) {

            var name = RSA_openssl(data.field.account);

            var pass = RSA_openssl(data.field.password);

            var code = RSA_openssl(data.field.code);


            $.post("<?php echo url('Login/jmcheck'); ?>",{name:name,pass:pass,code:code},function(data){

                if(data.code === 1){

                    alert(data.msg);

                }else if(data.code === 2){

                    window.location.href = "http://www.sdgyt.com/admin.php/";

                }else if(data.code === 3){

                    alert(data.msg);

                }


            },'json');

        });

    })



    // 加密公钥

    function RSA_openssl(str){



        var encrypt = new JSEncrypt();



        encrypt.setPublicKey('MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQC/Z9obCooMO+R430r83y8EEwbpJKe4OQ7LiUPXKdku/LUheORNKGtHPsyAPTxSDhVla3gGEwW+FQ9y5gV0ESnzqoY0BHJ7whPOfY1H9pHIklHXE24bC/NH7TBcLpF36iG641i6Ti+b2cQTB8L+77FE2SFANpZyJwB5XjxK9JWpKwIDAQAB');//公钥



        var encrypted = encrypt.encrypt(str);



        return encrypted;



    }



</script>

</body>

</html>

