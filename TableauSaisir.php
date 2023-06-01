<?php
  session_start();
  include './helpers/db_connect.php';
  if (!isset($_SESSION['role']) || $_SESSION['role']!=='teacher') {
    header("Location: ./connexion.php");
    exit();
  }
  $db=new db();
  $conn=$db->connect()
?>
<?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $UE = $_POST['ue'];
    $date = $_POST['date'];
    $debutCours = $_POST['debut'];
    $finCours = $_POST['fin'];
    $classe = $_POST['classe'];
    $course = json_encode($_POST['editorContent']);
    // $course = $_POST['saisir'];

    // var_dump($_POST['editorContent']);
    // Insert data into the table
    // $sql = "INSERT INTO tbooks (nom, prenom, UE, date, debutCours, finCours, classe, course_note) VALUES ('$nom', '$prenom', '$UE', '$date', '$debutCours', '$finCours', '$classe', '$course')";
    $sql = "INSERT INTO tbooks (nom, prenom, UE, date, debutCours, finCours, classe, course_note) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);$stmt->bindParam(1, $nom);
    $stmt->bindParam(2, $prenom);
    $stmt->bindParam(3, $UE);
    $stmt->bindParam(4, $date);
    $stmt->bindParam(5, $debutCours);
    $stmt->bindParam(6, $finCours);
    $stmt->bindParam(7, $classe);
    $stmt->bindParam(8, $course);
    try {
      // $conn->query($sql);
      $stmt->execute();
      $success=true;
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>saisir cours</title>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <!--le css du formulaire saisir des cours-->
    <style>
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
.saisir textarea{
  padding: 3px 6px;
  outline: none;
  border: 1px solid #ddd;
}
.saisir{
  display: flex;
  flex-direction: column;
  width: 98%;
  margin: 10px auto;
}
#editor{
  height: 250px;
  background-color: white;
}
/* Style général de la page */
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
  }
  
  /* Titre de la page */
  h1 {
    text-align: center;
    margin-top: 20px;
  }
  
  /* Style du tableau */
  table {
    margin: 20px auto;
    border-collapse: collapse;
    background-color: white;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  }
  
  table th,
  table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
  }
  
  table th {
    background-color: #f2f2f2;
  }
  
  /* Style des inputs */
  input[type="text"],
  select {
    font-size: 16px;
    padding: 8px;
    border-radius: 4px;
    border: 1px solid #ddd;
    width: 90%;
  }
  
  /* Style des boutons */
  .btn-group {
    margin: 20px auto;
    text-align: center;
    display: flex;
    justify-content: space-between;
    padding: 0 30px;
  }
  
  .btn-group button {
    background-color: rgba(0, 21, 255, 0.658);
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 4px;
  }
  
  .btn-group button:last-child {
    margin-right: 0;
    background-color: #f44336be;
  }
  
  .btn-group button:hover {
    opacity: 0.8;
  }
  .popup {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  }
  .modal {
    display: block;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
  }

  .modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 400px;
  }
</style>
  </head>
  <body>
    <h1>Saisir des enseignants</h1>
    <div class="teacher">
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table>
          <thead>
            <tr>
              <th>Nom</th>
              <th>Prénoms</th>
              <th>UE</th>
              <th>Date du jour</th>
              <th>Début de cours</th>
              <th>Fin de cours</th>
              <th>Classe</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><input type="text" name="nom" required></td>
              <td><input type="text" name="prenom" required></td>
              <td>
                <select name="ue" required>
                  <option value="" disabled selected>Choisissez l'UE</option>
                  <option value="db">Base de donne</option>
                  <option value="python">Programmation Python</option>
                  <option value="bweb">Base Webs</option>
                  <option value="IA">IA</option>
                  <option value="securite">Sécurité</option>
                </select>
              </td>
              <td><input style="border: none;" type="date" name="date" required></td>
              <td><input type="text" name="debut" required></td>
              <td><input type="text" name="fin" required></td>
              <td>
                <select name="classe" required>
                  <option value="" disabled selected>Choisissez la classe</option>
                  <option value="Master">Master 1 SIGL</option>
                  <option value="licence">Diplome License</option>
                  <option value="SRIT">SRIT 1-B</option>
                  <option value="licence">Licence 2</option>
                </select>
              </td>
            </tr>
          </tbody>
        </table>
        <div class="saisir">
          <label for="saisir">Remplissez le cahier de texte</label>
          <!-- <textarea required name="saisir" id="saisir" cols="30" rows="15"></textarea> -->
          <input type="hidden" name="editorContent" id="editorContent">
          <div id="editor"></div>
        </div>
        <div class="teacherList"></div>
        <div class="btn-group">
          <button type="submit">Enregistrer</button>
          <button type="reset" onclick="window.location.href='Menu.php'">Annuler</button>
        </div>
      </form>
    </div>

    <?php if (isset($success) && $success): ?>
      <div id="myModal" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <p>Cahier de texte remplit avec success!!</p>
        </div>
      </div>
    <?php endif; ?>
  </body>
  <!-- Include the Quill library -->
  
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
</html>
<script>
  var quill = new Quill('#editor', {
    theme: 'snow'
  });
  // Retrieve the editor content and set it to the hidden input field
  document.querySelector('form').addEventListener('submit', function() {
    var editorContent = document.querySelector('#editor .ql-editor').innerHTML;
    document.querySelector('#editorContent').value = editorContent;
  });
</script>
<script>
  var modal = document.getElementById("myModal");
  var closeBtn = modal.getElementsByClassName("close")[0];
  // When the user clicks outside the modal, close it
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  };
  // When the user clicks on the close button, close the modal
  closeBtn.onclick = function() {
      modal.style.display = "none";
  };
</script>