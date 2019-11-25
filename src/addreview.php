<?php require_once('config.php');


    try {
        
        if(isset($_POST['submitReview'])) {

            $name = $_POST['name'];
            $comment = $_POST['comment'];

            $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = 'INSERT INTO `review` (`Name`, `Date`, `Comment`) VALUES ("' . $name . '", "' . date('F jS, Y') . '", "' . $comment . '");';
            $pdo->query($sql);

        }


    } catch (PDOException $e) {
            die($e->getMessage());
        }

?>