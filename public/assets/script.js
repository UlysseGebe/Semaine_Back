//popup

const popup = document.querySelectorAll('.move')
const background = document.querySelector('.background')
const close = document.querySelector('.close')

console.log(popup)

function openPopup() {
    background.style.display = 'flex'
}

function closePopup() {
    background.style.display = 'none'
}   

for (const pop of popup) {
    pop.addEventListener('click', ()=>{
        openPopup()
    })
}

close.addEventListener('click', closePopup)
