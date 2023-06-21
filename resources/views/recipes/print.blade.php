<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>RecipeHub</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    </head>
    <body>
        <div class="container mt-4 mx-auto w-75">

            <div class="my-3">
                <x-recipe-intro :recipe="$recipe" />
            </div>
    
    
            <div class="my-3 lh-lg">
                <x-recipe-ingredients :ingredientsCsv="$recipe->ingredients" />
            </div>
    
            <div class="my-3 lh-lg">
                <x-recipe-steps :steps="$recipe->steps" />
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"> 

            </script>
            <script>
                window.onload = () =>{
                    window.print();
                }
            </script>
            
    </body>
</html>