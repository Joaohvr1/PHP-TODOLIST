
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="public/css/home.css">
    <script src="public/js/home.js"></script>
</head>

<body>

 
<div class="container__main">
    
        <div class="container__content">

                <div class="container__menu">
                    <nav class="container__nav">
                        <ul class="container__nav-content"> 
                        
                        <a class="icon-home" href="">
                            <li class="content__nav-item"><img width="50px" height="40px" src="./public/assets/home1-white.svg " alt="HOME">Home</li>
                        </a>

                        <a class="icon-home" href="">
                            <li class="content__nav-item"><img width="50px" height="40px" src="./public/assets/notepad-white.svg " alt="notepad">Home</li>
                        </a>

                        <a class="icon-home" href="">
                            <li class="content__nav-item"><img width="50px" height="40px" src="./public/assets/config-white.svg " alt="config">Configurações</li>
                        </a>

                        
                        </ul>
                    </nav>

                
                </div>

            <div class="container__form">
                <div class="container__form-title">
                    <h1>Seja bem-vindo a To-Do-List,<span> seu aplicativo de lista a fazeres.</span></h1>

                </div>

                <div class="container__message">
                    <?php if (!empty($message)) : ?>
                        <div class="alert alert-<?PHP echo $alertType?> " role="alert">
                            <?= htmlspecialchars($message); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

               
        </div>

        
                 
    </div>

    
    
</body>
</html>
