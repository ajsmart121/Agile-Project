<html>
<body>
    <?php
        $count = 1;

      echo "Questionnaire: " . $_POST['name'];
      echo ($_POST["question"] . $count);

              while($count <= 10)
              {

                    if(strlen($_POST["question"] . $count) == 0){
                        break;}


                    echo "Question" . $count .": ". $_POST["question" . ($count)] . ", ";

                    echo  "Answer Type: " . $_POST["answer_type" . ($count)] . ", ";

                    echo "Required: " . $_POST["required" . ($count)] . ", ";




                    $count++;

                }


    ?>


</body>
</html
