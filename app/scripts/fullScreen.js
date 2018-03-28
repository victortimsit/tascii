class FullScreen {
    constructor(fullScreenIconClass, boxClass) {
        this.fullScreenIcons = document.querySelectorAll(fullScreenIconClass)
        this.box = document.querySelector(boxClass)

        for(const fullScreenIcon of this.fullScreenIcons) {
            fullScreenIcon.addEventListener('click', () => {
                this.fullScreen()
            })
        }
    }

    fullScreen() {
        this.box.classList.toggle('project__content--fullScreen')
        for(const fullScreenIcon of this.fullScreenIcons) {
            fullScreenIcon.classList.toggle('project__fullScreen--active')
        }
    }
}