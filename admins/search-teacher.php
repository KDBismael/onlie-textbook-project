<?php
    session_start();
    if (!isset($_SESSION['role']) || $_SESSION['role']!=='admin') {
        header("Location: ../connexion.php");
        exit();
    }
?>
<?php
    include '../helpers/db_connect.php';
    include '../helpers/util_func.php';
    $db= new db();
    $conn=$db->connect();
    $stmt = $conn->prepare("SELECT * FROM tbooks");
    $stmt->execute();
    $data;
    $text;
    $rowCount = $stmt->rowCount();
    if ($rowCount > 0) {
        $data= $stmt->fetchAll();
    } else {
        exit("<h1 style='text-align:center;margin-top:60px;'>Pas de cours enregistré</h1>");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 style="text-align:center;" >voici votre <span style="color: #0083c5;" >cachier de text</span></h1>
    <div class="filters" >
        <button onclick="showFilterInput()">Filter par nom</button>
        <button onclick="showFilterInput()">Filter par classe</button>
        <button onclick="showFilterInput()">Filter par matiere</button>
        <div id="filterContainer" style="display: none; margin-left: 20px;">
        <input type="text" id="filterInput" >
        <button onclick="filterTable()">Filter</button>
        </div>
    </div>
    <table id='dataTable'>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Matiere</th>
                <th>Date</th>
                <th>Heure de début</th>
                <th>Heure de fin</th>
                <th>Classe</th>
                <th>Notes du cours</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row): ?>
                <tr onclick="openModal(<?php echo htmlentities($row['course_note']); ?>+'')">
                    <td><?php echo $row['nom']; ?></td>
                    <td><?php echo $row['prenom']; ?></td>
                    <td><?php echo $row['UE']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['debutCours']; ?></td>
                    <td><?php echo $row['finCours']; ?></td>
                    <td><?php echo $row['classe']; ?></td>
                    <td><?php echo util::truncateText(json_decode($row['course_note']),5);?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p style="display: none; text-align:center; font-size:40px; font-weight: bolder; " id='not-course'>Pas de cours trouvé</p>
    <!-- Modal Popup -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <!-- text in p tag -->
            <p class='content-copybook'></p>
        </div>
    </div>
    <script>
        var modal = document.getElementById('myModal');
        var notCourse = document.getElementById('not-course');
        var btn = document.querySelector('button');
        var closeBtn = document.getElementsByClassName('close')[0];
        var copyBook = document.getElementsByClassName('content-copybook')[0];
        function openModal(data) {
            modal.style.display = 'block';
            copyBook.innerHTML=data;
            console.log(data)
        }
        function closeModal() {
            copyBook.innerHTML='';
            modal.style.display = 'none';
        }
        function filterTable() {
            var input = document.getElementById('filterInput');
            var table = document.getElementById('dataTable');
            var rows = table.getElementsByTagName('tr');
            var isEmpty=true;
            for (var i = 1; i < rows.length; i++) {
                var rowData = rows[i].getElementsByTagName('td');
                var display = false;
                for (var j = 0; j < rowData.length; j++) {
                    if (rowData[j].innerHTML.toLowerCase().indexOf(input.value.toLowerCase()) > -1) {
                        display = true;
                        isEmpty=false;
                        break;
                    }
                }
                rows[i].style.display = display ? '' : 'none';

            }
            if(isEmpty){
                notCourse.style.display= 'block';
            }else{
                notCourse.style.display='none'
            }
        }
        function showFilterInput() {
            var filterContainer = document.getElementById('filterContainer');
            filterContainer.style.display = 'inline-block';
        }
        function hideFilterInput() {
            var filterContainer = document.getElementById('filterContainer');
            filterContainer.style.display = 'none';
        }
        window.onclick = function(event) {
            if (event.target === modal) {
                closeModal();
            }
        };
        
    </script>        
</body>
</html>

<style>
    .filters{
        margin: 20px 0;
    }
    .filters button:hover{
        background-color: #0083c5ca;
    }
    .filters button{
        background-color: #0083c5;
        padding: 5px 10px;
        border-radius: 5px;
        color: white;
        border: none;
    }
    table {
        border-collapse: collapse;
        width: 100%;
    }
    
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
    }
    
    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }
    
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    tr:hover {
        background-color: #fcfffa;
    }
     /* Style for the modal popup */
     .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
    }
    
    /* Style for the modal content */
    .modal-content {
        background-color: #fefefe;
        margin: 10% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-height: 70vh;
        overflow-y: auto;
    }
    
    /* Style for the close button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }
    
    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>