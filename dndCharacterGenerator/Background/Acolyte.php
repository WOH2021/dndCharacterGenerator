<?php
/**
 *  Acolyte.php
 *
 *  @author			Lina Blijleven
 *  @copyright	CodeCafé 2022
 */

Class Acolyte extends Background
{	
	// Store all possible personality traits
	const PERSONALITY_TRAITS = array(
	  "I idolize a particular hero of my faith, and constantly refer to that person's deeds and example.",
	  "I can find common ground between the fiercest enemies, empathizing with them and always working toward peace.",
	  "I see omens in every event and action. The gods try to speak to us, we just need to listen.",
	  "Nothing can shake my optimistic attitude.",
	  "I quote (or misquote) sacred texts and proverbs in almost every situation.",
	  "I am tolerant (or intolerant) of other faiths and respect (or condemn) the worship of other gods.",
	  "I've enjoyed fine food, drink, and high society among my temple's elite. Rough living grates on me.",
	  "I've spent so long in the temple that I have little practical experience dealing with people in the outside world."
	);

	// Store all possible ideals
	const IDEALS = array(
	  "Tradition. The ancient traditions of worship and sacrifice must be preserved and upheld. (Lawful)",
	  "Charity. I always try to help those in need, no matter what the personal cost. (Good)",
	  "Change. We must help bring about the changes the gods are constantly working in the world. (Chaotic)",
	  "Power. I hope to one day rise to the top of my faith's religious hierarchy. (Lawful)",
	  "Faith. I trust that my deity will guide my actions. I have faith that if I work hard, things will go well. (Lawful)",
	  "Aspiration. I seek to prove myself worthy of my god's favor by matching my actions against his or her teachings. (Any)"
	);
	
	// Store all possible bonds
	const BONDS = array(
	  "I would die to recover an ancient relic of my faith that was lost long ago.",
	  "I will someday get revenge on the corrupt temple hierarchy who branded me a heretic.",
	  "I owe my life to the priest who took me in when my parents died.",
	  "Everything I do is for the common people.",
	  "I will do anything to protect the temple where I served.",
	  "I seek to preserve a sacred text that my enemies consider heretical and seek to destroy."
	);
	
	// Store all possible flaws
	const FLAWS = array(
	  "I judge others harshly, and myself even more severely.",
	  "I put too much trust in those who wield power within my temple's hierarchy.",
	  "My piety sometimes leads me to blindly trust those that profess faith in my god.",
	  "I am inflexible in my thinking.",
	  "I am suspicious of strangers and expect the worst of them.",
	  "Once I pick a goal, I become obsessed with it to the detriment of everything else in my life."
	);
	
	// Every acolyte gets their proficiencies
	public $skillProficiencies = array(
		"Insight",
		"Religion"
	);

	// Every acolyte gets a certain inventory
	// Officially it's a prayer book or prayer wheel?
	public $initialEquipment = array(
		"Holy symbol"						=> 1, 
		"A prayer book"					=> 1, 
		"Stick(s) of incense"		=> 5,
		"Vestments"  						=> 1,
		"Common clothes" 				=> 1
	);

	// Initial funds
	public $initialFunds = array(
		"pp"	=> 0,
		"gp"	=> 15,
		"sp"	=> 0,
		"bp"	=> 0
	);

	/**
   *  Constructor
   */
	public function __construct()
	{
		$this->generateCharacteristics('Acolyte');
	}

	/**
	 *	Return the background name
	 *
	 *	@return	string
	 */
	public function name() : string
	{
		return "Acolyte";
	}

/** 
	 *  Name of the associated feature
	 * 
	 *	@return	string
	 */
	public function featureName() : string
	{
		return "Shelter of the Faithful";		
	}

	/** 
	 *  Description of the associated feature
	 * 
	 *	@return	string
	 */
	public function featureDescription() : string
	{
		return "As an acolyte, you command the respect of those who share your faith, and you can perform the religious ceremonies of your deity. You and your adventuring companions can expect to receive free healing and care at a temple, shrine, or other established presence of your faith, though you must provide any material components needed for spells. Those who share your religion will support you (but only you) at a modest lifestyle.

You might also have ties to a specific temple dedicated to your chosen deity or pantheon, and you have a residence there. This could be the temple where you used to serve, if you remain on good terms with it, or a temple where you have found a new home. While near your temple, you can call upon the priests for assistance, provided the assistance you ask for is not hazardous and you remain in good standing with your temple.";
	}
}