class DragDelete {
    constructor(elementsToDragClass, trashElementClass) {
        this.drags = document.querySelectorAll('.' + elementsToDragClass)
        this.trash = document.querySelector('.' + trashElementClass)

        this.mouse = {
            x: 0,
            y: 0
        }

        for(const drag of this.drags) {
            drag.addEventListener('mousedown', () => {
                console.log('down')
                document.addEventListener('mousemove', (event) => {
                    this.mouse.x = event.clientX
                    this.mouse.y = event.clientY
                    
                    console.log(this.mouse.x)
                    drag.style.transform = `translateX(${this.mouse.x - drag.offsetWidth}px) translateY(${this.mouse.y - drag.offsetHeight}px)`
                    
                })
            })
        }
        
    }
}

// CONSTRUCTION