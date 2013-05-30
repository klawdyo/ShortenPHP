<?php

class googl{
/********************************
 *  SHORTEN
 *******************************/

     /*
      @var $shortenUrl
      Url to receive params to shorten
     */
    public $shortenUrl = 'http://goo.gl/api/shorten';
    
     /*
      @var $defaultParams
      Parâmetros padronizados que serão enviados em todas as requisições
     */
    public $defaultParams = array();
    
    /*
      @var $urlAsDefaultParam
      Default key containing the short url in return
     */
    public $urlAsDefaultParam = 'url';

    /*
      @var $defaultReturnType
      
     */
    public $defaultReturnType = 'json';
    //public $defaultReturnType = 'xml';
    
    /*
      @var $urlKey
      Chave que contém o retorno da url
     */
    //public $urlKey; //txt example
    //public $urlKey = 'short_url';
    //public $urlKey = 'parent/children1/short_url'; //xml example xpath





/********************************
 *  GENERAL
 *******************************/

    /*
      @var $authRequired
      Defaut method to request or send data
     */
    public $method = 'post';

    /*
      @var $authRequired
      Auth required to shorten
     */
    public $authRequired = false;
}