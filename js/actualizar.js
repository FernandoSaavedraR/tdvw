$boton = document.getElementById('actualizar')
$boton.addEventListener('click',async ()=>{
    event.preventDefault()
    const data = new FormData(document.getElementById('formulario'));
    const sesion = await fetch('./actualizar.php', {
        method: 'POST',
        body: data
     })
     const datos = await sesion.json()
     if(datos=="error"){
        swal('Credenciales incorrectas','revise sus datos.','error')
     }
     console.log(datos)
})