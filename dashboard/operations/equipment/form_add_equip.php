<?php
// Start the session
session_start();

// Check if the user is not logged in, redirect to login.php
if (!isset($_SESSION['loggedin'])) {
    header("Location: ../../../login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Cadastro</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="emprestimoDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Empréstimo
                </a>
                <ul class="dropdown-menu" aria-labelledby="emprestimoDropdown">
                    <li><a class="dropdown-item" href="../../transations/borrow_equipment.php">Novo Empréstimo</a></li>
                    <li><a class="dropdown-item" href="../../transations/return_equipment.php">Devolução</a></li>
                    <li><a class="dropdown-item" href="../../transations/manage_borrow.php">Gerenciar Empréstimo</a></li>
                </ul>
            </div>>
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="cadastroDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Cadastro
                </a>
                <ul class="dropdown-menu" aria-labelledby="cadastroDropdown">
                    <li><a class="dropdown-item" href="manage_equipment.php">Cadastro de Equipamentos</a></li>                    
                    <!-- <li><a class="dropdown-item" href="manage_components.php">Cadastro de Componentes</a></li> -->
                    <li><a class="dropdown-item" href="#">Cadastro de Usuários</a></li>                    
                    <li><a class="dropdown-item" href="../client/manage_borrower.php">Cadastro de Clientes</a></li>
                </ul>
            </div>
            <a class="nav-link" href="transactionlog.php">Log de Empréstimos</a>
            <a class="nav-link" href="reports.php">Reports and Analytics</a>
            <a class="nav-link" href="search.php">Search Functionality</a>
            <a class="nav-link" href="profile.php">User Profile</a>
        </div>
        </div>
    </div>
    </nav>
    <?php include ('message.php'); ?>
    <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Cadastro de Equipamentos</h4>
                    </div>
                    <div class="card-body">
                        <form action="add_equip.php" method="POST">
                            <div class="form-group mb-3">
                                <label for="">Nome Equipamento</label>
                                <input type="text" name="name" class="form-control" placeholder="Nome do equipamento">                            
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Descrição</label>
                                <input type="text" name="description" class="form-control" placeholder="Descreva o equipamento">                            
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Categoria</label>
                                <input type="text" name="category" class="form-control" placeholder="Categoria do equipamento">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="insert_data" class="btn btn-primary">Save Event</button>
                            </div>
                        </form>
                    </div>


                </div>

            </div>

        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
