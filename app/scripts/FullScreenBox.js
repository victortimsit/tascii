class FullScreen {
    constructor(fullScreenIconClass, fullScreenExitIconClass, projectBoxClass, contentBoxClass, projectForm, gradientBox) {
        this.fullScreen = document.querySelectorAll('.' + fullScreenIconClass)
        this.fullScreenExit = document.querySelectorAll('.' + fullScreenExitIconClass)
        this.projectBox = document.querySelectorAll('.' + projectBoxClass)
        this.contentBox = document.querySelectorAll('.' + contentBoxClass)
        this.projectForms = document.querySelectorAll('.' + projectForm)
        this.gradientBox = document.querySelectorAll('.' + gradientBox)

        for(let i = 0; i < this.fullScreen.length; i++) {
            // Set current form and current tasks
            const currentForm = this.projectForms[i]
            const currentTasks = currentForm.childNodes

            // Disable fullscreen option when tasks are not out of the box
            if(currentTasks.length <= 14) {
                this.fullScreen[i].style.display = 'none'
                this.gradientBox[i].style.display = 'none'
            }

            // Event listener to display the right full screen icon
            this.fullScreen[i].addEventListener('click', () => {
                this.fullScreenToggle(this.fullScreen, this.fullScreenExit, this.projectBox, this.contentBox, i)
                // console.log(this.projectForm.childNodes)
            })
            this.fullScreenExit[i].addEventListener('click', () => {
                this.fullScreenToggle(this.fullScreen, this.fullScreenExit, this.projectBox, this.contentBox, i)
            })
        }
    }

    fullScreenToggle(fullScreen, fullScreenExit, projectBox, contentBox, i) {
        fullScreen[i].classList.toggle('project__fullScreen--active')
        fullScreenExit[i].classList.toggle('project__fullScreen--active')
        projectBox[i].classList.toggle('project__content--fullScreen')
        contentBox[i].classList.toggle('project__content--fullScreen')    
    }
}