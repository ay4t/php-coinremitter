<?php
/*
 * File: GetWalletBalance.php
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


 namespace Ay4t\CoinRemitter\Command;

use Ay4t\CoinRemitter\RestClient;

class GetWalletBalance extends RestClient
{
    /**
    * __construct
    *
    * @return parent::__construct()
    */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * getWalletBalance
     *
     * @param  mixed $walletAddress
     * @return void
     */
    public function result()
    {
        return $this->api_call( 'get-balance');
    }
}
