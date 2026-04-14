window.addEventListener('load', init)

const loginBtn = document.querySelector('#loginBtn')
const dialog = document.querySelector('dialog')
const login = document.querySelector('dialog form');
const closeBtn = document.querySelector('.close-dialog')



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
    if (closeBtn) {
        closeBtn.addEventListener('click', () => {
            dialog.close();
        })
    }

    if (loginBtn) {
        loginBtn.addEventListener('click', () => {
            dialog.showModal()

        })
    }
    if (dialog) {
        dialog.addEventListener('click', (e) => {
            if(e.target === dialog) {
                dialog.close();
            }
        })
    }
    if (login) {
        login.addEventListener('submit', (e) => {
            if(checkforErrors()) {
                e.preventDefault()
            }
        })
    }

}

function checkforErrors() {
    const errors = document.querySelectorAll('dialog .error')
    let hasError = false;

    errors.forEach(error => {
        if(error.textContent.trim() !== '') {
            hasError = true;
        }
    })


    if (hasError && dialog) {
        dialog.showModal()
    }

    return hasError
}



