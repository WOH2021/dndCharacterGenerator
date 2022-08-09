<?php
/**
 *  Monk.php
 * 
 *  Represents a character of the class Monk.
 * 
 *  @author	Maartje
 */

Class Monk extends CharacterClass
{
	// Default HP for a monk is 8
	const DEFAULT_HP = 8;
	
	// Minimum ability scores (needs both)
	const MIN_WISDOM = 13;
	const MIN_DEXTERITY = 13;

	// Optional skills for the monk
	public $optionalSkills = array("Acrobatics", "Athletics", "History", "Insight", "Religion", "Stealth");

	/**
   *  Generate random choices for the starting equipment
   *
   * 	@return array
   */
  public function getInitialEquipment() : array
	{
		// First set of choices
		$choiceOptions1 = array("Dungeoneer's Pack", "Explorer's Pack");
		$choice1 = $choiceOptions1[array_rand($choiceOptions1)];
		
		// Set the standard equipment and first choice
		$equipment = array(
			"Darts"	    =>	10,
			$choice1		=> 	1
		);
		
		// Second set of choices
		$choiceOptions2 = array('Shortsword', 'Simple weapon');
		$choice2 = $choiceOptions2[array_rand($choiceOptions2)];

		// Handle the choice
		if ($choice2 == 'Simple weapon') $equipment[WeaponRandomizer::randomSimpleWeapon()] = 1;
		else $equipment = 1;

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
		// Check if the wisdom requirement is met, if not we already
		// know it's false
		if (!$abilityScores['wisdom'] >= self::MIN_WISDOM) return false;
		
		// Check if the dexterity requirement is met
		return ($abilityScores['dexterity'] >= self::MIN_DEXTERITY);
	}

	/**
	  *  Get the character class
		* 
		* 	@return	string
		*/
	public function getClass() : string
	{
		return "Monk";
	}
	
	/**
	 *  Return a class description
	 *
	 *  @return		string
	 */
	public function classDescription() : string
	{
		return "A master of martial arts, harnessing the power of the body in pursuit of physical and spiritual perfection.";
	}
}
