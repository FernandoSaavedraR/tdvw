console.log('hola')

const $login = document.getElementById("login")

$login.addEventListener('click',async (event)=>{
    event.preventDefault()
    //console.log(event)
    const data = new FormData(document.getElementById('formulario'));
    const sesion = await fetch('./sesion.php', {
        method: 'POST',
        body: data
     })
    const datos = await sesion.json()
    if(datos.SESION == 1){
        console.log("bienvenido")
        location.href ="./index.php"
    }else{
        alert('esto no jala')
    }
})  