<html>
<body>
    <?php
        $count = 1;

              while($count <= 10){
                    echo "Question: " . $_POST["question" . ($count + 1)];

                    //echo  "Answer Type: " + $_POST["answer_type" + ($count + 1)];

                    //echo "Required: " + $_POST["required" + ($count + 1)];

                    $count++;

                    if(strlen($_POST["question"]) == 0) {break;}
                  }


    ?>


</body>
</html
