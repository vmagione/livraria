<!doctype html>
<?php
include 'conection.php';
 if(is_numeric($_GET["user"])){
        $result = mysqli_query($conn, "SELECT * FROM usuario WHERE `usuario`.`ID` =" .$_GET["user"]);
        $row = mysqli_fetch_array($result);
        $result2 = mysqli_query($conn, "SELECT * FROM contato WHERE `contato`.`ID` =" .$row["ID_CONTATO"]);
        $row2 = mysqli_fetch_array($result2);
        $result3 = mysqli_query($conn, "SELECT * FROM endereco WHERE `endereco`.`ID` =" .$row["ID_ENDERECO"]);
        $row3 = mysqli_fetch_array($result3);
?>
<?php
    function imprimir(){
    include 'conection.php';
 $result = mysqli_query($conn, "SELECT * FROM usuario");

 echo  '<ul class="list-group">
  <li class="list-group-item"><div class="col-sm-3">Nome</div><div class="col-sm-3">ID</div><div class="col-sm-3">Editar</div><div class="col-sm-3">Excluir</div>
  </li>';

if($result === FALSE) { 
    mysql_error();
}
else {
    // as of php 5.4 mysqli_result implements Traversable, so you can use it with foreach
    foreach( $result as $row ) {
        
        echo 
  "<li class='list-group-item'><div class='col-sm-3'>" .$row['NOME']. "</div><div class='col-sm-3'>" .$row['ID']. "</div>
  <div class='col-sm-3'><a href='edit_usuario.php?id= + " .$row['ID']. "'><span class='glyphicon glyphicon-edit'></span></a></div><div class='col-sm-3'><a href='excluir.php?id= + " .$row['ID']. "'><span style='color: #FD0004' class='glyphicon glyphicon-remove'></span></a></div></li>";
    }
}
echo "</ul>";
    }
      ?>     
<html>
<?php if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();    
} 
include "cart-number.php";?>
<html>
    <head>
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="js/paginacao.js" type="text/javascript"></script>
                <link href="css/slidebar.css" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
        <!-- Bootstrap -->
        <link href="bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet">


        <title>Livraria Infinite</title>
    </head>
    <body>
        <?php if(isset($_SESSION['LVL'])){if($_SESSION['LVL']==1){
        }else{
            header('location:error404.php');
        }
        }else{
            header('location:error404.php');
        }
        ?>
        <nav class="navbar navbar-inverse">
<div class="navbar-header" id="corpo1">
            <a class="navbar-brand" href="#"><img  src="images/globalheader_logo.png" alt="Livraria infinite"> </a>
    </div>
<div class="container-fluid">

    
    <div id="corpo2"><ul class="nav navbar-nav navbar-right"><?php if (!isset($_SESSION['login'])){ ?>
        <li><button class="btn btn-link" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Login</button></li>
        <li><form action="cadastro_cliente.php"><input type="submit" class="btn btn-link" on-click="location.href='cadastro_cliente.php'" value="Registre-se"> </form></li>
<?php }else{?>
        
        <li><label class="btn btn-link" data-toggle="modal" data-target="#myModal"> Olá <?php echo($_SESSION['login']); ?>!</label></li>
        <li><form action="index.php"><a type="submit" class="btn btn-link" href="index.php?id=2">Sair</a> </form></li>
<?php }?>
        <script>
            
                <?php
                   if(is_numeric($_GET["id"])){
                        session_destroy();
                        header('location:index.php');
                    }
                  
                ?>
            
        </script>        
        
        

      </ul></div>
</div>
  <div class="container-fluid" id="corpo2">
    
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Pagina Inicial</a></li>
        <li><a href="#">Sobre</a></li>
        <li><a href="#">Suporte</a></li>
      </ul>

    </div>
  </div>
</nav>
<nav class="navbar navbar-default" role="navigation" id="cabecalho">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
</div>

  <div class="collapse navbar-collapse navbar-ex1-collapse" >
    <ul class="nav navbar-nav">
        
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Categorias<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Ação</a></li>
            <li><a href="#">Aventura</a></li>
            <li><a href="#">Humor</a></li>
            <li><a href="#">Romance</a></li>
          </ul>
      </li>
          <li><a href="#">Outros produtos</a></li>
    </ul>
    <form class="navbar-form navbar-left" role="search" action="search_livro.php" method="GET">
        <div class="form-group has-feedback has-feedback-left">
        <input type="text" class="form-control" placeholder="Procure aqui" name="livro" size ="40">
        <a href="#"><i class="form-control-feedback glyphicon glyphicon-search"></i></a>
        </div>
        <button type="submit" class="btn btn-default">Procurar</button>
    </form>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#">WishList</a></li>
      <li><a href="compra.php">
        <span class="glyphicon glyphicon-shopping-cart" style="color:#000">
            <?php
                if($quant != 0){
                    echo"<span class='rw-number-notification'>" .$quant. "</span>";
                }
            ?>
            </span>
      </a></li>
            <li><a href="lista_compras.php">Histórico de Compras</a></li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Login</h4>
        </div>
        
        <div class="modal-body">
        <form class="navbar-form navbar-left" role="form" method="post" action="ope.php">
          <label>E-mail: </label><input type="email" name="login" class="form-control" placeholder="Email"><br>
          <label>Senha: </label><input type="password" name="senha" class="form-control" placeholder="Senha"><br>
          <a href="#" style="align-self:center"> Esqueci minha senha</a>
          <p>Caso ainda não é cliente <a href="cadastro_cliente.php" style="align-self:center"> Clique aqui</a> e cadastre-se
          <br><br>
          <button type="submit" class="btn btn-default">Entrar</button>
          <button type="button" class="btn btn-default">Cancelar</button>
        </form>  
        </div>
        <div class="modal-footer">
          
          </div>
          
        </div>

      </div>
      
    </div>
  <?php if($_SESSION['LVL'] == 1){
?>
        <div id="wrapper" class="toggle">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="index.php">
                        Pagina Principal
                    </a>
                </li>
                <li>
                    <a href="cadastro_livro.php">Cadastrar Livro</a>
                </li>
                <li>
                    <a href="listar_livro.php">Listar Livro</a>
                </li>
                <li>
                    <a href="cadastro_editora.php">Cadastrar editora</a>
                </li>
                <li>
                    <a href="listar_cliente.php">Listar Cliente</a>
                </li>
                <li>
                    <a href="exec.php">Alterar Carrousel</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <!-- /#page-content-wrapper -->

    <div id="page-content-wrapper">

<?php } ?>

    
    
    

