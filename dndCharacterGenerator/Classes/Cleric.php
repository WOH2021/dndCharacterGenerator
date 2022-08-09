<?php
/**
 *  Cleric.php
 * 
 *  Represents a character of the class Cleric.
 * 
 *  @author Whalton
 */

Class Cleric extends CharacterClass
{
	// Default HP for a cleric is 8
	const DEFAULT_HP = 8;

	// Minimum strength for a cleric
	const MIN_WISDOM = 13;

	// The list of optional skills for the cleric
	public $optionalSkills = array("History", "Insight", "Medicine", "Persuasion", "Religion");

	/**
   *  Generate random choices for the starting equipment
   *
   * 	@return array
   */
  public function getInitialEquipment() : array
	{				
		// First set of choices (if proficient)
		$choiceOptions1 = array('Mace', 'Warhammer');
		$choice1 = $choiceOptions1[array_rand($choiceOptions1)];

		// If we picked 'simple weapon' we need to pick a specific weapon
		if ($choice1 == 'Simple weapon') $choice1 = WeaponRandomizer::randomSimpleWeapon('all');

		// Second set of choices
		$choiceOptions2 = array("Priest's pack", "Explorer's pack");
		$choice2 = $choiceOptions2[array_rand($choiceOptions2)];

		// Third set of choices
		$choiceOptions3 = array("Scale mail", "Leather Armor", "Chain mail");
		$choice3 = $choiceOptions3[array_rand($choiceOptions3)];

		// Set the equipment incl. standards
		$equipment = array (
			"Shield"				=>	1,
			"Holy symbol"		=>	1,
			$choice1				=>  1,
			$choice2				=>  1,
			$choice3				=>  1			
		);
		
		// Fourth set of choices
		$choiceOptions4 = array("Light crossbow + 20 bolts", "Simple weapon");
		$choice4 = $choiceOptions4[array_rand($choiceOptions4)];

		// Handle the choice
		if ($choice4 = "Light crossbow + 20 bolts")
		{
			$equipment['LightCrossbow'] = 1;
			$equipment['Bolts'] = 20;
		}
		else
		{
			$equipment[WeaponRandomizer::randomSimpleWeapon('all')] = 1;
		}

		return $equipment;
	}

	/**
   *  Check if the given ability scores are valid for this class
   * 
   * 	@param	array		Associative array containing the scores
   *	@return	bool		
   */
  function validAbilityScores(array $abilityScores) : bool
	{
		// Check if we fit the wisdom requirement
		return ($abilityScores['wisdom'] >= self::MIN_WISDOM);
	}

	/**
	 *  Get the character class
	 * 
	 * 	@return	string
	 */
	public function getClass() : string
	{
		return "Cleric";
	}

	/**
	 *  Return a class description
	 *
	 *  @return		string
	 */
	public function classDescription() : string
	{
		return "A priestly champion who wields divine magic in service of a higher power.";
	}
}