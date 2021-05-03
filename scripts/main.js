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
    const form_input = document.querySelectorAll(".form-control");

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
            if (result !== false) {
                document.querySelector("#parent_name").value = result.fullname
                document.querySelector("#parent_id").value = result.id

                // Store parent id on localstorage
                localStorage.setItem("parent_id", result.id )
                document.querySelector("#parent_photo").src = result.photo

            }
            else {
                document.querySelector("#parent_name").value = ""
                document.querySelector("#parent_id").value = ""
                document.querySelector("#parent_id").value = "";
            }

        }
        catch (err) {
            console.log(err);
            console.log("No such user");
        }
    }

    const fetchChildren = async (e) => {
        let num = e.target.value
        let output = "";

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

            if (result.length > 0) {
                console.log(result)
                result.forEach(item => {
                    output += `
                <tr>
                    <td>${item.fullname}</td>
                    <td>${item.gender}</td>
                    <td>${item.age}</td>
                    <td>${item.is_staying_home}</td>
                    <td class="action-item">
                        <a href="#" title="Edit" class="action"><i class="las la-pen la-lg" ></i></a>
                        <a href="#" title="Delete" class="action"><i class="las la-trash la-lg"></i></a>
                    </td>
                </tr>
            `
                });

            }
            else {
                output += `
                    <tr id="no-data">
                            <td colspan="5">
                                <h1>Hakuna Taarifa</h1>
                            </td>
                    </tr>`;
            }

            document.querySelector("#display-data").innerHTML = output;
        }
        catch (err) {
            output += `
                    <tr id="no-data">
                        <td colspan="5">
                            <h1>Hakuna Taarifa</h1>
                        </td>
                    </tr>`;
            document.querySelector("#display-data").innerHTML = output;
        }
    }


    phone_no.addEventListener("keyup", searchUser, false);
    phone_no.addEventListener("input", fetchChildren, false);
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

