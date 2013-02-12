<?php

namespace BRS\FrontBundle\Controller;

use BRS\CoreBundle\Core\Utility;
use BRS\CoreBundle\Core\WidgetController;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * DefaultController defines routes for front end content delivery
 * @Route("")
 */
class DefaultController extends WidgetController
{
	
	/**
	 * Displays a form to create a new entity for this admin module
	 *
	 * @Route("/contact_form")
	 * @Template("BRSFrontBundle:Default:index.html.twig")
	 */
	public function contactAction()
	{	
		$request = $this->getRequest();

		if($request->isXmlHttpRequest()){ // is it an Ajax request?
			
			$email = $request->request->get('email');
			$name = $request->request->get('name');
			$message = $request->request->get('message');
			
			$to = $this->getParameter('contact_to');
			$subject = $this->getParameter('contact_subject');
			
			//return $this->jsonResponse(array('to' => $to,'subject' => $subject));
			
			if($name && $email && $message){
				
				$message = \Swift_Message::newInstance()
		        ->setSubject($subject)
		        ->setFrom(array($email => $name))
		        ->setTo($to)
		        ->setBody($message);
				
			    $response = $this->get('mailer')->send($message);
				
				return $this->jsonResponse(array('success' => $response));
			}
			
			return $this->jsonResponse(array('error' => 'missing required values'));
		}
		
		return array('title' => 'Contact Us');
	}
}
