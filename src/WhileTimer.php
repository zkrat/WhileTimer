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


	private static $lastMicroTime=null;
	private static $microTime=null;
	const MICROSECONDS_IN_SECONDS=1000000;

	/**
	 * @param int $totalTime total time in secodns
	 * @param float $timeCycle sleep (s) time of each cycle
	 */
	public static function sleep($totalTime,$timeCycle  ):bool {
		$microseconds=$timeCycle*WhileTimer::MICROSECONDS_IN_SECONDS;
		self::delay($microseconds);
		return self::inCycle($totalTime*WhileTimer::MICROSECONDS_IN_SECONDS,$timeCycle);

	}

	private static function reset(  ) {
		self::$time=null;
		self::$counter=0;
		self::$lastMicroTime=null;
		self::$microTime=null;

	}

	/**
	 * @param int $totalTime total time in microseconds
	 * @param int $timeCycle sleep  time of each cycle (microseconds)
	 */
	public static function usleep($totalTime,$timeCycle  ):bool {
		self::delay($timeCycle);
		return self::inCycle($totalTime,$timeCycle);

	}

	private static function delay($timeCycle){
		self::$microTime=microtime(true)*WhileTimer::MICROSECONDS_IN_SECONDS;
		if (!is_null(self::$lastMicroTime)){

			$delay =$timeCycle-(self::$microTime-self::$lastMicroTime);

			if ($delay>0){
				usleep($delay);
			}
			self::$microTime=microtime(true)*WhileTimer::MICROSECONDS_IN_SECONDS;

		}
		self::$lastMicroTime=self::$microTime;


	}


	private static function inCycle($totalTime ,$timeCycle ):bool {
		self::$counter++;
		$microtime = microtime(true)*WhileTimer::MICROSECONDS_IN_SECONDS;
		$timeCycle *=WhileTimer::MICROSECONDS_IN_SECONDS;
		if(is_null(self::$time))
			self::$time=$microtime;

		$second=($microtime-self::$time);
		if($second>=$totalTime){
			self::$time=null;
			self::$counter=0;
		}
		$bool=$second+$timeCycle<$totalTime;

		if (!$bool)
			self::reset();
		return $bool;
	}

	/**
	 * @return int
	 */
	public static function getCounter(): int {
		return self::$counter;
	}

}