<html>
<body>
    <?php
        $count = $_POST['questionnum'];

              while($count <=10){
                    echo "Question: " + $_POST["question" + ($count + 1)];

                    echo  "Answer Type: " + $_POST["answer_type" + ($count + 1)];

                    echo "Required: " + $_POST["required" + ($count + 1)];
                  }

    ?>


</body>
</html
