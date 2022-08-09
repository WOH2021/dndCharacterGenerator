<?php
/**
 *  WoodElf.php
 *
 *  Implementation of the wood elf subrace
 *
 *  @author 				Maartje		
 *  @documentation	private
 */

Class WoodElf
{
	public $abilityModifiers = array(
		'strength' 			=>	0,
		'dexterity'			=>	2,
		'constitution'	=> 	0,
		'intelligence'	=>	0,
		'wisdom'				=>	1,
		'charisma'			=>	0
	);

	/**
   *	Return the name of the race
   * 
   *  @return	string
   */
	public function name() : string
	{
		return "Wood Elf";
	}
}