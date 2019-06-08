<?php
   $mysqli  = new mysqli("localhost", "root", "", "pw2");
   
   //verificar connect com o mysql
   if ($mysqli == false) 
   {
       die ("ERROR: Could not connect. " . $mysqli_connect_error);
   }

   // if para ir buscar os dados necessarios (primeiro nome, ultimo nome e ano de nascimento)
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

    global $mysqli_result;
   
    $sql= "SELECT * FROM pessoas";
    
    $mysq = $mysqli -> query($sql);

   
   //Fechar connect com o sql para entrar com o html (estilo e tabelas)
   
   $mysqli->close();
   ?>
<html>
  <!--TITULO E ESTILOS DA TABLE !-->
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
       <!--FORMULARIO PARA O CLIENTE CONSEGUIR INSERIR OS DADOS!-->
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
            while ($listaPessoas = mysqli_fetch_assoc($mysqli_result))
            {
                echo "<tr>";
                    echo "<td>";
                        echo $listaPessoas['id'];
                    echo "</td>";
                    echo "<td>";
                        echo $listaPessoas['PrimeiroNome'];
                    echo "</td>";
                    echo "<td>";
                        echo $listaPessoas['UltimoNome'];
                    echo "</td>";
                    echo "<td>";
                        echo $listaPessoas['AnoDeNascimento'];
                    echo "</td>";
                    echo "<td>";
                        echo "<span class='input-group-addon'><a href='TPPI.php?delete=".$listaPessoas['id']."'class='glyphicon glyphicon-trash'></a></span>";
                    echo "</td>";
                echo "</tr>";
            }
            ?>
      </table>
   </body>
</html>

