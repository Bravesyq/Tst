<?php
namespace app\admin\controller;
// 引入系统数据类
use think\Db;
// 引入系统控制器类
use think\Controller;
// 引入验证码
use think\captcha\Captcha;


class Login extends Controller{
    // 首页
    public function index(){

        // 加载页面
       	return view();
    }
    
    // 验证码
    public function verify()
    {
    	$captcha = new Captcha();
    	$captcha->codeSet = '0123456789';
		$captcha -> fontSize = 80;
		$captcha -> length   = 4;
		$captcha -> useNoise = false;
		$captcha -> useCurve = false;
		return $captcha->entry();   
    }

    // 验证码检测
    public function jmcheck(){

        define('RSA_public','-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQC/Z9obCooMO+R430r83y8EEwbp
JKe4OQ7LiUPXKdku/LUheORNKGtHPsyAPTxSDhVla3gGEwW+FQ9y5gV0ESnzqoY0
BHJ7whPOfY1H9pHIklHXE24bC/NH7TBcLpF36iG641i6Ti+b2cQTB8L+77FE2SFA
NpZyJwB5XjxK9JWpKwIDAQAB-----END PUBLIC KEY-----');



        define('RSA_private','-----BEGIN PRIVATE KEY-----
MIICeAIBADANBgkqhkiG9w0BAQEFAASCAmIwggJeAgEAAoGBAL9n2hsKigw75Hjf
SvzfLwQTBukkp7g5DsuJQ9cp2S78tSF45E0oa0c+zIA9PFIOFWVreAYTBb4VD3Lm
BXQRKfOqhjQEcnvCE859jUf2kciSUdcTbhsL80ftMFwukXfqIbrjWLpOL5vZxBMH
wv7vsUTZIUA2lnInAHlePEr0lakrAgMBAAECgYEAvO9TYMvndqoMHbA0QiZAL6Jk
ePCgyf0weIL3P0Vkx7fVR8Qgf3U9Z+c6T/+iMlEKl8EcicpvKbF6PW2GxopGwDTu
3C/1ITZEMV7qkDRTIMciWIOsFBbDfvGV4KvBT7OxYF0U1u558TPACOKXpp6IoTHX
QPBZWXdpgeoURr+G4KkCQQDoqSlCIYUXNCTDj9I1oBZuBZs0aqCsxgM8rkMEAaex
LoANBfnJIe2CZpUyGnIt2Y7BfiYQo1t+acRNZ7Iv2wbvAkEA0ps9cMmJfBbVMVqE
zLg7XPkvF9FiQr/Z0au9W+Sp1j5XtixuA2bbAhvXgQKbz1gG5+oh0q3xnIr5AX/N
DH3hhQJBALalvh8NY4cwxz/DU1oH4DPlMM+4eYTJOldT0oZ9qiDdiWcv7sUoXmWF
lNCtlD9MUNaz6rwbEkOuUo4Vvvv0rX8CQQCw+F3SjqeGrDENPcDlvdG0OHeIDhwB
dvDzrNp7g1PrgYt2uzLejOlvhjG6aJTA0HlNG4K8ZAnovyaqSdflrUl5AkBjZ7qJ
CpPyneJTlvmQUifAMqstYG/EHTjDlYfQqUhP2HbecXAkUKlqf4ldQnH3cgA0wHhc
92BMoHG1kQ22ZiW6
-----END PRIVATE KEY-----');

        /**

         * RSA数据加密解密

         * @param type $data

         * @param type $type encode加密 decode解密

         */

        function RSA_openssl($data, $type = 'encode') {

            if (empty($data)) {
                return '加密解密数据不能为空';
            }

            if ($type == 'encode') {
                $return = openssl_pkey_get_public(RSA_public);

                if (!$return) {
                    die('公钥不可用');
                }
                openssl_public_encrypt($data, $crypted, $return);
                $crypted = base64_encode($crypted);
                return $crypted;

            }

            if ($type == 'decode') {

                $private_is_use = openssl_pkey_get_private(RSA_private);

                if (!$private_is_use) {

                    die('私钥不可用');

                }

                openssl_private_decrypt(base64_decode($data), $decrypted, $private_is_use);

                return $decrypted;

            }

        }

        //判断是否为空
        $name = isset($_POST['name'])?$_POST['name']:'';
        $pass = isset($_POST['pass'])?$_POST['pass']:'';
        $code = isset($_POST['code'])?$_POST['code']:'';

        // 解密
        $name = RSA_openssl($name,'decode');
        $pass = substr(md5(RSA_openssl($pass,'decode')),3);
        $code = RSA_openssl($code,'decode');
        // 判断验证码
		if( !captcha_check($code) ){
			echo json_encode(array('code'=>1,'msg'=>'验证码错误'));
		}else{
            $map['statu'] = 1;
			$data = Db::table("st_user")->where("user",$name)->where("pass",$pass)->where($map)->select();
			if($data){
                foreach ($data as $key => $value) {
                    $user_name = $value['user'];
                    $rou_id = $value['rou_id'];
                    $teac_id = $value['teac_id'];
                    $user_id = $value['id'];
                    $user_nickname = $value['nickname'];
                }
                $nowsess = time();
                $nowsess = 's' . $nowsess;
                
                Db::table("st_user")->where(array('id'=>$value['id']))->update(array('nowsess'=>$nowsess));
                session("nowsess",$nowsess);
				session("user_name",$user_name);
                session("user_rou_id",$rou_id);
                session("user_teac_id",$teac_id);
                session("user_id",$user_id);
                session("user_nickname",$user_nickname);

				echo json_encode(array('code'=>2,'msg'=>'登录成功'));
		
				
			} else {
				echo json_encode(array('code'=>3,'msg'=>'账号密码错误'));
			}
		}


    }
    // 退出操作
    public function logout(){
        $aa = session(null);
        if($aa){
            echo '1';
        }else{
            echo '2';
        }
    }

    public function is_login(){
        $nowsess = input('post.nowsess');
        $id = session('user_id');
        $tot = Db::table("st_user")->where(array('id'=>$id,'nowsess'=>$nowsess))->count();
        if($tot != '1'){
            session(null);
            echo '1';
      
        }     
    }

}