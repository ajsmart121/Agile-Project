<script>
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
            newInput.name = 'questions[]';

            //new title
            var answerTypeTXT = document.createElement('p');
            answerTypeTXT.innerHTML = 'Answer Type: ';

            //new select input
            var newSelect = document.createElement('select');
            newSelect.name = 'answer_type';
            newSelect.id = 'answer_type';

            //Create array of options to be added
            var array = ["Radio","Checkbox","Text","Drop-Down"];

            //Create and append the options
            for (var i = 0; i <= array.length; i++) {
                var option = document.createElement('option');
                option.value = array[i];
                option.text = array[i];
                newSelect.appendChild(option);
              }

              var requiredTXT = document.createElement('p');
              requiredTXT.innerHTML = 'Required Question?: ';

              // Create the new text box
              var newReqInput = document.createElement('input');
              newReqInput.type = 'radio';
              newReqInput.name = 'required';

              var breaker = document.createElement('p');
              breaker.innerHTML = '==========================================================';


            // Good practice to do error checking
            if (newInput && questionTXT && newSelect && answerTypeTXT && option && newReqInput && requiredTXT)
            {
                // Add the new elements to the form
                quiz.appendChild(questionTXT);
                quiz.appendChild(newInput);
                quiz.appendChild(answerTypeTXT);
                quiz.appendChild(newSelect);
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

<form id="quiz" action="https://agilegroup05webapp.herokuapp.com/Sprint%201/test%20pages/mailman.php" method="POST">

    <input type="button" value="Add question" onclick="javascript: addQuestion();"/>

    <p>Question 1</p>
    <input type="text" name="questions[]"/>

    <p> Answer Type: </p>
    <select id="answer_type" name="answer_type">
      <option value="radio Button">Radio Button</option>
      <option value="checkbox">Checkbox</option>
      <option value="textbox">text box</option>
      <option value="drop down">drop down</option>
    </select><br>
    <br>
    <label for="required">Required question?</label><br>
    <input type="radio" name="required">
    <br>

    ==========================================================

    <input type="submit" value="Submit the Questionaire"/>
</form>
