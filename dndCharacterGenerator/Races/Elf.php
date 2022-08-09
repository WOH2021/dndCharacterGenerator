<?php
/**
 *  Elf.php
 *
 *  Implementation of the elf race
 *  + 2 Dexterity
 *
 *	@todo Add a wood elf, eladrin and high elf subrace
 *  
 *  @author 				Maartje
 *  @documentation	private
 */
Class Elf extends Race  
{
  
  // Store the subrace
	private $subrace;

	// Store our subraces
	const SUBRACES = array('EladrinElf', 'HighElf', 'WoodElf');
  
	protected $abilityModifiers = array(
		'strength' 			=>	0,
		'dexterity'			=>	2,
		'constitution'	=> 	0,
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
		return "Elf";
	}
}