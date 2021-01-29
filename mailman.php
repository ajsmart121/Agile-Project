<html>
<body>
    <?php
        $count = 1;

      echo "Questionnaire: " . $_POST['name'];


              while($count <= 10)
              {

                  //  if($_POST["answer_type"] . $count == "Radio Button" || $_POST["answer_type"] . $count == "Check Box" || $_POST["answer_type"] . $count == "Text Box" || $_POST["answer_type"] . $count == "Drop Down")
                  //  {

                    echo "Question " . $count .": ". $_POST["question" . ($count)] . ", ";

                    echo  "Answer Type: " . $_POST["answer_type" . ($count)] . ", ";

                    echo "Required: " . $_POST["required" . ($count)] . "| ";
                  } else {break;}



                    $count++;

                }


    ?>


</body>
</html
