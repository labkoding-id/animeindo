
<?php
defined('BASEPATH') OR exit('No direct script access allowed');


if(!function_exists('tanggal')){
	function tanggal($timestamp = '', $date_format = 'l, j F Y ') {
        if (trim ($timestamp) == '')
        {
                $timestamp = time ();
        }
        elseif (!ctype_digit ($timestamp))
        {
            $timestamp = strtotime ($timestamp);
        }
        # remove S (st,nd,rd,th) there are no such things in indonesia :p
        $date_format = preg_replace ("/S/", "", $date_format);
        $pattern = array (
            '/Mon[^day]/','/Tue[^sday]/','/Wed[^nesday]/','/Thu[^rsday]/',
            '/Fri[^day]/','/Sat[^urday]/','/Sun[^day]/','/Monday/','/Tuesday/',
            '/Wednesday/','/Thursday/','/Friday/','/Saturday/','/Sunday/',
            '/Jan[^uary]/','/Feb[^ruary]/','/Mar[^ch]/','/Apr[^il]/','/May/',
            '/Jun[^e]/','/Jul[^y]/','/Aug[^ust]/','/Sep[^tember]/','/Oct[^ober]/',
            '/Nov[^ember]/','/Dec[^ember]/','/January/','/February/','/March/',
            '/April/','/June/','/July/','/August/','/September/','/October/',
            '/November/','/December/',
        );
        $replace = array ( 'Sen','Sel','Rab','Kam','Jum','Sab','Min',
            'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu',
            'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des',
            'Januari','Februari','Maret','April','Juni','Juli','Agustus','Sepember',
            'Oktober','November','Desember',
        );
        $date = date ($date_format, $timestamp);
        $date = preg_replace ($pattern, $replace, $date);
        $date = "{$date}";
        return $date;
    } 
}
if(!function_exists('foldersize')){
    function foldersize($path) {
        $total_size = 0;
        $files = scandir($path);
        $cleanPath = rtrim($path, '/'). '/';

        foreach($files as $t) {
            if ($t<>"." && $t<>"..") {
                $currentFile = $cleanPath . $t;
                if (is_dir($currentFile)) {
                    $size = foldersize($currentFile);
                    $total_size += $size;
                }
                else {
                    $size = filesize($currentFile);
                    $total_size += $size;
                }
            }   
        }

        return $total_size;
    }
}


if(!function_exists('format_size')){
    function format_size($bytes){

        $bytes = floatval($bytes);
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );

        foreach($arBytes as $arItem)
        {
            if($bytes >= $arItem["VALUE"])
            {
                $result = $bytes / $arItem["VALUE"];
                $result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
                    break;
            }
        }
        return $result;
    }
    
   
}

if(!function_exists('randomPassword')){
	function randomPassword($char){
		$karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdfghijklmnopqrstuvwxyz1234567890';
		$string = '';
		for($i = 0; $i < $char; $i++) {
			$pos = rand(0, strlen($karakter)-1);
			$string .= $karakter{$pos};
		}
		return $string;
	}
}

if (! function_exists('hitung_umur')) {
    function hitung_umur($tgl)
    {
        $tanggal = new DateTime($tgl);
        $today = new DateTime('today');
        $y = $today->diff($tanggal)->y;
        $m = $today->diff($tanggal)->m;
        $d = $today->diff($tanggal)->d;
        return $y . "th ";
    }
}

if(!function_exists('converUnits')){
	function converUnits($number){
		if($number < 1000){
            $t = " KG";
            $hasil = $number.$t;
            
		}else if($number >= 1000){
            $t = " TON";
            $h = $number/1000;
            $hasil = $h.$t;
		}
		return $hasil;
	}
}

if(!function_exists('converNumber')){
	function converNumber($number){
		if($number < 1000){
			$hasil = $number;
		}
		else if($number < 1000000){
			$hasil = number_format($number / 1000, 3) . 'K';
		}
		else if($number < 1000000000){
			$hasil = number_format($number / 1000000, 3) . 'M';
		}
		else{
			$hasil = number_format($number / 1000000000, 3) . 'B';
		}

		return $hasil;
	}
}

if(!function_exists('formatRupiah')){
	function formatRupiah($angka){
		$angka = intval($angka);
		$angka = "Rp. ".number_format($angka,0,',','.');
		return $angka;
	}
}

if(!function_exists('formatRupiahnonRp')){
	function formatRupiahnonRp($angka){
		$angka = intval($angka);
		$angka = number_format($angka,0,',','.');
		return $angka;
	}
}

if(!function_exists('encrypt_url')){
    function encrypt_url($string) {

        $output = false;
        /*
        * read security.ini file & get encryption_key | iv | encryption_mechanism value for generating encryption code
        */        
        $security       = parse_ini_file("labsecret.ini");
        $secret_key     = $security["encryption_key"];
        $secret_iv      = '015999'.date('Ymd');
        $encrypt_method = $security["encryption_mechanism"];

        // hash
        $key    = hash("sha256", $secret_key);

        // iv – encrypt method AES-256-CBC expects 16 bytes – else you will get a warning
        $iv     = substr(hash("sha256", $secret_iv), 0, 16);

        //do the encryption given text/string/number
        $result = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($result);
        return $output;
    }
}

