let uploade = document.querySelector("#uploade");
let text = document.querySelector("#text");
let send = document.querySelector("#send");
let showFile = document.querySelector("#showFile");
showFile.addEventListener('click', () => {
    // open  file for uploage imag
    uploade.click();
});

uploade.addEventListener("change", (e) => {
    let show = document.querySelector("#showImg");
    show.src = URL.createObjectURL(e.target.files[0]);
    show.style.display = 'block';
    // show.style.opacity = 1;

});




send.addEventListener('click', () => {
    let fd = new FormData();
    fd.append('uploade', uploade.files[0]);

    fetch('http://localhost/proge/inc/setting.php', {
        method: 'POST',
        body: fd
    }).then(res => res.json())
        .then(data => {
            console.log(data)
        }
    )
})