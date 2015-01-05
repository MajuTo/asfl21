<?php

/**
* Admin Controller
*/
class AdminController extends BaseController{
    
    public function index(){
        $groups = Group::lists('groupName', 'idGroup');
        return View::make('admin/index', [
            'groups' => $groups
            ]);
    }

    public function createMember(){
        try {
            DB::table('User')->insertGetId(Input::except('_token'));
            Session::flash('success', true);
            Session::flash('class', 'alert alert-success');
            Session::flash('message', 'L\'adhérent a été créé');
            return Redirect::to('admin');
        } catch (Exception $e) {
            Session::flash('success', false);
            Session::flash('class', 'alert alert-danger');
            Session::flash('message', 'L\'adhérent n\'a pas été créé');
            return Redirect::to('admin');
        }
    }

}

?>