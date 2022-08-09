<?php
/**
 *  Stout Halfling.php
 *
 *  Implementation of the stout halfling subrace
 *
 *  @author 				Maartje		
 *  @documentation	private
 */

Class StoutHalfling
{
	public $abilityModifiers = array(
		'strength' 			=>	0,
		'dexterity'			=>	2,
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
	public function name() : string
	{
		return "Stout Halfling";
	}
}