<?php
/**
 *  Noble.php
 *
 *  @author			
 *  @copyright	CodeCafé 2022
 */

Class Noble extends Background
{	
   // Store all possible personality traits
	const PERSONALITY_TRAITS = array(
    "My eloquent flattery makes everyone I talk to feel like the most wonderful and important person in the world.",
    "The common folk love me for my kindness and generosity.",
  "No one could doubt by looking at my regal bearing that I am a cut above the unwashed masses.",
  "I take great pains to always look my best and follow the latest fashions.",
  "I don't like to get my hands dirty, and I won't be caught dead in unsuitable accommodations.",
  "Despite my noble birth, I do not place myself above other folk. We all have the same blood.",
  "My favor, once lost, is lost forever.",
  "If you do me an injury, I will crush you, ruin your name, and salt your fields."
    );

  // Store all possible ideals
	const IDEALS = array(
    "Respect. Respect is due to me because of my position, but all people regardless of station deserve to be treated with dignity. (Good)",
    "Responsibility. It is my duty to respect the authority of those above me, just as those below me must respect mine. (Lawful)",
    "Independence. I must prove that I can handle myself without coddling from my family. (Chaotic)",
    "Power. If I can attain more power, no one will tell me what to do. (Evil)",
    "Family. Blood runs thicker than water. (Any)",
    "Noble Obligation. It is my duty to protect and care for the people beneath me. (Good)"
    );

	// Store all possible bonds
	const BONDS = array(
    "I will face any challenge to win the approval of my family.",
    "My house's alliance with another noble family must be sustained at all costs.",
    "Nothing is more important than the other members of my family.",
    "I am in love with the heir of a family that my family despises.",
    "My loyalty to my sovereign is unwavering.",
    "The common folk must see me as a hero of the people."
    );

	// Store all possible flaws
	const FLAWS = array(
    "I secretly believe that everyone is beneath me.",
    "I hide a truly scandalous secret that could ruin my family forever.",
    "I too often hear veiled insults and threats in every word addressed to me, and I'm quick to anger.",
    "I have an insatiable desire for carnal pleasures.",
    "In fact, the world does revolve around me.",
    "By my words and actions, I often bring shame to my family."
    );

	// Every noble gets their proficiencies
	public $skillProficiencies = array(
		"History",
		"Persuasion"
	);

	// Every noble gets a certain inventory
	public $initialEquipment = array(
		"Fine clothes"				=> 1, 
		"Signet ring"					=> 1, 
		"Scroll of pedigree"	=> 1
	);

	// Initial funds (25 gp for noble)
	public $initialFunds = array(
		"pp"	=> 0,
		"gp"	=> 25,
		"sp"	=> 0,
		"bp"	=> 0
	);

	/**
   *  Constructor
   */
	public function __construct()
	{
		$this->generateCharacteristics('Noble');
	}

	/**
	 *	Return the background name
	 *
	 *	@return	string
	 */
	public function name() : string
	{
		return "Noble";
	}

	/** 
	 *  Name of the associated feature
	 * 
	 *	@return	string
	 */
	public function featureName() : string
	{
		return "Position of Privilege";
	}

	/** 
	 *  Description of the associated feature
	 * 
	 *	@return	string
	 */
	public function featureDescription() : string
	{
		return "Thanks to your noble birth, people are inclined to think the best of you. You are welcome in high society, and people assume you have the right to be wherever you are. The common folk make every effort to accommodate you and avoid your displeasure, and other people of high birth treat you as a member of the same social sphere. You can secure an audience with a local noble if you need to.";
	}
}