<?php
/**
 *  Criminal.php
 *
 *  Captures the information used in creating the criminal/spy background.
 *
 *  @author			Lina Blijleven
 *  @copyright	CodeCafé 2022
 */

Class Criminal extends Background
{	
	// Store all possible personality traits
	const PERSONALITY_TRAITS = array(
		"I always have a plan for what to do when things go wrong.",
		"I am always calm, no matter what the situation. I never raise my voice or let my emotions control me.",
		"The first thing I do in a new place is note the locations of everything valuable—or where such things could be hidden.",
		"I would rather make a new friend than a new enemy.",
		"I am incredibly slow to trust. Those who seem the fairest often have the most to hide.",
		"I don’t pay attention to the risks in a situation. Never tell me the odds.",
		"The best way to get me to do something is to tell me I can’t do it.",
		"I blow up at the slightest insult."
	);

	// Store all possible ideals
	const IDEALS = array(
		"Honor. I don’t steal from others in the trade. (Lawful)",
		"Freedom. Chains are meant to be broken, as are those who would forge them. (Chaotic)",
		"Charity. I steal from the wealthy so that I can help people in need. (Good)",
		"Greed. I will do whatever it takes to become wealthy. (Evil)",
		"People. I’m loyal to my friends, not to any ideals, and everyone else can take a trip down the Styx for all I care. (Neutral)",
		"Redemption. There’s a spark of good in everyone. (Good)"
	);
	
	// Store all possible bonds
	const BONDS = array(
		"I’m trying to pay off an old debt I owe to a generous benefactor.",
		"My ill-gotten gains go to support my family.",
		"Something important was taken from me, and I aim to steal it back.",
		"I will become the greatest thief that ever lived.",
		"I’m guilty of a terrible crime. I hope I can redeem myself for it.",
		"Someone I loved died because of a mistake I made. That will never happen again."
	);
	
	// Store all possible flaws
	const FLAWS = array(
		"When I see something valuable, I can’t think about anything but how to steal it.",
		"When faced with a choice between money and my friends, I usually choose the money.",
		"If there’s a plan, I’ll forget it. If I don’t forget it, I’ll ignore it.",
		"I have a “tell” that reveals when I’m lying.",
		"I turn tail and run when things look bad.",
		"An innocent person is in prison for a crime that I committed. I’m okay with that."
	);
	
	// Every criminal/spy gets their proficiencies
	public $skillProficiencies = array(
		"Deception",
		"Stealth"
	);

	// Every criminal gets a certain inventory
	public $initialEquipment = array(
		"Crowbar"													=> 1, 
		"Common clothes (dark, hooded)"		=> 1
	);

	// Initial funds (15 gp for criminal)
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
		$this->generateCharacteristics('Criminal');
	}

	/**
	 *	Return the background name
	 *
	 *	@return	string
	 */
	public function name() : string
	{
		return "Criminal/Spy";
	}

	/** 
	 *  Name of the associated feature
	 * 
	 *	@return	string
	 */
	public function featureName() : string
	{
		return "Criminal Contact";		
	}

	/** 
	 *  Description of the associated feature
	 * 
	 *	@return	string
	 */
	public function featureDescription() : string
	{
		return "You have a reliable and trustworthy contact who acts as your liaison to a network of other criminals. You know how to get messages to and from your contact, even over great distances; specifically, you know the local messengers, corrupt caravan masters, and seedy sailors who can deliver messages for you.";
	}
}