<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Login system</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/index.php/home">Ci4 Login</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <?php if(! $this->session->logged_in): ?>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/index.php/users">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/index.php/users/register">Register</a>
                </li>
            </ul>
        <?php else: ?>
            
            <ul class="navbar-nav">
                <?php if( isset($this->session->logged_in) && $this->User_model->isAdmin($this->session->user_id)): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/index.php/dashboard">Dashboard</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="/index.php/users/logout">Logout</a>
                </li>
            </ul>
        <?php endif; ?>
        </div>
    </div>
</nav>


<div class="container">

    
