<html>
    <body>
    
    <TITLE> PRIMER PARCIAL EJERCICIO3</TITLE>
        <form action="Ejercicio3.php"  METHOD="POST" style=" width: 50vw; margin-left : 25vw;">
            <H2 style=" font-size:40px; text-align=center;">Formulario<H2>
    
                <Hr>
                    <Table Border="2" width="100%">
                        <tr>
                            <td width="40%">
                            Nombre del Fichero: <INPUT TYPE="TEXT" NAME="Nombre" size="25">
                            <br><br>
                                    Texto: 
                                    <br>
                                    <textarea left="10px" name="text" cols="50" rows="10"></textarea>
                            </td>
                        </tr>
                                    <tr>
                                        <td>
            
                                            <INPUT TYPE="SUBMIT" NAME="boton" VALUE="Grabar texto">
            
                                    </tr>
                    </Table>   
        </form>


            <br><br><br>
        <?php
        if(isset($_POST["boton"]))
    {
        $nombre=$_REQUEST["Nombre"];
        $texto=$_REQUEST["text"];

        echo"El nombre del fichero es: $nombre";
        echo"<br>";
        echo"Su contenido es el siguiente: $texto";
    }
        ?>
        
    </body>
</html>