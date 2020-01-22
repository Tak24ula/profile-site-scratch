<?php
namespace Cmn;

class UrlParameter
{
  private $Uri;
  private $params;
  private $prmBaseNo = DR_URI_No;

/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 *
 *
 *
 ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
  public function __construct()
  {
    $RqUri = (string)filter_input(INPUT_SERVER,"REQUEST_URI");
    if ($RqUri == '/' OR $RqUri == ''){
    	header( 'location: ' . HOME_PROTCOL . SERVER_NAME . DS . HOME_URI );
      exit();
    }
    $this->Uri = parse_url( $RqUri );
    $this->params = isset( $this->Uri['path'] ) ? trim( $this->Uri['path'] , '/' ):'';
    $this->params = explode( '/' , $this->params );

  }

  public static function getPramArr($prmNo = 1)
  {
    $self = new self;
    return $self->params;
  }

  public static function getPram($prmNo = 1)
  {
    $self = new self;
    $no = $self->prmBaseNo + $prmNo - 1;
    $result = isset($self->params[$no])? $self->params[$no] : false ;
    return $result;
  }

  public static function getPrmCount()
  {
    $self = new self;
    for ( $i=1 ;; $i++ ) {
      if ( $self->getPram($i) == false OR $self->getPram($i) == '' ){
        return $i - 1;
      }
    }
  }

  public function uriPathManager()
  {
    $path = './';
    $cnt = $this->getPrmCount() - 1;
    $path .= str_repeat('../',$cnt);
    return $path;
  }

  public static function getEndPram(){
    $self = new self;
    return end($self->params);
  }

}
