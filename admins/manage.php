<?php
    session_start();
    if (!isset($_SESSION['role']) || $_SESSION['role']!=='admin') {
    header("Location: ./connexion.php");
    exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Data Form</title>
  <style>
    body {
        min-height:100vh;
        font-family: Arial, sans-serif;
        background-image:url('../assets/rm222batch2-mind-03.jpg') ;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }
    *{
        margin:0;
        padding:0;
        box-sizing: border-box;
    }
    .form-container {
      width: calc(100% - 280px);
      margin-left: 200px;
      margin-top:120px;
      padding: 20px;
      border-radius: 5px;
      background-color: #f2f2f2;
    }
    
    .container h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    
    .form-container label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
    }
    
    .form-container input {
      width: 95%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    
    .form-container .form-buttons {
      text-align: center;
      margin-top: 20px;

    }
    
    .form-container .form-buttons button {
      margin-right: 10px;
    }
    
    .form-container .form-content {
      display: none;
    }
    
    .form-container .form-content.active {
      display: block;
    }
    
    .form-container #teacherForm .submit-btn button,.form-container #topicForm .submit-btn button,.form-container #classroomForm .submit-btn button {
      display: block;
      margin-top: 20px;
    }
    
    .form-container #teacherForm .submit-btn,.form-container #topicForm .submit-btn,.form-container #classroomForm .submit-btn {
        position:relative;
        margin-bottom: 20px;
    }
    .form-container #teacherForm .submit-btn button,.form-container #topicForm .submit-btn button,.form-container #classroomForm .submit-btn button {
        margin-top: 0;
        position:absolute;
        right:38px;
        transition: all ease 300ms;
        background-color: #0083c5ca;
        border: none;
        color: white;
        padding: 5px 8px;
    }
    .container{
        position: relative;
    }
    .container .form-buttons button:hover{
        background-color: #0083c5;
    }
    .container .form-buttons button{
        max-width:150px;
        transition: all ease 300ms;
        background-color: #0083c5ca;
        border:none;
        color:white;
        padding:5px 8px;
    }
    .container .managa-header{
        position:fixed;
        top:0;
        z-index: 2;
        background-color: #0056b3;
        width:100%;
    }
    .container .form-buttons{
        position: fixed;
        left: 10px;
        display: flex;
        flex-direction: column;
        row-gap: 10px;
        width: 182px;
        background-color: #f2f2f2;
        padding:20px;
    }
  </style>
  <script>
    function showFormContent(formId) {
      // Hide all form contents
      var formContents = document.getElementsByClassName('form-content');
      for (var i = 0; i < formContents.length; i++) {
        formContents[i].classList.remove('active');
      }
      
      // Show the selected form content
      var selectedFormContent = document.getElementById(formId);
      selectedFormContent.classList.add('active');
    }
  </script>
</head>
<body>
    <div class="container">
        <div class="managa-header">
            <?php require_once 'C:\PHP\htdocs\projet cahier de texte en ligne\components\header.php' ?>
        </div>
        <div class="form-buttons">
          <button onclick="showFormContent('teacherForm')">Add Teacher</button>
          <button onclick="showFormContent('topicForm')">Add New Topic</button>
          <button onclick="showFormContent('classroomForm')">Add New Classroom</button>
        </div>
    </div>
  <div class="form-container">
    
    <div id="teacherForm" class="form-content active">
      <form action="process_teacher.php" method="post">
        
        <label for="specialityId">Speciality ID:</label>
        <input type="text" id="specialityId" name="specialityId" placeholder="Enter speciality ID" required>
        
        <label for="gradeId">Grade ID:</label>
        <input type="text" id="gradeId" name="gradeId" placeholder="Enter grade ID" required>
        
        <label for="sexId">Sex ID:</label>
        <input type="text" id="sexId" name="sexId" placeholder="Enter sex ID" required>
        
        <label for="speciality">Speciality:</label>
        <input type="text" id="speciality" name="speciality" placeholder="Enter speciality" required>
        
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" placeholder="Enter first name" required>
        
        <label for="contact">Contact:</label>
        <input type="text" id="contact" name="contact" placeholder="Enter contact" required>
        
        <label for="accountNumber">Account Number:</label>
        <input type="text" id="accountNumber" name="accountNumber" placeholder="Enter account number" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter password" required>
        
        <label for="roleId">Role ID:</label>
        <input type="text" id="roleId" name="roleId" placeholder="Enter role ID" required>
        
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Enter username" required>
        <div class="submit-btn">
            <button type="submit">Add Teacher</button>
        </div>
      </form>
    </div>
    
    <div id="topicForm" class="form-content">
      <form action="process_topic.php" method="post">
        <label for="topicName">Topic Name:</label>
        <input type="text" id="topicName" name="topicName" placeholder="Enter topic name" required>
        
        <label for="topicHours">Topic Hours:</label>
        <input type="text" id="topicHours" name="topicHours" placeholder="Enter topic hours" required>
        
        <label for="topicCredits">Topic Credits:</label>
        <input type="text" id="topicCredits" name="topicCredits" placeholder="Enter topic credits" required>

        <div class="submit-btn">
            <button type="submit">Add Topic</button>
        </div>
      </form>
    </div>
    
    <div id="classroomForm" class="form-content">
      <form action="process_classroom.php" method="post">
        <label for="speciality">Speciality:</label>
        <input type="text" id="speciality" name="speciality" placeholder="Enter speciality" required>
        <div class="submit-btn">
            <button type="submit">Add Classroom</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>