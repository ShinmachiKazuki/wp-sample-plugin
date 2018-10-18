<?php
/*
Plugin Name: WordPress Sample Plugin
Plugin URI: https://github.com/ShinmachiKazuki/wp-sample-plugin
Description: WordPress sample build.
Version: (プラグインのバージョン番号。例: 1.0)
Author: Kazuki Shinmachi
Author URI: https://github.com/ShinmachiKazuki
License: GPLv2 or later
*/

class Human{
	public $para = array();

	public function __construct( $para ){
		$this->para = $para;
	}

	public function cry(){
		echo $this->para['voice'];
	}

	public function attack(){
		$range = rand(0,5);
		$sign  = rand(0,1);
		if (sign === 0){
			$range = $range * -1;
		}
		$range += $this->para['power'];
		echo $this->para['name'] .'の攻撃！<br>';
		echo $this->para['name'] . 'は、' . $range . 'のダメージを与えた！';

		return $range;
	}

	public function die_flag( $damage, $name ){
		$this->para['hp'] -= $damage;
		if( $this->para['hp'] <= 0 ){
			echo $this->para['name'] . 'は' . $name . 'に殴られた！';
			echo $this->para['name'] . 'は死んでしまった....';
		}
	}
}
$hazama_para = array(
	'name'  => 'Yoshiki',
	'hp'    => 10,
	'power' => 10,
	'speed' => 500,
	'voice' => 'おぎゃああああ！！！！'
);

$imai_para = array(
	'name'  => 'Miku',
	'hp'    => 100,
	'power' => 30,
	'speed' => 5,
	'voice' => 'ひゃああああああああ！！！！'
);

$hazama = new Human( $hazama_para );
$imai   = new Human( $imai_para );

$damage = $imai->attack();
$hazama->die_flag( $damage, $imai->para['name'] );
