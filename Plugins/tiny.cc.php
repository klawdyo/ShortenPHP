<?php
/****************************************************************************************************
 
    ------------------------------------------------
      COPYRIGHHT
    ------------------------------------------------
      José Cláudio Medeiros de Lima <contato@claudiomedeiros.net> (C) 2013
    
    
    ------------------------------------------------
      CONFIGS
    ------------------------------------------------
       Documentation
       http://tiny.cc/api-docs
       
       url: http://tiny.cc/?c=rest_api&
                           m=shorten
                           &version=2.0.3
                           &format=json
                           &shortUrl=YourCustomURL
                           &longUrl=urlencode('http://example.com')
                           &login=tinyccapidemo
                           &apiKey=YourKey
        method: GET
      
    ------------------------------------------------
      HOW TO
    ------------------------------------------------
      $url = new Shorten('tiny.cc');
      echo url->auth('klawdyo', 'c8a46cb0-a21b-40db-bdb5-16a1851761f7')->toShort('http://google.com');
              
    ------------------------------------------------
     CHANGELOG
    ------------------------------------------------
      30/05/2013
      [+] Initial
    
      
    ------------------------------------------------
      TO DO
    ------------------------------------------------
 
 
 */
class tinycc{
/********************************
 *  SHORTEN
 *******************************/

     /*
      @var $shortenUrl
      Url to receive params to shorten
      Tiny.cc
      http://tiny.cc/
     */
    public $shortenUrl = 'http://tiny.cc/';
    
     /*
      @var $defaultParams
      Parâmetros padronizados que serão enviados em todas as requisições
     */
    public $defaultParams = array('c' => 'rest_api', 'version'=>'2.0.3', 'm'=>'shorten');
    
    
    /*
        @var customizeParam
        Parâmetro que, se informado, requisitará uma url customizada
     */
    public $customizeParam = 'shortUrl';
    
    /*
      @var $urlAsDefaultParam
      Default key containing the short url in return
     */
    public $urlAsDefaultParam = 'longUrl';

    /*
      @var $defaultReturnType
      
     */
    //public $defaultReturnType = 'plain';
    //public $defaultReturnType = 'json';
    public $defaultReturnType = 'custom'; //Precisa declarar o método public parseReturn para fazer o tratamento
    //public $defaultReturnType = 'xml';
    
    /*
      @var $urlKey
      Chave que contém o retorno da url
     */
    //public $urlKey; //It's empty. txt example
    //public $urlKey = 'short_url}'; //json example key
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
    public $authRequired = true;
    
    /*
      @var $authMethod
      Default method to require authentication. Possible values are 'urlParams' to
      requests by "params passed in url", or "basic", to basic http authentication
     */
    public $authMethod = 'urlParams'; //authentication by get params
    //public $authMethod = 'basic'; //basic http authentication
    //public $authMethod = 'oauth'; //not implemented
    
    /*
      @var authParams
      Params required if $authMethod is "urlParams"
     */
    public $authParams = array('login', 'apiKey');


    public function parseReturn($output){
        return json_decode($output)->results->short_url;
    }
}