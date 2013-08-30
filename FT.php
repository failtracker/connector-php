<?

class FT {

	private $token = "";
	private $url = "http://failtracker-rest.herokuapp.com/fail/insert";

	function __construct($token){
		$this->token = $token;
	}

	function send($title, $msg){
		$data = array("title" => $title, 
				  "content" => $msg,
				  "token" => $this->token,
				  "date" => time() * 1000);
		$post_string = json_encode($data);

		$parts=parse_url($this->url);

		$fp = fsockopen($parts['host'],
		  isset($parts['port'])?$parts['port']:80,
		  $errno, $errstr, 30);

		$out = "POST ".$parts['path']." HTTP/1.1\r\n";
		$out.= "Host: ".$parts['host']."\r\n";
		$out.= "Content-Type: application/json\r\n";
		$out.= "Content-Length: ".strlen($post_string)."\r\n";
		$out.= "Connection: Close\r\n\r\n";
		$out.= $post_string;


		fwrite($fp, $out);
		fclose($fp);
	  }
}

?>