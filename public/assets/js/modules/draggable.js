"use strict";
let dragElement = ''

export function drag(e){
    console.log(e)
    console.log("Dragging...")
    dragElement = this
    e.dataTransfer.effectAllowed = 'move'
    e.dataTransfer.setData('text/html', this.innerHTML)
    console.log(dragElement)
}

export function drop(f){
    console.log(f)
    console.log("Stop dragging object")
    f.preventDefault()
    this.dataTransfer = 'move'
    if (f.target.parentElement.classList.contains('list-item')){
        console.log("Issue noticed!")
        console.log(f.target.parentElement.parentElement)
        f.target.parentElement.parentElement.appendChild(dragElement)
    }
    else{
        f.target.appendChild(dragElement)
    }

}

export function resetDraggableObjects(objects){
    document.querySelectorAll(objects).forEach(item => item.removeEventListener('dragstart', drag))
    document.querySelectorAll(objects).forEach(item => item.addEventListener('dragstart', drag))
}

export function makeDropPoint(g){
    g.preventDefault()
}
