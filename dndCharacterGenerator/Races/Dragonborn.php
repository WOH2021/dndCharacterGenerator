<?php
/**
 *  Dragonborn.php
 *
 *  Implementation of the dragonborn race
 *
 *  @author 				Lina Blijleven
 *  @documentation	private
 */

Class Dragonborn extends Race
{
	protected $abilityModifiers = array(
		'strength' 			=>	2,
		'dexterity'			=>	0,
		'constitution'	=> 	0,
		'intelligence'	=>	0,
		'wisdom'				=>	0,
		'charisma'			=>	1
	);

	/**
   *	Return the name of the race
   * 
   *  @return	string
   */
	public function raceName() : string
	{
		return "Dragonborn";
	}
}