class ScrollTo {
    constructor(scroolToElementsClass) {
        this.scrollToElements = document.querySelectorAll('.' + taskClass)
        this.scrollToElement;

        for(const task of this.scrollToElements) {
            task.addEventListener('click', () => {
                task.classList.add('scrollTo')
            })
        }
    }
}

// CONSTRUCTION