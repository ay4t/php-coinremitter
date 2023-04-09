<?php
/*
 * File: NewAddress.php
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
 * Create New Wallet Address
 * 
 Contoh response:
  public 'flag' => int 1
  public 'msg' => string 'New address created successfully.' (length=33)
  public 'action' => string 'get-new-address' (length=15)
  public 'data' => 
    object(stdClass)[33]
      public 'address' => string 'nghxtJQuYyuEjZND3745fvhXcpG8QrXWt8' (length=34)
      public 'label' => string 'ayat' (length=4)
      public 'qr_code' => string 'https://chart.googleapis.com/chart?chs=300x300&chld=L|2&cht=qr&chl=nghxtJQuYyuEjZND3745fvhXcpG8QrXWt8' (length=101) */

namespace Ay4t\CoinRemitter\Command;

use Ay4t\CoinRemitter\RestClient;

class NewAddress extends RestClient
{
    /**
     * @var string
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    private $label;

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
     * newAddress
     *
     * @param  mixed $walletAddress
     * @return void
     */
    public function result()
    {
        return $this->api_call( 'get-new-address', [
            'label' => $this->label,
        ]);
    }

    /**
     * Set the value of label
     * @param string $label
     * @return self
     */ 
    public function setLabel(string $label)
    {
        $this->label = $label;
        return $this;
    }
}
