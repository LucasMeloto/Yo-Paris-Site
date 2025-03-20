// function updatePriceDisplay(value) {
//     document.getElementById("minPrice").innerText = value;
//   }

  //function filterByPrice() {
    //const minPrice = document.getElementById('priceRange').value;
    //const maxPrice = document.getElementById('priceRange').max;

    // Cria a URL para envio
    //const url = `../produtos/listar.php?min=${minPrice}&max=${maxPrice}`;
    
    // Redireciona para a URL

   //window.location.href = url;
//}

//function updateInterval(value) {
  // const minValue = Math.max(0, value - 200); // Define intervalo mínimo baseado no máximo
  // const maxValue = value; // O máximo é o valor do range

  // document.getElementById('minPriceDisplay').innerText = minValue;
  // document.getElementById('maxPriceDisplay').innerText = maxValue;

  // document.getElementById('minValue').value = minValue;
  // document.getElementById('maxValue').value = maxValue;
//}


function updatePrice(value) {
  document.getElementById('minPrice').textContent = value;
}

function applyPriceFilter() {
  var minValue = document.getElementById('priceRange').value;
 //window.location.href = "?min=" + minValue; // Redireciona com o valor do filtro de preço
}




  