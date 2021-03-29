let send = document.querySelector("#send");
let Name = document.querySelector("#name");
let prix = document.querySelector("#prix");
let dataTime = document.querySelector("#dataTime");
let dateFin = document.querySelector("#dateFin");
let Description = document.querySelector("#Description");
let uploadImage = document.querySelector("#uploadImage");
let img = document.querySelector("#images");
let quantity = document.querySelector("#quantity");
let search = document.querySelector("#search");
let valueSearch = document.querySelector("#valueSearch");
let input = document.querySelectorAll('input');
let show = document.querySelector("#showImg");
let arr = [];

img.addEventListener('click', () => {
    // open  file for uploage imag
    uploadImage.click();
})

let arrErr = [];

function checkInput() {

    if (Name.value == "") {
        arrErr.push("name");
    }
    if (quantity.value == "") {
        arrErr.push("quantity");
    }
    if (prix.value == "") {
        arrErr.push("prix");
    }
    if (dataTime.value == "") {
        arrErr.push("dataTime");
    }
    if (dateFin.value == "") {
        arrErr.push("dateFin");
    }
    if (Description.value == "") {
        arrErr.push("Description");
    }
    if (uploadImage.value == "") {
        arrErr.push("uploadImage");
    }
    if (uploadImage.value == "") {
        arrErr.push("img");
    }

}




// send.addEventListener('click', () => {
//     input.forEach(res => res.value = '')
// })