<html>
<body>
    <?php
        $count = 1;

      echo "Questionnaire: " . $_POST['name'];


              while($count <= 10)
              {

                    if($_POST["answer_type"] . $count) == null){
                        break;}


                    echo "Question " . $count .": ". $_POST["question" . ($count)] . ", ";

                    echo  "Answer Type: " . $_POST["answer_type" . ($count)] . ", ";

                    echo "Required: " . $_POST["required" . ($count)] . ", ";




                    $count++;

                }


    ?>


</body>
</html
