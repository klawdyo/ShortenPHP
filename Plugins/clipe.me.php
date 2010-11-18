<?php

class clipeme{
/********************************
 *  SHORTEN
 *******************************/

     /*
      @var $shortenUrl
      Url to receive params to shorten
      lipe.me/index.php?api=1&return_url_text=1&longUrl={URL}
      Http::get('http://clipe.me/index.php', array('longUrl' => 'http://google.com', 'return_url_text'=>1, 'api' => 1))

     */
    public $shortenUrl = 'http://clipe.me/index.php';
    
     /*
      @var $defaultParams
      Parâmetros padronizados que serão enviados em todas as requisições
      form
     */
    public $defaultParams = array('return_url_text'=>1, 'api' => 1);
    
    /*
      @var $urlAsDefaultParam
      Default key containing the short url in return
     */
    public $urlAsDefaultParam = 'longUrl';

    /*
      @var $defaultReturnType
      
     */
    public $defaultReturnType = 'plain';
    //public $defaultReturnType = 'json';
    //public $defaultReturnType = 'xml';
    
    /*
      @var $urlKey
      Chave que contém o retorno da url
     */
    public $urlKey; //It's empty. txt example
    //public $urlKey = 'short_url'; //json example key
    //public $urlKey = 'parent/children1/short_url'; //xml example xpath


/********************************
 *  GENERAL
 *******************************/

    /*
      @var $method
      Defaut method to request or send data
      Possible values are "post" or "get"
     */
    public $method = 'get';

    /*
      @var $authRequired
      Auth required to shorten
     */
    public $authRequired = false;
    
    /*
      @var $authMethod
      Default method to require authentication. Possible values are 'urlParams' to
      requests by "params passed in url", or "basic", to basic http authentication
     */
    //public $authMethod = 'urlParams'; //authentication by get params
    //public $authMethod = 'basic'; //basic http authentication
    //public $authMethod = 'oauth'; //not implemented
    
    /*
      @var authParams
      Params required if $authMethod is "urlParams"
     */
    public $authParams = array();
}