<?php

namespace App\Http\Controllers\pay;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AliPayController extends Controller
{
    public $app_id;
    public $gate_way;
    public $notify_url;
    public $return_url;
    public $rsaPrivateKeyFilePath = '';  //路径
    public $aliPubKey = '';  //路径
    public $privateKey = 'MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCHxBsm8zwnOSkx/E7ovwAeCgWXwc/F6kLu+WgQHw9eCvus3Hizpk7SmC8zian1b4Czg1lUf2HSNbJTDjO2tndYH3QYdVE6R0ZXH0OX1RE4IfX+690rAwxq48bb6TzqyfA6wkmhTot/WmJOaMzZR5PTMiGjBm9s7BQ8sbCtNq6j/zFyA5Tm1XLU9UtgOR2mtd1BSG0x64cBOMWR2uSmeBK61kevXKk2GVRbq4U8VexVusRv0gd59EcHptMiWnD0YEzDQ2QoCaSGtHqj8T4dJTH7dnySVgbSOsICm5QNtijfXsMIj27XEgNROPCpIXADzg0Rr6SCwABJRLa7bI+hJT8bAgMBAAECggEAEvP4imZ4Zk1fh9/eMDXB0W+6uiXPWKTMdUoSEfYUEh/cZJResU2tQU8Hf91fAalwQR88EES8JjlizJ917rLoVEAH2AZAsa8TjcQKjp6rCbgL/Gt287M4P4/OyhJ0c55/T+ShnMg3Ry8Z/DI7LrYEV/5unbCfS4hlhteTf4rbtH8N0D14xwbz/x2ff1zgtdNPfpWXtd/wBypw795bg0oDIsAJquBI1IX6QOmykEst4ItfsQXSOix7vzhqzT/+aueqYbkvjgsyX1W5QGFeLkd21uCoQYbKZkCFDjy18ujcrLlTDCaVpUntmcGPsFEKs6gcdXeIpUDqJBAEdLIYMM+ccQKBgQDeKm0o7xz4uu3WC7TCVzNvKk1nW+DZZiuz72ouNl9BrOPDIms2yn54dRIIVt5WC1YhYagAinXa9Y/YLiJud68gGZpYfOj1pbSGzpr0mYnQG0xdnqSyvMZ8fYzrUsR0wRXEDaZ1sCd/63IhUv6vYD2aM80TSUlFyQKoWWDO+UbX2QKBgQCccTczg/928BiQzt5JRWE1GFI7YQjACtnN8Hi7ilQf99ZbZIL8Qtd49lq2dDTY3ZheGTr6CUz0H6DJfhZ/XrjOKMqA2OlvxDRYSG8z5P3RHox4mTppEYoBHM5METAAWcXwP6uPaiOKw/TwPus8vnWciuSbVOXNh2OJATAE9eLKEwKBgHvsFm+a0QI84qVeajltApejdQGOUmFxiDcZ+JRGZ+PuWC1kaYFqehke1CwqqGI+eJCuNFP457x29QGU2kfcIqc5IMrzAc7j20rGu9BsRF78myAteZjpi52tOomY5VRqz4VIR+2lkKLd5g+Ih9+zQylcc6uqWWC/uufE0ycgDNAhAoGAYi0Kn2Gu6E00nWu1Q/YuUsu4j1sNyrcEiKDoo4jj0kwOUbx6FyU7Y8X2l5nFsHMgM61RvagoiutuVAS0yaoAACDJNKLrnCBdWSnb341NW/b34JcIePdwy9HwBPykSxQLjAHpAE9zjpn7FOnnZm+AD4V6gaB9tsXISSpdoD9O29ECgYEAtaC/SDPVwKpQCrnKR5cyd3carxmlg0FTQrWP9v9BR7O87GZZESuPPtxcrMe5sbsMkcTWup1uASwy1th4X04qGfKc8RWeN13Grely8mv9b+HZrdvXoK0+3ixsh5sOhKpeXya99JvEtKCeYLqrSiwO+XLXhyhD0w8OIzJaJQNphCE=';
    public $publicKey = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAh8QbJvM8JzkpMfxO6L8AHgoFl8HPxepC7vloEB8PXgr7rNx4s6ZO0pgvM4mp9W+As4NZVH9h0jWyUw4ztrZ3WB90GHVROkdGVx9Dl9UROCH1/uvdKwMMauPG2+k86snwOsJJoU6Lf1piTmjM2UeT0zIhowZvbOwUPLGwrTauo/8xcgOU5tVy1PVLYDkdprXdQUhtMeuHATjFkdrkpngSutZHr1ypNhlUW6uFPFXsVbrEb9IHefRHB6bTIlpw9GBMw0NkKAmkhrR6o/E+HSUx+3Z8klYG0jrCApuUDbYo317DCI9u1xIDUTjwqSFwA84NEa+kgsAASUS2u2yPoSU/GwIDAQAB';
    public function __construct()
    {
        $this->app_id = '2016092900622330';
        $this->gate_way = 'https://openapi.alipaydev.com/gateway.do';
        $this->notify_url = env('APP_URL').'/notify_url';
        $this->return_url = env('APP_URL').'/return_url';
    }
    
    
    /**
     * 订单支付
     * @param $oid
     */
    public function pay(Request $request)
    {
        
        $order_id=$request->get('order_id');
        $pay_money=DB::table('order')->where('order_id',$order_id)->value('pay_money');
        file_put_contents(storage_path('logs/alipay.log'),"\n有新的支付请求\n",FILE_APPEND);
        // die();
        //验证订单状态 是否已支付 是否是有效订单
        $order_info = DB::table('order')->where(['order_id'=>$order_id])->first();
        //判断订单是否已被支付
        if($order_info->status!=1){
            echo "<script>alert('订单已支付，请勿重复支付');history.back(-1)</script>";
        }
        //判断订单是否已被删除
        // if($order_info['is_delete']==1){
        //     die("订单已被删除，无法支付");
        // }
        // $oid = time().mt_rand(1000,1111);  //订单编号
        //业务参数
        $bizcont = [
            'subject'           => 'Lening-Order: ' .$order_id,
            'out_trade_no'      => $order_id,
            'total_amount'      =>  $pay_money,
            'product_code'      => 'FAST_INSTANT_TRADE_PAY',
        ];
        // die();  
        //公共参数
        $data = [
            'app_id'   => $this->app_id,
            'method'   => 'alipay.trade.page.pay',
            'format'   => 'JSON',
            'charset'   => 'utf-8',
            'sign_type'   => 'RSA2',
            'timestamp'   => date('Y-m-d H:i:s'),
            'version'   => '1.0',
            'notify_url'   => $this->notify_url,        //异步通知地址
            'return_url'   => $this->return_url,        // 同步通知地址
            'biz_content'   => json_encode($bizcont),
        ];
        //签名
        $sign = $this->rsaSign($data);
        $data['sign'] = $sign;
        $param_str = '?';
        foreach($data as $k=>$v){
            $param_str .= $k.'='.urlencode($v) . '&';
        }
        $url = rtrim($param_str,'&');
        $url = $this->gate_way . $url;
        
        header("Location:".$url);
    }
    public function rsaSign($params) {
        return $this->sign($this->getSignContent($params));
    }
    protected function sign($data) {
        if($this->checkEmpty($this->rsaPrivateKeyFilePath)){
            $priKey=$this->privateKey;
            $res = "-----BEGIN RSA PRIVATE KEY-----\n" .
                wordwrap($priKey, 64, "\n", true) .
                "\n-----END RSA PRIVATE KEY-----";
        }else{
            $priKey = file_get_contents($this->rsaPrivateKeyFilePath);
            $res = openssl_get_privatekey($priKey);
        }
        
        ($res) or die('您使用的私钥格式错误，请检查RSA私钥配置');
        openssl_sign($data, $sign, $res, OPENSSL_ALGO_SHA256);
        if(!$this->checkEmpty($this->rsaPrivateKeyFilePath)){
            openssl_free_key($res);
        }
        $sign = base64_encode($sign);
        return $sign;
    }
    public function getSignContent($params) {
        ksort($params);
        $stringToBeSigned = "";
        $i = 0;
        foreach ($params as $k => $v) {
            if (false === $this->checkEmpty($v) && "@" != substr($v, 0, 1)) {
                // 转换成目标字符集
                $v = $this->characet($v, 'UTF-8');
                if ($i == 0) {
                    $stringToBeSigned .= "$k" . "=" . "$v";
                } else {
                    $stringToBeSigned .= "&" . "$k" . "=" . "$v";
                }
                $i++;
            }
        }
        unset ($k, $v);
        return $stringToBeSigned;
    }
    protected function checkEmpty($value) {
        if (!isset($value))
            return true;
        if ($value === null)
            return true;
        if (trim($value) === "")
            return true;
        return false;
    }
    /**
     * 转换字符集编码
     * @param $data
     * @param $targetCharset
     * @return string
     */
    function characet($data, $targetCharset) {
        if (!empty($data)) {
            $fileType = 'UTF-8';
            if (strcasecmp($fileType, $targetCharset) != 0) {
                $data = mb_convert_encoding($data, $targetCharset, $fileType);
            }
        }
        return $data;
    }
    /**
     * 支付宝同步通知回调
     */
    public function aliReturn()
    {
        $oid=$_GET['out_trade_no'];
        $data=DB::table('order')->where('oid',$oid)->update([
            'state'=>2
            ]);
         header('Refresh:2;url=/index/orderlist');
        echo "订单： ".$_GET['out_trade_no'] . ' 支付成功，正在跳转';
//        echo '<pre>';print_r($_GET);echo '</pre>';die;
//        //验签 支付宝的公钥
//        if(!$this->verify($_GET)){
//            die('簽名失敗');
//        }
//
//        //验证交易状态
////        if($_GET['']){
////
////        }
////
//
//        //处理订单逻辑
//        $this->dealOrder($_GET);
    }
     // * 支付宝异步通知
     // */
    public function aliNotify()
    {
        $data = json_encode($_POST);
        $log_str = '>>>> '.date('Y-m-d H:i:s') . $data . "<<<<\n\n";
        //记录日志
        file_put_contents(storage_path('logs/alipay.log'),$log_str,FILE_APPEND);
        //验签
        $res = $this->verify($_POST);
        $log_str = '>>>> ' . date('Y-m-d H:i:s');
        if($res === false){
            //记录日志 验签失败
            $log_str .= " Sign Failed!<<<<< \n\n";
            file_put_contents(storage_path('logs/alipay.log'),$log_str,FILE_APPEND);
        }else{
            $log_str .= " Sign OK!<<<<< \n\n";
            file_put_contents(storage_path('logs/alipay.log'),$log_str,FILE_APPEND);
        }
        //验证订单交易状态
        if($_POST['trade_status']=='TRADE_SUCCESS'){
            //更新订单状态
            $oid = $_POST['out_trade_no'];     //商户订单号
            $info = [
                'status'        => 2,       //支付状态  1未支付 2已支付
                'pay_money'    => $_POST['total_amount'],    //支付金额
                'pay_time'      => strtotime($_POST['gmt_payment']), //支付时间
                // 'plat_oid'      => $_POST['trade_no'],      //支付宝订单号
                // 'plat'          => 1,      //平台编号 1支付宝 2微信 
            ];
            DB::table('order')->where(['order_id'=>$oid])->update($info);
        }
        //处理订单逻辑
        $this->dealOrder($_POST);
        echo 'success';
    }
    //验签
    function verify($params) {
        $sign = $params['sign'];
        $params['sign_type'] = null;
        $params['sign'] = null;

        if($this->checkEmpty($this->aliPubKey)){
            $pubKey= $this->publicKey;
            $res = "-----BEGIN PUBLIC KEY-----\n" .
                wordwrap($pubKey, 64, "\n", true) .
                "\n-----END PUBLIC KEY-----";
        }else {
            //读取公钥文件
            $pubKey = file_get_contents($this->aliPubKey);
            //转换为openssl格式密钥
            $res = openssl_get_publickey($pubKey);
        }
        
       
        
        //转换为openssl格式密钥
        ($res) or die('支付宝RSA公钥错误。请检查公钥文件格式是否正确');
        //调用openssl内置方法验签，返回bool值
        $result = (bool)openssl_verify($this->getSignContent($params), base64_decode($sign), $res, OPENSSL_ALGO_SHA256);
        if(!$this->checkEmpty($this->aliPubKey)){
            openssl_free_key($res);
        }
        return $result;
    }
    /**
     * 处理订单逻辑 更新订单 支付状态 更新订单支付金额 支付时间
     * @param $data
     */
    public function dealOrder($data)
    {
        //加积分
        //减库存
    }
}
