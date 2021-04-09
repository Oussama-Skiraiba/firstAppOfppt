// let input = document.querySelector("#input");
let i;
let showImg = document.querySelector('#showImge');

function clear() {
    document.querySelector("#name").value = "";
    document.querySelector("#prix").value = "";
    document.querySelector("#dataTime").value = "";
    document.querySelector("#dateFin").value = "";
    document.querySelector("#Description").value = "";
    document.querySelector("#uploadImage").value = "";
    document.querySelector("#images").value = "";
    document.querySelector("#quantity").value = "";
    document.querySelector("#search").value = "";
    document.querySelector("#valueSearch").value = "";
    document.querySelectorAll('input').value = "";
    // let showImg = document.querySelector("#showImg");
    showImg.src = "";
    showImg.style.display = 'none';
    showImg.style.opacity = 0;
}

send.addEventListener('click', () => {
    checkInput();
    if (arrErr.length !== 0) {
        messageError(arrErr, "error");
        arrErr = [];
    } else {
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
                // console.log(data);
                // clear();
                if (data == "yes") {
                    messageError("Product Has Been Added", "success");
                    clear()
                }
                if (data == "error") {
                    messageError("You Cannot Add Product", "error");
                    clear()
                }

            });
    }

})




search.addEventListener("keyup", () => {
    valueSearch.innerHTML = "";
    if (search.value === "") { return; }
    fetch('http://localhost/proge/checkItem/updateItem.php?search=' + search.value + '')
        .then(response => response.json())
        .then(data => {
            data.forEach(element => {
                let child = document.createElement("span");
                child.innerHTML = element._name;
                valueSearch.appendChild(child);
            });
            Array.from(valueSearch.children).forEach(e => {
                e.addEventListener("click", () => {
                    search.value = e.innerHTML;
                    valueSearch.innerHTML = "";
                    data.forEach(el => {
                        if (el._name === e.innerHTML) {
                            Name.value = el._name;
                            Description.value = el._description;
                            showImg.src = 'http://localhost/proge/upload/img/' + el._img_url;
                            dateFin.value = el._datafine;
                            dataTime.value = el._datatime;
                            prix.value = el._price;
                            quantity.value = el._quantity;
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