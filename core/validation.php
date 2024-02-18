<?php

trait variables
{
    public $all, $title, $author, $category, $content,$post;
}
class Validation
{

    use variables;


    public function isExist($data, $allData, $message)
    {
        $this->all = $data;

        // return in_array($this->all, $allData);
        if (in_array($this->all, $allData)) {
            return $message;
        }


    }

    public function notEmpty($data, $message)
    {
        if (empty($data)) {
            return $message;
        }
    }

    /**
     * Check whether pattren of a $data is correct or not
     * 
     * @param mixed $data It validate that only capital letter, small letters and space allowd.
     * @return bool return true if $data dosen't belongs to the pattren, false otherwise
     */
    function isAlpha($data)
    {
        return !preg_match("/^[a-zA-z' ]*$/", $data);
    }


    /**
     * Check  whether the input contains number or not
     * 
     * @param mixed $data The oprend to check its data type
     * @return bool return true if input contains numbers, false otherwise
     */
    function isNumeric($data)
    {
        return !preg_match("#[0-9]+#", $data);
    }



    /**
     * Check whether the email entered by user is in correct format or not
     * 
     * @param mixed $data The oprend to check the format of a email
     * @return bool return true if $data format is wrong, false otherwise
     */
    function isEmailValid($data)
    {
        return !filter_var($data, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Check length of any data
     * 
     * @param mixed $data The oprend to check the length
     * @return bool return true if $data is less then equal $length, otherwise false
     */
    function isLengthValid($data, $lenth)
    {
        return strlen($data) >= $lenth;
    }


    public function isTitleValid($title,$titles)
    {
        if (empty($title)) {         
            return "Title field can't be empty!";
        }

        if ($this->isAlpha($title)) {
            return "Only White Space and Alphabetic values allowed!";
        } 

        $length = $this->isLengthValid($title, 50);
        if ($length) {
            return "Length Can't be more then 50!";
        }

        $titles=$this->isExist($this->title, $titles, "This title is already existed!");
        if($titles){
            return $titles;
        }
    }

    public function isAuthorValid($author)
    {
        if (empty($author)) {         
            return "Author field can't be empty!";
        }

        if ($this->isAlpha($author)) {
            return "Only White Space and Alphabetic values allowed!";
        } 

        $length = $this->isLengthValid($author, 20);
        if ($length) {
            return "Length Can't be more then 20!";
        }
    }

    public function isContentValid($content)
    {
        if (empty($content)) {
            return "Content field can't be empty!";
        }

        $length = $this->isLengthValid($content, 200);
        if ($length) {
            return "Length Can't be more then 200!";
        }
    }

   
    public function isPostImageValid()
    {
        $blogImage = $_FILES['post'];
        $blogImageName = $blogImage["name"];

        $allowedExtensions = array("jpg", "jpeg", "png");
        $fileExtension = pathinfo($blogImageName, PATHINFO_EXTENSION);

        if (empty($content)) {
            return "Content field can't be empty!";
        }

        if (in_array($fileExtension,  $allowedExtensions)) {
            $path = "public/blog/" . $blogImageName;
        } else {
            $this->error_book_image = "Invalid file type. Allowed file types: " . implode(", ", $allowedExtensions);
        }

        if (move_uploaded_file($_FILES['post']["tmp_name"], $path)) {           
            return true;
        } else {
            return "file location error";
        }
        

    }

}

$validation = new Validation();