<?php
class BlogsController extends AppController {
    
         
public function index() {
}

public function add() {
if ($this->request->is('post')) {
	 if(!empty($this->request->data))
        {
        	 $this->Blog->set($this->request->data);
        	 if ($this->Blog->validates())
          {
        	 $this->Blog->create();
			if ($this->Blog->save($this->request->data)) {
				//$this->Flash->success(__('Blog added successfully'));
				 return $this->redirect(['action' => 'view']);  
				} else {
				$this->Flash->error(__('Cannot add blog. Try again later.'));
						}
        }
        else
        {
        	$this->Flash->success(__('validation failed'));
        }
    }

    }
	}
    public function view($id=null)
    {
        $this->set('blog_list', $this->Blog->find('all', array(
            'fields' => array('Blog.id','Blog.title', 'Blog.description'),
            'order' => array('Blog.id' => 'desc'),
            'conditions' => array('Blog.title !=' => '')       
            )));

    }
    public function edit()
    {
         $this->set('blogstatus', '');
           $blogid = $this->params['url']['id'];
           $this->set('blogid',$blogid);

            $this->set('blogdata', $this->Blog->find('first', array(
            'fields' => array('Blog.id','Blog.title', 'Blog.description'),
            'conditions' => array('Blog.id =' =>  $blogid)       
            )));

    }
    public function update($id = null) {
       
        if (!$this->Blog->exists($id)) {
            if ($this->Blog->save($this->request->data)) {
               $this->set('blogstatus', 'Updated blog successfully');
                return $this->redirect(array('action' => 'view'));
            } else {
                 $this->set('blogstatus', 'Failed to update blog. Try again later.');
            }    
        }
    
            
        }
      
    }

