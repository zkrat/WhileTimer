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
	 * @param int $totalTime total time in secodns
	 * @param float $timeCycle sleep (s) time of each cycle
	 */
	public static function sleep($totalTime,$timeCycle  ):bool {
		usleep(round($timeCycle*1000000));
		return self::inCycle(round($totalTime*1000000));

	}

	/**
	 * @param int $totalTime total time in microseconds
	 * @param int $timeCycle sleep  time of each cycle (microseconds)
	 */
	public static function usleep($totalTime,$timeCycle  ):bool {
		usleep($timeCycle);
		return self::inCycle($totalTime);

	}


	private static function inCycle($totalTime  ):bool {
		self::$counter++;
		$microtime = microtime(true)*1000000;
		if(is_null(self::$time))
			self::$time=$microtime;

		$second=($microtime-self::$time);
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