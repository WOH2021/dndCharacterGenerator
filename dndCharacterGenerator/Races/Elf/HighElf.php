<?php
/**
 *  HighElf.php
 *
 *  Implementation of the high elf subrace
 *
 *  @author 				Maartje	
 *  @documentation	private
 */

Class HighElf
{
	public $abilityModifiers = array(
		'strength' 			=>	0,
		'dexterity'			=>	2,
		'constitution'	=> 	0,
		'intelligence'	=>	1,
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
		return "High Elf";
	}
}