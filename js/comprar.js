
const $cmodal = document.getElementById('hide-modal')
//const $spanModal = document.getElementById('hide-modalA')
//$spanModal.addEventListener('click',hideModal)
$cmodal.addEventListener('click',hideModal)
function hideModal(){
    const $modal = document.getElementById('modall')
    const $div = document.getElementById("catalogo")
    const $overlay = document.getElementById('overlay')
    const $fecha = document.getElementById('fecha')
    const $total = document.getElementById('total')
    $overlay.classList.remove('active')
    console.log($modal)
    $modal.classList.remove('s-modal')
    $div.classList.remove('disabledbutton')
    const $input = document.getElementById("comprarInp")
    $input.value=""
    $fecha.value =""
    $total.innerHTML=""
    $modal.style.animation = 'modalOut .8s forwards'
}
function llenarModal(pastel,precio){
    const $modalTitle = document.getElementById("modal-title")
    const $compra = document.getElementById("modalCompra")
    const $input = document.getElementById("comprarInp")
    $modalTitle.innerHTML=`Comprar ${pastel}`
    $compra.innerHTML = `precio: $${precio}`
    $input.addEventListener('input',()=>{
        const $total = document.getElementById('total')
        if($input.value>0)
        {
            $total.innerHTML=`$${precio*parseInt($input.value)}`
        }
        else{
            $total.innerHTML=`$0`
        }
    })

}
function funcion(event){
    const pastel = event.target.dataset.name
    const precio = event.target.dataset.price
    console.log(event)
    const $modal = document.getElementById('modall')
    const $div = document.getElementById("catalogo")
    const $overlay = document.getElementById('overlay')
    //console.log($modal)
    $modal.classList.add('s-modal')
    $overlay.classList.add('active')
    $div.classList.add('disabledbutton')
    $modal.style.animation = 'modalIn .8s forwards'
    llenarModal(pastel,precio)
}


