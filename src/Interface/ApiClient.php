<?php
/*
 * File: ApiClient.php
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
 */

namespace Ay4t\CoinRemitter\Interface;

interface ApiClient 
{
    /** property apiKey */
    public function setApiKey($apiKey);

    /** function password */
    public function setPassword($password);

    /** baseUrl */
    public function setBaseUrl($baseUrl);

    /** endPoint */
    public function setApiVersion($apiVersion);
    
}

