<?php

require_once 'Http.php';


class Shorten{
    /**
      * @var object $objectPlugin
      * Stores the object plugin
      */
    public $objectPlugin;

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
      * Generate a link to a QrCode imagem
      *
      * @param integer $dimensions Dimensions to image
      * @return string Url to qrcode
      */
    public function qrcode($dimensions = 200){
        return "http://chart.apis.google.com/chart?chf=a,s,000000&chs=" . $dimensions . "x" . $dimensions . "&cht=qr&chl=" . $this->shortUrl;
    }
    
    /**
      * 
      *
      * @param
      * @return 
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
                
                    //case 'oauth':
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
      * 
      *
      * @param
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
                $xml = new SimpleXMLElement;
                $xml->simplexml_load_string($output);
                return $xml->xpath($this->objectPlugin->urlKey);
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
}

