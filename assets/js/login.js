'use strict'

document.querySelector('#frm-login').addEventListener('submit', (event) => {

    let name = document.querySelector('#txt-name').value

    name =  name.trim()

    if (name.length < 3) {
        alert('Please, insert your name')
        
        event.preventDefault()
    }
})