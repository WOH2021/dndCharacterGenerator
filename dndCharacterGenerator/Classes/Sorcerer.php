<?php
/**
 *  Sorcerer.php
 * 
 *  Represents a character of the class Sorcerer.
 * 
 *  @author	Whalton Hippertt
 */

Class Sorcerer extends CharacterClass
{
	// Default HP for a sorcerer is 6
	const DEFAULT_HP = 6;

	// Minimum charisma for a sorcerer
	const MIN_CHARISMA = 13;

	// List of optional skills to choose from
	public $optionalSkills = array("Arcana", "Deception", "Insight", "Intimidation", "Persuasion", "Religion");

/**
   *  Generate random choices for the starting equipment
   *
   * 	@return array
   */
  public function getInitialEquipment() : array
	{
		// Set the standard equipment
		$equipment = array(
			"Dagger"			=>	2,
		);
		
		// First set of choices
		$choiceOptions1 = array("Dungeoneer's Pack", "Explorer's Pack");
		$choice1 = $choiceOptions1[array_rand($choiceOptions1)];
		$equipment[$choice1] = 1;
		
		// Second set of choices
		$choiceOptions2 = array("LightCrossbow", 'Simple weapon');
		$choice2 = $choiceOptions2[array_rand($choiceOptions2)];

		// Handle the choice
		if ($choice2 == 'Simple weapon') $equipment[WeaponRandomizer::randomSimpleWeapon()] = 1;
		else
		{
			$equipment['LightCrossbow'] = 1;
      $equipment["Bolts"] = 20;
		}

    // Third set of choices
    $choiceOptions3 = array("Component Pouch", "Arcane Focus");
		$choice3 = $choiceOptions3[array_rand($choiceOptions3)];
		$equipment[$choice3] = 1;

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
		// Check if we fit the charisma requirement
		return ($abilityScores['charisma'] >= self::MIN_CHARISMA);
	}
	/**
	 *  Get the character class
	 * 
	 * 	@return	string
	 */
	public function getClass() : string
	{
		return "Sorcerer";
	}

	/**
	 *  Return a class description
	 *
	 *  @return		string
	 */
	public function classDescription() : string
	{
		return "A spellcaster who draws on inherent magic from a gift or bloodline.";
	}
}