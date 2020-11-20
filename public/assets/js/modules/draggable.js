"use strict";

let dragElement = ''

export function drag(e){
    dragElement = this
    e.dataTransfer.effectAllowed = 'move'
    e.dataTransfer.setData('text/html', this.innerHTML)
    console.log(dragElement)
}

export function drop(f){
    try{
        f.preventDefault()
        this.dataTransfer = 'move'
        switch (f.target.localName){
            case 'p': f.target.parentElement.parentElement.appendChild(dragElement); break
            case 'span': f.target.parentElement.parentElement.parentElement.appendChild(dragElement); break
            case 'h2': f.target.parentElement.parentElement.appendChild(dragElement); break
            case 'section': f.target.parentElement.appendChild(dragElement); break
            default: f.target.appendChild(dragElement); break
        }
    } catch (error){
        return null;
    }
}

export function resetDraggableObjects(objects){
    document.querySelectorAll(objects).forEach(item => item.removeEventListener('dragstart', drag))
    document.querySelectorAll(objects).forEach(item => item.addEventListener('dragstart', drag))
}

export function makeDropPoint(g){
    g.preventDefault()
}