<h1 class="text-primary">Editar Cliente</h1>
<form class="form-horizontal" role="form" action="update_usuario.php" method="post">
<fieldset>
<legend>Dados Pessoais</legend>
  <div class="form-group">
    <label class="control-label col-sm-2" for="nome">Nome:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" name="name" value=<?php echo $row["NOME"] ?>>
    </div>
    <div class="form-inline">
    <label class="control-label col-sm-2" for="pwd">Sobrenome:</label>
    <div class="col-sm-3"> 
      <input type="text" class="form-control" name="sobrenome" value=<?php echo $row["SOBRENOME"] ?>>
    </div>
  </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-3"> 
      <input type="email" class="form-control" name="email" value=<?php echo $row2["EMAIL"] ?>>
    </div>
    <div class="form-inline">
    <label class="control-label col-sm-2" for="pwd">CPF:</label>
    <div class="col-sm-3"> 
      <input type="text" class="form-control" name="CPF" value=<?php echo $row["CPF"] ?>>
    </div>
  </div>
    </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Senha:</label>
    <div class="col-sm-3"> 
      <input type="password" class="form-control" name="pwd" placeholder="Digite uma senha">
    </div>
    <div class="form-inline">
    <label class="control-label col-sm-2" for="pwd">RG:</label>
    <div class="col-sm-3"> 
      <input type="text" class="form-control" name="RG" value=<?php echo $row["RG"] ?>>
    </div>
  </div>
   </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Confirmar Senha:</label>
    <div class="col-sm-3"> 
      <input type="password" class="form-control" name="ppwd" placeholder="Digite sua senha novamente">
    </div>
    <div class="form-inline">
    <label class="control-label col-sm-2" for="pwd">Sexo:</label>
    <div class="col-sm-3"> 
     <select class="form-control" name = "sexo">
        <option value="MG">M</option>
        <option value="SP">F</option>
        </select>
  	</div>
   </div> 
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Telefone:</label>
    <div class="col-sm-3"> 
        <input type="tel" class="form-control" name="telefone" value=<?php echo $row2["TELEFONE"] ?>>
    </div>
    <div class="form-inline">
    <label class="control-label col-sm-2" for="pwd">Celular:</label>
    <div class="col-sm-3"> 
        <input type="tel" class="form-control" name="celular" value=<?php echo $row2["TELEFONE2"] ?>>
  </div>
  </div>
  </div>
  </fieldset>
  <fieldset>
<legend>Endereço</legend>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Bairro:</label>
    <div class="col-sm-3"> 
      <input type="text" class="form-control" name="bairro" value=<?php echo $row3["BAIRRO"] ?>>
    </div>
    <div class="form-inline">
    <label class="control-label col-sm-2" for="pwd">CEP:</label>
    <div class="col-sm-3"> 
      <input type="text" class="form-control" name="CEP" value=<?php echo $row3["CEP"] ?>>
    </div>
  </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Numero:</label>
    <div class="col-sm-3"> 
      <input type="number" class="form-control" name="Numero" value=<?php echo $row3["numero"] ?>>
    </div>
<div class="form-inline">
    <label class="control-label col-sm-2" for="pwd">Avenida:</label>
    <div class="col-sm-3"> 
      <input type="text" class="form-control" name="rua" value=<?php echo $row3["RUA"] ?>>
    </div>
  </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Cidade:</label>
    <div class="col-sm-3"> 
      <input type="text" class="form-control" name="cidade" value=<?php echo $row3["CIDADE"] ?>>
    </div>
    
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Estado:</label>
    <div class="col-sm-3"> 
      <select class="form-control" name="estado">
        <option value="MG">Minas Gerais</option>
        <option value="SP">São Paulo</option>
        <option value="RJ">Rio de Janeiro</option>
        <option value="AC">Acre</option>
      </select>
    </div>
  </div>
  </div>
  </fieldset>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      
      	<button type="clear" class="btn btn-default">Limpar Campos</button>
      <div class="col-sm-7">
      <button type="submit" class="btn btn-default">Enviar</button>
        </div>
    </div>
  </div>
</form>

<?php if($_SESSION['LVL'] == 1){
?>
        </div></div>
    
<?php } ?>
<script>
    $(function(){
       $('subscribe-email-form').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                url: "/notifications/subscribe/",
                type: "POST",
                data: $("subscribe-email-form").serialize(),
                success: function(data){
                    alert("Successfully submitted.")
                }
            });
       }); 
    });
        $('#cabecalho').scrollToFixed();
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>
</html>
 <?php }  ?>