"use strict";
export function drag(e){
    console.log(e)
    console.log("Dragging...")
}

export function drop(f){
    console.log(f)
    console.log("Stop dragging object")
}

export function resetDraggableObjects(objects){
    document.querySelectorAll(objects).forEach(item => item.removeEventListener('dragstart', drag))
    document.querySelectorAll(objects).forEach(item => item.removeEventListener('dragend', drop))
    document.querySelectorAll(objects).forEach(item => item.addEventListener('dragend', drag))
    document.querySelectorAll(objects).forEach(item => item.addEventListener('dragend', drop))
}
