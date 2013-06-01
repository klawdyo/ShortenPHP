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
       http://v.gd/apishorteningreference.php
       
       url: http://v.gd/create.php
        method: GET
      
    ------------------------------------------------
      HOW TO
    ------------------------------------------------
      $url = new Shorten('v.gd');
      echo url->toShort('http://google.com');
              
    ------------------------------------------------
     CHANGELOG
    ------------------------------------------------
      01/06/2013
      [+] Initial
    
      
    ------------------------------------------------
      TO DO
    ------------------------------------------------
 
 
 */
class vgd{
/********************************
 *  SHORTEN
 *******************************/

     /*
      @var $shortenUrl
      Url to receive params to shorten
     */
    public $shortenUrl = 'http://v.gd/create.php';
    
     /*
      @var $defaultParams
      Parâmetros padronizados que serão enviados em todas as requisições
     */
    public $defaultParams = array('format' => 'simple');
    
    
    /*
        @var customizeParam
        Parâmetro que, se informado, requisitará uma url customizada
     */
    public $customizeParam;
    
    /*
      @var $urlAsDefaultParam
      Default key containing the short url in return
     */
    public $urlAsDefaultParam = 'url';

    /*
      @var $defaultReturnType
      
     */
    public $defaultReturnType = 'plain';
    //public $defaultReturnType = 'json';
    //public $defaultReturnType = 'custom'; //Precisa declarar o método public parseReturn para fazer o tratamento
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
    //public $authParams = array();


    //public function parseReturn($output){
        //return json_decode($output)->results->short_url;
    //}
}