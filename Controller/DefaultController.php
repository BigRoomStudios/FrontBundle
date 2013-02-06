<?php

namespace BRS\FrontBundle\Controller;

use BRS\CoreBundle\Core\Utility;

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
class DefaultController extends Controller
{
	
	/**
	 * Displays a form to create a new entity for this admin module
	 *
	 * @Route("")
	 * @Template("BRSFrontBundle:Default:index.html.twig")
	 */
	public function indexAction()
	{
		return array('title' => 'Hello World');
	}
}
