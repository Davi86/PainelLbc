<meta http-equiv "Content-type" content "text/html; charset iso-8859-1" />
<?php 

function mask($val, $mask)
{
 $maskared = '';
 $k = 0;
 for($i = 0; $i<=strlen($mask)-1; $i++)
 {
   if($mask[$i] == '#')
   {
      if(isset($val[$k]))
       $maskared .= $val[$k++];
   }
   else
 {
     if(isset($mask[$i]))
     $maskared .= $mask[$i];
     }
 }
 return $maskared;
}

?>

/* <?php
$cnpj = "11222333000199";
$cpf = "00100200300";
$cep = "08665110";
$data = "10102010";

echo mask($cnpj,'##.###.###/####-##'),'<BR>';
echo mask($cpf,'###.###.###-##'),'<BR>';
echo mask($cep,'#####-###'),'<BR>';
echo mask($data,'##/##/####'),'<BR>';

 

$cnpj = '17804682000198';
echo Mask("##.###.###/####-##",$cnpj).'<BR>';

$cpf = '21450479480';
echo Mask("###.###.###-##",$cpf).'<BR>';

$cep = '36970000';
echo Mask("#####-###",$cep).'<BR>';

$telefone = '3391922727';
echo Mask("(##)####-####",$telefone).'<BR>';

$data = '21072014';
echo Mask("##/##/####",$data);
*/