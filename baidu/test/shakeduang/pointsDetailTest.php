<?php
/*
detail接口返回的数据结构`
array (
    'errno' => 0,
    'errmsg' => 'success',
    'data' => 
    array (
        'total' => '11',
        'points_data' => 
        array (
            0 => 
            array (
                'points_src' => '61',
                'points_value' => '10',
                'points_type' => '1',
                'points_time' => '1448002885',
                'points_detail' => '{"order_id":"","coupon_id":"","consume_time":"","pay_money":"","coupon_count":"","costValue":"","entry_src":"shakeduang_add",}',
                'points_src_desc' => '摇一摇获得',
            ),
        ),
    ),
)
 */
Bd_Init::init('memberapi');

$appId = 115;
$time = time();
$userId = 1;
$userId = 556869752;
$hostname = 'cp01-rdqa-dev384.cp01.baidu.com';

$postData = array(
    'appId' => '115',
    'verChannel' => 'nuomi',
    'intToken' => '',
    'intTimestamp' => $time,
    'baiduId' => '',
    'pass_uid' => $userId,
    'start' => 0,
    'offset' => 5,
    'terminal' => 'ios',
);

// 重入测试
#$postData['intToken'] = '7c27061fe374dba61b9256204eeee7e29e8a7ce1';
#$postData['intTimestamp'] = '1447237022';
#$postData['pointsCtime'] = '1447237022';
#$postData['srcUniqid'] = '610e8f1ecbd363dbfb44250e6495dae0';

// 本机 online 环境测试
// http://cp01-rdqa-dev384.cp01.baidu.com:8080/memberapi/points/add
$url = "http://${hostname}:8081/memberapi/points/detail";
// mktapi 营销api
#$url = "http://cp01-rdqa04-dev170.cp01.baidu.com:8281/mktapi/redirect/memberapi/points/add";
// 本机 work 环境测试
#$url = "http://${hostname}:8081/memberapi/points/add";
// work-nmq 后端路径
#$url = "http://${hostname}:8081/memberapi/commit/addpointsnmq";
#$postData['data'] = json_encode($postData);

$ch = curl_init($url);
#curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
#curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
$ret = curl_exec($ch);
var_export(json_decode($ret, 1));
/*
if(!$ret) {
    echo 'Curl error: ' . curl_error($ch) . PHP_EOL;
    echo 'Curl error number: ' . curl_errno($ch);
} else {
    echo '操作完成', PHP_EOL;
}
 */
curl_close($ch);


/* vim: set expandtab ts=4 sw=4 sts=4 tw=100: */
?>
