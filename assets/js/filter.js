document.addEventListener("DOMContentLoaded", () => {
    let filterAll = document.querySelector("#filterAll");
    let filterSL = document.querySelector("#filterSL");
    let filterS = document.querySelector("#filterSupport");
    let filterATM = document.querySelector("#filterATM");
    let tableData = document.querySelector("#contacts-table");
    let url = "http://localhost/info2180-finalproject-main/modules/filter.module.php";

   
    letsFetch("all")

    filterAll.addEventListener("click", () => {
        letsFetch("all")
    })

    filterSL.addEventListener("click", () => {
        letsFetch("sl")
    })

    filterS.addEventListener("click", () => {
        letsFetch("support")
    })

    filterATM.addEventListener("click", () => {
        letsFetch("atm")
    })

    function letsFetch(query) {
        fetch(url + "?filter=" + query)
        .then(response => response.text())
        .then(data => {
            console.log(data);  
            tableData.innerHTML = data            
        })
        .catch(error => {
            console.log(error);
        })
    }
    
})