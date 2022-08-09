<?php
/**
 *  FolkHero.php
 *
 *  @author			W. Hippertt
 *  @copyright	CodeCafé 2022
 */

Class FolkHero extends Background
{	
	// Store all possible personality traits
	const PERSONALITY_TRAITS = array(
	    "I judge people by their actions, not their words.",
	    "If someone is in trouble, I’m always ready to lend help.",
	    "When I set my mind to something, I follow through no matter what gets in my way.",
	    "I have a strong sense of fair play and always try to find the most equitable solution to arguments.",
	    "I’m confident in my own abilities and do what I can to instill confidence in others.",
	    "Thinking is for other people. I prefer action.",
	    "I misuse long words in an attempt to sound smarter.",
	    "I get bored easily. When am I going to get on with my destiny?"
	);

	// Store all possible ideals
	const IDEALS = array(
	    "Respect. People deserve to be treated with dignity and respect. (Good)",
	    "Fairness. No one should get preferential treatment before the law, and no one is above the law. (Lawful)",
	    "Freedom. Tyrants must not be allowed to oppress the people. (Chaotic)",
	    "Might. If I become strong, I can take what I want—what I deserve. (Evil)",
	    "Sincerity. There’s no good in pretending to be something I’m not. (Neutral)",
	    "Destiny. Nothing and no one can steer me away from my higher calling. (Any)"
	);
	
	// Store all possible bonds
	const BONDS = array(
	    "I have a family, but I have no idea where they are. One day, I hope to see them again.",
	    "I worked the land, I love the land, and I will protect the land.",
	    "A proud noble once gave me a horrible beating, and I will take my revenge on any bully I encounter.",
	    "My tools are symbols of my past life, and I carry them so that I will never forget my roots.",
	    "I protect those who cannot protect themselves.",
	    "I wish my childhood sweetheart had come with me to pursue my destiny."
	);
	
	// Store all possible flaws
	const FLAWS = array(
	    "The tyrant who rules my land will stop at nothing to see me killed.",
	    "I’m convinced of the significance of my destiny, and blind to my shortcomings and the risk of failure.",
	    "The people who knew me when I was young know my shameful secret, so I can never go home again.",
	    "I have a weakness for the vices of the city, especially hard drink.",
	    "Secretly, I believe that things would be better if I were a tyrant lording over the land.",
	    "I have trouble trusting in my allies."
	);
	
	// Every Folk Hero gets their proficiencies
	public $skillProficiencies = array(
		"Animal Handling",
		"Survival"
	);

	// Every Folk Hero gets a certain inventory
	public $initialEquipment = array(
		"Artisan's tools"					=> 1, 
		"Shovel"      						=> 1, 
		"Iron pot"					      => 1, 
		"Set of common clothes"		=> 1
	);

	// Initial funds
	public $initialFunds = array(
		"pp"	=> 0,
		"gp"	=> 10,
		"sp"	=> 0,
		"bp"	=> 0
	);

	/**
   *  Constructor
   */
	public function __construct()
	{
		$this->generateCharacteristics('FolkHero');
	}

	/**
	 *	Return the background name
	 *
	 *	@return	string
	 */
	public function name() : string
	{
		return "Folk Hero";
	}

	/** 
	 *  Name of the associated feature
	 * 
	 *	@return	string
	 */
	public function featureName() : string
	{
		return "Rustic Hospitality";		
	}

	/** 
	 *  Description of the associated feature
	 * 
	 *	@return	string
	 */
	public function featureDescription() : string
	{
		return "Since you come from the ranks of the common folk, you fit in among them with ease. You can find a place to hide, rest, or recuperate among other commoners, unless you have shown yourself to be a danger to them. They will shield you from the law or anyone else searching for you, though they will not risk their lives for you.";
	}
}