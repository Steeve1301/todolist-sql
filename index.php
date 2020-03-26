<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Todo-list</title>
</head>
<body>
    <div class="row m-0">

    <h1 class="col-md-12 text-center">Ma to-do list</h1>
        <form method="POST" action="submit.php" id="formUpdate" class="offset-md-4 col-md-4 text-center border">
            <div class="form-check box">
                <?php 
                    try{
                        include('connect.php');
                    }
                    catch(PDOException $e){
                        die('Erreur : '.$e.'<br>');
                    }
                    $sql= $bdd->query("SELECT * FROM todo ORDER BY id DESC");

                    foreach($sql as $row){
                        $checked= ($row['checked']==1) ? 'checked' : '';
                        $value= ($row['checked']==1) ? 1 :  0;
                        ?>
                            <label class="form-check-label col-md-12 draggable text-justify" draggable="true">
                                <input type="checkbox" class="todo form-check-input" data-to="archive" data-id="<?=$row['id'];?>" name="todo[]" value="<?=$value?>" <?=$checked;?>>
                                <?=$row['todo'];?>
                            </label>
                        <?php
                    }
                ?>
            </div>
            <button type="submit" id="sendForm" class="btn btn-primary mt-3 mb-3" hidden>Sauvegarder</button>
        </form>

    <h5 class="col-md-12 text-center">Archive</h2>
        <div class="offset-md-4 col-md-4 text-center border bg-white box">
            <?php try{
                include('connect.php');
            }catch(PDOException $e){
                die('Erreur: ' . $e->getMessage() . '<br>');
            }
            $sql= $bdd->query("SELECT * FROM archive");

            foreach($sql as $archive){
            ?>
                <label class="form-check-label col-md-12 text-justify">
                <del>
                <input type="checkbox" class="form-check-input" value="1" checked disabled>
                    <?= $archive['todo']; ?>
                </del>
                </label>
            <?php
            }
            ?>
        </div>

    <h5 class="col-md-12 text-center mt-5">Ajouter une tâche</h2>
        <form action="submit.php" method="post" class="offset-md-4 col-md-4 text-center border pt-3">
            <input type="text" name="tache" id="tache" required>
            <button type="submit" class="btn btn-primary">Ajouter</button>
            <p class="form-text text-muted">
                La tâche à effectuer
            </p>
        </form>

    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="assets/js/send.js"></script>
<script src="assets/js/draggable.js"></script>
</body>
</html>