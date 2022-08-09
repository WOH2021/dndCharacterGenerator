<?php
/**
 *  Tiefling.php
 *
 *  Implementation of the tiefling race
 *
 *  @author 				Luuk Verhage		
 *  @documentation	private
 */
Class Tiefling extends Race
{
	protected $abilityModifiers = array(
		'strength' 			=>	0,
		'dexterity'			=>	0,
		'constitution'	=> 	0,
		'intelligence'	=>	1,
		'wisdom'				=>	0,
		'charisma'			=>	2
	);

	/**
   *	Return the name of the race
   * 
   *  @return	string
   */
	public function raceName() : string
	{
		return "Tiefling";
	}
}