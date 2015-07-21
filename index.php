<?php
require_once 'controllers/feedbackController.php';
?>

<html>
<head>
<title>artem.testing.cave</title>
    <link rel="stylesheet" href="css/main.css"/>
</head>
<body>
<div class="form-wrapper">

    <div class="comments_out">
        <?php $feedback = new FeedbackForm(); ?>
    </div>

    <form action="" method="post">
        <input id="name" type="text" name="name" placeholder="Name"/><label for="name">*</label><br/><br/>
        <input id="email" type="email" name="email" placeholder="Email"/><label for="email">*</label><br/><br/>
        <input id="" type="phone" name="phone" placeholder="Phone number like +38(0xx)-xxx-xx-xx"/><label for="phone">*</label><br/><br/>
        <textarea id="comments" type="text" name="comments" placeholder="Your comment" /></textarea><label for="comments">*</label><br/><br/>

        <button name="submit" type="submit">Submit</button>
    </form>
    <div class="comments_out">
        <?php FeedbackForm::getComments(); ?>
    </div>
</div>
</body>
</html>