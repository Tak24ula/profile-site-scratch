<?php
namespace Nsr;

class HashWork
{
  public function __construct()
  {

  }

  public static function preUniqueHash($url = false , $rule = 1)
  {
    $url = htmlspecialchars($url);
    if($url == '' OR $url == false){
      return false;
    }
    // url shorten rules
    // 1 ... [a-z][A-Z]
    // 2 ... hash

    $shortHash = function ($data, $algo = 'CRC32') {
      return strtr(rtrim(base64_encode(pack('H*', sprintf('%u', hash($algo,$data)))), '='), '+/', '-_');
    };


    $unique = function ($data, $algo = 'CRC32') {
      return strtr(rtrim(base64_encode(pack('H*', sprintf('%u', hash($algo,$data)))), '='), '+/', '-_');
    };

    $a = 'hello';

    echo "<br><br><br>";
    echo self::makeRandStr(5) . "<br><br>";

    echo CRC32($url) . " ::::: CRC32<br><br><br>"; // 907060870
    echo sprintf('%u', CRC32($url)) . " ::::: sprintf(CRC32)<br>"; // 907060870
    echo pack('H*', sprintf('%u', CRC32($url))) . " ::::: pack<br>"; // 907060870
    echo base64_encode(pack('H*', sprintf('%u', CRC32($url)))) . " ::::: base64_encode<br>"; // 907060870
    echo rtrim(base64_encode(pack('H*', sprintf('%u', CRC32($url)))), '=') . " ::::: rtrim<br>"; // 907060870
    echo strtr(rtrim(base64_encode(pack('H*', sprintf('%u', CRC32($url)))), '='), '+/', '-_') . " ::::: strtr<br>"; // 907060870
    echo "<br><br><br><br><br>";


    echo CRC32($url) . " ::::: CRC32<br>"; // 907060870
    echo $shortHash($url) . " :::::: \$shortHash<br><br>"; // kHBghwA
    echo md5($url) . " :::::: md5<br><br>"; // 5d41402abc4b2a76b9719d911017c592
    echo $shortHash($url, 'sha256') . " :::::: sha256<br>"; // XUFAKrxLKna5cZ2REBfFkg
  }

  public static function randStr($length) {
      $str = array_merge(range('a', 'z'), range('0', '9'), range('A', 'Z'));
      $r_str = null;
      for ($i = 0; $i < $length; $i++) {
          $r_str .= $str[rand(0, count($str) - 1)];
      }
      return $r_str;
  }

  public static function preUniqueStr($before = '' , $after = '')
  {
    return uniqid($before) . $after;
  }

}
