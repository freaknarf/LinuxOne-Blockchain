<?php
namespace APP;
use CURLFile;
/**
 * This is the curl instances classe, using different functions to achieve HTTP requests
 */
class Curl{
public function __construct(){
}
/**
 * [curlExecute execute,log and close connection]
 * @param  ressource $ch [curl ressource]
 * @return string
 */
public function curlExecute($ch){
	$result = curl_exec($ch);
	$ch_error = curl_error($ch);
		if ($ch_error) {
		return $ch_error;
		curl_close($ch);
		} 
		else {
			curl_close($ch);
			return $result;
		}
}
/**
 * [setopt description]
 * @param  ressource	$ch 	curl handler
 * @param  string 	$headers  pre configured headers
 * @param  string 	$method   http method used
 * @param  file $data     data to send : json or attached files
 * @param  string $url 	complete rest api url
 * @param  string $username 	jira username (b64)
 * @param  string $password 	jira user password (b64)
 * @return void
 */
public function setopt($ch,$headers,$method,$data,$url,$username,$password){
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
		curl_setopt($ch, CURLOPT_TIMEOUT,1000);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,0); 
		if ($method=='POST') 
			curl_setopt($ch, CURLOPT_POSTFIELDS, ($data));
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
}
/**
 * [connectionJira uses user login information to get authentiofication and connect jira using base 64 ]
 */

public function connectionJira(){
	//login
		global $jirauser,$jirapwd,$url,$username,$password; 
		$username =  base64_decode($jirauser);
		$password =  base64_decode($jirapwd);
		$url = "http://148.100.5.224:3000/api";
		echo "fuck";
}

// Prepare CURL GET and POST Requests

/**
 * [curlGet GET HTTP request]
 * @param  string $req [REST API url]
 * @return ressource
 */
public function curlGet($req){
		global $logger;
		global $jirauser,$jirapwd,$url,$username,$password; 
		$this->connectionJira();
		$url.=$req;
		$data="";
		$ch = curl_init();
		$headers = array(
			'Accept: application/json',
			'Content-Type: application/json'
			);
		$method="GET";
		$this->setopt($ch,$headers,$method,$data,$url,$username,$password);

		return $this->curlExecute($ch);	
}
/**
 * [curlDelete DELETE HTTP REQUEST]
 * @param  string $req REST API URL
 * @return string
 */
public function curlDelete($req){
			global $logger;
		global $jirauser,$jirapwd,$url,$username,$password; 
		$this->connectionJira();
		$url.=$req;
		$data;
		$ch = curl_init();
		$headers = array(
			'Accept: application/json',
			'Content-Type: application/json'
			);
		$method="DELETE";
		$this->setopt($ch,$headers,$method,$data,$url);
		return $this->curlExecute($ch);
}
/**
 * [curlPut PUT HTTP request]
 * @param  string $req  REST API URL
 * @param  string $data JSON UPDATE DATA (can have the same format as for creation)
 * @return string
 */
public function curlPut($req,$data){
		global $logger;
		global $jirauser,$jirapwd,$url,$username,$password; 
		$this->connectionJira();
		$url.=$req;
		$ch = curl_init();
		$headers = array(
			'Accept: application/json',
			'Content-Type: application/json'
			);
		$method="PUT";
		$this->setopt($ch,$headers,$method,$data,$url);
		return $this->curlExecute($ch);
}
/**
 * [curlPost POST HTTP request]
 * @param  string $req  URL requested
 * @param  string $data json to upload
 * @return string
 */
public function curlPost($req,$data){
		global $logger;
		global $jirauser,$jirapwd,$url,$username,$password; 
		$this->connectionJira();
		$url.=$req;
		$ch = curl_init();
		$headers = array(
			'Accept: application/json',
			'Content-Type: application/json'
			);
		$method="POST";
		$this->setopt($ch,$headers,$method,$data,$url);
		return $this->curlExecute($ch);
}
/**
 * [curlPostFile POST HTTP request (raw data files)]
 * @param  string $req  URL requested
 * @param  File $data File t upload
 * @return string
 */
public function curlPostFile($req,$data){
		global $logger;
		$attachmentPath=$data;
		$cfile = new CURLFile($data);
		//Jira's filename can be set with the following instruction 
		//todo set file name instead of path+filneame -> to check
		$expl=explode('\\',$data);
		$filename=$expl[count($expl)-1];
		echo "Searching for file : ".$filename;
		$cfile->setPostFilename(utf8_encode($filename));
		$data = array('file'=>$cfile);
		global $jirauser,$jirapwd,$url,$username,$password; 
		$this->connectionJira();
		$url.=$req;
		$ch = curl_init();
		$headers = array(
			'X-Atlassian-Token: no-check'
			);
		$method="POST";
		$this->setopt($ch,$headers,$method,$data,$url);
		return $this->curlExecute($ch);
}
};
