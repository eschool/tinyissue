<?php

class Administration_Roles_Controller extends Base_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->filter('before', 'permission:administration');
    }

    public function get_index(){
        return $this->layout->with('active', 'dashboard')->nest('content', 'administration.roles.index', array(
            'roles' => Role::order_by('id', 'DESC')->get()
        ));
    }

}
