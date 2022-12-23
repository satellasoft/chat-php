'use strict'

const host = 'http://localhost:8000/';
const updateTime = 3000

document.querySelector('#frm-chat').addEventListener('submit', (event) => {
    validateMessage()

    event.preventDefault()
})

document.querySelector('#txt-message').addEventListener('keypress', (event) => {
    if (event.key === "Enter") {
        validateMessage()
        event.preventDefault()
    }
})

const interval = setInterval(() => {
    getMessage()
}, updateTime)

function validateMessage() {

    let message = document.querySelector('#txt-message').value
    const userName = document.querySelector('#txt-user-name').value

    if (message.trim().length < 1) {
        alert('Please, insert your message')
        return;
    }

    sendMessage(message, userName)
}

function sendMessage(message, userName) {

    let form = new FormData()

    form.append('message', message)
    form.append('userName', userName)

    fetch(`${host}app/chat/write.php`, {
        method: 'POST',
        body: form
    })
        .then(response => {
            response.json().then(data => {

                console.log(data);

                if (typeof data.code != 'undefined' && data.code == -1) {
                    alert('Your message not send.');
                    return;
                }

                clearMessage()
            })
        })
        .catch((e) => {
            console.log(e)
        })
}

function getMessage() {
    fetch(`${host}app/chat/read.php`)
        .then(response => {
            response.json().then(data => {
                // console.log(data)

               document.querySelector('#chat').innerHTML = data.content
            })
        })
        .catch(e => {
            console.log(e)
        })
}

function clearMessage() {
    document.querySelector('#txt-message').value = ''
}