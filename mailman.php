<html>
<body>
    <?php
        $count = 1;

              if($count <= 10)
              {
                    echo "Question: " . $_POST["question" . ($count + 1)];

                    echo  "Answer Type: " . $_POST["answer_type" . ($count + 1)];

                    echo "Required: " . $_POST["required" . ($count + 1)]; 

                        if( strlen($_POST["question"]) == 0){break;}
                    $count++;

                }


    ?>


</body>
</html
