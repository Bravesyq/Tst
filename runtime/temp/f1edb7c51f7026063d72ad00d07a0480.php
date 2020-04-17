<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:90:"D:\phpstudy_pro\WWW\www.sdgyt.com\public/../application/admin\view\staff\add_customer.html";i:1586999863;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>基于 Layui form 组件的省市区联动选择的实现</title>

    <script src="/static/sld/assets/jquery-1.12.4.js"></script>
    <link rel="stylesheet" href="/static/sld/layui/css/layui.css" /> 
    <script type="text/javascript" src="/static/sld/layui/layui.js"></script> 
    <script type="text/javascript" src="/static/sld/assets/data.js"></script>
    <script type="text/javascript" src="/static/sld/assets/province.js"></script>
    <link rel="stylesheet" type="text/css" href="/static/bs/css/bootstrap.min.css">
    <script type="text/javascript" src="/static/bs/js/bootstrap.min.js""></script>
    <script type="text/javascript">
        var defaults = {
            s1: 'provid',
            s2: 'cityid',
            s3: 'areaid',
            v1: null,
            v2: null,
            v3: null
        };

    </script>
</head>
<body>
    <div class="row" style="width:100%;margin:0 atuo;">
        <!-- <form class="layui-form layui-form-pane" action="javascript:;" id="data_info"> -->
        <form class="layui-form layui-form-pane" method="post" action="return false" id="data_info">
        <div class="col-md-4">
            <div class="layui-form-item">
                <label class="layui-form-label">姓名</label>
                <div class="layui-input-inline">
                    <input type="text" name="name" id="name" lay-verify="required" placeholder="请输入姓名" autocomplete="on" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">电话</label>
                <div class="layui-input-inline">
                    <input type="text" name="lxfs" id="lxfs" lay-verify="required" placeholder="请输入电话" autocomplete="on" class="layui-input">
                </div>
            </div>


            <div class="layui-form-item">
                <label class="layui-form-label">选择省</label>
                <div class="layui-input-inline">
                    <select name="provid" id="provid" lay-filter="provid">
                        <option value="">请选择省</option>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">选择市</label>
                <div class="layui-input-inline">
                    <select name="cityid" id="cityid" lay-filter="cityid">
                        <option value="">请选择市</option>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">选择区/县</label>
                <div class="layui-input-inline">
                    <select name="areaid" id="areaid" lay-filter="areaid">
                        <option value="">请选择县/区</option>
                    </select>
                </div>
            </div>

            <div class="layui-form-item" style="width:300px;">
                <!-- <label class="layui-form-label">详细地址</label> -->
                <!-- <div class="layui-input-inline"> -->
                    <input type="text" name="xiangxidizhi" id="xiangxidizhi" lay-verify="required" placeholder="请输入详细地址" autocomplete="on" class="layui-input">
                <!-- </div> -->
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">产品</label>
                <div class="layui-input-inline">
                    <select lay-filter="areaid" id="product" name="product">
                        <option value="">请选择产品</option>
                        <?php if(is_array($product) || $product instanceof \think\Collection || $product instanceof \think\Paginator): $i = 0; $__LIST__ = $product;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$product): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $product['product_id']; ?>"><?php echo $product['product_name']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">数量</label>
                <div class="layui-input-inline">
                    <select lay-filter="areaid" name="number" id="number">
                        <option value="">请选择数量</option>
                        <?php if(is_array($chanpinnumber) || $chanpinnumber instanceof \think\Collection || $chanpinnumber instanceof \think\Paginator): $i = 0; $__LIST__ = $chanpinnumber;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$chanpinnumbers): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $chanpinnumbers['s_number']; ?>"><?php echo $chanpinnumbers['s_number']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>


   
        </div>

        <div class="col-md-4">
               
            <div class="layui-form-item">
                <label class="layui-form-label">定金</label>
                <div class="layui-input-inline">
                    <input type="text" name="earnest_money" id="earnest_money" lay-verify="required" placeholder="请输入" autocomplete="on" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">支付方式</label>
                <div class="layui-input-inline">
                    <select lay-filter="areaid" name="pay_type" id="pay_type">
                        <option value="微信支付">微信支付</option>
                        <option value="支付宝">支付宝</option>
                        <option value="银行卡">银行卡</option>
                        <option value="门诊用户">门诊用户</option>

                    </select>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">代收款</label>
                <div class="layui-input-inline">
                    <input type="text" name="ds_money" id="ds_money" lay-verify="required" placeholder="请输入代收款" autocomplete="on" class="layui-input">
                </div>
            </div>
            
            <div class="layui-form-item">
                <label class="layui-form-label">是否复购</label>
                <div class="layui-input-inline">
                    <select lay-filter="areaid" name="is_purchase" id="is_purchase">
                        <option value="否">否</option>
                        <option value="是">是</option>
                    </select>
                </div>
            </div>

            <div class="layui-form-item" style="width:300px;">
                <label class="layui-form-label">进线日期</label>
                <div class="layui-input-block">
                    <input type="text" name="line_time"  placeholder="进线日期" class="layui-input" id="j_x_riqi" >
                </div>
            </div>

            <div class="layui-form-item" style="width:300px;">
                <label class="layui-form-label">成交日期</label>
                <div class="layui-input-block">
                    <input type="text" name="deal_time"  placeholder="成交日期" class="layui-input" id="cj_riqi" >
                </div>
            </div>

            <div class="layui-form-item" style="width:300px;">
                <!-- <label class="layui-form-label">备注</label> -->
                <!-- <div class="layui-input-block"> -->
                    <input type="text" name="remarks" id="remarks"  placeholder="备注" class="layui-input" >
                <!-- </div> -->
            </div>

            <div class="layui-form-item">
                <!-- <button class="layui-btn" onclick="addinfo()" >提交</button> -->
                <button type="button" class="layui-btn btn-submit" lay-submit="" lay-filter="sub" style="width:220px;">立即登录</button>
                <input type="reset" id="reset" class="layui-btn">
            </div>
                
        </div>
        </form>
    </div>
    
