<html>
<body>
      <form id="quiz" action="mailman.php" method="POST">
          <input type="button" value="Add question" onclick="javascript: addQuestion();"/>
          <p>Question 1</p>
          <input type="text" name="questions"/>
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
</body>
</html>