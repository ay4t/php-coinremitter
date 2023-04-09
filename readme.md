# Installasi
```
composer config minimum-stability dev ( ini optional jika anda ingin menginstall versi dev )
composer config repositories.php-coinremitter vcs git@github.com:ay4t/php-coinremitter.git
composer require ay4t/php-coinremitter:dev-master
```

# Cara Penggunaan
Contoh untuk Get Wallet Balance
```
require_once '../vendor/autoload.php';

// contoh untuk get wallet balance
$getWalletBalance = new \Ay4t\CoinRemitter\Command\GetWalletBalance();
$result = $getWalletBalance->result();
var_dump($result);
```
Contoh untuk Create New Wallet Address
```
$coinremitter = new \Ay4t\CoinRemitter\Command\NewAddress();
$coinremitter->setLabel('ayat');
$result = $coinremitter->result();
var_dump($result);
```
Contoh untuk validate address
```
$coinremitter = new Ay4t\CoinRemitter\Command\ValidateAddress();
$coinremitter->setAddress('nghxtJQuYyuEjZND3745fvhXcpG8QrXWt8');
var_dump($coinremitter->result());
var_dump($coinremitter->isValidAddress());
```

Contoh untuk withdraw
```
$coinremitter = new \Ay4t\CoinRemitter\Command\Withdraw();
$coinremitter->setAddress('nghxtJQuYyuEjZND3745fvhXcpG8QrXWt8');
$coinremitter->setAmount(100000);
var_dump($coinremitter->result());
var_dump($coinremitter->getData());
```