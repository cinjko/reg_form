<?php

class Form {

    public static function validate ($data) {
        $errors = array();
        $data	= array();

        if (!($data['name'] = filter_input(INPUT_POST, 'name', FILTER_CALLBACK, array('options' => 'Form::validate_text')))) {
            $errors = 'false';
        } else {
            $_SESSION['name'] = $data['name'];
        }

        if (!($data['email'] = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL))) {
            $errors = 'false';
        } else {
            $_SESSION['email'] = $data['email'];
        }

        if (!($data['phone'] = filter_input(INPUT_POST, 'phone', FILTER_CALLBACK, array('options' => 'Form::validatePhoneNumber')))) {
            $errors = 'false';
        } else {
            $_SESSION['phone'] = $data['phone'];
        }

        if (!($data['comments'] = filter_input(INPUT_POST, 'comments', FILTER_CALLBACK, array('options' => 'Form::validate_text')))) {
            $errors = 'false';
        } else {
            $_SESSION['comments'] = $data['comments'];
        }

        $data['comments_date'] = date('Y-m-d');
        $data['user_IP'] = $_SERVER['SERVER_ADDR'];

        if (!empty($errors)) {
            return false;
        }

        return $data;
    }

    static function validate_text($str) {

        if (mb_strlen($str,'utf8') < 1) {
            return false;
        } else {

            $str = trim(strip_tags($str));
            $str = nl2br(htmlspecialchars($str));

        }

        return $str;
    }

    private static function validatePhoneNumber ($number) {

        if (!$num = preg_match("/^(\+38)\([0-9]{3}\)-[0-9]{3}[-][0-9]{2}[-][0-9]{2}$/", $number)) {
            return false;
        } else {
             return $number;
        }

    }

    public static function recUserComments($result) {

        $fp = fopen("./data/user_data.csv", "a");

        if(!$fp){
            echo "Cannot open file!!";
        } else {

            foreach($result as $key=>$val) {
                $row[] = $val;
            }

        if($row !== NULL)
            $putDataCsv = fputcsv($fp, $row, ",", "\"" , "\"");
        }

        fclose($fp);

    }

    public static function getUserComments() {

        $fp = fopen("./data/user_data.csv", "r");

        if(!$fp){
            echo "Cannot open file!!";
        } else {

            while(!feof($fp)){
                $dataCsv[] = fgetcsv($fp);
            }

            return $dataCsv;
        }

    }

}
