    <?php
App::uses('AppController', 'Controller');
class UsersController extends AppController {
    public $name='Users';

public function index() {
// $filename = '';
 
//             $this->User->set($this->request->data); //set data to model
//             $this->User->create();
//             debug($this->request->data);
//      $uploadData = $this->data['User']['profile_pic'];
//      // if ( $uploadData['size'] == 0 || $uploadData['error'] !== 0) { 
//      //   return false;
//      // }
//      $filename = basename($uploadData['name']);  
//      $uploadFolder = WWW_ROOT. 'img';  
//      $filename = time() .'_'. $filename; 
//      debug($filename);
//      $uploadPath =  $uploadFolder . DS . $filename;
//      if( !file_exists($uploadFolder) ){
//        mkdir($uploadFolder); 
//      }
//      if (!move_uploaded_file($uploadData['tmp_name'], $uploadPath)) {
//        return false;
//      } 
//      else
//      {
//         debug('pass');
//      }
  
//   $this->set('image',$filename); 
}

public function signup(){
    $this->set('signupstatus', '');
    $this->set ('fileuploaderror','');
        if ($this->request->is('post')) {
         if(!empty($this->request->data))
            {
            if($this->User->validates())
           {
           $filename = '';
    
            $this->User->set($this->request->data); //set data to model
            $this->User->create();
            debug($this->request->data);
            

     $uploadData = $this->data['User']['profile_pic'];
     if ( $uploadData['name'] == '')
     {
        $this->set ('fileuploaderror','Profile pic should not be blank'); 
        return false;
     }

    if($uploadData['type'] !== 'image/png' && $uploadData['type'] !== 'image/jpeg' )
    {
        $this->set ('fileuploaderror','File Extension should be jpg/ png'); 
        return false;
    }

     if ( $uploadData['size'] > 1000000) { 
          $this->set ('fileuploaderror','File size should be less than 1 MB'); 
       return false;
     }

     $filename = basename($uploadData['name']);  
     $uploadFolder = WWW_ROOT. 'images';  
     $filename = time() .'_'. $filename; 
     debug($filename);
     $uploadPath =  $uploadFolder . DS . $filename;
     if( !file_exists($uploadFolder) ){
       mkdir($uploadFolder); 
     }
     if (!move_uploaded_file($uploadData['tmp_name'], $uploadPath)) {
       return false;
     } 
     
  $this->set('image',$filename);                                     
                
             }    
           
        $data=array();
        $data['User']['name'] =  $this->data['name'];
        $data['User']['address'] =  $this->data['address'];
         $data['User']['telephone'] =  $this->data['telephone'];
        $data['User']['email'] = $this->data['email'];
         $data['User']['dob'] =  $this->data['dob'];
        $data['User']['profile_pic'] = $filename;
        $data['User']['password'] = $this->data['password'];
           
            
            if ($this->User->save($data)) {
            $this->set('signupstatus', 'Sign up successfull, proceed to Login.');
                } else {
                    $this->set('signupstatus', 'Sign up is failed. Try again later');
                }
        }
        else
        {
            print_r('fail');
        }
        
    }
}




public function login() {
   $this->Session->delete('ustatus');
    $this->set('loginstatus','');
    if ($this->request->is('post')) {
         if(!empty($this->request->data))
        {
         $this->User->set($this->request->data);
         $telephone = $this->request->data('telephone');

        if($telephone)
        {
            $usercount = $this->User->find('count', array(           
            'conditions' => array('User.telephone =' =>  $this->request->data['telephone'], 'User.password =' => $this->request->data['password2'])       
            ));
        }
        else
        {
       
           $usercount = $this->User->find('count', array(           
            'conditions' => array('User.email =' => $this->request->data['email'], 'User.password =' => $this->request->data['password'])       
            )); 
        }       
         if($usercount==0)
         {
             $this->Session->delete('ustatus');
             
             $this->set('loginstatus','Invalid credentials');
         }
         else
         {
             $this->Session->delete('ustatus');
             $this->Session->write('ustatus','valid');
            return $this->redirect([
            'controller' => 'Blogs',
            'action' => 'add'
]);

         }
    }
    else
    {
         $this->Flash->error(__('enter valid value'), 'flash_notification');
    }
    }
}


}