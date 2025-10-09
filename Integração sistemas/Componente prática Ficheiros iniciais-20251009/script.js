// Ficheiro onde inserimos o comportamento

window.addEventListener("load", function () {

    this.fetch("https://handlers.education.launchcode.org/static/planets.json").then(function (response) {


        console.log(response);

        response.json().then(function (jsonData) {

            console.log(jsonData);

            const title = document.getElementById("planetTitle");
            title.innerHTML = jsonData[0].name;

            title.addEventListener("click", function () {
                const image = document.getElementById("planetImage");
                image.src = jsonData[0].image;
             
            
            })

        }
        )
    })
})
