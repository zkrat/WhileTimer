<?php
/**
 * Created by PhpStorm.
 * User: zkrat
 * Date: 09.02.18
 * Time: 9:58
 */

namespace zkrat;

class WhileTimer {


	private static $time=null;
	private static $counter=0;

	/**
	 * @param $totalTime total time in secodns
	 * @param $timeCycle sleep (s) time of each cycle
	 */
	public static function sleep($totalTime,$timeCycle  ) {

		return self::inCycle($totalTime);

	}

	/**
	 * @param $totalTime total time in secodns
	 * @param $timeCycle sleep (microseconds) time of each cycle
	 */
	public static function usleep($totalTime,$timeCycle  ) {
		usleep($timeCycle);
		return self::inCycle($totalTime);

	}


	private static function inCycle($totalTime  ) {
		self::$counter++;
		if(is_null(self::$time))
			self::$time=time();
		$second=(time()-self::$time);
		echo $second.PHP_EOL;
		if($second>=$totalTime){
			self::$time=null;
			self::$counter=0;
		}
		return $second<$totalTime;
	}

	/**
	 * @return int
	 */
	public static function getCounter(): int {
		return self::$counter;
	}

}