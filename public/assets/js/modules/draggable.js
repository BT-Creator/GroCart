"use strict";
let dragElement = ''

export function drag(e){
    console.log(e)
    console.log("Dragging...")
    this.style.opacity = '0.4'
    dragElement = this
    e.dataTransfer.effectAllowed = 'move'
    e.dataTransfer.setData('text/html', this.innerHTML)
    console.log(dragElement)
}

export function drop(f){
    console.log(f)
    console.log("Stop dragging object")
    f.stopPropagation()
    this.style.opacity = '1'
    f.dataTransfer.dropEffect = 'move'
    f.target.appendChild(dragElement)
    return false
}

export function resetDraggableObjects(objects){
    document.querySelectorAll(objects).forEach(item => item.removeEventListener('dragstart', drag))
    document.querySelectorAll(objects).forEach(item => item.removeEventListener('dragend', drop))
    document.querySelectorAll(objects).forEach(item => item.addEventListener('dragstart', drag))
    document.querySelectorAll(objects).forEach(item => item.addEventListener('dragend', drop))
}
