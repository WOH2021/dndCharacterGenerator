<?php
/**
 *  HillDwarf.php
 *
 *  Implementation of the hill dwarf subrace
 *
 *  @author 				Luuk Verhage		
 *  @documentation	private
 */

Class HillDwarf
{
	public $abilityModifiers = array(
		'strength' 			=>	0,
		'dexterity'			=>	0,
		'constitution'	=> 	2,
		'intelligence'	=>	0,
		'wisdom'				=>	1,
		'charisma'			=>	0
	);

// Hill Dwarfs get one more hp per level
  

	/**
   *	Return the name of the race
   * 
   *  @return	string
   */
	public function name() : string
	{
		return "Hill Dwarf";
	}
}