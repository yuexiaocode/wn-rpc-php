<?phpheader("content-type","text/plain;charset=utf-8");error_reporting(E_ALL);//引入Rpc客户端类require_once __DIR__ . '/lib-weinong-rpc/com/weinong/baserpc/WNRpcClient.php';use com\weinong\baserpc\WNRpcClient;//注册命名空间对应的目录，免去了引入文件繁琐操作WNRpcClient::registerDefinition(	array(		array("com\weinong\basedb",__DIR__ . "/users-api-bean/"),		array("com\weinong\basedb",__DIR__ . "/me-api-bean/")	));//通过IP:Port获取客户端对象$rpcClient = WNRpcClient::getWNRpcClient('YueXiao-PC', 7911,"com\weinong\basedb\api");//打开客户端$rpcClient->open();//通过Client类全名和API名称获取相应的API$api = $rpcClient->getWNRpcApiClient("\com\weinong\basedb\api\BankApiClient","BankApi");$list = $api->getAllList();//打印JSON//JSON_ZH_CN_PRETTY 适应中文且缩进形式println ("通过Client类全名和API名称获取相应的API:GroupApi->getAllList()结果:");println (json_encode($list,JSON_ZH_CN_PRETTY));$api = $rpcClient->getGroupApi();$list = $api->getAllList();println ("GroupApi->getAllList()结果:");println (json_encode($list,JSON_ZH_CN_PRETTY));$api = $rpcClient->getClassifyApi();$list = $api->getAllList();println ("ClassifyApi->getAllList()结果:");println (json_encode($list,JSON_ZH_CN_PRETTY));$api = $rpcClient->getBankApi();$list = $api->getAllList();println ("BankApi->getAllList()结果:");println (json_encode($list,JSON_ZH_CN_PRETTY));//关闭客户端，(可以不调用，析构方法会自己调用,建议显式调用)$rpcClient->close();