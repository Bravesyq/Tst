<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"D:\phpstudy_pro\WWW\www.sdgyt.com\public/../application/admin\view\zhuguan\index.html";i:1587043808;}*/ ?>
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="renderer" content="webkit">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>表格</title>

    <link rel="stylesheet" href="/static/frame/layui/css/layui.css">

    <link rel="stylesheet" href="/static/frame/static/css/style.css">

    <link rel="icon" href="/static/frame/static/image/code.ico">

    <script type="text/javascript" src="/static/frame/layui/layui.js"></script>

    <script type="text/javascript" src="/static/js/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="/static/bs/css/bootstrap.min.css">
    <script type="text/javascript" src="/static/bs/js/bootstrap.min.js"></script>
    <style type="text/css">

    body{
        width: 2100px;
    }
    </style>
</head>

<body class="body" style="overflow: auto;">

    <!-- 工具集 -->

    <div class="my-btn-box">

        <span class="fl">
            <a href="javascript:;" class="layui-btn btn-add layui-btn-normal" id="btn-refresh" onclick="location.reload([true]);"><i class="layui-icon">&#x1002;</i></a>
        </span>

        <span class="fl">

            <form>

                <span class="layui-form-label">搜索：</span>

                <div class="layui-input-inline">
                    <input type="text" name="name" autocomplete="off" placeholder="输入姓名" class="layui-input" style="width:80px;">
                </div>
                <div class="layui-input-inline">

                    <input type="text" name="time" autocomplete="off" placeholder="请选择日期" class="layui-input" id="serch_time" style="width:100px;">

                </div>
                <div class="layui-input-inline">
                    <select name="teac_id" class="layui-input">
                        <option value="">部门</option>
                        <?php if(is_array($teacs) || $teacs instanceof \think\Collection || $teacs instanceof \think\Paginator): $i = 0; $__LIST__ = $teacs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$teacs): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $teacs['teac_id']; ?>" ><?php echo $teacs['nickname']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>

                </div>

                <input type="submit" class="layui-btn mgl-20" name="" value="查询">
                <input type="button" class="layui-btn mgl-20" name="" value="总<?php echo $tot; ?>人">
                <input type="button" class="layui-btn mgl-20" name="" value="累计收款<?php echo $qian; ?>">



            </form>


        </span>

    </div>
    <style type="text/css">
        #table th{
            /*border: 1px solid black;*/
        }
        #table td{
            /*border: 1px solid grey;*/
        }
    </style>


    <table class="layui-table" id="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>姓名</th>
            <th>手机</th>
            <th>地址</th>
            <th>产品</th>
            <th>数量</th>
            <th>押金</th>
            <th>支付方式</th>
            <th>代收款</th>
            <th>状态</th>
            <th>快递</th>
            <th>单号</th>
            <th>快递状态</th>
            <th>是否复购</th>
            <th>进线日期</th>
            <th>成交日期</th>
            <th>录入日期</th>
            <th>职员</th>

            <th>操作</th>

        </tr>

        </thead>

        <tbody>

            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?>

                <tr>

                    <td><?php echo $value['id']; ?></td>
                    <td><?php echo $value['name']; ?></td>
                    <td><?php echo $value['lxfs']; ?></td>
                    <td><?php echo $value['address']; ?></td>
                    <td><?php echo $value['product']; ?></td>
                    <td><?php echo $value['number']; ?></td>
                    <td><?php echo $value['earnest_money']; ?></td>
                    <td><?php echo $value['pay_type']; ?></td>
                    <td><?php echo $value['ds_money']; ?></td>
                    <td><?php echo $value['verification_dsk']; ?></td>
                    <td><?php echo $value['express']; ?></td>
                    <td><?php echo $value['express_number']; ?></td>
                    <td><?php echo $value['express_stat']; ?></td>
                    <td><?php echo $value['is_purchase']; ?></td>
                    <td><?php echo $value['line_time']; ?></td>
                    <td><?php echo $value['deal_time']; ?></td>
                    <td><?php echo $value['time']; ?></td>
                    <td><?php echo $value['nickname']; ?></td>

                    <td>
		              <span class="glyphicon glyphicon-pencil" data-toggle="modal" data-target="#edit" onclick="edit(this,<?php echo $value['id']; ?>)"></span>
		            </td>

                </tr>

            <?php endforeach; endif; else: echo "" ;endif; ?>

        </tbody>



    </table>

    <?php echo $data->render(); ?>

    <!-- 老师修改模态框 -->

    

</body>

</html>

<script type="text/javascript" src="/static/frame/layui/layui.js"></script>

<script type="text/javascript" src="/static/frame/static/js/vip_comm.js"></script>

<script type="text/javascript">

    
</script>
<script type="text/javascript">
    layui.use('laydate', function(){
      var laydate = layui.laydate;
     
      laydate.render({
        elem: '#serch_time' //指定元素
        ,trigger: 'click'
        ,type: 'date'
      });
      

    });
</script>