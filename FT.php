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
		$data_string = json_encode($data);
		 
		$ch = curl_init($this->url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'Content-Type: application/json',
		    'Content-Length: ' . strlen($data_string))
		);
		 
		$result = curl_exec($ch);

		return $result;
	}
}

?>