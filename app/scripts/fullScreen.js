class FullScreen {
    constructor(fullScreenIconClass, fullScreenExitIconClass, projectBoxClass, contentBoxClass) {
        this.fullScreen = document.querySelectorAll(fullScreenIconClass)
        this.fullScreenExit = document.querySelectorAll(fullScreenExitIconClass)
        this.projectBox = document.querySelectorAll(projectBoxClass)
        this.contentBox = document.querySelectorAll(contentBoxClass)

        for(let i = 0; i < this.fullScreen.length; i++) {
            this.fullScreen[i].addEventListener('click', () => {
                this.fullScreenToggle(this.fullScreen, this.fullScreenExit, this.projectBox, this.contentBox, i)
            })
            this.fullScreenExit[i].addEventListener('click', () => {
                this.fullScreenToggle(this.fullScreen, this.fullScreenExit, this.projectBox, this.contentBox, i)
            })
        }
    }

    fullScreenToggle(fullScreen, fullScreenExit, projectBox, contentBox, i) {
        console.log(contentBox)
        fullScreen[i].classList.toggle('project__fullScreen--active')
        fullScreenExit[i].classList.toggle('project__fullScreen--active')
        projectBox[i].classList.toggle('project__content--fullScreen')
        contentBox[i].classList.toggle('project__content--fullScreen')       
    }
}