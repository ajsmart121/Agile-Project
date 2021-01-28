<html>
<body>
    <?php
        $count = $_POST['questionnum'];

              while($count <=10){
                    echo "Question: " echo $_POST["question" + ($count + 1)];

                    echo  "Answer Type: " echo $_POST["answer_type" + ($count + 1)];

                    echo "Required: " echo $_POST["required" + ($count + 1)];
                  }

    ?>


</body>
</html
