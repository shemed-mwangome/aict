let loc = document.querySelector(".main-area");

let target_section;

if (typeof (loc) != 'undefined' && loc != null) {
    target_section = loc.dataset.page__title;
}


const personalPage = () => {

    let formData;

    const submitForm = document.getElementById("personal__info__form")
    const imageSelectorBtn = document.getElementById('user-photo-btn')
    const image__input = document.getElementById('photo__input')
    const user__image = document.getElementById('user__image')
    const form_controls = document.querySelectorAll(".form-control");

    const removeError = (e) => {
        let span = e.target.nextElementSibling
        span.style.display = "none";
    }

    const submitData = async (e) => {
        e.preventDefault()

        formData = new FormData(submitForm)

        const response = await fetch("../Operation.php", {
            method: "POST",
            body: formData
        })

        const result = await response.json();
        console.log(result);

    }

    const showThumbnail = (e) => {
        //Show thumbnails
        let file = image__input.files[0]
        let reader = new FileReader()
        reader.onload = (e) => {
            user__image.src = e.target.result

        }
        reader.readAsDataURL(file)

    }

    const selectFile = (e) => {
        e.preventDefault()
        image__input.click()
    }


    imageSelectorBtn.addEventListener('click', selectFile, false)
    image__input.addEventListener('change', showThumbnail, false)
    form_controls.forEach(form_control => form_control.addEventListener('focus', removeError, false))

}

const familyPage = () => {
    const phone_no = document.querySelector("#phone_no");
    const submitBtn = document.querySelector("#submit-btn")


    const searchUser = async (e) => {
        let num = e.target.value

        let url = "../operation.php"
        let data = new URLSearchParams();
        data.append("phone_no", num)
        data.append("action", "search_user")
        let options = {
            method: "POST",
            body: data
        }

        try {
            let response = await fetch(url, options)
            let result = await response.json();
            (result !== false) ? document.querySelector("#parent_name").value = result.fullname : document.querySelector("#parent_name").value = "";
        }
        catch (err) {
            console.log("No such user");
        }

    }

    const fetchChildren = async (e) => {
        let num = e.target.value

        let url = "../operation.php"
        let data = new URLSearchParams();
        data.append("action", "fetch_children")
        data.append("phone_no", num)
        let options = {
            method: "POST",
            body: data
        }
        try {
            let response = await fetch(url, options)
            let result = await response.json();
            console.log(result);
        }
        catch (err) {
            console.log("Error to fetch");
        }


    }

    const registerChildren = async (e) => {
        let url = "../operation.php"
        let options = {
            method: "POST",
            body: data
        }

        try {
            let response = await fetch(url, options)
            let result = await response.json()
            console.log(result)
        } catch (error) {
            console.log(error)
        }
    }

    phone_no.addEventListener("keyup", searchUser, false);
    phone_no.addEventListener("blur", fetchChildren, false);
    submitBtn.addEventListener("click", registerChildren, false);
}


switch (target_section) {
    case 'personal':
        personalPage();
        break
    case 'family':
        familyPage();
        break
    default:
        console.log("Default page")
        break
}

