<?php
/*
 * File: ValidateAddress.php
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

Contoh response:
public 'flag' => int 0
public 'msg' => string 'Fail' (length=4)
public 'action' => string 'validate-address' (length=16)
public 'data' => 
  object(stdClass)[33]
    public 'valid' => boolean false */

namespace Ay4t\CoinRemitter\Command;

use Ay4t\CoinRemitter\RestClient;

class ValidateAddress extends RestClient
{
    /**
     * @var string
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    private $address = '';

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
     * validateAddress
     *
     * @param  mixed $walletAddress
     * @return void
     */
    public function result($walletAddress = null)
    {
        if (!empty($walletAddress)) {
            $this->setAddress($walletAddress);
        }


        // jika address kosong throws errors
        if (empty($this->address)) {
            throw new \Exception('Address is required');
        }

        return $this->api_call( 'validate-address', [
            'address' => $this->address,
        ]);
    }

    /**
     * Set the value of address
     * @param string $address
     * @return self
     */ 
    public function setAddress(string $address)
    {
        $this->address = $address;
        return $this;
    }

    public function isValidAddress()
    {
        $data = $this->data;
        return $data->valid;
    }
}
