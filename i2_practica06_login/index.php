
        <?php  
            include("db/connection.php");//Manda llamar la conexión a la base de datos

                if(isset($_POST['ingresar']))
                {   
                    $cor = $_POST['email'];
                    $query = "SELECT * FROM user WHERE email = '$cor'";
                    $statement = $pdo->prepare($query);
                    if($statement->execute())
                    {
                        $results = $statement->fetch(); 
                    }
                    else
                    {
                        echo "no jalo la consulta";
                    }

                    if($results["email"] == $_POST["email"] && $results["password"] == $_POST["password"])
                    {
                        
                        $idUser = $results["id"];
                        $fecha = date('Y-m-d');
                        echo $idUser;
                        echo "</br>";
                        echo $fecha;
                        echo "</br>";

                        $query = "INSERT INTO user_log(date_logged_in, user_id) VALUES('$fecha', $idUser)";
                        $statement = $pdo->prepare($query);
                        if($statement->execute())
                        {
                            session_start();
                            $_SESSION["u"] = true;
                            header("location: menu_ejercicios.php");   
                        }
                        else
                        {
                            echo "No jalo la insercion de log";
                        }
                    }
                    else
                    {
                        header("location: index.php");
                    }
                }
        ?>


<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Pracitca 06 - Login</title>
        <link rel="stylesheet" href="./css/foundation.css" />
        <script src="./js/vendor/modernizr.js"></script>
    </head>
    <body style="background-color: #DAEBE6">  
        <div class="row">
             
            <div class="large-12 columns" align="center">
                
                    <section class="section">
                     <br/>   
                        <div style="background-color: white" class="content" data-slug="panel1"><!---->
                            <div class="row">
                                </br>
                                <img src="user.png" width="300"></br></br>
                                <form method="post">
                                    <input type="email" placeholder="Correo" name="email" required style="width:500px;height:40px;border-radius: 10px">
                                    <input type="password" placeholder="Contraseña" name="password" required style="width:500px;height:40px;border-radius: 10px">
                                    <input type="submit" name="ingresar" class="button" value="Ingresar" style="width:150px;height:50px;font-size:20px; border-radius:10px">
                                </form>
                            </div>
                    </section>
                </div>
            </div>
               
        </div>
        
