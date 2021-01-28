<html>
<body>
    <?php
        $count = $_POST['count'];
              while($count <=10){
                    echo "Question: " echo $_POST["question" + $count];

                    echo  "Answer Type: " echo $_POST["answer_type" + $count];

                    echo "Required: " echo $_POST["required" + $count];
                  }

    ?>


</body>
</html
