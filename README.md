# WhileTimer
Easy tool for sleep timer depends on number of

Installation
------------

The recommended way to install is via Composer:

```
composer require nette/utils
```

It requires PHP version 7.0+


Examples:
---------

Every 100 milliseconds, maximum 2 seconds:
```
do{
	echo 'Hello Word:  every 100 milliseconds ('.\zkrat\WhileTimer::getCounter().')'.PHP_EOL;
}while(\zkrat\WhileTimer::sleep(2,0.1));
//==========================================
while(\zkrat\WhileTimer::sleep(2,0.1)){
	echo 'Hello Word:  every 100 milliseconds ('.\zkrat\WhileTimer::getCounter().')'.PHP_EOL;
};

```

Example of  loop every 1 second, maximum 6 seconds
```
do{
	echo 'Hello Word each 1 second ('.\zkrat\WhileTimer::getCounter().')'.PHP_EOL;
}while(\zkrat\WhileTimer::sleep(6,1));
```

Example of  loop every 0.5 second, maximum 3 seconds
```
do{
	echo 'Hello Word each 0.5 seconds ('.\zkrat\WhileTimer::getCounter().')'.PHP_EOL;
}while(\zkrat\WhileTimer::usleep(3000000,500000));

```

