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

    const searchUser = async (e) => {
        let num = e.target.value

        const response = await fetch("../operation.php", {
            method: "POST",
            body: new URLSearchParams("phone_no=" + num)

        })
        const result = await response.json();

        (result !== false) ? document.querySelector("#fullname").value = result.fullname : document.querySelector("#fullname").value = "";




    }


    phone_no.addEventListener("input", searchUser, false);
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

