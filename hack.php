<?
$param=array("user"=>"testuser", "host"=>"localhost");
$request = xmlrpc_encode_request('user_resources', $param, (array('encoding' => 'utf-8')));

$context = stream_context_create(array('http' => array(
    'method' => "POST",
    'header' => "User-Agent: XMLRPC::Client mod_xmlrpc\r\n" .
                "Content-Type: text/xml\r\n" .
                "Content-Length: ".strlen($request),
    'content' => $request
)));

$file = file_get_contents("http://127.0.0.1:4560/RPC2", false, $context);

$response = xmlrpc_decode($file);

if (xmlrpc_is_fault($response)) {
    trigger_error("xmlrpc: $response[faultString] ($response[faultCode])");
} else {
    print_r($response);
}

?>
