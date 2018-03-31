class CategoryColor {
    constructor(categoryIconsClass, blueRadioClass, orangeRadioClass, greenRadioClass, purpleRadioClass, yellowRadioClass, radioCategoryCheckedClass, radioColorCheckedClass, sendFormButtonClass) {
        this.icons = document.querySelectorAll(categoryIconsClass)
        this.blue = document.querySelector(blueRadioClass)
        this.orange = document.querySelector(orangeRadioClass)
        this.green = document.querySelector(greenRadioClass)
        this.purple = document.querySelector(purpleRadioClass)
        this.yellow = document.querySelector(yellowRadioClass)
        this.categoryChecked = document.querySelector(radioCategoryCheckedClass)
        this.colorChecked = document.querySelector(radioColorCheckedClass)
        this.sendFormButton = document.querySelector(sendFormButtonClass)

        // Detect checked color and change color's icons
        if(this.categoryChecked != null) {
            // for(const icon of this.icons) {
            //     icon.classList.remove('addProject__icon--blue')
            // }
            switch(this.colorChecked.dataset.color) {
                case 'blue':
                    for(const icon of this.icons) {
                        icon.classList.add('addProject__icon--blue')
                    }
                    break
                case 'orange':
                    for(const icon of this.icons) {
                        icon.classList.add('addProject__icon--orange')
                    }
                    break
                case 'green':
                    for(const icon of this.icons) {
                        icon.classList.add('addProject__icon--green')
                    }
                    break
                case 'purple':
                    for(const icon of this.icons) {
                        icon.classList.add('addProject__icon--purple')
                    }
                    break
                case 'yellow':
                    for(const icon of this.icons) {
                        icon.classList.add('addProject__icon--yellow')
                    }
                    break
            }
        }


        this.blue.addEventListener('click', () => {
            for(let icon of this.icons) {
                icon.classList.add('addProject__icon--blue')
                icon.classList.remove('addProject__icon--orange')
                icon.classList.remove('addProject__icon--green')
                icon.classList.remove('addProject__icon--purple')
                icon.classList.remove('addProject__icon--yellow')
            }
        })
        this.orange.addEventListener('click', () => {
            for(let icon of this.icons) {
                icon.classList.add('addProject__icon--orange')
                icon.classList.remove('addProject__icon--blue')
                icon.classList.remove('addProject__icon--green')
                icon.classList.remove('addProject__icon--purple')
                icon.classList.remove('addProject__icon--yellow')
            }
        })
        this.green.addEventListener('click', () => {
            for(let icon of this.icons) {
                icon.classList.add('addProject__icon--green')
                icon.classList.remove('addProject__icon--blue')
                icon.classList.remove('addProject__icon--orange')
                icon.classList.remove('addProject__icon--purple')
                icon.classList.remove('addProject__icon--yellow')
            }
        })
        this.purple.addEventListener('click', () => {
            for(let icon of this.icons) {
                icon.classList.add('addProject__icon--purple')
                icon.classList.remove('addProject__icon--blue')
                icon.classList.remove('addProject__icon--orange')
                icon.classList.remove('addProject__icon--green')
                icon.classList.remove('addProject__icon--yellow')
            }
        })
        this.yellow.addEventListener('click', () => {
            for(let icon of this.icons) {
                icon.classList.add('addProject__icon--yellow')
                icon.classList.remove('addProject__icon--blue')
                icon.classList.remove('addProject__icon--orange')
                icon.classList.remove('addProject__icon--green')
                icon.classList.remove('addProject__icon--purple')
            }
        })
    }
}