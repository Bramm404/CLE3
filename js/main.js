window.addEventListener('load', init)

const loginBtn = document.querySelector('#loginBtn')
const dialog = document.querySelector('dialog')


function init() {
    loginBtn.addEventListener('click', () => {
        dialog.showModal()
    })
}

