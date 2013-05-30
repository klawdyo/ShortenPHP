<?php
/****************************************************************************************************
 *
 *------------------------------------------------
 *  COPYRIGHHT
 *------------------------------------------------
 *  José Cláudio Medeiros de Lima <contato@claudiomedeiros.net> (C) 2013
 *
 *
 *------------------------------------------------
 *  CONFIGS
 *------------------------------------------------
 * url: http://va.mu/api/create/?url=claudiomedeiros.net
 * method: GET
 *  
 *------------------------------------------------
 *  HOW TO
 *------------------------------------------------
 *  $url = new Shorten('va.mu');
 *  echo url->toShort('http://google.com');
            
 *------------------------------------------------
 * CHANGELOG
 *------------------------------------------------
 *  30/05/2013
 *  [+] Initial
 *
 *  
 *------------------------------------------------
 *  TO DO
 *------------------------------------------------
 *
 *
 */
class vamu{
/********************************
 *  SHORTEN
 *******************************/

     /*
      @var $shortenUrl
      Url to receive params to shorten
      Va.Mu
      http://va.mu/api/create/?url=claudiomedeiros.net&domain=1
     */
    public $shortenUrl = 'http://va.mu/api/create/';
    
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
    public $defaultReturnType = 'plain';
    //public $defaultReturnType = 'json';
    //public $defaultReturnType = 'xml';
    
    /*
      @var $urlKey
      Chave que contém o retorno da url
     */
    //public $urlKey; //It's empty. txt example
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