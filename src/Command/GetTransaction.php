<?php
/*
 * File: GetTransaction.php
 * Project: Command
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
 * Get Transaction
 * 
 */

namespace Ay4t\CoinRemitter\Command;

use Ay4t\CoinRemitter\RestClient;

class GetTransaction extends RestClient
{

    // transaction type
    /**
     * @param string 'id' | 'address'
     * @var string
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    private $transactionType = 'id';

    /**
     * @var string
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    private $transaction_id = '';

    /**
    * __construct
    *
    * @return parent::__construct()
    */
    public function __construct()
    {
        parent::__construct();
    }

    // result
    public function result( $transaction_id = null )
    {
        // jika $transaction_id != null override $this->transaction_id
        if (!empty($transaction_id)) {
            $this->transaction_id = $transaction_id;
        }

        // jika $this->transaction_id kosong throw error
        if (empty($this->transaction_id)) {
            throw new \Exception('Transaction ID is required');
        }

        // jika transactionType == 'id'
        $params = [
            'id' => $this->transaction_id
        ];

        // jika transactionType == 'address'
        if ($this->transactionType == 'address') {
            $params = [
                'address' => $this->transaction_id
            ];  
        }

        return $this->api_call('get-transaction', $params);
    }

	/**
	 * Set the value of transaction_id
	 * @param   string  $transaction_id  
	 * @return  self
	 */
	public function setTransaction_id(string $transaction_id)
	{
		$this->transaction_id = $transaction_id;
		return $this;
	}

	/**
	 * Set the value of transactionType
	 * @param   string  $transactionType  
	 * @return  self
	 */
	public function setTransactionType(string $transactionType)
	{
        $type = [ 'id', 'address' ];

        // jika $transactionType tidak ada di $type throw error
        if (!in_array($transactionType, $type)) {
            throw new \Exception('Transaction Type is not valid, Only available id and address');
        }

		$this->transactionType = $transactionType;
		return $this;
	}
}
