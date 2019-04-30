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
      $novoAutor = new Autor ("Artur Reis", "a17552@alunos.ipca.pt". "<br>");
      $novoAutor -> echoData();
      

      class Livro
      {
        public $name;
        public $listaAutores;
        public $preço;
        public function __construct($name, $listaAutores, $preço)
          {
              $this -> name = $name;
              $this -> listaAutores = $listaAutores;
              $this -> preço = $preço;
          }
           
            public function GetNome()
            {
             return $this -> name;
            }
            public function GetAutores()
            {
             return $this -> listaAutores;
            }
            public function GetNomeAutores()
            {
             return $this -> nomes ;
            }

        public function echoData()
          {
              echo "o nome do livro é {$this -> name} os autores são {$this -> listaAutores} e o preço é {$this -> preço}";
          }
      }

      $autor1 = new Autor("Felisberto", "123@gmail.com");
      $autor2 = new Autor("António", "456@gmail.com");

      // PERCORRER O ARRAY 
      $nomes;
      foreach ($autor1 in $autor2)
      {
        $nomes = $autor1 . $autor2 -> nome . ", ";
      }


      $novoLivro = new Livro ("A Fuga Do Paralitico, ", array($autor1, $autor2) , "25€");
      $novoLivro -> echoData();

     /*
     $nomes;
     foreach ($autor in $autores){
         $nome = $nome. $autor -> nome . " , ";
     }
     */
         
      
    ?>
  </body>	
</html>
