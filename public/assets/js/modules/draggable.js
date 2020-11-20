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
    f.dataTransfer.dropEffect = 'move'
    f.target.appendChild(dragElement)
}

export function resetDraggableObjects(objects){
    document.querySelectorAll(objects).forEach(item => item.removeEventListener('dragstart', drag))
    document.querySelectorAll(objects).forEach(item => item.addEventListener('dragstart', drag))
}

export function makeDropPoint(g){
    g.preventDefault()
}
