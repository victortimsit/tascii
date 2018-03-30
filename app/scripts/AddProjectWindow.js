class AddProjectWindow {
    constructor(buttonToDisplayClass, buttonToUndisplayClass, windowToDisplayClass, windowVisibleClass, windowHiddenClass) {
        this.buttonToDisplay = document.querySelector('.' + buttonToDisplayClass)
        this.buttonToUndisplay = document.querySelector('.' + buttonToUndisplayClass)
        this.window = document.querySelector('.' + windowToDisplayClass)
        this.windowVisible = windowVisibleClass
        this.windowHidden = windowHiddenClass

        window.addEventListener('click', (event) => {
            if (this.buttonToDisplay.contains(event.target) || this.window.contains(event.target)) {
                // Clicked in buttonToDisplay
                this.window.classList.remove(this.windowHidden)
                this.window.classList.add(this.windowVisible)

            } else {
                // Clicked outside buttonToDisplay and window
                this.window.classList.remove(this.windowVisible)
                this.window.classList.add(this.windowHidden)
            }
        })
    }
}