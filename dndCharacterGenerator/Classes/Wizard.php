<?php
/**
 *  Wizard.php
 *
 *  Represents a character of the class Wizard.
 *
 *  @author Luuk Verhage
 */

Class Wizard extends CharacterClass
{
	// Default HP for a wizard is 6
	const DEFAULT_HP = 6;

	// Minimum intelligence for a wizard
	const MIN_INTELLIGENCE = 13;

// List of optional skills to choose from
	public $optionalSkills = array("Arcana", "History", "Insight", "Investigation", "Medicine", "Religion");

/**
   *  Generate random choices for the starting equipment
   *
   * 	@return array
   */
  public function getInitialEquipment() : array
	{
		// Set the standard equipment
		$equipment = array(
			"Spellbook"	=>	1
		);
		
		// First set of choices
		$choiceOptions1 = array('Quarterstaff', 'Dagger');
		$choice1 = $choiceOptions1[array_rand($choiceOptions1)];
		$equipment[$choice1] = 1;
		
		// Second set of choices
		$choiceOptions2 = array('Component Pouch', 'Arcane Focus');
		$choice2 = $choiceOptions2[array_rand($choiceOptions2)];
		$equipment[$choice2] = 1;

    // Third set of choices
		$choiceOptions3 = array("Scholar's Pack", "Explorer's Pack");
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
		// Check if we fit the strength requirement
		return ($abilityScores['intelligence'] >= self::MIN_INTELLIGENCE);
	}
  
	/**
    *  Get the character class
    *
    * @return    string
    */
  public function getClass(): string
  {
    return "Wizard";
  }

  /**
   *  Return a class description
   *
   * @return        string
   */
  public function classDescription(): string
  {
  	return "A scholarly magic-user capable of manipulating the structures of reality.";
  }
}