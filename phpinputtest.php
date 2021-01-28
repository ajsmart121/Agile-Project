<!DOCTYPE html>
<html>
        <head>
              <style>
              form * {
                display: block;
                margin: 10px;
              }
              </style>
                        <script language="Javascript" >


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
                                    questionTXT.innerHTML = 'Question ';

                                    // Create the new text box
                                    var newInputnum = document.createElement('input');
                                    newInputnum.type = 'text';
                                    newInputnum.value = (count);
                                    newInputnum.disabled;
                                    newInputnum.name = 'questionnum' + (count + 1);

                                    // Create the new text box
                                    var newInput = document.createElement('input');
                                    newInput.type = 'text';
                                    newInput.name = 'question' + (count + 1);

                                    //new title
                                    var answerTypeTXT = document.createElement('p');
                                    answerTypeTXT.innerHTML = 'Answer Type: ';

                                    //new select input
                                    var newSelect = document.createElement('select');
                                    newSelect.name = 'answer_type' + (count + 1);
                                    newSelect.id = 'answer_type' + (count + 1);

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
                                      newReqInput.type = 'checkbox';
                                      newReqInput.name = 'required' + (count + 1);;

                                      var breaker = document.createElement('p');
                                      breaker.innerHTML = '==========================================================';


                                    // Good practice to do error checking
                                    if (newInput && questionTXT && newSelect && answerTypeTXT && option && newReqInput && requiredTXT)
                                    {
                                        // Add the new elements to the form
                                        quiz.appendChild(questionTXT);
                                        quiz.appendChild(questionnum);
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
        </head>
  <body>

  <form id="quiz" action="mailman.php" method="POST">
          <p>Questionaire Name (.html)</p>
          <input type="text" name="name" placeholder="File_Name.html" required> <input type="submit" value="Submit Questionnaire"><br>

                                                <input type="button" value="-->Add question<--" onclick="javascript: addQuestion();"/><br>

                                                <p>Question</p> <input type="text" name="questionnum" value=1 disabled>
                                                <input type="text" name="question" placeholder="Your Question Here" required>

                                                <p> Answer Type: </p>
                                                <select id="answer_type1" name="answer_type1">
                                                  <option value="radio Button">Radio Button</option>
                                                  <option value="checkbox">Checkbox</option>
                                                  <option value="textbox">text box</option>
                                                  <option value="drop down">drop down</option>
                                                </select>
                                                <br>
                                                <label for="required">Required question?</label>
                                                <input type="checkbox" name="required1">
                                                <br>
  </form>
  </body>
</html>
