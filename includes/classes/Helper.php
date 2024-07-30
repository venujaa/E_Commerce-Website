<?php 

class Helper{
    
    //Add methods here
    
    public function passwordsMatch($pw1, $pw2){
        if ($pw1 == $pw2)
            return true;
        else
            return false;
    }
    
    public function isValidLength($str, $min = 8, $max = 20){
        if (strlen($str) < $min || strlen($str) > $max)
            return false;
        else
            return true;
    }
    
    public function isEmpty($postValues){
        
        foreach ($postValues as $value){
            if ($value == '')
                return true;
        }
        
        return false;
        
    }
    
    public function isSecure($pw){
        
        if (preg_match("~[A-Z]+~", $pw) && preg_match("~[a-z]+~", $pw) && preg_match("~[0-9]+~", $pw))
            return true;
        else
            return false;
        
    }

    public function keepValues($val, $type, $attr=''){
        switch ($type){
            case 'textbox':
                echo "value = '$val'";
                break;
            case 'textarea':
                echo $val;
                break;
            case 'select':
                if ($val == $attr)
                    echo 'selected';
                break;
            default:
                echo '';
        }

    }
    //////////////////
    function isValidateEmailAddress($email) {
        // Define a regular expression pattern for a valid email address
        $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    
        // Use preg_match to check if the email address matches the pattern
        if (preg_match($pattern, $email)) {
            return true;
        }
    
        return false;
    }
    /////////////////
    function isValidatePhoneNumber($phone) {
        // Remove any non-numeric characters from the phone number
        $phone = preg_replace('/[^0-9]/', '', $phone);
    
        // Define a regular expression pattern for a valid Sri Lankan phone number
        $pattern = '/^0[1-9][0-9]{8}$/';
    
        // Use preg_match to check if the phone number matches the pattern
        if (preg_match($pattern, $phone)) {
            return true;
        }
    
        return false;
    }
    ///////////////
}