</body>
</html>

<script>

    layui.use(['form', 'layedit', 'laydate'], function(){
        var form = layui.form
        ,layer = layui.layer

        ,layedit = layui.layedit

        ,laydate = layui.laydate;
        // 验证

        

        // 提交监听

        form.on('submit(sub)', function (data) {

            //验证手机号
            var lxfs = document.getElementById('lxfs').value;
            var re = /^1\d{10}$/;
            if(!re.test(lxfs)) {
                layer.msg('手机号错误');
                return false;
            }
            //产品
            var product=$("#product");  //获取选中的项
            var product = product.val();   //拿到选中项的值
                if(product == undefined || product == "" || product == null){
                layer.msg('产品不能为空');
                return false;
            }
            //产品数量
            var number=$("#number");  //获取选中的项
            var number = number.val();   //拿到选中项的值
                if(number == undefined || number == "" || number == null){
                layer.msg('产品数量不能为空');
                return false;
            }

            //支付方式
            var pay_type=$("#pay_type");  //获取选中的项
            var pay_type = pay_type.val();   //拿到选中项的值
            if(pay_type == undefined || pay_type == "" || pay_type == null){
                layer.msg('支付方式不能为空');
                return false;
            }
            // 进线日期
            var j_x_riqi = $('#j_x_riqi').val();
            if(j_x_riqi == undefined || j_x_riqi == "" || j_x_riqi == null){
                layer.msg('进线日期不能为空');
                return false;
            }

            // 成交日期
            var cj_riqi = $('#cj_riqi').val();
            if(cj_riqi == undefined || cj_riqi == "" || cj_riqi == null){
                layer.msg('成交日期不能为空');
                return false;
            }
            // 姓名
            var name = $('#name').val();
            // 联系方式
            var lxfs = lxfs;
            // 省  市  区/县
            var provid = $('#provid option:selected').html();
            var cityid = $('#cityid option:selected').html();
            var areaid = $('#areaid option:selected').html();
            var xiangxidizhi = $('#xiangxidizhi').val();
            // 拼接 省 市 区 县
            var address = provid + cityid + areaid + xiangxidizhi;
            // 产品
            var product = $('#product option:selected').html();
            // 产品数量
            var number = $('#number option:selected').html();
            // 定金
            var earnest_money = $('#earnest_money').val();
            // 支付方式
            var pay_type = $('#pay_type option:selected').html();
            // 代收款
            var ds_money = $('#ds_money').val();
            // 是否复购
            var is_purchase = $('#is_purchase option:selected').html();
            // 进线日期
            var line_time = $('#j_x_riqi').val();
            // 成交日期
            var deal_time = $('#cj_riqi').val();
            // 备注
            var remarks = $('#remarks').val();
            
            

            

            $.post("<?php echo url('add_customer'); ?>",{name:name,lxfs:lxfs,address:address,product:product,number:number,earnest_money:earnest_money,pay_type:pay_type,ds_money:ds_money,is_purchase:is_purchase,line_time:line_time,deal_time:deal_time,remarks:remarks},function(data){
                console.log(data);
              


            },'json');

        });


    });
    layui.use('laydate', function(){
      var laydate = layui.laydate;
      
      laydate.render({
        elem: '#j_x_riqi' //指定元素
        ,trigger: 'click'
        ,type: 'date'
      });
      laydate.render({
        elem: '#cj_riqi' //指定元素
        ,trigger: 'click'
        ,type: 'date'
      });

    });

</script>