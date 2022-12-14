<?php
/**
 *  Soldier.php
 *
 *  @author		Niels	
 *  @copyright	CodeCafé 2022
 */

Class Soldier extends Background
{	
  // Store all possible personality traits
	const PERSONALITY_TRAITS = array(
    "I’m always polite and respectful.",
    "I’m haunted by memories of war. I can’t get the images of violence out of my mind.",
    "I’ve lost too many friends, and I’m slow to make new ones.",
    "I’m full of inspiring and cautionary tales from my military experience relevant to almost every combat situation.",
    "I can stare down a hell hound without flinching.",
    "I enjoy being strong and like breaking things.",
    "I have a crude sense of humor.",
    "I face problems head-on. A simple, direct solution is the best path to success."
    );

  // Store all possible ideals
	const IDEALS = array(
    "Greater Good. Our lot is to lay down our lives in defense of others. (Good)",
    "Responsibility. I do what I must and obey just authority. (Lawful)",
    "Independence. When people follow orders blindly, they embrace a kind of tyranny. (Chaotic)",
    "Might. In life as in war, the stronger force wins. (Evil)",
    "Live and Let Live. Ideals aren’t worth killing over or going to war for. (Neutral)",
    "Nation. My city, nation, or people are all that matter. (Any)"
    );

	// Store all possible bonds
	const BONDS = array(
    "I would still lay down my life for the people I served with.",
    "Someone saved my life on the battlefield. To this day, I will never leave a friend behind.",
    "My honor is my life.",
    "I’ll never forget the crushing defeat my company suffered or the enemies who dealt it.",
    "Those who fight beside me are those worth dying for.",
    "I fight for those who cannot fight for themselves."
    );

	// Store all possible flaws
	const FLAWS = array(
    "The monstrous enemy we faced in battle still leaves me quivering with fear.",
    "I have little respect for anyone who is not a proven warrior.",
    "I made a terrible mistake in battle that cost many lives—and I would do anything to keep that mistake secret.",
    "My hatred of my enemies is blind and unreasoning.",
    "I obey the law, even if the law causes misery.",
    "I’d rather eat my armor than admit when I’m wrong."
    );

	// Every soldier gets their proficiencies
	public $skillProficiencies = array(
		"Athletics",
		"Intimidation"
	);

	// Every soldier gets a certain inventory
	public $initialEquipment = array(
  //  An insignia of rank, a trophy taken from a fallen enemy (a dagger, broken blade, or piece of a banner), a set of bone dice or deck of cards, a set of common clothes,
		"insignia of rank"	=> 1, 
		"Dagger"					  => 1, 
		"Set of bone dice"  => 1,
		"Common clothes" 		=> 1
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
		$this->generateCharacteristics('Soldier');
	}

	/**
	 *	Return the background name
	 *
	 *	@return	string
	 */
	public function name() : string
	{
		return "Soldier";
	}

	/** 
	 *  Name of the associated feature
	 * 
	 *	@return	string
	 */
	public function featureName() : string
	{
		return "Military Rank";		
	}

	/** 
	 *  Description of the associated feature
	 * 
	 *	@return	string
	 */
	public function featureDescription() : string
	{
		return "You have a military rank from your career as a soldier. Soldiers loyal to your former military organization still recognize your authority and influence, and they defer to you if they are of a lower rank. You can invoke your rank to exert influence over other soldiers and requisition simple equipment or horses for temporary use. You can also usually gain access to friendly military encampments and fortresses where your rank is recognized.";
	}
}