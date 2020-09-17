<!-- <center>
<div class="users view">
<h2><?php echo('User'); ?></h2>
<?php
     //echo $this->Form->create(['url' => ['controller' => 'Users', 'action' => 'index'], array('type' => 'file')]);  //input field of type file allows browse your file. 
    echo $this->Form->create('User', array('type' => 'file'));
    echo $this->Form->input('profile_pic', array('type' => 'file','label' => 'picture')); 
    echo $this->Form->end('Upload file');
     $image_src = $this->webroot.'img/'.$image;
?>
<img src="<?php echo $image_src;?>">
</div>
</center>a -->