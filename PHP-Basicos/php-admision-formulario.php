    <?php

            $Nombre = $_REQUEST["Nombre"];
            $Edad = $_REQUEST["Edad"];
            $Estudia= $_REQUEST["Estudia"];
            $Trabaja= $_REQUEST["Trabaja"];
            $Vehiculo= $_REQUEST["Vehiculo"];
            $Genero= $_REQUEST["Genero"];
            $Puntaje=0;




            if($Edad<40){
                $Puntaje=$Puntaje+20;
            }
            else{
                $Puntaje=$Puntaje+0;
            }
            if($Estudia==true && $Trabaja==false){
                $Puntaje=$Puntaje + 10;
            }

            if($Estudia && $Trabaja==true){
                $Puntaje=$Puntaje + 20;
            }

            if($Vehiculo==true){
                $Puntaje=$Puntaje + 25;
            }
            if($Genero==1){
                $Puntaje= $Puntaje + 5;
            }


            echo "EL PUNTAJE TOTAL ES: $Puntaje";
            echo"<br>";
            if($Puntaje>=60){
                echo "<strong style='color: blue;'>PERSONA ADMITIDA</strong>";
            }

            else{
                echo "<strong style='color: red;'>PERSONA NO ADMITIDA</strong>";
            }

    ?>

            <FORM ACTION="Ejercicio1form.html" METHOD="POST">
            <INPUT TYPE="SUBMIT" NAME="boton2"
            VALUE="Volver">