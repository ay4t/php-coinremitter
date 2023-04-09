<?php
/*
 * File: index.php
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

// display all php errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Ay4t\CoinRemitter\Command\NewAddress;
use Ay4t\CoinRemitter\Command\ValidateAddress;
use Ay4t\CoinRemitter\Command\GetWalletBalance;

require_once '../vendor/autoload.php';


// contoh untuk get wallet balance
/* $getWalletBalance = new GetWalletBalance();
$result = $getWalletBalance->result();
var_dump($result); */


// contoh untuk create new wallet address
/* $coinremitter = new NewAddress;
$coinremitter->setLabel('ayat');
$result = $coinremitter->result();

var_dump($result); */

// contoh untuk validate address
$coinremitter = new ValidateAddress;
$coinremitter->setAddress('nghxtJQuYyuEjZND3745fvhXcpG8QrXWt8');

var_dump($coinremitter->result());
// var_dump($coinremitter->getData());
var_dump($coinremitter->isValidAddress());