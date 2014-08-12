<?php
if(isset($_POST['action'])){
    $action = $_POST['action'];

    switch ($action) {
        case 'submitAnswer':
            require_once '../answer/answer_question.php';

            $wikip_id = $_POST['wikip_id'];
            $answer = $_POST['answer'];

            AnswerQuestion($wikip_id, $answer);
            break;
    }
}
?>