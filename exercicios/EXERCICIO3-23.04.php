<!DOCKTYPE HTML>
<html>
<head>
    <meta charset ="utf-8u">
    <title>PHP!!</title>
</head>
  <body>

	<?php
      class Autor
     {
          public $Name;
          public $Email;
          public function __construct($Name, $Email)
          {
             $this -> Name = $Name;
             $this -> Email = $Email;
          }
          public function echoData()
          {
             echo "O nome do Autor é {$this -> Name} and the email é {$this -> Email}";
          }
      }
      $novoAutor = new Autor ("Artur Reis", "a17552@alunos.ipca.pt");
      $novoAutor -> echoData();
    ?>
  </body>	
</html>