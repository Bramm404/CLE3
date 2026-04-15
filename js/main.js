window.addEventListener('load', init)

const loginBtn = document.querySelector('#loginBtn')
const dialog = document.querySelector('dialog')
const login = document.querySelector('dialog form');
const closeBtn = document.querySelector('.close-dialog')

const video = document.querySelector('video');
const canvas = document.querySelector('canvas');
const ctx = canvas.getContext('2d');

let scrollProgress = 0;

 let currentScroll = 0;
 const maxScrollSpeed = 30 ; // pixels per frame

video.addEventListener('loadedmetadata', () => {
    resizeVideo();

    ctx.drawImage(video, 0, 0, canvas.width, canvas.height);


    animateVideo()
})

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
    if(video && canvas) {
        window.addEventListener('wheel', (e) => {
            if(dialog.open) {
                return;
            } else {
                e.preventDefault();

                const delta = e.deltaY > 0 ? maxScrollSpeed : -maxScrollSpeed;
                currentScroll += delta;

                const maxScroll = document.documentElement.scrollHeight - window.innerHeight;
                currentScroll = Math.max(0, Math.min(currentScroll, maxScroll));

                scrollProgress = currentScroll / maxScroll;
                scrollProgress = Math.max(0, Math.min(1, scrollProgress));

                window.scrollTo(0, currentScroll);
            }
        }, {passive: false});
    }




    video.addEventListener('error', (e) => {
        console.error('Video failed to load:', e);
        console.error('Video source:', video.src);
    });


    window.addEventListener('resize', resizeVideo)
    window.addEventListener('scroll', () => {
        const scrollTop = window.scrollY;
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
        scrollProgress = scrollTop / docHeight;
        scrollProgress = Math.max(0, Math.min(1, scrollProgress));
    }, {passive: true});


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

function resizeVideo() {
    if (!canvas || !video) return;

    canvas.width = window.innerWidth;

    const videoAspectRatio = video.videoWidth / video.videoHeight;
    canvas.height = canvas.width / videoAspectRatio;
}


function animateVideo() {
    if (!canvas || !video) {
        requestAnimationFrame(animateVideo)
        return;
    }

    const targetTime = scrollProgress * (video.duration);

    if (Math.abs(video.currentTime - targetTime) > 0.01667) {
        video.currentTime = targetTime
    }


    ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

    requestAnimationFrame(animateVideo)
}



