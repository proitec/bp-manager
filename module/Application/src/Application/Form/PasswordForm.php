<?php
/**
 * mithra62 - Backup Pro Server
 *
 * @author		Eric Lamb <eric@mithra62.com>
 * @copyright	Copyright (c) 2014, mithra62, Eric Lamb.
 * @link		http://backup-pro.com/
 * @version		2.0
 * @filesource 	./module/Application/src/Application/Form/PasswordForm.php
 */
namespace Application\Form;

use Base\Form\BaseForm;

/**
 * Password Form
 *
 * Generates the Change Password form
 *
 * @package Users\Password
 * @author Eric Lamb <eric@mithra62.com>
 * @filesource ./module/Application/src/Application/Form/PasswordForm.php
 *            
 */
class PasswordForm extends BaseForm
{

    /**
     * Creates the Password Change Form
     * 
     * @param string $name            
     * @param string $confirm            
     */
    public function __construct($name = 'password', $confirm = TRUE)
    {
        parent::__construct($name);
        
        $this->add(array(
            'name' => 'new_password',
            'type' => 'Password',
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'new_password'
            )
        ));
        
        $this->add(array(
            'name' => 'confirm_password',
            'type' => 'Password',
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'confirm_password'
            )
        ));
    }

    /**
     * Appends the old_password form field if called
     * 
     * @return \Application\Form\PasswordForm
     */
    public function confirmField()
    {
        $this->add(array(
            'name' => 'old_password',
            'type' => 'Password',
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'old_password'
            )
        ));
        return $this;
    }
}