// Partie pour UPLOAD de avatar

let doc = document.querySelector("#avatar");
let mini = document.querySelector("#insert_avatar");

doc.addEventListener("change", ()=>{
    mini.innerHTML = "";
    let data = new FileReader();
    data.onload = readerEvt =>{
        let image = document.createElement("img");
        image.classList = "h-100";
        image.src = readerEvt.target.result;
        let span = document.createElement("span");
        span.innerHTML = "×"
        mini.appendChild(image);
        mini.appendChild(span)
        span.classList.add('close-avatar')
        span.addEventListener("click",() =>{
            mini.innerHTML = "";
            doc.value = null
        })
    }

    data.readAsDataURL(doc.files[0]);
})

