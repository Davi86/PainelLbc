<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
<script src="css/jquery-1.11.3.min.js"></script>
<script src="css/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>
<form method="post" action="demoform.asp">

<div data-role="page">
   <a href="#" class="ui-btn ui-corner-all ui-shadow ui-icon-home ui-btn-icon-left ">Portal Intrainfra</a>
  <h2 align=center>Checkup Data Center</h2>

   <div data-role="header">

   <div class="ui-field-contain">
    <label for="datacenter">Data Center:</label>
    <select id="datacenter" name="datacenter" width="300" style="width: 300px"">
      <optgroup label="Matriz" width="40">
      <option value="principal">Principal</option>
      <option value="replica">Replica</option>
      <option value="dg">DG</option>
      <optgroup label="Martinho Campo">
      <option value="principal">Principal</option>
      <optgroup label="Bom Despacho">
      <option value="principal">Principal</option>
      <optgroup label="Sul">
      <option value="principal">Principal</option>
    </select>
  </div>

  <div class="ui-field-contain">
    <input type="datetime-local" name="csrv_data" id="date" value="">
  </div>

  <div class="ui-field-contain">
    <input type="text" name="csrv_tecnico" id="fname" placeholder="Técnico..." data-clear-btn="true">
 </div>

 <div class="ui-field-contain">
<table>
<tr><td width="200">

     Servidores:</td><td>
    <input type="checkbox" data-role="flipswitch" name="csrv_srv" id="csrv_srv"></label><br>
</td></tr>
<tr><td>
     Storage:</td><td>
    <input type="checkbox" data-role="flipswitch" name="csrv_storage" id="csrv_storage"></label><br>
</td></tr>
<tr><td>
     Link´s:</td><td>
    <input type="checkbox" data-role="flipswitch" name="csrv_link" id="csrv_link"></label>
  </div>
</td></tr>
<tr><td>
     Backup:</td><td>
    <input type="checkbox" data-role="flipswitch" name="csrv_backup" id="csrv_backup"></label>
  </div>
</td></tr>
<tr><td>
     Temperatura:</td><td>
    <input type="checkbox" data-role="flipswitch" name="csrv_temp_ar" id="csrv_temp_ar"></label>
  </div>
</td></tr>
</table>
 </div>

 <div class="ui-field-contain">
    <label for="status">Status:</label>
    <select id="status" name="status" width="300" style="width: 300px"">
      <option value="ok">OK</option>
      <option value="Alerta">Alerta</option>
    </select>
  </div>

  <div class="ui-field-contain">
   <legend>Observação:</legend>
   <label for="mov1">Normal</label>
   <input type="checkbox" name="mov1" id="mov1">
   <label for="mov2">Alerta</label>
   <input type="checkbox" name="mov2" id="mov2">
   <label for="mov3">Regular</label>
   <input type="checkbox" name="mov3" id="mov3">
  </div>

 <div class="ui-field-contain">
    <input type="text" name="csrv_tecnico" id="fname" placeholder="Observação.." data-clear-btn="true">
 </div>

 <div class="ui-field-contain" align="center">
      <input type="submit" data-inline="true" value="Submit" widht=300>
 </div>



 

 <div data-role="footer">
    <h1 align=center>Intraestrutura</h1>
 </div>
  </div>
</div>
 </form>

</body>
</html>
t