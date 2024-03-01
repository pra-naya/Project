<x-layout>

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


        <div class="rating-container my-4 lh-lg d-flex align-items-center justify-content-between">
            <form action="/rating" method="POST">
                @csrf
                <button class="star" value="1" name="value"><i class="fa-solid fa-star fs-4"></i></button>
                <button class="star" value="2" name="value"><i class="fa-solid fa-star fs-4"></i></button>
                <button class="star" value="3" name="value"><i class="fa-solid fa-star fs-4"></i></button>
                <button class="star" value="4" name="value"><i class="fa-solid fa-star fs-4"></i></button>
                <button class="star" value="5" name="value"><i class="fa-solid fa-star fs-4"></i></button>
                <input type="hidden" name="recipe_id" value="{{$recipe->id}}">
            </form>
            <div id="avg_rating"></div>
        </div>


        <div class="my-3">
            <x-recipe-comments :comments="$comments" :recipe_id="$recipe->id" />
        </div>
    </div>

    {{-- <script>
        document.getElementById('avg_rating').innerHTML = "Average Rating: {{$recipe_ratings['avg_rating']}}/5 ({{$recipe_ratings['count']}})";

        let recipe_id = '{{$recipe->id}}';

        let user_rating = Number('{{$user_rating}}');
        // console.log(user_rating);
        // alert(avg_rating);


        const stars = document.querySelectorAll('.star');


        function setColor() {
            console.log("in");
            stars.forEach((star, i) => {

                if (i + 1 <= user_rating) {
                    star.style.color = '#ff9800';
                } else {
                    star.style.color = '#cccccc';
                }
            })
        }

        // setColor();

        stars.forEach((star) => {
            star.addEventListener('mouseenter', (event) => {
                let selectedStar = star.value;
                // console.log(selectedStar);

                stars.forEach((star, j) => {
                    if (selectedStar >= j + 1) {
                        star.style.color = '#ff9800';
                    } else {
                        star.style.color = '#cccccc'
                        // setColor();
                    }
                })
            })

            star.addEventListener('mouseleave', function(event) {
                stars.forEach((star) => {
                    // star.style.color = '#cccccc'
                    setColor();
                })
            });

            star.addEventListener('click', rate);

            function rate(e) {
                e.preventDefault();

                let rating_value = star.value;

                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                fetch('http://localhost:8000/rating', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify({
                            value: rating_value,
                            recipe_id: recipe_id
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        console.log(data);
                        console.log(data.user_rating);
                        console.log(data.avg_rating);
                        user_rating = data.user_rating;
                        document.getElementById('avg_rating').innerHTML = `Average Rating: ${data.avg_rating}/5 (${data.count})`;
                    })
                    .catch(error => {
                        console.log(error);
                    });


            }
        });

        setColor();
    </script> --}}

    <script>

        document.getElementById('avg_rating').innerHTML = "Average Rating: {{$recipe_ratings['avg_rating']}}/5 ({{$recipe_ratings['count']}})";

        let recipe_id= '{{$recipe->id}}';
        
        let user_rating = Number('{{$user_rating}}');
        // console.log(user_rating);
        // alert(avg_rating);
    

        const stars = document.querySelectorAll('.star');


        function setColor(){
            stars.forEach((star, i) => {
    
                if(i+1<=user_rating) {
                    star.style.color = '#ff9800';
                }
                else {
                    star.style.color = '#cccccc';
                }
            })
        }

        // setColor();

        stars.forEach((star)=>{
            star.addEventListener('mouseenter', (event) => {
                let selectedStar = star.value;
                // console.log(selectedStar);
                
                stars.forEach((star, j) => {
                    if(selectedStar >= j+1) {
                        star.style.color = '#ff9800' ;  
                    }
                    else{
                        star.style.color = '#cccccc'
                        // setColor();
                    }
                })
            })

            star.addEventListener('mouseleave', function(event) {
                stars.forEach((star) => {
                    // star.style.color = '#cccccc'
                    setColor();
                })
            });

            star.addEventListener('click', rate);
    
            function rate(e) {
                e.preventDefault();
    
                let rating_value = star.value;
    
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                fetch('http://localhost:8000/rating', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    value: rating_value,
                    recipe_id: recipe_id
                })
                })
                .then(res => res.json())
                .then(data => {
                    console.log(data);
                    console.log(data.user_rating);
                    console.log(data.avg_rating);
                    user_rating = data.user_rating;
                    document.getElementById('avg_rating').innerHTML = `Average Rating: ${data.avg_rating}/5 (${data.count})`;
                })
                .catch(error => {
                    console.log(error);
                });
    
    
            }
        });

        setColor();


  </script>

</x-layout>