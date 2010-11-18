<?php

class bitly{
/********************************
 *  SHORTEN
 *******************************/

     /*
      @var $shortenUrl
      Url to receive params to shorten
     */
    public $shortenUrl = 'http://api.bit.ly/v3/shorten';
    
     /*
      @var $defaultParams
      Parâmetros padronizados que serão enviados em todas as requisições
     */
    public $defaultParams = array('format' => 'txt');
    
    /*
      @var $urlAsDefaultParam
      Default key containing the short url in return
     */
    public $urlAsDefaultParam = 'longUrl';

    /*
      @var $defaultReturnType
      
     */
    public $defaultReturnType = 'txt';
    //public $defaultReturnType = 'json';
    //public $defaultReturnType = 'xml';
    
    /*
      @var $urlKey
      Chave que contém o retorno da url
     */
    public $urlKey; //txt example
    //public $urlKey = 'short_url'; //json example key
    //public $urlKey = 'parent/children1/short_url'; //xml example xpath


/********************************
 *  GENERAL
 *******************************/

    /*
      @var $authRequired
      Defaut method to request or send data
     */
    public $method = 'get';

    /*
      @var $authRequired
      Auth required to shorten
     */
    public $authRequired = true;
    
    /*
      @var 
     */
    public $authMethod = 'urlParams'; //authentication by get params
    //public $authMethod = 'basic'; //basic http authentication
    //public $authMethod = 'oauth'; //not implemented
    
    /*
      @var authParams
      Params required if $authMethod is "urlParams"
     */
    public $authParams = array(
        'login', 'apiKey'
    );
}