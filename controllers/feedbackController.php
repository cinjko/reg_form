<?php

class FeedbackForm {

    function __construct () {

        if (isset($_POST['submit'])) {

            $data_post = $_POST;
            $this->checkData($data_post);

        }

    }

    public static function checkData ($data) {

        if($data['name'] === "" || $data['email'] === "" || $data['phone'] === "" || $data['comments'] ==="") {
          echo "Fill all required fields!";
        } else {

            include_once "./models/feedbackModel.php";
            $result = Form::validate($data);

            if (is_array($result)) {

                $write_comments = Form::recUserComments($result);
                header('Location: ./index.php');

            }

        }

    }

    public static function getComments() {

        include_once "./models/feedbackModel.php";
        $result = Form::getUserComments();
        include_once "./views/feedbackView.php";

    }

}

