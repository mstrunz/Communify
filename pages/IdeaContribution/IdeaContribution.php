<?php
class IdeaContribution extends PageTemplate{
	
	
	public function executeAddnewTopic($request)
	{
		$topic = new IdeaTopic();
		$topic->setCoins($request['coins']);
		$topic->setCreatedBy(Core::getUser()->getId());
		$topic->setCreationDate(Core::date2Mysql(date("d.m.Y")));
		$topic->setDescription($request['description']);
		$topic->setName($request['name']);
		$topic->save();
		Core::setGlobalMessage("Topic Created");
		Core::go2Page(2);
	}
	
	public function executeAddnewContribution($request)
	{
		$contribution = new IdeaContributions();
		$contribution->setCreatedBy(Core::getUser()->getId());
		$contribution->setCreationDate(Core::date2Mysql(date("d.m.y")));
		$contribution->setDescription($request['contribution']);
		$contribution->setIdeaTopicId($request['topicid']);
		$contribution->setName($request['name']);
		$contribution->save();
		$topic = IdeaTopic::getIdeaTopic($request['topicid']);
		$sql = "INSERT INTO account (userid,coins,ideacontributionid) VALUES
				(
					'".Core::getUser()->getId()."',
					'{$topic->getCoins()}',
					'{$contribution->getId()}'
				)
		";
		Core::sqlInsert($sql);
		$am = new AwardManagement();
		$am->checkAwards();
		Core::setGlobalMessage("Contribution added");
		Core::go2Page(2);
	}
	
	public function executeDefault($request)
	{
		$this->topics = IdeaTopic::getIdeaTopics();	
	}
	
	public function render($request)
	{
		if (Core::getGetParameter("action")=="addTopic" || Core::getGetParameter("action")=="addnewTopic")
		{
			include_once '../pages/IdeaContribution/AddTopicHtml.php';		
		}
		elseif (Core::getGetParameter("action")=="addContribution" || Core::getGetParameter("action")=="addnewContribution")
		{
			include_once '../pages/IdeaContribution/AddContributionHtml.php';		
		}
		else
		{
			include_once '../pages/IdeaContribution/IdeaContributionHtml.php';
		}
	}
	
}