if(!function_exists('decrypt_url')){
    function decrypt_url($string) {

        $output = false;
        /*
        * read security.ini file & get encryption_key | iv | encryption_mechanism value for generating encryption code
        */

        $security       = parse_ini_file("labsecret.ini");
        $secret_key     = $security["encryption_key"];
        $secret_iv      = '015999'.date('Ymd');
        $encrypt_method = $security["encryption_mechanism"];

        // hash
        $key    = hash("sha256", $secret_key);

        // iv – encrypt method AES-256-CBC expects 16 bytes – else you will get a warning
        $iv = substr(hash("sha256", $secret_iv), 0, 16);

        //do the decryption given text/string/number

        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        return $output;
    }
}

if (!function_exists('remove_special_characters')) {
    function remove_special_characters($str)
    {
        $str = preg_replace('/[^\p{L}\p{N}\s]/u', '', $str);
        $str = str_replace('/\[([a-z]+)\](?:&nbsp;|\s)*(.*?)(?:&nbsp;|\s)*\[\/([a-z]+)\]/', '[$1]$2[/$3]', $str);
        return $str;
    }
}

function strip_tags_review($str, $allowable_tags = '') {

    preg_match_all('/<(.+?)[\s]*\/?[\s]*>/si', trim($allowable_tags), $tags);
    $tags = array_unique($tags[1]);

    if(is_array($tags) AND count($tags) > 0) {
        $pattern = '@<(?!(?:' . implode('|', $tags) . ')\b)(\w+)\b.*?>(.*?)</\1>@i';
    }
    else {
        $pattern = '@<(\w+)\b.*?>(.*?)</\1>@i';
    }

    $str = preg_replace($pattern, '$2', $str);
    return preg_match($pattern, $str) ? strip_tags_review($str, $allowable_tags) : $str;
}

if(!function_exists('createSlug')){
    function createSlug($slug) { 
        $spacesHypens = '/[^\-\s\pN\pL]+/u';
        $duplicateHypens= '/[\-\s]+/';
        $slug = preg_replace($spacesHypens, '', mb_strtolower($slug,'UTF-8'));
        $slug = preg_replace($duplicateHypens, '-', $slug);
        $slug = trim($slug,'-');
        return $slug;
    }
}
if(!function_exists('get_bulan')){
    function get_bulan($bulan){
        $bulan = str_replace("0", "", $bulan);
        switch ($bulan) {
            case 1:
                $bulan = "Januari";
                break;
            case 2:
                $bulan = "Februari";
                break;
            case 3:
                $bulan = "Maret";
                break;
            case 4:
                $bulan = "April";
                break;
            case 5:
                $bulan = "Mei";
                break;
            case 6:
                $bulan = "Juni";
                break;
            case 7:
                $bulan = "Juli";
                break;
            case 8:
                $bulan = "Agustus";
                break;
            case 9:
                $bulan = "September";
                break;
            case 10:
                $bulan = "Oktober";
                break;
            case 11:
                $bulan = "November";
                break;
            case 12:
                $bulan = "Desember";
                break;

            default:
            $bulan = "--";
            break;
        }
        $res = $bulan;
        return $res;
    }
}

if(! function_exists('meta_tags')){
    function meta_tags($enable = array('general' => true, 'og'=> true, 'twitter'=> true, 'robot'=> true), $title = '', $desc = '', $imgurl ='', $url = ''){
        $CI =& get_instance();
        $CI->config->load('seo_config');

        $output = '';

        //uses default set in seo_config.php
        if($title == ''){
            $title = $CI->config->item('seo_title');
        }
        if($desc == ''){
            $desc = $CI->config->item('seo_desc');
        }
        if($imgurl == ''){
            $imgurl = $CI->config->item('seo_imgurl');
        }
        if($url == ''){
            $url = base_url();
        }


        if($enable['general']){
            $output .= '<meta name="description" content="'.$desc.'" />';
        }
        if($enable['robot']){
            $output .= '<meta name="robots" content="index,follow"/>';

        } else {
            $output .= '<meta name="robots" content="noindex,nofollow"/>';
        }


        //open graph
        if($enable['og']){
            $output .= '<meta property="og:title" content="'.$title.'"/>'
                .'<meta property="og:type" content="'.$desc.'"/>'
                .'<meta property="og:image" content="'.$imgurl.'"/>'
                .'<meta property="og:url" content="'.$url.'"/>';
        }

        //twitter card
        if($enable['twitter']){
            $output .= '<meta name="twitter:card" content="summary"/>'
                .'<meta name="twitter:title" content="'.$title.'"/>'
                .'<meta name="twitter:url" content="'.$url.'"/>'
                .'<meta name="twitter:description" content="'.$desc.'"/>'
                .'<meta name="twitter:image" content="'.$imgurl.'"/>';
        }

        echo $output;


    }
}