<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
/**
 * user Model
 *
 */
class user extends AppModel {
	public $name = 'User';
	public $validate = array(
        'name' => array(
            'rule' => 'notblank',
            'message' => 'User Name should not be blank',
            ),
        'email' => array(
            'check_notblank' => array(
                'rule' => 'notblank',
                'message' => 'Email should not be blank',
                ),
            'check_format' => array(
                'rule' => array('email','true'),
                'message' => 'Enter a valid email address',
                ),
            ),
        'telephone' => array(
            'check_notblank' => array(
                'rule' => 'notblank',
                'message' => 'Telephone should not be blank',
                ),
            'check_number' => array(
                'rule' => 'numeric',
                'message' => 'Enter only numbers',
                ),
            'check_maxlength' => array(
                'rule'     => array('maxlength', '9'),
                'message'  => 'Telephone should not exceed 9',
                ),
                ),
        'password' => array(
            'check_notblank' => array(
                'rule' => 'notblank',
                'message' => 'Password should not be blank',
                ),
            'check_minlength' => array(
                'rule' => '/^(?=.*[0-9])(?=.*[A-Z])(?=.*[ + – _ @ # $ % &]).*$/',
                 'message' => 'Password must contain number, uppercase and special character',
                        ),
            ),
         'profile_pic' => array(
            'check_notblank' => array(
                'rule' => 'notblank',
                'message' => 'Profile pic should not be blank',
                ),
            'mimetype' => array(
                'rule' => array('extension', array('png', 'jpg')),
                'message' => 'Upload jpg/png image.',              
                 ),
            /*'checksize' => array(
                'rule' =>array('fileSize', '<=', '1024'),
                'message' => 'Image must be less than 1MB',
                ),*/
            ),
        /* 'dob' => array(
            'rule' => array('date', 'dmy'),
            'message' => 'Enter a valid date',
            )*/
		  );


}

