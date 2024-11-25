<html>
    <body>
      
        <TITLE> PRIMER PARCIAL EJERCICIO2</TITLE>
        <form action="Ejercicio2.php"  METHOD="POST" style=" width: 50vw; margin-left : 25vw;">
            <H2 style=" font-size:40px; text-align=center;">Division de Numeros<H2>
    
    <Hr>
            <Table Border="2" width="100%">
            <tr>
            <td width="40%">
            <H2>Primer Numero<H2>
    <select name="select1">
  <
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
  <option value="13">13</option>
  <option value="14">14</option>
  <option value="15">15</option>
  <option value="16">16</option>
  <option value="17">17</option>
  <option value="18">18</option>
  <option value="19">19</option>
  <option value="20">20</option>
  
</select>



<H2>Segundo Numero<H2>
<select name="select2">
  <
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
  <option value="13">13</option>
  <option value="14">14</option>
  <option value="15">15</option>
  <option value="16">16</option>
  <option value="17">17</option>
  <option value="18">18</option>
  <option value="19">19</option>
  <option value="20">20</option>
  
</select>
<br><br>

          </td>
            </tr>
            <tr>
            <td>
            
            <INPUT TYPE="SUBMIT" NAME="boton" VALUE="Operar">    


      <?php
          if(isset($_POST["boton"]))
          {
              $select1=$_REQUEST["select1"];
              $select2=$_REQUEST["select2"];

              $division= $select1/$select2;

              echo '<input type="text" name="resultado" readonly size="5" value="'.$division.'">';
          }
        


        
        ?>
        </tr>
            </Table>   
</form>
    </body>
</html>



