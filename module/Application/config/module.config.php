<?php
/**
 * mithra62 - Backup Pro Server
 *
 * @package		Default
 * @author		Eric Lamb
 * @copyright	Copyright (c) 2016, mithra62, Eric Lamb.
 * @link		http://backup-pro.com/
 * @version		1.0
 * @filesource 	./module/Application/config/module.config.php
 */
return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action' => 'index'
                    )
                )
            ),
            'about' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/about',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action' => 'about'
                    )
                )
            ),
            'account' => array( // Account Routes
                'type' => 'segment',
                'options' => array(
                    'route' => '/account',
                    'constraints' => array(
                        'id' => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\Account',
                        'action' => 'index'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'change-password' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/change-password',
                            'defaults' => array(
                                'action' => 'changePassword'
                            )
                        )
                    ),
                    'register' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/register',
                            'defaults' => array(
                                'action' => 'register'
                            )
                        )
                    ),
                    'edit' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/edit',
                            'defaults' => array(
                                'action' => 'edit'
                            )
                        )
                    ),
                    'logout' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/logout',
                            'defaults' => array(
                                'action' => 'logout'
                            )
                        )
                    ),
                    'verify_email' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/verify-email',
                            'defaults' => array(
                                'action' => 'verify_email'
                            )
                        )
                    ),
                    'email_settings' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/email-settings',
                            'defaults' => array(
                                'action' => 'email_settings'
                            )
                        )
                    ),
                    'change_password' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/change-password',
                            'defaults' => array(
                                'action' => 'change_password'
                            )
                        )
                    ),
                    'preferences' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/preferences',
                            'defaults' => array(
                                'action' => 'preferences'
                            )
                        )
                    ),
                    'verify_email_confirm' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/verify/email/:hash',
                            'defaults' => array(
                                'action' => 'verify_email_confirm'
                            )
                        )
                    ),
                )
            ), // end Login Routes
            'login' => array( // Login Routes
                'type' => 'segment',
                'options' => array(
                    'route' => '/account/login',
                    'constraints' => array(
                        'id' => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\Login',
                        'action' => 'index'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'process' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/process',
                            'defaults' => array(
                                'action' => 'process'
                            )
                        )
                    )
                )
            ), // end Login Routes
            
            'forgot-password' => array( // Forgot Password Routes
                'type' => 'segment',
                'options' => array(
                    'route' => '/forgot-password',
                    'constraints' => array(
                        'id' => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\ForgotPassword',
                        'action' => 'index'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'reset' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/reset/:hash',
                            'defaults' => array(
                                'action' => 'reset'
                            )
                        )
                    )
                )
            )
        ) // end Forgot Password Routes

    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory'
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator'
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => 'Application\Controller\IndexController',
            'Application\Controller\Login' => 'Application\Controller\LoginController',
            'Application\Controller\Account' => 'Application\Controller\AccountController',
            'Application\Controller\ForgotPassword' => 'Application\Controller\ForgotPasswordController',
            'Application\Controller\Ips' => 'Application\Controller\IpsController'
        )
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml'
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    ),
    
    'view_helpers' => array(
        'invokables' => array(
            'StaticUrl' => 'Application\View\Helper\StaticUrl',
            'GetIdentity' => 'Application\View\Helper\GetIdentity',
            'DispatchRouteEvents' => 'Application\View\Helper\DispatchRouteEvents',
            'ConfirmPageUnload' => 'Application\View\Helper\ConfirmPageUnload',
            'CheckPermission' => 'Application\View\Helper\CheckPermission',
            'IsDatePast' => 'Application\View\Helper\IsDatePast',
            'Truncate' => 'Application\View\Helper\Truncate',
            'UserInfo' => 'Application\View\Helper\UserInfo',
            'Pagination' => 'Application\View\Helper\Pagination',
            'GlobalAlerts' => 'Application\View\Helper\GlobalAlerts',
            'FormatDate' => 'Application\View\Helper\FormatDate',
        )
    ),
    'translator' => array(
        'translation_file_patterns' => array(
            array(
                'type' => 'phparray',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.php',
                'text_domain' => 'app'
            )
        )
    ),
    
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array()
        )
    )
);
