<?php

class Administration_Roles_Controller extends Base_Controller {

    public $restful = true;

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

    public function get_add()
    {
        return $this->layout->with('active', 'dashboard')->nest('content', 'administration.roles.add');
    }

    public function post_add()
    {
        $add = Role::add_role(Input::all());

        if(!$add['success'])
        {
            return Redirect::to('administration/roles/add/')
                ->with_input()
                ->with_errors($add['errors'])
                ->with('notice-error', __('tinyissue.we_have_some_errors'));
        }

        return Redirect::to('administration/roles')
            ->with('notice', __('eschool.role_added'));
    }

    public function get_edit($role_id)
    {
        return $this->layout->with('active', 'dashboard')->nest('content', 'administration.roles.edit', array(
            'role' => Role::find($role_id)
        ));
    }

    public function post_edit($role_id)
    {
        $update = Role::update_role(Input::all(),$role_id);

        if(!$update['success'])
        {
            return Redirect::to('administration/roles/edit/' . $role_id)
                ->with_input()
                ->with_errors($update['errors'])
                ->with('notice-error', __('tinyissue.we_have_some_errors'));
        }

        return Redirect::to('administration/roles')
            ->with('notice', __('eschool.role_updated'));
    }

    public function get_delete($role_id)
    {
        Role::delete_role($role_id);

        return Redirect::to('administration/roles')
                ->with('notice', __('eschool.role_deleted'));
    }

}
