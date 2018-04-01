class TaskCheckbox {
    constructor(checkboxClass, checkBoxCheckedClass, taskClass) {
        this.checkboxs = document.querySelectorAll('.' + checkboxClass)
        this.checkboxCheckeds = document.querySelectorAll('.' + checkBoxCheckedClass)
        this.tasks = document.querySelectorAll('.' + taskClass)


        console.log(this.checkboxCheckeds)
        for(let task = 0; task < this.tasks.length; task++) {

            this.tasks[task].addEventListener('click', () => {
                this.checkboxs[task].classList.remove('project__checkbox--notdone')
                this.checkboxs[task].classList.add('project__checkbox--done')
                
                this.checkboxCheckeds[task].classList.remove('project__taskDone--notdone')
                this.checkboxCheckeds[task].classList.add('project__taskDone--done')
            })
        }
    }
}