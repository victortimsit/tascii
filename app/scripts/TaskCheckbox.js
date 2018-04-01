class TaskCheckbox {
    constructor(checkboxClass, checkBoxCheckedClass, taskClass) {
        this.checkbox = document.querySelectorAll('.' + checkboxClass)
        this.checkboxChecked = document.querySelectorAll('.' + this.checkBoxCheckedClass)
        this.task = document.querySelectorAll('.' + taskClass)
    }
}