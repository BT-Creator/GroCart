"use strict";
export function drag(e){
    console.log(e)
    console.log("Dragging...")
    this.style.opacity = '0.4'
}

export function drop(f){
    console.log(f)
    console.log("Stop dragging object")
    this.style.opacity = '1'
}

export function resetDraggableObjects(objects){
    document.querySelectorAll(objects).forEach(item => item.removeEventListener('dragstart', drag))
    document.querySelectorAll(objects).forEach(item => item.removeEventListener('dragend', drop))
    document.querySelectorAll(objects).forEach(item => item.addEventListener('dragstart', drag))
    document.querySelectorAll(objects).forEach(item => item.addEventListener('dragend', drop))
}
