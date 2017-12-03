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

//    try{
//        $sql = 'CREATE TABLE joke (
//                id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
//                joketext TEXT,
//                jokedate DATE NOT NULL
//              ) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB';
//        $pdo->exec($sql);
//    }catch (PDOException $e){
//         $output = 'Error creating joke table: ' . $e->getMessage();
//         include 'output.html.php';
//         exit();
//    }


    try{
        $sql = 'UPDATE joke SET jokedate="2012-04-01"
                WHERE joketext LIKE "%chicken%"';
        
        $affectedRows = $pdo->exec($sql);
        echo "Updated $affectedRows rows. ";
    }catch(PODException $e){
        $output = 'Error performing update: ' . $e->getMessage();
        include 'output.html.php';
        exit();
    }

    try{
        $sql = 'SELECT id, joketext FROM joke';
        $result = $pdo->query($sql);
        
    }catch(PDOException $e){
        $error = 'Error fetching jokes: ' . $e->getMessage();
        include 'error.html.php';
        exit();
    }

    while ($row = $result->fetch()){
            $jokes[] = array('id' => $row['id'], 'text' => $row['joketext']);
        }



//
//$output = 'Joke table successfully created.';
include 'output.html.php';

?>


<!DOCTYPE html>
<html lang="en">
 <head>
     <meta charset="utf-8">
    
     <title>List of Jokes</title>
 
</head>
 
    <body>
        <p>Here are all the jokes in the database:</p>
            <?php foreach ($jokes as $joke): ?>
               <form action="?deletejoke" method="post">
                <blockquote>
                <p><?php echo htmlspecialchars($joke['text'], ENT_QUOTES, 'UTF-8'); ?>
                    <input type="hidden" name="id" value="<?php echo $joke['id']; ?>">
                    <input type="submit" value="Delete">    
            ?>  
        </p>
                </blockquote>
                </form>
        <?php endforeach; ?>
 
    </body>
</html>