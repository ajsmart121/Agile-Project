<html>
<body>
    <?php
        $count = 1;

        echo $_POST['name'];

              while($count <= 10)
              {

                    if(strlen($_POST["question"]) == 0){
                        break;}


                    echo "-==Question" . $count . $_POST["question" . ($count)] . "=-,";

                    echo  "-=Answer Type: " . $_POST["answer_type" . ($count)] . "=-,";

                    echo "-=Required: " . $_POST["required" . ($count)] . "==-,";




                    $count++;

                }


    ?>


</body>
</html
