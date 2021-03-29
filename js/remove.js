let body = document.querySelector("#body");
let erro = (value) => {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            removeItem(value.innerHTML);
            value.parentElement.remove();
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        }
    })
}
function removeItem(value) {
    let fd = new FormData();
    fd.append('name', value);
    fetch('http://localhost/proge/checkItem/removeItem.php', {
        method: 'POST',
        body: fd
    })
        .then(response => response.text())
        .then(data => {});
}

function loopChild() {
    Array.from(body.children).forEach(child => {
        child.lastElementChild.addEventListener("click", () => {
            erro(child.firstElementChild);
        });
    });
}
window.onload = function () {
    fetch('http://localhost/proge/checkItem/removeItem.php')
        .then(response => response.json())
        .then(data => {
            data.forEach(element => {
                let row = document.createElement("div");
                row.setAttribute("class", "row");
                let col1 = document.createElement("div");
                let col2 = document.createElement("div");
                let col3 = document.createElement("div");
                let col4 = document.createElement("div");
                let img = document.createElement("img");
                col1.innerHTML = element._name;
                col1.setAttribute("name", element._name);
                col2.innerHTML = element._quantity;
                col3.innerHTML = element._price;
                col4.setAttribute("class", "icon");
                img.setAttribute("src", 'http://localhost/proge/icon/trash-bin.png');
                col4.appendChild(img);
                row.appendChild(col1);
                row.appendChild(col2);
                row.appendChild(col3);
                row.appendChild(col4);
                body.appendChild(row);
            });
            loopChild();
        });
}
// trash-bin.png
