<?php
/**
 *  Character.php
 *
 *  Contains the information about a single DnD character.
 * 	Each character has:
 *  	- class
 *  	- race
 * 	- six ability scores: strength, dexterity, constitution, intelligence, wisdom, charisma
 * 	- ability modifier
 * 	- hitpoints
 * 	- class
 *
 *  @author			Lina Blijleven, Luuk Verhage
 *  @documentation		public
 *  @copyright			ITPH? CodeCafé? 2022
 */
// Autoload the related classes
require_once('autoload.php');

Class Character
{
	// Store the class
	private $cClass;
	
	// Store the ability scores
	private $abilityScores;

	// Store the hitpoints
	private $hp;

	// Store the character race
	private $race;

	// Store the alignment (chaotic neutral, lawful evil etc.)
	private $alignment;

	// Store the background of the character
	private $background;

	// Store the proficiencies
	private $proficiencies;

	// Store the equipment
	private $equipment;

	// Store the money
	private $funds;

   /**
   *    Constructor
   * 
   * 	@param	string	Class name
   *    @param	string	Race name
   *	@param	string	Alignment
   *    @param	string	Background
   */
	public function __construct($cClass = null, $cRace = null, $cAlignment = null, $cBackground = null)
	{
		// Generate random properties for the ones missing
		$cClass = ($cClass) ?? CharacterRandomizer::randomClass();
		$cRace = ($cRace) ?? CharacterRandomizer::randomRace();
		$cAlignment = ($cAlignment) ?? CharacterRandomizer::randomAlignment();
		$cBackground = ($cBackground) ?? CharacterRandomizer::randomBackground();

		// Construct a class for our character
		$this->cClass = new $cClass();

		// Construct a race for our character
		$this->race = new $cRace();

		// Set an alignment and background for our character
		// @todo Add support for other backgrounds
		$this->setAlignment($cAlignment);
		$this->setBackground($cBackground);
		
		// Roll for the ability scores
		do { 
			$this->setAbilityScores(); 
		} while (!$this->cClass->validAbilityScores($this->abilityScores)); // Re-roll if the ability scores don't match class requirements

		// Set the initial HP associated with the class
		$baseHP = $this->cClass->initialHP();
		$this->setInitialHP($baseHP);

		// Set the initial proficiencies, equipment and amount of money
		$this->setInitialProficiencies();
		$this->setInitialEquipment();
		$this->setInitialFunds();

	}
	
	/**
         *  Create the abilities, ability modifiers and hitpoints.
	 */
	
	protected function setAbilityScores()
	{
	    // Roll for the ability scores
	    $this->abilityScores = array(
				'strength' 		=> $this->abilityScore(),
				'dexterity' 		=> $this->abilityScore(),
				'constitution'		=> $this->abilityScore(),
				'intelligence'		=> $this->abilityScore(),
				'wisdom' 		=> $this->abilityScore(),
				'charisma' 		=> $this->abilityScore()
	    			);
	}

  /**
   *  Get the character class
   *
   *  @return	string
   */
	function getClass() : string
	{
			// Call the name method on our class object
			return $this->cClass->getClass();
	}
	
  /**
   *  Return a description for the class
   *  
   *  @return string
   */
	function classDescription() : string
	{
			// Call the description method on our class object
			return $this->cClass->classDescription();
	}

  /**
   *  Return the race of the character
   * 
   * @return Race A child class of Race
   */
	private function getRace() : Race
	{
		return $this->race;
	}

  /**
   *  Return the race name
   * 
   *  @return string
   */
	public function getRaceName() : string
	{
		return $this->race->raceName();
	}

  /**
   *  Return the sub race name
   * 
   *  @return string
   */
	public function getSubRaceName() : string
	{
		return $this->race->subRaceName();
	}
	
	/* 
	 * Helper function 
	 *
         * @param	int
	 * @return	int
	 */
	private function getModifier(int $skill) : int
	{
		return floor(($skill - 10) / 2);
	}

	/* 
	 * Helper function 
	 *
	 * @return	int
	 */
	private function abilityScore() : int
	{
			// roll four random numbers
	    $fourrandom = [rand(1, 6), rand(1, 6), rand(1, 6), rand(1, 6)];
	
			// sort the numbers by magnitude
	    sort($fourrandom);
	
			// remove the first element (which is the lowest roll)
	    array_shift($fourrandom);
	
			// return the sum
	    return array_sum($fourrandom);
	}

  /**
   *  Get the background of the character
   */
	private function getBackground() : Background
	{
		return $this->background;
	}

  /**
   *  Create a background for our character
   *  
   *	@param	string	Background specifier
   */
	private function setBackground($background)
	{
		// @todo Check if the given background is valid

		// Create a background and return the result
		$this->background = new $background();
	}

  /** 
   *	Getters for the background info
   */
	public function getBackgroundName() : string { return $this->getBackground()->name(); }
	public function getBackgroundPersonalityTraits() : array { return $this->getBackground()->getCharacteristics()['personalityTraits']; }
	public function getBackgroundIdeal() : string { return $this->getBackground()->getCharacteristics()['ideal']; }
	public function getBackgroundBond() : string { return $this->getBackground()->getCharacteristics()['bond']; }
	public function getBackgroundFlaw() : string { return $this->getBackground()->getCharacteristics()['flaw']; }

  /**
   *	Set the initial hp
   *
   *	@param	int		base hp
   */
	private function setInitialHP($baseHP)
	{
		// Calculate the HP based on the base hp, 
		// constitution modifier and race modifier.
		// @todo Add the race modifier
		$this->hp = $baseHP + $this->getConstitutionModifier() + $this->race->getHpModifier();
	}

  /**
   *  Set the initial proficiencies
   */
	private function setInitialProficiencies()
	{		
		// Get the proficiencies from the background
		$bgProficiencies = $this->getBackground()->getSkillProficiencies();

		// Generate the proficiencies from the class
		// We pass the background proficiencies to prevent duplicates
		$cProficiencies = $this->cClass->generateSkillProficiencies($bgProficiencies);

		// Merge them together to create our initial list of proficiencies
		$this->proficiencies = array_merge($bgProficiencies, $cProficiencies);
	}

  /**
   *  Set the initial proficiencies
   */
	private function setInitialEquipment()
	{
		// Get the equipment associated with the background
		$bgEquipment = $this->getBackground()->getInitialEquipment();

		// Get the class equipment
		$cEquipment = $this->cClass->getInitialEquipment();

		// Set the complete equipment
		$this->equipment = array_merge($bgEquipment, $cEquipment);
	}

  /**
   *  Set the initial amount of money
   */
	private function setInitialFunds()
	{
		// Get the value from the background
		$this->funds = $this->getBackground()->getInitialFunds();
	}

  /**
   *  Simple getters for character properties
   */
	public function getHP() : int { return $this->hp; }
	public function getAlignment() : string { return $this->alignment; }
	public function getProficiencies() : array { return $this->proficiencies; }
	public function getEquipment() : array { return $this->equipment; }
	public function getFunds() : array { return $this->funds; }

  /**
   *	Set the alignment if it is valid
   */
	public function setAlignment(string $align)
	{
		// Is it a valid alignment?
		if (in_array(strtolower($align), CharacterRandomizer::alignments()))
		{
			// set the alignment
			$this->alignment = $align;
		}

		// Allow chaining
		return $this;
	}

  /**
   *  Set the current hp
   * 
   *  @param		int		The new value for the HP
   *  @return		Character
   */
	public function setHP(int $value)
	{
		$this->hp = $value;

		// Allow chaining
		return $this;
	}
	
  /** 
   *  Modify hp
   *  Subtract or add a certain amount of hitpoints from the current HP
   *
   *  @param		int					Positive or negative value to add/subtract from the HP
   *  @return		Character
   */
	public function modifyHP(int $value)
	{
		// Get the current HP
		$currentHP = $this->getHP();

		// Add or subtract the given value
		setHP($currentHP + $value);

		// Allow chaining
		return $this;
	}

  /**
   *  Get the base abilities EXCLUDING the modifiers
   */
 	public function getBaseStrength() : int { return $this->abilityScores['strength']; }
	public function getBaseDexterity() : int { return $this->abilityScores['dexterity']; }
	public function getBaseConstitution() : int { return $this->abilityScores['constitution']; }
	public function getBaseIntelligence() : int { return $this->abilityScores['intelligence']; }
	public function getBaseWisdom() : int { return $this->abilityScores['wisdom']; }
	public function getBaseCharisma() : int { return $this->abilityScores['charisma']; }

  /**
   *  Get the strength including the modifiers
   * 
   *  @return int
   */
	public function getStrength() : int
	{
		$base = $this->abilityScores['strength'];
		$raceModifier = $this->race->getAbilityModifier('strength');
		
		return $base + $raceModifier;
	}

  /**
   *  Get the dexterity
   * 
   *  @return int
   */
	public function getDexterity() : int
	{
		$base = $this->abilityScores['dexterity'];
		$raceModifier = $this->race->getAbilityModifier('dexterity');
		
		return $base + $raceModifier;
	}

  /**
   *  Get the constitution
   * 
   *  @return int
   */
	public function getConstitution() : int
	{
		$base = $this->abilityScores['constitution'];
		$raceModifier = $this->race->getAbilityModifier('constitution');
		
		return $base + $raceModifier;
	}

	/**
   	 *  Get the intelligence
	 * 
	 *  @return int
	 */
	public function getIntelligence() : int
	{
		$base = $this->abilityScores['intelligence'];
		$raceModifier = $this->race->getAbilityModifier('intelligence');
		
		return $base + $raceModifier;
	}

	/**
	 *  Get the wisdom
	 * 
	 *  @return int
	 */
	public function getWisdom() : int
	{
		$base = $this->abilityScores['wisdom'];
		$raceModifier = $this->race->getAbilityModifier('wisdom');
		
		return $base + $raceModifier;
	}

	/**
	 *  Get the charisma
	 * 
	 *  @return int
	 */
	public function getCharisma() : int
	{
		$base = $this->abilityScores['charisma'];
		$raceModifier = $this->race->getAbilityModifier('charisma');
		
		return $base + $raceModifier;
	}

	/**
	 *  Get the strength modifier
	 * 
	 *  @return int
	 */
	public function getStrengthModifier() : int
	{
		// Calculate the modifier using the getModifier function
		// with the current ability score
		return $this->getModifier($this->getStrength());
	}

	/**
	 *  Get the dexterity modifier
	 * 
	 *  @return int
	 */
	public function getDexterityModifier() : int
	{
		// Calculate the modifier using the getModifier function
		// with the current ability score
		return $this->getModifier($this->getDexterity());
	}

	/**
	 *  Get the constitution modifier
	 * 
	 *  @return int
	 */
	public function getConstitutionModifier() : int
	{
		// Calculate the modifier using the getModifier function
		// with the current ability score
		return $this->getModifier($this->getConstitution());
	}

	/**
	 *  Get the intelligence modifier
	 * 
	 *  @return int
	 */
	public function getIntelligenceModifier() : int
	{
		// Calculate the modifier using the getModifier function
		// with the current ability score
		return $this->$this->getModifier($this->getIntelligence());
	}

	/**
	 *  Get the wisdom modifier
	 * 
	 *  @return int
	 */
	public function getWisdomModifier() : int
	{
		// Calculate the modifier using the getModifier function
		// with the current ability score
		return $this->getModifier($this->getWisdom());
	}

	/**
	 *  Get the charisma modifier
	 * 
	 *  @return int
	 */
	public function getCharismaModifier() : int
	{
		// Calculate the modifier using the getModifier function
		// with the current ability score
		return $this->getModifier($this->getCharisma());
	}
}
