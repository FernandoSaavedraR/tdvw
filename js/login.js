console.log('hola')

const $login = document.getElementById("login")

$login.addEventListener('click',async (event)=>{
    event.preventDefault()
    //console.log(event)
    const data = new FormData(document.getElementById('formulario'));
    const sesion = await fetch('./sesion.php', {
        method: 'POST',
        body: data
     }).catch(console.log("error"))
    const datos = await sesion.json().catch(console.log("error"))
    if(datos.SESION == 1){
        console.log("bienvenido")
        location.href ="./index.php"
    }else{
        swal.fire('Credenciales incorrectas','revise sus datos.','error')
    }
})  