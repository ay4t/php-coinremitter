<?php
/*
 * File: RestClient.php
 * Project: aahadr
 * Created Date: Su Apr 2023
 * Author: Ayatulloh Ahad R
 * Email: ayatulloh@indiega.net
 * Phone: 085791555506
 * -------------------------
 * Last Modified: Sun Apr 09 2023
 * Modified By: Ayatulloh Ahad R
 * -------------------------
 * Copyright (c) 2023 Indiega Network 

 * -------------------------
 * HISTORY:
 * Date      	By	Comments 

 * ----------	---	---------------------------------------------------------
 * 
 */


namespace Ay4t\CoinRemitter;

use Ay4t\CoinRemitter\Interface\ApiClient;
use Exception;

final class RestClient  implements ApiClient
{

    /**
     * @var string
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    protected $apiKey;

    /**
     * @var string
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    protected $password;
    
    /**
     * @var string
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    protected $baseUrl;
    
    /**
     * @var string
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    protected $apiVersion;
    
    /**
     * @var array
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    protected $params = [];

    /**
     * @return \Ay4t\CoinRemitter\Config();
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    protected $config;

    /**
     * Short coin name
     * @var string
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    protected $coinName;

    /**
     * @var mixed
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    protected $data;

    /**
    * __construct
    *
    * @return parent::__construct()
    */
    public function __construct( string $apiKey = null, string $password = null )
    {
        $this->config       = new \Ay4t\CoinRemitter\Config\Coinremitter;
        $this->apiKey       = $this->config->apiKey;
        $this->password     = $this->config->password;
        $this->baseUrl      = $this->config->baseUrl;
        $this->apiVersion   = $this->config->apiVersion;
        $this->coinName     = $this->config->coinName;

        if(empty($this->coinName)){
            throw new Exception('Coin name is not set', 500);
        }

        // jika apiKey dan password tidak null maka kita set apiKey dan password
        if (!empty($apiKey)) {
            $this->setApiKey($apiKey);
        }
        
        if (!empty($password)) {
            $this->setPassword($password);
        }
     
    }

    /**
     * Fungsi api_call untuk memanggil api
     */
    protected function api_call(string $endpoint = '', array $params = [], string $method = 'POST')
    {
        $this->params['api_key']    = $this->apiKey;
        $this->params['password']   = $this->password;

        // set params jika $params ada datanya
        if (count($params) > 0) {
            $this->params = array_merge($params, $this->params);
        }
        
        $coinName = strtoupper($this->coinName);
        
        $url_array = [
            $this->baseUrl,
            $this->apiVersion,
            $coinName,
            $endpoint,
        ];

        $url    = implode('/', $url_array);
        
        // guzzlehttp untuk proses request
        $client = new \GuzzleHttp\Client();

        $response = $client->request( $method , $url, [
            \GuzzleHttp\RequestOptions::JSON => $this->params
        ] );
        
        // return response
        $result = $response->getBody()->getContents();

        $dataObject     = json_decode( $result );

        // set data
        if( $dataObject->data ){
            $this->data     = $dataObject->data;
        }

        return $dataObject;

    }

    public function getData( $get_data = true )
    {
        return $this->data;
    }

    /**
     * @param string $apiKey
     * @return this
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
        return $this;
    }

    /**
     * @param string $password
     * @return this
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @param string $baseUrl
     * @return this
     */
    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    /**
     * @param string $apiVersion
     * @return this
     */
    public function setApiVersion($apiVersion)
    {
        $this->apiVersion = $apiVersion;
        return $this;
    }

    /**
     * @return this
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    public function setCoinName($coinName)
    {
        $this->coinName = $coinName;
        return $this;
    }

}
