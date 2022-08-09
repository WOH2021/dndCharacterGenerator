<?php
/**
 *  Paladin.php
 * 
 *  Represents a character of the class Paladin.
 * 
 *  @author	Luuk Verhage
 */
Class Paladin extends CharacterClass 
{
	// Minimum ability scores (needs both)
	const MIN_STRENGTH = 13;
	const MIN_CHARISMA = 13;

	// List of optional skills to choose from
	public $optionalSkills = array("Athletics","Insight", "Intimidation", "Medicine", "Persuasion", "Religion");

	/**
   *  Generate random choices for the starting equipment
   *
   * 	@return array
   */
  public function getInitialEquipment() : array
	{			
		// Standard equipment
		$equipment = array (
			"Chain mail"		=>	1,
			"Holy symbol"		=>	1,
		);
	
		// First set of choices
		$choiceOptions1 = array('Martial weapon + shield', 'Two martial weapons');
		$choice1 = $choiceOptions1[array_rand($choiceOptions1)];

		// Add a martial weapon
		$equipment[WeaponRandomizer::randomMartialWeapon('any')] = 1;

		// Add another or the shield
		if ($choice1 == 'Martial weapon + shield') $equipment['Shield'] = 1;
		else $equipment[WeaponRandomizer::randomMartialWeapon('any')] = 1;

		// Second set of choices
		$choiceOptions2 = array("Five javelins", "Simple melee weapon");
		$choice2 = $choiceOptions2[array_rand($choiceOptions2)];

		// Handle the second choice
		if ($choice2 == 'Simple melee weapon') $equipment[WeaponRandomizer::randomSimpleWeapon('melee')] = 1;
		else $equipment['Javelin(s)'] = 5;

		// First set of choices
		$choiceOptions3 = array("Priest's Pack", "Explorer's Pack");
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
		// Check if the strength requirement is met, if not we already
		// know it's false
		if (!$abilityScores['strength'] >= self::MIN_STRENGTH) return false;
		
		// Check if the charisma requirement is met
		return ($abilityScores['charisma'] >= self::MIN_CHARISMA);
	}

	/**
	 *  Get the character class
	 * 
	 * 	@return	string
	 */
	public function getClass() : string
	{
		return "Paladin";
	}

	/**
	 *  Return a class description
	 *
	 *  @return		string
	 */
	public function classDescription() : string
	{
		return "A holy warrior bound to a sacred oath.";
	}
}