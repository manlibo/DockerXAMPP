<html> 
      <head>
         <title>XAMPP Dockerizado</title>
      </head> 
 
      <body>
 
      <?php
 
      // Dirección o IP del servidor MySQL
      $host = "db"; 
      // Puerto del servidor MySQL
      $puerto = "3306";
      // Nombre de usuario del servidor MySQL
      $usuario = "daw";
      // Contraseña del usuario
      $contrasena = "test";
      // Nombre de la base de datos
      $baseDeDatos ="dbname";
      // Nombre de la tabla a trabajar
      $tabla = "Data";
 
      function Conectarse()
      {
         global $host, $puerto, $usuario, $contrasena, $baseDeDatos, $tabla;
 
         if (!($link = mysqli_connect($host.":".$puerto, $usuario, $contrasena))) 
         { 
            echo "Error conectando a la base de datos.<br>"; 
            exit(); 
         }
         if (!mysqli_select_db($link, $baseDeDatos)) 
         { 
            echo "Error seleccionando la base de datos.<br>"; 
            exit(); 
         }
        return $link; 
      } 
 
      $link = Conectarse();
 
      if($_POST)
      {
         $queryInsert = "INSERT INTO $tabla (Nombre, Apellidos) VALUES ('".$_POST['nombreForm']."', '".$_POST['apellidoForm']."');";
 
         $resultInsert = mysqli_query($link, $queryInsert); 
 
         if($resultInsert)
         {
            echo "<strong>Inserción finalizada correctamente</strong>. <br>";
         }
         else
         {
            echo "Error!. La inserción no ha sido correcta.<br>";
         }
 
      }
 
      $query = "SELECT Nombre, Apellidos FROM $tabla;";
 
      $result = mysqli_query($link, $query); 
 
      ?>
 
      <table>
         <tr>
            <td>Nombre: </td>
            <td>Apellidos:</td>
         <tr>
 
      <?php
 
      while($row = mysqli_fetch_array($result))
      { 
         echo "<tr>";
         echo "<td>";
         echo $row["Nombre"];
         echo "</td>";
         echo "<td>";
         echo $row["Apellidos"];
         echo "</td>";
         echo "</tr>";
 
      } 

      mysqli_free_result($result); 
 
      mysqli_close($link); 
 
      ?>
 
      </table>
      <hr>
      <form action="" method="post">
         Nombre: <input type="text" name="nombreForm"> <br> <br>
         Apellidos: <input type="text" name="apellidoForm"> <br> <br>
         <input type="submit" value="Guardar">
      </form>
 
      </body> 
      </html>