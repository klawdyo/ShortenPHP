<?php
require_once 'Http.php';
/**
  *
  *
  *---------------------------------------
  *     INTRODUCTION
  *---------------------------------------
  * Shorten is a php class that centralizes the main shorten url services in the Web.
  *
  *----------------------------------------
  *     HOW TO USE
  *----------------------------------------
  * //Creating object to
  * $url = new Shorten('goo.gl');
  *
  * //Getting the short url
  * echo $url->toShort('http://google.com');
  * 
  * //Getting Qrcode url image
  * echo '<img src="' . $url->qrcode() . '" />';
  *
  * //Using with authentication
  * $url = new Shorten('bit.ly');
  * echo $url->auth('klawdyo', 'R_sad86dfs8sdf5sd5f7ds57d6s987asdds')
  *          ->toShort('http://www.google.com')
  *
  *----------------------------------------
  *     REQUIREMENTS
  *----------------------------------------
  * Shorten class requires Http class
  *
  *----------------------------------------
  *     CHANGE LOG
  *----------------------------------------
  *  17/11/2010
  *  [+] Initial class
  *  [+] toShort() shortens a url
  *  [+] qrcode() returns a image url to qrcode
  *  [+] auth() allows some services to be used with authentication
  *  [+] request() centralizes the request method and options
  *  [+] parseReturn()
  *
  *  18/11/2010
  *  [+] load() loads the specified plugin
  *  [m] __construct() now using Try/Catch
  *  [m] load() throws an exception if the required plugin don't exists.
  *  [m] Fixed xml bug into parseReturn()
  *
  *-----------------------------------------
  * TO DO
  *-----------------------------------------
  * - toShort() will accept an array as parameter.
  * 
  * - customize() will define the final code to generated url. Only for services
  * that accept. For others services, nothing happens.
  *
  * - expand() forces the discover of the destination url
  */

class Shorten{
    /**
      * @var object $objectPlugin
      * Stores the object plugin
      */
    public $objectPlugin;
    
    /**
      * @var bool $logging
      * Log is ON?
      */
    public $logging = false;
    
    /**
      * @var object
      * Stores the current short url
      */
    public $shortUrl;
    
    /**
      * Class constructor
      *
      * @param string $plugin Plugin name
      */
    public function __construct($plugin){
        try{
            $this->load($plugin);
        }
        catch(Exception $e ){
            echo $e->getMessage();
        }
    }
    
    
    /**
      * Generate a link to a QrCode image
      *
      * @param integer $dimensions Dimensions to image
      * @return string Url to qrcode
      */
    public function qrcode($dimensions = 200){
        return "http://chart.apis.google.com/chart?chf=a,s,000000&chs=" . $dimensions . "x" . $dimensions . "&cht=qr&chl=" . $this->shortUrl;
    }
    
    /**
      * Allow using plugins that require authentication
      *
      * @return void
      */
    public function auth(){
        if($this->objectPlugin->authRequired):
            $values = func_get_args();
            $keys = $this->objectPlugin->authParams;

            if(count($values) == count($keys)):
                switch($this->objectPlugin->authMethod):
                    case 'basic':
                        Http::auth($args[0], $args[1]);
                        break;
                
                    case 'urlParams':
                        $this->objectPlugin->defaultParams = array_merge(
                            $this->objectPlugin->defaultParams,
                            array_combine($keys, $values)
                        );
                        break;
                
                    //case 'oauth': //Not implemented
                        //break;
                endswitch;
            else:
                throw new InvalidArgumentException('Difference between params required
                                                   number and number passed');
            endif;
        endif;
        
        return $this;
    }
    
    /**
      * Shorten url
      *
      * @param string $url Url to shorten
      * @return 
      */
    public function toShort($url){
        if(!empty($this->objectPlugin)):
            //Merging default params into url params
            $params = array_merge($this->objectPlugin->defaultParams,
                                  array($this->objectPlugin->urlAsDefaultParam => $url));
            //Sending request
            $output = $this->request($this->objectPlugin->method,
                                     $this->objectPlugin->shortenUrl,
                                     $params);
            $this->log('Shorten::toShort()$output: '  . $output);
            
            //Parsing url
            $this->shortUrl = $this->parseReturn($output);

            //Key
            preg_match('([^/]+$)', $this->shortUrl, $key);
            $this->keyUrl = reset($key);
            
            return $this->shortUrl;
        else:
            throw new Exception('Shorten object not loaded.');
        endif;
    }
    
    /**
      * Centralizes the request options
      *
      * @param string $method Request method type
      * @param string $url Url to send data
      * @param array $params Params to send to webservice
      * @return mixed Data returned from Webservice
      */
    protected function request($method = 'post', $url, $params = array()){
        $this->log('Shorten::request()$url: ' . $url . PHP_EOL);
        return Http::$method($url, $params);
    }

    /**
      * Parses return
      *
      * @param mixed $output Data returned from webservice
      * @return string short url
      */
    protected function parseReturn($output){
        switch($this->objectPlugin->defaultReturnType):
            case 'json':
                $output = json_decode($output);
                $key = $this->objectPlugin->urlKey;
                return $output->$key;
            break;
        
            case 'xml':
                $xml = new SimpleXMLElement($output);
                $return = $xml->xpath($this->objectPlugin->urlKey);
                return (string)$return[0];
            break;
        
            case 'txt': case 'plain': default:
                return $output;
            break;
        endswitch;
    }
    
    /**
      * Loades the plugin file
      *
      * @param string $plugin Plugin name
      * @return void
      */
    protected function load($plugin){
        $file = dirname(__FILE__) . '/Plugins/' . $plugin . '.php';
        
        if(file_exists($file)):
            require $file;
            $class = strtolower(str_replace('.', '', $plugin));
            $this->objectPlugin = new $class;
        else:
            throw new Exception('File "' . basename($file) . '" not found in "Shorten/Plugins" directory');
        endif;
    }
    
    /**
      *
      *
      *
      */
    protected function log($msg){
        if($this->logging == true){
            echo "<pre>" ;
            print_r($msg);
            echo "</pre>" . PHP_EOL;
        }
    }
}

