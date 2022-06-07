function enableFilter(){
    var filter = document.getElementsByClassName("filter")[0];
    filter.style.display = "block";
}

function checkTopping(){
    let productList = document.getElementsByClassName("topping-detail");
    for (let i = 0; i < productList.length; i++){
        productList[i].parentElement.style.display = ""; 
    }
    let toppingList = [];
    let checkList = document.getElementsByName("topping");
    for (let i = 0; i < checkList.length; i++){
        if (checkList[i].checked == true){
            toppingList.push(checkList[i].value);
        }
    }
    for (let i = 0; i < productList.length; i++){
        let flag = true;
        
        for (let j = 0; j < toppingList.length; j++){
            if (!productList[i].innerHTML.toLowerCase().includes(toppingList[j]) ){
                flag = false;
            }
        }
        
        if (flag == false){
            productList[i].parentElement.style.display = "none"; 
        }
    }
}