<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <title>Add Joke</title>
  </head>
 
<body>
 
    <div>
 
        <p><a href="?addjoke">Add your own joke</a></p>
        <p>Here are all the jokes in the database: </p>
    </div>
 
    
    <?php 
        try{
      $pdo = new PDO('mysql:host=localhost;dbname=CMS', 'root', '');
        
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);        
        
      $pdo->exec('SET NAMES "utf8"');    
    }
    catch(PDOException $e){
        $output = 'Unable to connect to the database server. '.
        $e->getMessage();
        include 'output.html.php';
        exit();
    }

    $output = 'Database connection established.';
    include 'output.html.php';
    
        if(isset($_GET['addjoke'])){
            include 'form.html.php';
            exit();
        }
    
    if(isset($_POST['joketext'])){
        try{
            $sql = 'INSERT INTO joke SET
                    joketext = :joketext,
                    jokedate = CURDATE()';
            $s = $pdo->prepare($sql);
            $s->bindValue(':joketext', $_POST['joketext']);
            $s->execute();
        }catch(PDOException $e){
            $error = 'Error adding submitted joke: ' . $e->getMessage();
            include 'error.html.php';
            exit();
        }
        
        header('Location: pdodatabase.php');
        exit();
    }
    
    ?>
 
 </body>
</html>