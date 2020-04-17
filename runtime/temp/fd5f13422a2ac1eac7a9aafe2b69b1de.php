<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"D:\phpstudy_pro\WWW\www.sdgyt.com\public/../application/admin\view\index\index.html";i:1586999863;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>SEM资源管理系统</title>
    <link rel="stylesheet" href="/static/frame/layui/css/layui.css">
    <link rel="stylesheet" href="/static/frame/static/css/style.css">
    <link rel="icon" href="/static/frame/static/image/code.ico">
    <script type="text/javascript" src="/static/js/jquery.min.js"></script>
    <script type="text/javascript" src="/static/frame/layui/layui.js"></script>
    <script type="text/javascript" src="/static/frame/static/js/vip_comm.js"></script>
</head>
<body>
<!-- layout admin -->
<div class="layui-layout layui-layout-admin"> <!-- 添加skin-1类可手动修改主题为纯白，添加skin-2类可手动修改主题为蓝白 -->

    <!-- header -->
    <div class="layui-header my-header">

        <a href="javascript:;">

            <img class="my-header-logo" src="/static/img/logo.png" alt="logo" style="width: 50px;height: 50px;margin: 0px;padding: 0px;">

            <span class="my-header-logo" style="margin: 0px; padding-left: 0px;">仕途学校---营销系统</span>

        </a>

        <div class="my-header-btn">

            <button class="layui-btn layui-btn-small btn-nav"><i class="layui-icon">&#xe65f;</i></button>

        </div>

        <!-- 顶部右侧添加选项卡监听 -->

        <ul class="layui-nav my-header-user-nav" lay-filter="side-top-right">

            <!-- <li class="layui-nav-item"><a href="javascript:;" class="pay" href-url="">支持作者</a></li> -->

            <li class="layui-nav-item">

                <a class="name" href="javascript:;"><i class="layui-icon">&#xe629;</i>主题</a>

                <dl class="layui-nav-child">

                    <dd data-skin="0"><a href="javascript:;">默认</a></dd>

                    <dd data-skin="1"><a href="javascript:;">纯白</a></dd>

                    <dd data-skin="2"><a href="javascript:;">蓝白</a></dd>

                </dl>

            </li>

            <li class="layui-nav-item">

                <a class="name" href="javascript:;"><img src="/static/img/logo.png" alt="logo"> <?php echo \think\Session::get('user_nickname'); ?></a>

                <dl class="layui-nav-child">
                    <dd><a href="javascript:;" href-url="<?php echo url('Index/pass_edit'); ?>"><i class="layui-icon">&#xe638;</i>修改密码</a></dd>
                    <dd><a href="javascript:;" id="logout"><i class="layui-icon">&#x1007;</i>退出</a></dd>
                </dl>

            </li>

        </ul>



    </div>

    <!-- side -->

    <div class="layui-side my-side">

        <div class="layui-side-scroll">

            <!-- 左侧主菜单添加选项卡监听 -->

            <ul class="layui-nav layui-nav-tree" lay-filter="side-main">

                <?php if(is_array($auth_infoA) || $auth_infoA instanceof \think\Collection || $auth_infoA instanceof \think\Paginator): $i = 0; $__LIST__ = $auth_infoA;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voa): $mod = ($i % 2 );++$i;?>

                <li class="layui-nav-item"><!-- layui-nav-itemed -->

                    <a href="javascript:;"><i class="layui-icon">&#xe650;</i><?php echo $voa['auth_name']; ?></a>

                    <?php if(is_array($auth_infoB) || $auth_infoB instanceof \think\Collection || $auth_infoB instanceof \think\Paginator): $i = 0; $__LIST__ = $auth_infoB;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vob): $mod = ($i % 2 );++$i;if($vob['auth_pid'] === $voa['auth_id']): ?>

                    <dl class="layui-nav-child">

                        <dd>

                            <a href="javascript:;" href-url="http://www.sdgyt.com/admin.php/<?php echo $vob['auth_c']; ?>/<?php echo $vob['auth_a']; ?>"><i class="layui-icon">&#xe658;</i><?php echo $vob['auth_name']; ?></a>

                        </dd>

                    </dl>

                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>

                </li>

                <?php endforeach; endif; else: echo "" ;endif; ?>

            </ul>



        </div>

    </div>

    <!-- body -->

    <div class="layui-body my-body">

        <div class="layui-tab layui-tab-card my-tab" lay-filter="card" lay-allowClose="true">

            <ul class="layui-tab-title">

                <li class="layui-this" lay-id="1"><span><i class="layui-icon">&#xe638;</i>仕途欢迎页</span></li>

            </ul>

            <div class="layui-tab-content">

                <div class="layui-tab-item layui-show">

                    <iframe id="iframe" src="<?php echo url('Index/welcome'); ?>" frameborder="0"></iframe>

                </div>

            </div>

        </div>

    </div>

    <!-- footer -->

    <div class="layui-footer my-footer">

        

    </div>

</div>



<!-- pay -->

<div class="my-pay-box none">

    <div><img src="/static/frame/static/image/zfb.png" alt="支付宝"><p>支付宝</p></div>

    <div><img src="/static/frame/static/image/wx.png" alt="微信"><p>微信</p></div>

</div>



<!-- 右键菜单 -->

<div class="my-dblclick-box none">

    <table class="layui-tab dblclick-tab">

        <tr class="card-refresh">

            <td><i class="layui-icon">&#x1002;</i>刷新当前标签</td>

        </tr>

        <tr class="card-close">

            <td><i class="layui-icon">&#x1006;</i>关闭当前标签</td>

        </tr>

        <tr class="card-close-all">

            <td><i class="layui-icon">&#x1006;</i>关闭所有标签</td>

        </tr>

    </table>

</div>

</body>

</html>

<script type="text/javascript">
    $('#logout').click(function(){
        $.post("<?php echo url('Login/logout'); ?>",{id:1},function(data){
                if(data == 2){
                    window.location.href = "http://www.sdgyt.com/admin.php/Login/index";
                }else{
                    alert('退出失败');

                }

            });

    });


</script>

<script type="text/javascript">
    setInterval(function(){
        var nowsess = '<?php echo \think\Session::get('nowsess'); ?>';
        $.post("<?php echo url('Login/is_login'); ?>",{nowsess:nowsess},function(data){
            if(data == 1){
                window.location.href = "http://www.sdgyt.com/admin.php/Login/index";
            }
        });
    },60000);

</script>
