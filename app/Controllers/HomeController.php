<?php 

class HomeController 
{
    public function index($id)
    {
        $data['title']="Home page";
        $data['contant']="fast";
        View::load('home',$data);
        // echo"aaaaaaaa";
        // $data = ["name"=>"mostafa mahfouz"];
        // $this->view('home',$data);
    }
}