const search = document.querySelector('input[placeholder="search album"]');
const projectContainer = document.querySelector(".projects");

search.addEventListener("keyup",function (event){
    if(event.key){
        event.preventDefault();

    }
})