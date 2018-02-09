# WhileTimer
Easy tool for sleep timer

Example of use 3 cycles with 2 secodns sleep
```
do{
	echo 'ahoj'.\zkrat\WhileTimer::getCounter().PHP_EOL;
}while(\zkrat\WhileTimer::sleep(6,2));
```

Microseconds alternative:
```
\zkrat\WhileTimer::usleep(6,2)
```
