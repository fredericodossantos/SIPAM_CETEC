<?php
// Start the session
session_start();

// Check if the user is not logged in, redirect to login.php
if (!isset($_SESSION['loggedin'])) {
    header("Location: ../../../login.php");
    exit();
}
?>

<?php
require_once '../../../db/database.php';
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
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                
                <a class="nav-link" href="../../transations/manage_borrow.php">Empréstimos</a>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="cadastroDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Cadastro
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="cadastroDropdown">
                        <li><a class="dropdown-item" href="../../operations/equipment/manage_equipment.php">Cadastro de Equipamentos</a></li>                                            
                        <li><a class="dropdown-item" href="#">Cadastro de Usuários</a></li>                    
                        <li><a class="dropdown-item" href="manage_borrower.php">Cadastro de Clientes</a></li>
                    </ul>
                </div>
                
                <a class="nav-link" href="#">Log de Empréstimos</a>
                <a class="nav-link" href="#">Reports and Analytics</a>
                <a class="nav-link" href="#">Search Functionality</a>
                <a class="nav-link" href="#">User Profile</a>
            </div>
            </div>
        </div>
    </nav>
    <?php include ('message.php'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Clientes
                        <a href="form_add_borr.php" class="btn btn-primary float-end">Adicionar</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM `borrowers`";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $row['id']; ?></th>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td>
                                    <a href="view_borrower.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Visualizar</a>
                                    <a href="form_edit_borr.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Editar</a>
                                    <form action="delete_borrower.php" method="POST" style="display: inline-block;">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="delete_data" class="btn btn-danger">Deletar</button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                            
                        </tbody>
                            
                    </table>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
