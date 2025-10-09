// Ficheiro onde inserimos o comportamento

window.addEventListener("load", function () {

    this.fetch("https://handlers.education.launchcode.org/static/planets.json").then(function (response) {


        console.log(response);

        response.json().then(function (jsonData) {

            console.log(jsonData);

            const title = document.getElementById("planetTitle");
            title.innerHTML = jsonData[0].name;

            const image = document.getElementById("planetImage");
            image.src = jsonData[0].image;

            let index = 1;

            title.addEventListener("click", function () {

                title.innerHTML = jsonData[index].name;
                image.src = jsonData[index].image;

                index++;

                if (index >= jsonData.length) {
                    index = 0;
                }
            })

            //title.addEventListener("click", function () {



        })

    }
    )
})
