<?php

//  Export Optus Data Usage
//  By Tom Kavanagh https://github.com/tkav/optus-data-usage

Class Optus {

  function login($Username, $Password) {
      $url = 'https://www.optus.com.au/id/forms/login.sm';
      $ch = curl_init();
      $fields = array(
          'user' => $Username,
          'password' => $Password,
          'target' => '-SM-HTTP://www.optus.com.au/secure/sm/login.process?target=https-:-/-/www.optus.com.au-/my--account',
          ':cq_csrf_token' => 'undefined'
          );
      $data = http_build_query($fields);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($ch, CURLOPT_COOKIEJAR, 'session.txt');
      curl_setopt($ch, CURLOPT_COOKIEFILE, 'session.txt');
  	  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 40);
      $buffer = curl_exec($ch);
      curl_close($ch);
      return $buffer;
  }
  
  function checkLogin($txt='test.txt') {
      $url = 'https://api.www.optus.com.au/mcssapi/rp-webapp-9-common/user/information';
      echo $url;
      $ch = curl_init();
      $fp = fopen($txt, "w");
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_HEADER, 1);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($ch, CURLOPT_COOKIEJAR, 'session.txt');
      curl_setopt($ch, CURLOPT_COOKIEFILE, 'session.txt');
      curl_setopt($ch, CURLOPT_FILE, $fp);
      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 40);
      $buffer = curl_exec($ch);
      fclose($fp);
      curl_close($ch);
      return $buffer;
  }

  function getPage($txt='test.txt', $CustomerID=0, $AccountID=0, $SubscriptionID=0) {
      //$url = 'https://www.optus.com.au/customercentre/myaccount/dashboard';    
      
      $url = 'https://api.www.optus.com.au/mcssapi/rp-webapp-9-common/ebill/customer/'.$CustomerID.'/shared-unbilled-usage-accumulators?account='.$AccountID.'&subscription='.$SubscriptionID;
      echo $url;
      $ch = curl_init();
      $fp = fopen($txt, "w");
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($ch, CURLOPT_COOKIEJAR, 'session.txt');
      curl_setopt($ch, CURLOPT_COOKIEFILE, 'session.txt');
      curl_setopt($ch, CURLOPT_FILE, $fp);
  	  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 40);
      $buffer = curl_exec($ch);
      fclose($fp);
      curl_close($ch);
      return $buffer;
  }

}

?>
