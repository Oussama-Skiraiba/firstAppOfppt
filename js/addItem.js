// clear inputs
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
    let show = document.querySelector("#showImg");
    show.src ="";
    show.style.display = 'none';
    show.style.opacity = 0;
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

        fetch('http://localhost/proge/checkItem/addItem.php', {
            method: 'POST',
            body: fd
        })
            .then(response => response.json())
            .then(data => {
                if (data.message == "yes") {
                    messageError("Product Has Been Added", "success");
                    clear()
                    return;
                }
                if (data.message == "no") {
                    messageError("You Cannot Add Product", "error");
                    return;
                }
            });

    }

})
// send.onclick = ()=>{
// }

uploadImage.addEventListener("change", (e) => {
    let show = document.querySelector("#showImg");
    show.src = URL.createObjectURL(e.target.files[0]);
    show.style.display = 'block';
    show.style.opacity = 1;
});



