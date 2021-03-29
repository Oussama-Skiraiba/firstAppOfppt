let input = document.querySelector("#input");
let i;
let showImg = document.querySelector('#showImge');


send.addEventListener('click',()=>{   
    checkInput();
    if(arrErr.length !== 0){
        messageError(arrErr,"error");
        arrErr = [];
    }else {
        let fd = new FormData();
        fd.append('Name', Name.value);
        fd.append('quantity', quantity.value);
        fd.append('prix', parseFloat(prix.value));
        fd.append('dataTime', dataTime.value);
        fd.append('dateFin', dateFin.value);
        fd.append('Description', Description.value);
        fd.append('uploadImage', uploadImage.files[0]);
        
        fetch('http://localhost/proge/checkItem/updateItem.php', {
                method: 'POST',
                body: fd
        })
        .then(response => response.text())
        .then(data => {
            console.log(data);
        });
    }
    
})




search.addEventListener("keyup",()=>{
    valueSearch.innerHTML = "";
    if(search.value === "" ){  return; }
    fetch('http://localhost/proge/checkItem/updateItem.php?search=' + search.value +'' )
    .then(response => response.json())
    .then(data => {
        data.forEach(element => {
            let child =  document.createElement("span");
            child.innerHTML = element._name;
            valueSearch.appendChild(child);
        });
        Array.from(valueSearch.children).forEach(e => {
            e.addEventListener("click",()=>{  
                search.value = e.innerHTML;
                valueSearch.innerHTML = "";
                data.forEach(el =>{
                    if(el._name === e.innerHTML){
                        Name.value          =  el._name;
                        Description.value   =  el._description;                       
                        showImg.src         =  'http://localhost/proge/upload/img/' + el._img_url;
                        dateFin.value       =  el._datafine;
                        dataTime.value      =  el._datatime;
                        prix.value          =  el._price;
                        quantity.value      =  el._quantity;
                        showImg.style.display = 'block';
                        showImg.style.opacity = 1;
                    }
                });
            });
        });
    });
});

uploadImage.addEventListener("change", (e) => {
    showImg.src = URL.createObjectURL(e.target.files[0]);
});