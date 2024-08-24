<?php
class ClassController extends Controller{
    public $model;
    public function __construct(){      
    $this->model = getModel("MemberModel");
    }
    public function index(){
    $data = $this->model->get_all_member();
    VIEW("user.user",["fetch"=>$data]);
    }
}
?>