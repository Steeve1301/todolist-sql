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
    <div class="row">

    <h1 class="col-md-12 text-center">Ma to-do list</h1>
        <form method="POST" action="submit.php" class="offset-md-3 col-md-6 text-center border">
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="todo[]" value="1">
                    Faire les courses
                </label>
            </div>
            <button type="submit" class="btn btn-primary mt-3 mb-3">Sauvegarder</button>
        </form>

    <h5 class="col-md-12 text-center">Archive</h2>
        <div class="offset-md-3 col-md-6 text-center border">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" value="1" checked>
                    Faire les courses
            </label>
        </div>

    <h5 class="col-md-12 text-center mt-5">Ajouter une tâche</h2>
        <form action="submit.php" method="post" class="offset-md-3 col-md-6 text-center border">
            <input type="text" name="tache" id="tache">
            <button type="submit" class="btn btn-primary">Ajouter</button>
            <p class="form-text text-muted">
                La tâche à effectuer
            </p>
        </form>

    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>