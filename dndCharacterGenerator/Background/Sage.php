<?php
/**
 *  Sage.php
 *
 *  @author			Luuk Verhage
 *  @copyright	CodeCafé 2022
 */

Class Sage extends Background
{	
	// Store all possible personality traits
	const PERSONALITY_TRAITS = array(
	    "I use polysyllabic words that convey the impression of great erudition.",
	    "	I've read every book in the world's greatest libraries—or I like to boast that I have.",
	    "	I'm used to helping out those who aren't as smart as I am, and I patiently explain anything and everything to others.",
	    "	There's nothing I like more than a good mystery.",
	    "	I'm willing to listen to every side of an argument before I make my own judgment.",
	    "	I... speak... slowly... when talking... to idiots,... which... almost... everyone... is... compared... to me.",
	    "I am horribly, horribly awkward in social situations.",
	    "	I'm convinced that people are always trying to steal my secrets."
	);

	// Store all possible ideals
	const IDEALS = array(
	    "Knowledge. The path to power and self-improvement is through knowledge. (Neutral)",
	    "Beauty. What is beautiful points us beyond itself toward what is true. (Good)",
	    "Logic. Emotions must not cloud our logical thinking. (Lawful)",
	    "No Limits. Nothing should fetter the infinite possibility inherent in all existence. (Chaotic)",
	    "	Power. Knowledge is the path to power and domination. (Evil)",
	    "Self-Improvement. The goal of a life of study is the betterment of oneself. (Any)"
	);
	
	// Store all possible bonds
	const BONDS = array(
	    "It is my duty to protect my students.",
	    "I have an ancient text that holds terrible secrets that must not fall into the wrong hands.",
	    "	I work to preserve a library, university, scriptorium, or monastery.",
	    "	My life's work is a series of tomes related to a specific field of lore.",
	    "	I've been searching my whole life for the answer to a certain question.",
	    "I sold my soul for knowledge. I hope to do great deeds and win it back."
	);
	
	// Store all possible flaws
	const FLAWS = array(
	    "I am easily distracted by the promise of information.",
	    "	Most people scream and run when they see a demon. I stop and take notes on its anatomy.",
	    "Unlocking an ancient mystery is worth the price of a civilization.",
	    "I overlook obvious solutions in favor of complicated ones.",
	    "	I speak without really thinking through my words, invariably insulting others.",
	    "	I can't keep a secret to save my life, or anyone else's."
	);
	
	// Every sage gets their proficiencies
	public $skillProficiencies = array(
		"Arcana",
		"History"
	);

	// Every sage gets a certain inventory
	public $initialEquipment = array(
		"Bottle of black ink"		=> 1, 
		"Quill"					      	=> 1, 
		"Small knife"		      	=> 1,
		"Letter from a dead colleague posing a question you have not yet been able to answer" 										=> 1,
		"Common clothes" 				=> 1
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
		$this->generateCharacteristics('Sage');
	}

	/**
	 *	Return the background name
	 *
	 *	@return	string
	 */
	public function name() : string
	{
		return "Sage";
	}

	/** 
	 *  Name of the associated feature
	 * 
	 *	@return	string
	 */
	public function featureName() : string
	{
		return "Researcher";
	}

	/** 
	 *  Description of the associated feature
	 * 
	 *	@return	string
	 */
	public function featureDescription() : string
	{
		return "When you attempt to learn or recall a piece of lore, if you do not know that information, you often know where and from whom you can obtain it. Usually, this information comes from a library, scriptorium, university, or a sage or other learned person or creature. Your DM might rule that the knowledge you seek is secreted away in an almost inaccessible place, or that it simply cannot be found. Unearthing the deepest secrets of the multiverse can require an adventure or even a whole campaign.";
	}
}