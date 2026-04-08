window.addEventListener('load', init)

const loginBtn = document.querySelector('#loginBtn')
const dialog = document.querySelector('dialog')
const login = document.querySelector('dialog form');



function init() {
    checkforErrors()

    const inputFields = document.querySelectorAll('dialog input')
    inputFields.forEach(input => {
        input.addEventListener('input', () => {
            const errorMsg = input.closest('.fieldDiv').querySelector('.error')
            if(errorMsg) {
                errorMsg.textContent = '';
            }
        })
    })

    loginBtn.addEventListener('click', () => {
        dialog.showModal()
    })

    dialog.addEventListener('click', (e) => {
        if(e.target === dialog) {
            dialog.close();
        }
    })

    login.addEventListener('submit', (e) => {
        if(checkforErrors()) {
            e.preventDefault()
        }
    })
}

function checkforErrors() {
    const errors = document.querySelectorAll('dialog .error')
    let hasError = false;

    errors.forEach(error => {
        if(error.textContent.trim() != '') {
            hasError = true;
        }
    })


    if (hasError) {
        dialog.showModal()
    }

    return hasError
}

