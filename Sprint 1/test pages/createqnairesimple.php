<!DOCTYPE html>
<html>
<head>
<title>Create a Questionnaire</title>
</head>
<body>
<? php include 'config.php';?>
<script language="Javascript">
var limit = 10; // Max questions
var count = 1; // There are 4 questions already

function addQuestion()
{
    // Get the quiz form element
    var quiz = document.getElementById('quiz');

    // Good to do error checking, make sure we managed to get something
    if (quiz)
    {
        if (count < limit)
        {
            // Create a new <p> element
            var questionTXT = document.createElement('p');
            questionTXT.innerHTML = 'Question ' + (count + 1);

            // Create the new text box
            var newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.name = 'question';

            //new title
            var answerTXT = document.createElement('p');
            answerTXT.innerHTML = 'Answer: ';

            // Creates a text box for the answer
            var ansInput = document.createElement('input');
            ansInput.type = 'text';
            ansInput.name = 'answer';


            var requiredTXT = document.createElement('p');
            requiredTXT.innerHTML = 'Required Question?: ';

            // Create the new text box
            var newReqInput = document.createElement('input');
            newReqInput.type = 'checkbox';
            newReqInput.name = 'required';

            var breaker = document.createElement('p');
            breaker.innerHTML = '==========================================================';
            // Good practice to do error checking
            if (questionTXT && newInput && answerTXT && ansInput && requiredTXT && newReqInput && breaker )
            {
              // Add the new elements to the form
              quiz.appendChild(questionTXT);
              quiz.appendChild(newInput);
              quiz.appendChild(answerTXT);
              quiz.appendChild(ansInput);
              quiz.appendChild(requiredTXT);
              quiz.appendChild(newReqInput);
              quiz.appendChild(breaker);
              // Increment the count
              count++;
            }

          }
          else
          {
            alert('Question limit reached');
          }
    }
}


</script>

<form id="quiz" method="post" action="<?php echo $_SERVER['QUESTIONNAIRE'];?>">
  <input type="button" value="Add question" onclick="javascript: addQuestion();"/>
  <p>Question 1:</p>
  <input type="text" name="question" placeholder="Your Question Here" required>

  <p>Answer:</p>
  <input type="text" name="answer" placeholder="Your Answer Here" required>

  <br>
  <br>

  <label for="required">Required</label>
  <input type="checkbox" name="required">
  <br>
  <br>
  <input type="submit" name="create">

</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $name = $_POST['question'];
  if (empty($name)) {
    echo "Question is empty";
  } else {
    echo $name;
  }

  $name = $_POST['answer'];
  if (empty($name)) {
    echo "Answer is empty";
  } else {
    echo $name;
  }

  // $name = $_POST['required'];
  // if (empty($name)) {
  //   echo "not required";
  // } else {
  //   echo $name;
  // }
}
?>


</body>
</html>
