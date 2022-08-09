<?php
/**
 *  HalfElf.php
 *
 *  Implementation of the half-elf race
 *  +2 to charisma
 *  +1 to two other abilities
 *
 *  @author 				
 *  @documentation	private
 */
Class HalfElf extends Race
{
	// Store the ability modifiers
	protected $abilityModifiers;

	/**
   *	Constructor
   */
	public function __construct()
	{
		// Skills other than charisma
		$skills = array('strength', 'dexterity', 'constitution', 'intelligence', 'wisdom');

		// Get two indices in a list
		$is = array_rand($skills, 2);

		// Convert those indices to skills
		$boosts = array_map(function($i) { return $skills[$i]; }, $is);

		// Set the ability modifiers, adding the boosts to the appropriate skills
		// Charisma always gets a +2 boost.
		$this->abilityModifiers = array(
			'strength' 			=>	in_array('strength', $boosts) ? 1 : 0,
			'dexterity'			=>	in_array('dexterity', $boosts) ? 1 : 0,
			'constitution'	=> 	in_array('constitution', $boosts) ? 1 : 0,
			'intelligence'	=>	in_array('intelligence', $boosts) ? 1 : 0,
			'wisdom'				=>	in_array('wisdom', $boosts) ? 1 : 0,
			'charisma'			=>	2
		);
	}

	/**
   *	Return the name of the race
   * 
   *  @return	string
   */
	public function raceName() : string
	{
		return "Half-Elf";
	}
}