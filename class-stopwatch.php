<?php
/**
* Stopwatch Class
* See readme.txt file for description and usage
* 2005-01-10    First Version   Stopwatch
*
* IMPORTANT NOTE
* There is no warranty, implied or otherwise with this software.
*
* LICENCE
* This code has been placed in the Public Domain for all to enjoy.
*
* @author       Zafar Iqbal
* @package      Stopwatch
*/
class Stopwatch
{
	private $l;
	public function __construct() {
		$this->l=array();
		$this->l[]=array("",0);
	}
	public function lap($mylabel='NO LABEL'){$this->l[]=array($mylabel,microtime());}
	public function getLaps($sorted=false){
		$mylaps=array();
		$totalLaps=count($this->l);
		for($i=1;$i<$totalLaps;$i++){
			$currentLap=$this->l[$i];
			$currentLabel=$currentLap[0];
			list($usec,$sec)=explode(' ',$currentLap[1]);
			$usec*=1000000;
			if($i==1){
				$myLaps[]=array($currentLabel,0);
			} else {
				$lapTime=0;
				if($sec==$lastSec){
					$lapTime=$usec-$lastUSec;
				} elseif (($sec-$lastSec)==1){
					$lapTime=$usec+1000000-$lastUSec;
				} else {
					$lapTime=(($sec-$lastSec)*1000000)+$usec+1000000-$lastUSec;
				}
				$lapTime=round($lapTime,1);
				$myLaps[]=array($currentLabel,$lapTime);
			}
			$lastSec=$sec;
			$lastUSec=$usec;
		}
		if(!function_exists('pare')) {function pare($l,$r){return $l[1]-$r[1];}}
		if($sorted) usort($myLaps,'pare');
		return $myLaps;
	}
	public function getTotalTime(){
		$myLaps=$this->getLaps();
                $totalTime=0;
                foreach($myLaps as $key=>$value){
                        $myLabel=$value[0];$myTime=$value[1];
                        $totalTime+=$myTime;
                }
                return $totalTime;
	}
	public function display($html=false){
		$myLaps=$this->getLaps(true);
		$myTotalTime=$this->getTotalTime();
		foreach($myLaps as $key=>$value){
			$myLabel=$value[0];$myTime=$value[1];
			if($myTime>0){
				$percentTime=round(($myTime*100)/$myTotalTime,1);
				print("[$myLabel] $myTime microseconds [ $percentTime % ]");
			} else {print("[$myLabel] $myTime microseconds");}
			if($html){print("<BR>\n");}else{print("\n");}
		}
		print("Total Time = ".$myTotalTime." microseconds\n");
	}
}
?>
