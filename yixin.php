<?//获取易信验证时GET过来的参数
$signature    =$_GET["signature"];//易信加密签名，signature结合了开发者填写的token参数和请求中的timestamp参数、nonce参数。
$timestamp    =$_GET["timestamp"];//时间戳
$nonce        =$_GET["nonce"];//随机数
$echostr    =$_GET["echostr"];//随机字符串//将token、timestamp、nonce三个参数进行字典序排序
$signarray =array("zfjaxj515618",$timestamp,$nonce);//将三个参数生成数组
sort($signarray);//参数数组按字典排序//将数组中三个参数字符串拼接成一个字符串，并进行sha1加密
$signstr =sha1(implode("",$signarray));//将开发者获得加密后的字符串可与signature对比，标识该请求来源于易信
if($signstr ==$signature)
{
  echo $echostr;//确认此次GET请求来自易信服务器，返回echostr参数内容
}

?>
