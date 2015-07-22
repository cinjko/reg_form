<?php
session_start();
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
        <input id="name" type="text" name="name" placeholder="Name" value="<?php if (isset ($_SESSION['name'])) { echo $_SESSION['name']; } ?>"/><label for="name">*</label><br/><br/>
        <input id="email" type="email" name="email" placeholder="Email" value="<?php if (isset($_SESSION['email'])) { echo $_SESSION['email']; } ?>"/><label for="email">*</label><br/><br/>
        <input id="" type="phone" name="phone" placeholder="Phone number like +38(0xx)-xxx-xx-xx" value="<?php if (isset($_SESSION['phone'])) { echo $_SESSION['phone']; } ?>"/><label for="phone">*</label><br/><br/>
        <textarea id="comments" name="comments" placeholder="Your comment"><?php if (isset($_SESSION['comments'])) { echo $_SESSION['comments']; } ?></textarea><label for="comments">*</label><br/><br/>

        <button name="submit" type="submit">Submit</button>
    </form>

    <div class="comments_out">
    <?php session_unset(); ?>
        <?php FeedbackForm::getComments(); ?>
    </div>
</div>
</body>
</html>