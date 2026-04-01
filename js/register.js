window.addEventListener('load', init)

function init() {

    const passwordField = document.querySelector('input[name="password"]');

    passwordField.addEventListener('input', () => {

        const password = passwordField.value

        const hasLength = password.length >= 8
        const hasCapital = /[A-Z]/.test(password)
        const hasNumber = /[0-9]/.test(password)
        const hasSpecial = /[!@#$%^&*,.?:]/.test(password)

        updateCheck('#length', hasLength)
        updateCheck('#capital', hasCapital)
        updateCheck('#number', hasNumber)
        updateCheck('#spec', hasSpecial)

    })

    const form = document.querySelector('form')

    form.addEventListener('submit', (e) => {
        e.preventDefault;
    })

}


function updateCheck(selector, isMet) {
    const element = document.querySelector(selector)

    if (isMet) {
        element.classList.add('met')
        element.textContent = element.textContent.replace('x', '✓' )
    } else {
        element.classList.remove('met')
        element.textContent = element.textContent.replace ('✓', 'x')
    }

}