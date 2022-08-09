<?php
/**
 *  Druid.php
 * 
 *  Represents a character of the class Druid.
 * 
 *  @author Niels Keegel
 */
Class Druid extends CharacterClass
{
	// Default HP for a druid is 8
	const DEFAULT_HP = 8;

	// Minimum wisdom for a druid
	const MIN_WISDOM = 13;

	// Optional skills for the druid
	public $optionalSkills = array("Arcana", "Animal Handling", "Insight", "Medicine", "Nature", "Perception", "Religion", "Survival");

	/**
   *  Generate random choices for the starting equipment
   *
   * 	@return array
   */
  public function getInitialEquipment() : array
	{			
		// First set of choices
		$choiceOptions1 = array('Wooden shield', 'Simple weapon');
		$choice1 = $choiceOptions1[array_rand($choiceOptions1)];

		// If we picked 'simple weapon' we need to pick a specific weapon
		if ($choice1 == 'Simple weapon') $choice1 = WeaponRandomizer::randomSimpleWeapon('all');

		// Second set of choices
		$choiceOptions2 = array("Scimitar", "Simple melee weapon");
		$choice2 = $choiceOptions2[array_rand($choiceOptions2)];

		// If we picked 'simple melee weapon' we need to pick a specific weapon
		if ($choice2 == 'Simple melee weapon') $choice2 = WeaponRandomizer::randomSimpleWeapon('melee');

		// Set the equipment incl. standards
		return array (
			"Leather armor"		=>	1,
			"Explorer's pack"	=>	1,
			"Druidic focus"		=>	1,
			$choice1					=>  1,
			$choice2					=>  1
		);
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
		return "Druid";
	}

	/**
	 *  Return a class description
	 *
	 *  @return		string
	 */
	public function classDescription() : string
	{
		return "A priest of the Old Faith, wielding the powers of nature—moonlight and plant growth, fire and lightning—and adopting animal forms.";
	}
}