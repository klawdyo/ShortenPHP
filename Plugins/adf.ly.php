<?php
/****************************************************************************************************
 *
 *------------------------------------------------
 *  COPYRIGHHT
 *------------------------------------------------
 *  José Cláudio Medeiros de Lima <contato@claudiomedeiros.net> (C) 2013
 *  
 *------------------------------------------------
 *  HOW TO
 *------------------------------------------------
 *  $url = new Shorten('adf.ly');
 *                  UID        API_KEY
 *  echo url->auth('4235730', '9a0c27a44c975089bb52295b0971d44c')
            ->toShort('http://google.com');
            
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
class adfly{
/********************************
 *  SHORTEN
 *******************************/

     /*
      @var $shortenUrl
      Url to receive params to shorten
      AdF.ly
      http://api.adf.ly/api.php?key=9a0c27a44c975089bb52295b0971d44c&uid=4235730&advert_type=int&domain=adf.ly&url=http://somewebsite.com
     */
    public $shortenUrl = 'http://api.adf.ly/api.php';
    
     /*
      @var $defaultParams
      Parâmetros padronizados que serão enviados em todas as requisições
     */
    public $defaultParams = array('advert_type'=>'int','domain'=>'adf.ly');
    
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
    public $authParams = array(
        'uid', //UID
        'key', //KEY
    );
}