<?php
/**
 *  HalfOrc.php
 *
 *  Implementation of the half-orc race
 *
 *  @author 				Niels
 *  @documentation	private
 */

Class HalfOrc extends Race
{
	protected $abilityModifiers = array(
		'strength' 			=>	2,
		'dexterity'			=>	0,
		'constitution'	=> 	1,
		'intelligence'	=>	0,
		'wisdom'				=>	0,
		'charisma'			=>	0
	);

	/**
   *	Return the name of the race
   * 
   *  @return	string
   */
	public function raceName() : string
	{
		return "Half-Orc";
	}
}