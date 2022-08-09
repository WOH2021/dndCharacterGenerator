<?php
/**
 *  Human.php
 *
 *  Implementation of the human race
 *
 *  @author 				Niels
 *  @documentation	private
 */

Class Human extends Race
{
	protected $abilityModifiers = array(
		'strength' 			=>	1,
		'dexterity'			=>	1,
		'constitution'	=> 	1,
		'intelligence'	=>	1,
		'wisdom'				=>	1,
		'charisma'			=>	1
	);

	/**
   *	Return the name of the race
   * 
   *  @return	string
   */
	public function raceName() : string
	{
		return "Human";
	}
}