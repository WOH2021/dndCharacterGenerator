<?php
/**
 *  Barbarian.php
 * 
 *  Represents a character of the class Barbarian.
 * 
 *  @author Lina Blijleven
 */
// Autoload the related classes
require_once('autoload.php');

Class Barbarian extends CharacterClass
{
	// Default HP for a barbarian is 12
	const DEFAULT_HP = 12;

	// Minimum strength for a barbarian
	const MIN_STRENGTH = 13;

	// List of optional skills to choose from
	public $optionalSkills = array("Animal Handling", "Athletics", "Intimidation", "Nature", "Perception", "Survival");

	/**
   *  Generate random choices for the starting equipment
   *
   * 	@return array
   */
  public function getInitialEquipment() : array
	{
		// First set of choices
		$choiceOptions1 = array('Greataxe', 'Martial melee weapon');
		$choice1 = $choiceOptions1[array_rand($choiceOptions1)];

		// If we picked 'martial melee weapon' we need to pick a specific weapon
		if ($choice1 == 'Martial Melee Weapon') $choice1 = WeaponRandomizer::randomMartialWeapon('melee');
		
		// Set the standard equipment and first choice
		$equipment = array(
			"Explorer's pack"	=>	1,
			"Javelin(s)"			=>	4,
			$choice1					=> 	1
		);
		
		// Second set of choices
		$choiceOptions2 = array('Two handaxes', 'Simple weapon');
		$choice2 = $choiceOptions2[array_rand($choiceOptions2)];

		// Handle the choice
		if ($choice2 == 'Simple weapon') $equipment[WeaponRandomizer::randomSimpleWeapon()] = 1;
		else $equipment['Handaxe(s)'] = 2;

		return $equipment;
	}

	/**
   *  Check if the given ability scores are valid for this class
   * 
   * 	@param	array		Associative array containing the scores
   *	@return	bool		
   */
  public function validAbilityScores(array $abilityScores) : bool
	{
		// Check if we fit the strength requirement
		return ($abilityScores['strength'] >= self::MIN_STRENGTH);
	}

	/**
	 *  Get the character class
	 * 
	 * 	@return	string
	 */
	public function getClass() : string
	{
		return "Barbarian";
	}
	
	/**
	 *  Return a class description
	 *
	 *  @return		string
	 */
	public function classDescription() : string
	{
		return "A fierce warrior of primitive background who can enter a battle rage.";
	}
}