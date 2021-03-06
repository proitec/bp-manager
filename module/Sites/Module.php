<?php
namespace Sites;

use Sites\Model\Sites;
use Sites\Model\Api;
use Sites\Model\Sites\Team;

use Sites\Form\SiteForm;
use Sites\Form\SettingsForm;
use Sites\Form\StorageForm;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
    
                'Sites\Model\Api' => function ($sm) {
                    return new Api();
                },
                // setting up the Authentication stuff
                'Sites\Model\Sites' => function ($sm) {
                    $adapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $db = $sm->get('SqlObject');
                    
                    $site = new Sites($adapter, $db);
                    $site->setApi($sm->get('Sites\Model\Api'));
                    $site->setTeam($sm->get('Sites\Model\Sites\Team'));
                    return $site;
                },
                // setting up the Authentication stuff
                'Sites\Model\Sites\Team' => function ($sm) {
                    $adapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $db = $sm->get('SqlObject');
                    
                    $team = new Team($adapter, $db);
                    return $team;
                },
				'Sites\Form\SiteForm' => function($sm) {
					return new SiteForm('site_form');
				},
				'Sites\Form\SettingsForm' => function($sm) {
					return new SettingsForm('settings_form');
				},
				'Sites\Form\StorageForm' => function($sm) {
					return new StorageForm('storage_form');
				},
            )
        );
    }  
}
