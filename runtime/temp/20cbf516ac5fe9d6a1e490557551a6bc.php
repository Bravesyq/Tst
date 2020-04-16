<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"D:\phpStudy\PHPTutorial\WWW\Tst\public/../application/admin\view\boss\index.html";i:1587005682;}*/ ?>
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
                    <select name="verification_dsk" class="layui-input">
                        <option value="待审核">审核</option>
                        <option value="待审核">待审核</option>
                        <option value="已拒绝">已拒绝</option>
                        <option value="已通过">已通过</option>
           
                    </select>

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
        <style type="text/css">
            tbody input{
                border:0px;
            }
            tbody select {
                border: 0;
                /*background: none;*/
            }
            tbody select:focus {
                border-color: white;
            }
        </style>
        <tbody>

            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?>

                <tr>
                    <td><?php echo $value['id']; ?></td>
                    <td><input type="text" value="<?php echo $value['name']; ?>" style="width:100px;" onblur="t_ajax_name(this,<?php echo $value['id']; ?>)"></td>
                    <td><input type="text" value="<?php echo $value['lxfs']; ?>" style="width:100px;" onblur="t_ajax_lxfs(this,<?php echo $value['id']; ?>)"></td>
                    <td><input type="text" value="<?php echo $value['address']; ?>" style="width:230px;" onblur="t_ajax_address(this,<?php echo $value['id']; ?>)"></td>
                    <td>
                        <select onblur="t_ajax_product(this,<?php echo $value['id']; ?>)">
                            <option value="">空</option>
                            <?php if(is_array($chanpinarr) || $chanpinarr instanceof \think\Collection || $chanpinarr instanceof \think\Paginator): $i = 0; $__LIST__ = $chanpinarr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$chanpinarrs): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $chanpinarrs['product_name']; ?>" <?php if($value['product'] == $chanpinarrs['product_name']): ?>selected="selected"<?php endif; ?>><?php echo $chanpinarrs['product_name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>

                    </td>
                    <td>
                        <select onblur="t_ajax_number(this,<?php echo $value['id']; ?>)">
                            <?php if(is_array($liang) || $liang instanceof \think\Collection || $liang instanceof \think\Paginator): $i = 0; $__LIST__ = $liang;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$liangs): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo $liangs['s_number']; ?>" <?php if($value['number'] == $liangs['s_number']): ?>selected="selected"<?php endif; ?>><?php echo $liangs['s_number']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </td>
                    <td><input type="text" value="<?php echo $value['earnest_money']; ?>" style="width:40px;" onblur="t_ajax_earnest_money(this,<?php echo $value['id']; ?>)"></td>
                    <td>
                        <select onblur="t_ajax_pay_type(this,<?php echo $value['id']; ?>)">
                            <option value="" <?php if($value['pay_type'] == ' '): ?>selected="selected"<?php endif; ?>>支付方式</option>
                            <option value="微信支付" <?php if($value['pay_type'] == '微信支付'): ?>selected="selected"<?php endif; ?>>微信支付</option>
                            <option value="支付宝" <?php if($value['pay_type'] == '支付宝'): ?>selected="selected"<?php endif; ?>>支付宝</option>
                            <option value="银行卡" <?php if($value['pay_type'] == '银行卡'): ?>selected="selected"<?php endif; ?>>银行卡</option>
                            <option value="门诊用户" <?php if($value['pay_type'] == '门诊用户'): ?>selected="selected"<?php endif; ?>>门诊用户</option>
                        </select>
                    </td>
                    <td><input type="text" value="<?php echo $value['ds_money']; ?>" style="width:40px;" onblur="t_ajax_ds_money(this,<?php echo $value['id']; ?>)"></td>
                    <td>
                        

                        <select onblur="t_ajax_verification_dsk(this,<?php echo $value['id']; ?>)" 
                            <?php if($value['verification_dsk'] == ' '): ?> 
                                style="background-color:yellow;"
                            <?php elseif($value['verification_dsk'] == '已拒绝'): ?>
                                style="background-color:blue;"
                            <?php elseif($value['verification_dsk'] == '已通过'): ?>
                                style="background-color:red;"
                            <?php else: endif; ?>
                        >
                            <option value="" <?php if($value['verification_dsk'] == ' '): ?>selected="selected"<?php endif; ?>>待审核</option>
                            <option value="已拒绝" <?php if($value['verification_dsk'] == '已拒绝'): ?>selected="selected"<?php endif; ?>>已拒绝</option>
                            <option style="background-color:red;" value="已通过" <?php if($value['verification_dsk'] == '已通过'): ?>selected="selected"<?php endif; ?>>已通过</option>
                        </select>
                    </td>
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
                    <td><input type="text" value="<?php echo $value['express_number']; ?>" style="width:130px;" onblur="t_ajax_express_number(this,<?php echo $value['id']; ?>)"></td>
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
                    <td>
                        <select onblur="t_ajax_is_purchase(this,<?php echo $value['id']; ?>)">
                         
                            <option value="是" <?php if($value['is_purchase'] == '是'): ?>selected="selected"<?php endif; ?>>是</option>
                            <option value="否" <?php if($value['is_purchase'] == '否'): ?>selected="selected"<?php endif; ?>>否</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $value['line_time']; ?>" style="width:80px;" id="j_x_riqi">
                        <span class="glyphicon glyphicon-ok" onclick="t_ajax_line_time(<?php echo $value['id']; ?>)"></span>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $value['deal_time']; ?>" style="width:80px;" id="c_j_riqi">
                        <span class="glyphicon glyphicon-ok" onclick="t_ajax_deal_time(<?php echo $value['id']; ?>)"></span>
                    </td>


                    <td><?php echo date("Y-m-d H:i:s",$value['add_luru_time']); ?></td>
                    <td><?php echo $value['nickname']; ?></td>

                    <td>
		              <span class="glyphicon glyphicon-pencil" data-toggle="modal" data-target="#edit" onclick="edit(this,<?php echo $value['id']; ?>)"></span>&nbsp;
                      <span class="glyphicon glyphicon-trash" data-toggle="modal" data-target="#edit" onclick="edit(this,<?php echo $value['id']; ?>)"></span>
                      

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
    // ajax 修改姓名
    function t_ajax_name(obj,id){
        var name = $(obj).val();
        $.post("<?php echo url('boss/ajax_edit_name'); ?>",{id:id,name:name},function(data){
            if(data.code == '200'){
                layer.msg(data.msg); 
                $("#refresh").click();
            }else if(data.code == '400'){
                layer.msg(data.msg); 
            }
        },'json');
    }
    // ajax 修改联系方式
    function t_ajax_lxfs(obj,id){
        var lxfs = $(obj).val();
        $.post("<?php echo url('boss/ajax_edit_lxfs'); ?>",{id:id,lxfs:lxfs},function(data){
            if(data.code == '200'){
                layer.msg(data.msg); 
                $("#refresh").click();
            }else if(data.code == '400'){
                layer.msg(data.msg); 
            }
        },'json');
    }
    // ajax 修改地址
    function t_ajax_address(obj,id){
        var address = $(obj).val();
        $.post("<?php echo url('boss/ajax_edit_address'); ?>",{id:id,address:address},function(data){
            if(data.code == '200'){
                layer.msg(data.msg); 
                $("#refresh").click();
            }else if(data.code == '400'){
                layer.msg(data.msg); 
            }
        },'json');
    }
    // ajax 修改产品
    function t_ajax_product(obj,id){

        var product=$(obj).val();
       
        $.post("<?php echo url('boss/ajax_edit_product'); ?>",{id:id,product:product},function(data){
            if(data.code == '200'){
                layer.msg(data.msg); 
                $("#refresh").click();
            }else if(data.code == '400'){
                layer.msg(data.msg); 
            }
        },'json');
    }
    // ajax 产品数量
    function t_ajax_number(obj,id){
        var number=$(obj).val();
       
        $.post("<?php echo url('boss/ajax_edit_number'); ?>",{id:id,number:number},function(data){
            if(data.code == '200'){
                layer.msg(data.msg); 
                $("#refresh").click();
            }else if(data.code == '400'){
                layer.msg(data.msg); 
            }
        },'json');
    }
    // ajax 修改押金
    function t_ajax_earnest_money(obj,id){
        var earnest_money=$(obj).val();

        $.post("<?php echo url('boss/ajax_edit_earnest_money'); ?>",{id:id,earnest_money:earnest_money},function(data){
            if(data.code == '200'){
                layer.msg(data.msg); 
                $("#refresh").click();
            }else if(data.code == '400'){
                layer.msg(data.msg); 
            }
        },'json');
    }
    // ajax 修改支付方式
    function t_ajax_pay_type(obj,id){
        var pay_type=$(obj).val();

        $.post("<?php echo url('boss/ajax_edit_pay_type'); ?>",{id:id,pay_type:pay_type},function(data){
            if(data.code == '200'){
                layer.msg(data.msg); 
                $("#refresh").click();
            }else if(data.code == '400'){
                layer.msg(data.msg); 
            }
        },'json');
    }
    // ajax 修改代收款
    function t_ajax_ds_money(obj,id){
        var ds_money=$(obj).val();

        $.post("<?php echo url('boss/ajax_edit_ds_money'); ?>",{id:id,ds_money:ds_money},function(data){
            if(data.code == '200'){
                layer.msg(data.msg); 
                $("#refresh").click();
            }else if(data.code == '400'){
                layer.msg(data.msg); 
            }
        },'json');
    }
    // ajax 修改状态
    function t_ajax_verification_dsk(obj,id){
        var verification_dsk=$(obj).val();
      
        $.post("<?php echo url('boss/ajax_edit_verification_dsk'); ?>",{id:id,verification_dsk:verification_dsk},function(data){
            if(data.code == '200'){
                layer.msg(data.msg); 
                $("#refresh").click();
            }else if(data.code == '400'){
                layer.msg(data.msg); 
            }
        },'json');
    }
    // ajax 修改快递
    function t_ajax_express(obj,id){
        var express=$(obj).val();
      
        $.post("<?php echo url('boss/ajax_edit_express'); ?>",{id:id,express:express},function(data){
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
      
        $.post("<?php echo url('boss/ajax_edit_express_number'); ?>",{id:id,express_number:express_number},function(data){
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

        $.post("<?php echo url('boss/ajax_edit_express_stat'); ?>",{id:id,express_stat:express_stat},function(data){
            if(data.code == '200'){
                layer.msg(data.msg); 
                $("#refresh").click();
            }else if(data.code == '400'){
                layer.msg(data.msg); 
            }
        },'json');
    }

    // ajax 修改是否复购
    function t_ajax_is_purchase(obj,id){
        var is_purchase=$(obj).val();

        $.post("<?php echo url('boss/ajax_edit_is_purchase'); ?>",{id:id,is_purchase:is_purchase},function(data){
            if(data.code == '200'){
                layer.msg(data.msg); 
                $("#refresh").click();
            }else if(data.code == '400'){
                layer.msg(data.msg); 
            }
        },'json');
    }

    // ajax 修改进线日期
    function t_ajax_line_time(id){
        var line_time = $('#j_x_riqi').val();

        $.post("<?php echo url('boss/ajax_edit_line_time'); ?>",{id:id,line_time:line_time},function(data){
            if(data.code == '200'){
                layer.msg(data.msg); 
                $("#refresh").click();
            }else if(data.code == '400'){
                layer.msg(data.msg); 
            }
        },'json');
    }

    // ajax 修改成交日期
    function t_ajax_deal_time(id){
        var deal_time = $('#c_j_riqi').val();

        $.post("<?php echo url('boss/ajax_edit_deal_time'); ?>",{id:id,deal_time:deal_time},function(data){
            if(data.code == '200'){
                layer.msg(data.msg); 
                $("#refresh").click();
            }else if(data.code == '400'){
                layer.msg(data.msg); 
            }
        },'json');
    }
</script>
<script type="text/javascript">
    layui.use('laydate', function(){
      var laydate = layui.laydate;
      laydate.render({
        elem: '#j_x_riqi' //指定元素
        ,trigger: 'click'
        ,type: 'date'
      });

      laydate.render({
        elem: '#c_j_riqi' //指定元素
        ,trigger: 'click'
        ,type: 'date'
      });

    });
</script>