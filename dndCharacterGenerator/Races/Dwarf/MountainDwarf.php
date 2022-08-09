<?php
/**
 *  MountainDwarf.php
 *
 *  Implementation of the mountain dwarf subrace
 *
 *  @author 				Luuk Verhage		
 *  @documentation	private
 */

Class MountainDwarf
{
	public $abilityModifiers = array(
		'strength' 			=>	2,
		'dexterity'			=>	0,
		'constitution'	=> 	2,
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
		return "Mountain Dwarf";
	}
}