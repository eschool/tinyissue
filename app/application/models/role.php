<?php

class Role extends Eloquent {

    public static $table = 'roles';
    public static $timestamps = false;

    /**
     * Dropdown of all roles
     *
     * @return array
     */
    public static function dropdown()
    {
        $roles = array();

        foreach (Role::order_by('name','asc')->get() as $role){
            $roles[$role->id]=$role->name;
        }

        return $roles;
    }

    /******************************************************************
    * Static methods for working with roles
    ******************************************************************/

    /**
    * Update a role
    *
    * @param  array  $info
    * @param  int    $id
    * @return array
    */
    public static function update_role($info, $id)
    {
        $rules = array(
            'name' => array('required'),
            'role' => array('required'),
        );

        $validator = Validator::make($info, $rules);

        if($validator->fails())
        {
            return array(
                'success' => false,
                'errors' => $validator->errors
            );
        }

        $update = array(
            'name' => $info['name'],
            'role' => $info['role'],
            'description' => $info['description']
        );

        Role::find($id)->fill($update)->save();

        return array(
            'success' => true
        );
    }

    /**
    * Add a new role
    *
    * @param  array  $info
    * @return array
    */
    public static function add_role($info)
    {
        $rules = array(
            'name' => array('required', 'unique:roles'),
            'role' => array('required', 'unique:roles'),
        );

        $validator = Validator::make($info, $rules);

        if($validator->fails())
        {
            return array(
                'success' => false,
                'errors' => $validator->errors
            );
        }

        $insert = array(
            'name' => $info['name'],
            'role' => $info['role'],
            'description' => $info['description']
        );

        $role = new Role;
        $role->fill($insert)->save();

        return array(
            'success' => true
        );
    }

    /**
    * Deletes a role
    *
    * @param  int   $id
    * @return bool
    */
    public static function delete_role($id)
    {
        Role::find($id)->delete();
        return true;
    }

}
