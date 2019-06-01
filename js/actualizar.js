async function llenar() {
 const $fondos = document.getElementById('fondos')
 const  $nombre = document.getElementById('nombre')
 const  $apellidos = document.getElementById('apellidos')
 const $direccion = document.getElementById('direccion')
 const $sexo = document.getElementById('sexo')
 const $tarjeta = document.getElementById('tarjeta')
 const $caducidad = document.getElementById('caducidad')
 const  $cvv = document.getElementById('cvv')
 const data = await fetch("./llenar.php").catch(console.log("error"))
 const datos = await data.json().catch(console.log("error"))
 console.log(datos)
 $nombre.value = datos.nombre;
 $apellidos.value = datos.apellidos;
 $direccion.value = datos.direccion;
 console.log($sexo.selectedIndex)
 if(datos.sexo ==1){
    $sexo.selectedIndex=0
 }else{
    $sexo.selectedIndex=1
 }
 if(datos.cvv==null || datos.numero == null || datos.banco==null){}
 else{
    $tarjeta.value = datos.numero;
    $caducidad.value = datos.banco;
    $cvv.value = datos.cvv;
    $fondos.value = datos.fondos;
 }
}
llenar()

$boton = document.getElementById("actualizar");
$boton.addEventListener("click", async () => {
  event.preventDefault();
  const data = new FormData(document.getElementById("formulario"));
  const sesion = await fetch("./actualizar.php", {
    method: "POST",
    body: data
  }).catch(console.log("error"));
  const datos = await sesion.json().catch(console.log("error"));
  if (datos == "error") {
    swal.fire("Credenciales incorrectas", "revise sus datos.", "error");
  }else{
    swal.fire("Datos actualizados", "todo se ha logrado actualizar", "success");
  }
  //console.log(datos);
  llenar()
});

$pedidos = document.getElementById("pedidos")
$botones = $pedidos.getElementsByTagName("button")
for(let i = 0;i<$botones.length;i++){
  
  $botones[i].addEventListener('click',async (event)=>{
    event.preventDefault();
    $id = event.target.dataset.id
    const sesion = await fetch(`./cancelar.php?id=${$id}`)
    const datos = await sesion.text()
    swal.fire(datos).then(()=>{location.reload(true)})
    
  })
}