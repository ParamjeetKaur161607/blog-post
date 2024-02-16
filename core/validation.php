<?php

class Validation{
    public $error,$category;
    public function isCategoryValid($category)
    {
        $this->category = $_POST['category'];

        if (empty($this->category)) {
            return $this->error = "Category can't be empty!";
        } else {            
            if (in_array($this->category, $category)) {
                return $this->error= "This category is already existed, Please try again!";
            }
        }
    }

}   

$validation= new Validation();