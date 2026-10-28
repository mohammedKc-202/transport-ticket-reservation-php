const show_pw_btn = document.querySelector('#show-passwd')
const show_pw_icon = show_pw_btn.querySelector('img')
const pw_input = document.querySelector('#password')

show_pw_btn.addEventListener('click', () => {
    pw_input.type = pw_input.type === 'password'
    ? 'text'
    : 'password'

    show_pw_icon.src = show_pw_icon.src.includes('open')
    ? 'eye_closed.svg'
    : 'eye_open.svg'
});

const show_pw_btn1 = document.querySelector('#show-passwd1')
const show_pw_icon1 = document.querySelector('.img1')
const pw_input1 = document.querySelector('#password1')

show_pw_btn1.addEventListener('click', () => {
    pw_input1.type = pw_input1.type === 'password'
    ? 'text'
    : 'password'

    show_pw_icon1.src = show_pw_icon1.src.includes('open')
    ? 'eye_closed.svg'
    : 'eye_open.svg'
});

const show_pw_btn2 = document.querySelector('#show-passwd2')
const show_pw_icon2 = document.querySelector('.img2')
const pw_input2 = document.querySelector('#password2')

show_pw_btn2.addEventListener('click', () => {
    pw_input2.type = pw_input2.type === 'password'
    ? 'text'
    : 'password'

    show_pw_icon2.src = show_pw_icon2.src.includes('open')
    ? 'eye_closed.svg'
    : 'eye_open.svg'
})