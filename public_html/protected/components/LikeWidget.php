<?php

class LikeWidget extends CWidget
{
    public $likeClass;
	public $type;
	public $user;
	public $name;
	public $liked;

    public function run()
    {
        $this->render('likeWidget', array(
			'likeClass' => $this->likeClass,
			'type' => $this->type,
			'user' => $this->user,
			'name' => $this->name,
			'liked' => $this->liked,
		));
    }
}
