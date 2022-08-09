<?php
/**
 *  RockGnome.php
 *
 *  Implementation of the rock gnome subrace
 *
 *  @author 				Luuk Verhage		
 *  @documentation	private
 */

Class RockGnome
{
	public $abilityModifiers = array(
		'strength' 			=>	0,
		'dexterity'			=>	0,
		'constitution'	=> 	1,
		'intelligence'	=>	2,
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
		return "Rock Gnome";
	}
}