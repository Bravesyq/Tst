<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"D:\phpStudy\PHPTutorial\WWW\Tst\public/../application/admin\view\delivergoods\index.html";i:1587002495;}*/ ?>
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
                    <input type="text" name="name" autocomplete="off" placeholder="输入姓名" class="layui-input">
                </div>

                <div class="layui-input-inline">
                    <select name="teac_id" class="layui-input">
                        <option value="">所有</option>
                        <?php if(is_array($teacs) || $teacs instanceof \think\Collection || $teacs instanceof \think\Paginator): $i = 0; $__LIST__ = $teacs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$teacs): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $teacs['teac_id']; ?>" ><?php echo $teacs['nickname']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>

                </div>

                <input type="submit" class="layui-btn mgl-20" name="" value="查询">
                <input type="button" class="layui-btn mgl-20" name="" value="总<?php echo $tot; ?>人数">
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
                    <td>
                        <select onblur="t_ajax_express(this,<?php echo $value['id']; ?>)">
                            <option value="顺丰" <?php if($value['express'] == ' '): ?>selected="selected"<?php endif; ?>> </option>
                            <option value="顺丰" <?php if($value['express'] == '顺丰'): ?>selected="selected"<?php endif; ?>>顺丰</option>
                            <option value="圆通" <?php if($value['express'] == '圆通'): ?>selected="selected"<?php endif; ?>>圆通</option>
                            <option value="邮政" <?php if($value['express'] == '邮政'): ?>selected="selected"<?php endif; ?>>邮政</option>
                            <option value="中通" <?php if($value['express'] == '中通'): ?>selected="selected"<?php endif; ?>>中通</option>
                            <option value="韵达" <?php if($value['express'] == '韵达'): ?>selected="selected"<?php endif; ?>>韵达</option>
                        </select>

                    </td>
                    <td><input type="text" value="<?php echo $value['express_number']; ?>" style="width:160px;" onblur="t_ajax_express_number(this,<?php echo $value['id']; ?>)"></td>
                    <td>
                        <select onblur="t_ajax_express_stat(this,<?php echo $value['id']; ?>)">
                            <option value=" " <?php if($value['express_stat'] == ' '): ?>selected="selected"<?php endif; ?>>空</option>
                            <option value="已发货" <?php if($value['express_stat'] == '已发货'): ?>selected="selected"<?php endif; ?>>已发货</option>
                            <option value="已签收" <?php if($value['express_stat'] == '已签收'): ?>selected="selected"<?php endif; ?>>已签收</option>
                            <option value="运输中" <?php if($value['express_stat'] == '运输中'): ?>selected="selected"<?php endif; ?>>运输中</option>
                            <option value="已拒收" <?php if($value['express_stat'] == '已拒收'): ?>selected="selected"<?php endif; ?>>已拒收</option>
                            <option value="待揽件" <?php if($value['express_stat'] == '待揽件'): ?>selected="selected"<?php endif; ?>>待揽件</option>
                        </select>

                    </td>
                    <td><?php echo $value['is_purchase']; ?></td>
                    <td><?php echo $value['line_time']; ?></td>
                    <td><?php echo $value['deal_time']; ?></td>
                    <td><?php echo date("Y-m-d H:i:s",$value['add_luru_time']); ?></td>
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
    // ajax 修改是否复购
    function t_ajax_express(obj,id){
        var express=$(obj).val();

        $.post("<?php echo url('delivergoods/ajax_edit_express'); ?>",{id:id,express:express},function(data){
            if(data.code == '200'){
                layer.msg(data.msg); 
                $("#refresh").click();
            }else if(data.code == '400'){
                layer.msg(data.msg); 
            }
        },'json');
    }
    // ajax 修改单号
    function t_ajax_express_number(obj,id) {
        var express_number=$(obj).val();

        $.post("<?php echo url('delivergoods/ajax_edit_express_number'); ?>",{id:id,express_number:express_number},function(data){
            if(data.code == '200'){
                layer.msg(data.msg); 
                $("#refresh").click();
            }else if(data.code == '400'){
                layer.msg(data.msg); 
            }
        },'json');
    }
    // ajax 修改快递状态
    function t_ajax_express_stat(obj,id){
        var express_stat=$(obj).val();

        $.post("<?php echo url('staff/ajax_edit_express_stat'); ?>",{id:id,express_stat:express_stat},function(data){
            if(data.code == '200'){
                layer.msg(data.msg); 
                $("#refresh").click();
            }else if(data.code == '400'){
                layer.msg(data.msg); 
            }
        },'json');
    }
</script>