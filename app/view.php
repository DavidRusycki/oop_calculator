<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <div class="container">

        <input type="text" class="form-action" value="<?= \App\Receiver::getVisor() ?>">

        <div >

            
            <a href="?numero=1" class="btn btn-success">1</a>
            
            
            <a href="?numero=2" class="btn btn-success">2</a>
            
            
            <a href="?numero=3" class="btn btn-success">3</a>
            
            
            <a href="?operador=<?= \Enum\EnumCalculator::MAIS ?>" class="btn btn-success">+</a>
            
            
            
            <br>
            
            
            
            <a href="?numero=4" class="btn btn-success">4</a>
            
            
            <a href="?numero=5" class="btn btn-success">5</a>
            
            
            <a href="?numero=6" class="btn btn-success">6</a>
            
            
            <a href="?operador=<?= \Enum\EnumCalculator::MENOS ?>" class="btn btn-success">-</a>
            


            
            <br>
            
            
            
            <a href="?numero=7" class="btn btn-success">7</a>
            
            
            <a href="?numero=8" class="btn btn-success">8</a>
            
            
            <a href="?numero=9" class="btn btn-success">9</a>
            
            
            <a href="?operador=<?= \Enum\EnumCalculator::DIVISAO ?>" class="btn btn-success">/</a>
            
            
            
            
            <br>
            
            
            
            <a href="?numero=0" class="btn btn-success">0</a>
            
            
            <a href="?clear=<?= \Enum\EnumCalculator::CLEAR ?>" class="btn btn-success">C</a>
            
            
            <a href="?igual=<?= \Enum\EnumCalculator::IGUAL ?>" class="btn btn-success">=</a>
            
            
            <a href="?operador=<?= \Enum\EnumCalculator::MULTIPLICACAO ?>" class="btn btn-success">*</a>
            
        </div>
            
        </div>
        
        
        
    </body>
    
    </html>