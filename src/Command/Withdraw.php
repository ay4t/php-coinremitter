<?php

namespace Ay4t\CoinRemitter\Command;

use Ay4t\CoinRemitter\RestClient;

class Withdraw extends RestClient
{

    /**
     * @var string
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    private $address = '';

    /**
     * @var int
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    private $amount = 0;

    /**
    * __construct
    *
    * @return parent::__construct()
    */
    public function __construct()
    {
        parent::__construct();
    }

    // function result
    public function result()
    {
        // jika address kosong throw error
        if (empty($this->address)) {
            throw new \Exception('Address is required');
        }

        // jika amount kosong throw error
        if (empty($this->amount)) {
            throw new \Exception('Amount is required');
        }

        return $this->api_call( 'withdraw', [
            'to_address'    => $this->address,
            'amount'        => $this->amount,
        ]);
    }

	/**
	 * Set the value of address
	 * @param   string  $address  
	 * @return  self
	 */
	public function setAddress(string $address)
	{
		$this->address = $address;
		return $this;
	}

	/**
	 * Set the value of amount
	 * @param   int  $amount  
	 * @return  self
	 */
	public function setAmount(int $amount)
	{
		$this->amount = $amount;
		return $this;
	}
}
