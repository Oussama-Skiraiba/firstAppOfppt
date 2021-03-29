let containte    = document.querySelector(".containte");
let containte_items    = document.querySelector(".containte-items");
let messageError = (value, icon) => {
    Swal.fire({
        position: 'center',
        icon: icon,
        title: value,
        showConfirmButton: false,
        timer: 1500
    })
}
containte.addEventListener("click",()=>{
    containte_items.classList.toggle("show-containte-items");
});