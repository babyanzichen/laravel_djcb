<html>  
<head>  
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>  
    <meta name="viewport" content="width=device-width, initial-scale=1"/>   
    <title>微信支付</title>  
  
    <script src="http://7xwdxi.com1.z0.glb.clouddn.com/lib/js/jquery-2.0.3.min.js"></script>  
      
    <script type="text/javascript">  
    var WXPayment = function() {
    if( typeof WeixinJSBridge === 'undefined' ) {
        alert('请在微信在打开页面！');
        return false;
    }
    WeixinJSBridge.invoke(
        'getBrandWCPayRequest', <?php echo $payment->getConfig(); ?>, function(res) {
            switch(res.err_msg) {
                case 'get_brand_wcpay_request:cancel':
                    alert('用户取消支付！');
                    break;
                case 'get_brand_wcpay_request:fail':
                    alert('支付失败！（'+res.err_desc+'）');
                    break;
                case 'get_brand_wcpay_request:ok':
                    alert('支付成功！');
                    break;
                default:
                    alert(JSON.stringify(res));
                    break;
            }
        }
    );
}
      
    </script>  
  
  
</head>  
<body>  
    <button type="button" onclick="WXPayment()">
    支付 ￥<?php echo ($order->total_fee / 100); ?> 元
</button>
  
</body>  
</html>  