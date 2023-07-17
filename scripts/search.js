$(document).ready(()=>{
    $("#search-input").on("input", ()=>{

        let data = {name: $("#search-input").val()}

        if($("#search-input").val() != "") {

            fetch("/../autocompletion/functions/pokemon.php", {
                method: 'POST',
                headers: {
                    'Content-Type':'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {

                let names = []
                data.pokemons.forEach(pokemon => {
                    names.push(pokemon.name)
                });
                
                $("#search-input").autocomplete({
                    source: names
                })
            })
        }

        
    })

    $("#search-button").click((event)=>{
        if ($("#search-input").val() == "") {
            event.preventDefault()
        }
    })
})