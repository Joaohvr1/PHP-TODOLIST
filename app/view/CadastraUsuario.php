<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="public/css/index.css">

</head>

<body>

 
<div class="container__main">
        <div class="container__content">
            
            <div class="container__form">
                <form class=" row g-3 d-flex flex-column" id="formCadastro" name="formCadastro" action="index.php?url=signup" method="POST">
                    <h1>Registre-se</h1>

                    <div>
                        <label for="nome" class="visually">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>
                    </div>
                    <div>
                        <label for="email" class="visually">Email:</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div>
                        <label for="username" class="visually">Login:</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Login" required>
                    </div>
                   
                    <div >
                        <label for="password" class="visually">Senha:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div>
                        <label for="dataNascimento" class="visually">Data nascimento: </label>
                        <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" placeholder="Login" required>
                    </div>
                    
                    <div class="container__btn  col-auto">
                        <button type="submit" id="formBotao" name="formBotao" class="btn">Registrar</button>

                        
                    </div>

                   
                </form>
                <div class="container__message">
                    <?php if (!empty($message)) : ?>
                        <div class="alert alert-<?PHP echo $alertType?> " role="alert">
                            <?= htmlspecialchars($message); ?>
                        </div>
                    <?php endif; ?>
                </div>
                
            </div>

            <div class="container__image">
                    <h2>Já tem login?</h2>
                    <p>Faça seu login, <a href="index.php?url=login">clique aqui.</a></p>
            </div>
        </div>

        
                 
    </div>

    
    
</body>
</html>
