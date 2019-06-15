<?php

//************ (POST)transportar variáveis/Guarda os campos preenchidos pelo html;
//************ (GET)Recebe variáveis atraves do URL(link do browser; a seguir ao ? declara as variaveis).

if (isset($_POST['Inserir'])) {
    InserirDados();
}
if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    Eliminar($id);
}
if (isset($_POST['Pesquisar'])) {
    $Pesquisa = $_POST['Pesquisar'];
    $sqlResult = "SELECT * FROM `pessoas` WHERE CONCAT(`id`, `UltimoNome`, `AnoDeNascimento`, `PrimeiroNome`) LIKE'%".$Pesquisa."%'";
   // $sqlResult = "SELECT * FROM pessoas WHERE PrimeiroNome = 'joao'";
    $resultado_pesquisa = FiltrarPesquisa($sqlResult);
}
else {
    $sqlResult = "SELECT * FROM pessoas";
    $resultado_pesquisa = FiltrarPesquisa($sqlResult);
}

//Ligação á base de dados ($link) se a ligação nao for conectada com exito da "erro".
function Ligar()
{
    $link = mysqli_connect("localhost", "root", "", "pw2");
    
    if ($link === false) {
        die("ERRO: Não foi possivel estabelecer a coneção à Base de dados. " . mysqli_connect_error());
    }
    
    return $link;
}

//Fecha a ligação á base de dados (que em cada função temos sempre de abrir, criar a função e depois fechar a ligação á base de dados).
function Desligar()
{
    $link = Ligar();
    mysqli_close($link);
}

// Vai apresentar apenas os dados inseridos na pesquisa
function FiltrarPesquisa($sqlResult)
{
    $link = Ligar();
      
      $filtro_resultado = mysqli_query($link, $sqlResult);
      return $filtro_resultado;
    
    Desligar();
}

function Eliminar($id)
{
    $link = Ligar();
    
    $sql = "DELETE FROM pessoas WHERE id=" . $id;
    
    if (mysqli_query($link, $sql)) {
        echo "Eliminado!";
        //Listar();
    } else {
        echo "Erro ao eliminar";
    }
    Desligar();
}

function InserirDados()
{
    $link = Ligar();
    
    $PrimeiroNome    = mysqli_real_escape_string($link, $_POST['PrimeiroNome']);
    $UltimoNome      = mysqli_real_escape_string($link, $_POST['UltimoNome']);
    $AnoDeNascimento = mysqli_real_escape_string($link, $_POST['AnoDeNascimento']);
    
    $recebeQuery = "INSERT INTO pessoas (PrimeiroNome, UltimoNome, AnoDeNascimento) VALUES('$PrimeiroNome','$UltimoNome','$AnoDeNascimento')";
    if (mysqli_query($link, $recebeQuery)) {
        echo "";
    } else {
        echo "Erro ao adicionar";
    }
    
    Desligar();
}


?>

<!--ACABA AS FUNÇÕES, ENTRA A PARTA DA TABELA DATABASE E DO BOOTSTRAP DO FORM !-->

<html>
<head>
      <title>Trabalho Prático II</title>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="main.css">
   </head>

   <body>

       <!--FORMULARIO PARA O CLIENTE CONSEGUIR INSERIR OS DADOS!-->
    
      <form action="luso.php" method="post" class="main-form needs-validation" novalidate>
         <div class="row">
            <div class="col">
               <div class="form-group">
                  <label for="PrimeiroNome">Primeiro Nome</label>
                  <input type ="text" name="PrimeiroNome" id="PrimeiroNome" class="form-control" required>
                  <small class="form-text text-muted">Introduza o seu Primeiro Nome!</small>
               </div>
            </div>
            <div class="col">
               <div class="form-group">
                  <label for="UltimoNome">Ultimo Nome</label>
                  <input type="text" name="UltimoNome" id="UltimoNome" class="form-control" required>
                  <small class="form-text text-muted">
                  Este deve ser seu Último Nome.
                  </small>
               </div>
            </div>
         </div>
         <div class="form-group">
            <label for="AnoDeNascimento">Data de Nascimento</label>
            <input type="text" name="AnoDeNascimento" id="AnoDeNascimento" class="form-control" maxlength="4" required>
         </div>
         <button type="submit" class="btn btn-outline-success" value="Submmit" name="Inserir">Submit</button>
      </form>

      <form action="luso.php" method="post">
         <label for="Pesquisa">Pesquisa :</label>
         <input type="text" name="Pesquisar" class="form-control"><br>
         <button type="submit" class="btn btn-outline-success" value="Submmit" name="pesquisa">Submit</button>
      </form>

      <!-- JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
         crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" 
         crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" 
         crossorigin="anonymous"></script>
      <script>

         //Função criada para apenas vaildar os campos quando tem algo inserido.
         var form = document.querySelector('.needs-validation');
         
         form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
         })
      </script>
      <br>

      <!--cria tabela !-->

      <table class="table table-hover">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Primeiro Nome</th>
          <th scope="col">Último Nome</th>
          <th scope="col">Ano De Nascimento</th>
          <th scope="col">Eliminar</th>
          <th scope="col">Alterar</th>
        </tr>
      </thead>

         <!-- mostrar dados inseridos na database !-->

         <?php
while ($listaPessoas = mysqli_fetch_assoc($resultado_pesquisa)) {
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
    echo "<span class='input-group-addon'><a href='luso.php?eliminar=" . $listaPessoas['id'] . "'>Eliminar</a></span>";
    echo "</td>";
    echo "<td>";
    echo "<span class='input-group-addon'><a href='FormAlterar.php?id=" . $listaPessoas['id'] . "'>Alterar</a></span>";
    echo "</td>";
    echo "</tr>";
}
?>
     </table>
   </body>
</html>

