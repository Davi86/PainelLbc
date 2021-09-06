<?php 
  date_default_timezone_set("Brazil/East");
  require_once('conecta_mysql.pdo.php');
  $ssql = "select count(1) qtd from DADOS";
  $Tqtd = $mybd->query($ssql);
  $linha = $Tqtd->fetch(PDO::FETCH_ASSOC);  
  $total_registros = $linha['qtd'];
  $qnt=10;
  $pags = ceil($total_registros/$qnt);
  $inicio=0;
  if (empty($_GET['pagtual']))
			{
				$pagtual = 0;
			}
		else 
		{
			$pagtual = $_GET['pagtual'];
		}
  if (empty($_GET['pagtotal']))
			{
				$pagtotal = 0;
			}	
			  else 
			  {
			  	$pagtotal = $_GET['pagtotal'];
			  }
	if (empty($_GET['reg']))
			{
				$inicio = 0;
			}	
			  else 
			  {
			  	$inicio = $_GET['reg'];
			  }		
	if ($pags != $pagtotal)
	{
		$pagtotal = $pags;
		$inicio = 0;
		$pagtual = 1;
		
	} else
    if ( $pagtual < $pagtotal)			  
    {
    	$pagtual++;
    	$inicio = $inicio + $qnt;
    }  else {
    	$pagtotal = $pags;
		$inicio = 0;
		$pagtual = 1;
    }


 ?>
<!DOCTYPE HTML>

<html lang="pt-br">
<head>
<title>Painel LaborClinica </title>
 <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
echo "<meta HTTP-EQUIV='refresh' CONTENT='5;index.php?pagtual=".$pagtual."&pagtotal=".$pagtotal."&reg=".$inicio."'>";
?>

<link href="../css/form.css" rel="stylesheet" type="text/css" />


<style type="text/css">
.auto-style1 {
	font-size: small;
	text-align: left;
}
.auto-style3 {
	font-size: small;
	text-align: left;
}
.auto-style4 {
	font-size: large;
	font-weight: bold;
}
.auto-style5 {
	font-size: medium;
}
</style>

</head>

<body>
	<header>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4">
					<img src="img/logo.bmp" class="img-fluid" alt="Responsive image">
				</div>	
				<div class="col-sm-8 text-left">
					<h1>Painel Área Técnica</h1>
				</div>
			</div>		
	</div>
	</header>


<div class="table-responsive">
  <table class="table">
      <thead>
        <thead>
      <tr>
        <th>O.S</th>
        <th>NOME DO CLIENTE</th>
        <th>MNEM&Ocirc;NICO</th>
		<th>DATA COLETA</th>
		<th>DATA RESULTADO</th>
		<th>Minutos Faltantes</th>
		<th>Setor</th>
      </tr>
    </thead>
    <tbody>
   <?php
   $tocar ='N';
     //$mybd->prepare("SELECT *,case when SMM_DT_RESULT < now() then -1 else  CEILING(timestampdiff(SECOND,NOW(),SMM_DT_RESULT)/60) end  tt FROM dados LIMIT $inicio, $qnt");
	$consulta = $mybd->prepare("SELECT OSM_SERIE, OSM_NUM
,PAC_NOME
,SMM_COD 
,SMM_DTHR_COLETA
,SMM_DT_RESULT
,case when SMM_DT_RESULT < now() then -1 else CEILING(TIME_TO_SEC(timediff(SMM_DT_RESULT,now())) / 60) 	 end tmp
,SETOR
 FROM dados LIMIT $inicio, $qnt");
	$consulta->execute();
	while($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
		//obtendo Cor da linha
		$ssql = "select max(Cor_Fundo) Fundo, max(Cor_Fonte) Fonte from configuracao_cores where ".$linha["tmp"]." BETWEEN Inicio and fim";
		$TCor = $mybd->query($ssql);
		$linhaCor = $TCor->fetch(PDO::FETCH_ASSOC);  
		if (!empty ($linhaCor))
		{
				
			$fundo = $linhaCor["Fundo"]; 
			$fonte = $linhaCor["Fonte"]; 
		} else {$fundo = "N";}
		if (($linha['tmp']>= 2 && $linha['tmp'] <=15)  && $tocar =='N')
        {
        	$tocar = 'S';
        } 
		  
	?>
	  <tr  <?php 
	            // Verificando se encontrou cor
	            if ($fundo <> "N")
				{
					//atribundo cor a linha
                   echo 'style="background: '.$fundo.'; color: '.$fonte.';"';
				}
				   ?>
		><td><?php echo $linha['OSM_SERIE'].'.'.$linha['OSM_NUM']?></td>
	  <td><?php echo $linha['PAC_NOME']?></td>
	  <td><?php echo $linha['SMM_COD']?></td>
	  <td><?php echo date('d/m/Y H:i:s',strtotime($linha['SMM_DTHR_COLETA']));
	  ?></td>
	  <td><?php echo date('d/m/Y H:i:s',strtotime($linha['SMM_DT_RESULT']))?></td>
	    <td><?php echo $linha['tmp']?></td>
	  <td><?php echo $linha['SETOR']?></td>
	  </tr>
	  
				
		
		<?php
	}
	?>
   
    </tbody>
  </table>
  <br/>

  <div class="container">
  	<div class="alert alert-info text-center">
        <?php echo "Pagina ".$pagtual." de ".$pagtotal;
		  if ($tocar == 'S')
           {
        ?>
             <embed src="dingdong.mp3" autostart="true"  volume="60" loop="false" width="1" height="1"></embed>
         <?php } ?>
    </div>
  </div>
</div>
   <footer class="navbar-default navbar-fixed-bottom">
  <div class="container-fluid">
    <span>Davi's Work</span> 
  </div>
</footer>
  </body>
</html>