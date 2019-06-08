<?php
    $mysqli  = new mysqli("localhost", "root", "", "pw2");

//check connection
    if ($mysqli == false) 
    {
        die ("ERROR: Could not connect. " . $mysqli_connect_error);
    }

    if (isset($_REQUEST['PrimeiroNome']))
    {
        $PrimeiroNome = mysqli_real_escape_string($mysqli, $_REQUEST['PrimeiroNome']);
        $UltimoNome = mysqli_real_escape_string($mysqli, $_REQUEST['UltimoNome']);
        $AnoDeNascimento = mysqli_real_escape_string($mysqli, $_REQUEST['AnoDeNascimento']);

        if (isset($_GET['eliminar'])){
            $id = $_GET['eliminar'];
            $sql="DELETE FROM pessoas WHERE id=".$id;
        }
         $sql = "INSERT INTO pessoas (PrimeiroNome, UltimoNome, AnoDeNascimento) Values ('$PrimeiroNome', '$UltimoNome', '$AnoDeNascimento')";
    
        if ($mysqli -> query($sql)===true)
            {
              echo "Records inserted successfully.";
            }
            else
            {
              echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
            }
    }
    
   

//Attempt insert query execution
  
       

    $sql= "SELECT * FROM pessoas";

    $listaPessoas = $mysqli -> query($sql);
    

//Close connection

$mysqli->close();
?>

<html>
    <title>Trabalho Prático II</title>
        <style type="text/css">
            table {
                border-collapse: collapse;
                width: 100%;
                color: #d96459;
                font-family: monospace;
                font-size: 25px;
                text-align: left;
             }
            th {
                background-color: #d96459;
                color: white;
            }
            tr:nth-child(even) {background-color: #f2f2f2}
            </style>
        
    <body>
        <form action="luso.php" method="post">
            <p>
                <label for="PrimeiroNome">Primeiro Nome</label>
                <input type ="text" name="PrimeiroNome" id="PrimeiroNome">
            </p>
            <p>
                <label for="UltimoNome">Ultimo Nome</label>
                <input type="text" name="UltimoNome" id="UltimoNome">
            </p>
            <p>
                <label for="AnoDeNascimento">Data de Nascimento</label>
                <input id="AnoDeNascimento" type="date" name="AnoDeNascimento">
            </p> 
            <input type="submit" value="Submmit">
        </form>

            <!--cria tabela !-->

        <table>
            <tr>
                <th>Primeiro Nome</th>
                <th>Ultimo Nome</th>
                <th>Ano De Nascimento</th>
                <th>Eliminar</th>
            </tr>  
        
            <!-- mostrar dados inseridos na database !-->

        <?php 
            if($listaPessoas-> num_rows > 0){
                 while($row = $listaPessoas-> fetch_assoc()){
                     $id = $row["eliminar"];
                    echo 
                    "<tr>
                        <td>" . $row["PrimeiroNome"] . "</td>
                        <td>" . $row["UltimoNome"] . "</td>
                        <td>" . $row["AnoDeNascimento"] . "</td>
                        <td>
                            <a href=""index.php?delete="<?php echo $id; ?>" onclick="return confirm('Are you sure?') ;">Delete</a>
                            
                     } 
                     echo "</table>";
                     }
                     else {
                        echo "0 ListaPessoas";
                     }
         ?>

         <!-- inserir o eleminar !-->

         
        
         
         

</table>
 </body>
</html>

