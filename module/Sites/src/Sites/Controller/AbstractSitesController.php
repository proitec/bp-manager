<?php
/**
 * mithra62 - MojiTrac
 *
 * @author		Eric Lamb <eric@mithra62.com>
 * @copyright	Copyright (c) 2014, mithra62, Eric Lamb.
 * @link		http://mojitrac.com/
 * @version		2.0
 * @filesource 	./module/Cp/src/Cp/Controller/AbstractPmController.php
 */
namespace Sites\Controller;

use Application\Controller\AbstractController;

/**
 * Cp - AbstractCpController Controller
 *
 * @package MojiTrac\Controller
 * @author Eric Lamb <eric@mithra62.com>
 * @filesource ./module/Cp/src/Cp/Controller/AbstractCpController.php
 */
abstract class AbstractSitesController extends AbstractController
{

    protected $admin_only = true;
    
    public function onDispatch(\Zend\Mvc\MvcEvent $e)
    {
        $this->layout()->setVariable('active_nav', 'admin');
        return parent::onDispatch($e);
    }
}