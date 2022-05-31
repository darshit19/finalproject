function caltotal() {
    var total = document.getElementById("total");
    total.value = parseInt(document.getElementById("floor").value) * parseInt(document.getElementById("flat").value);
    console.log(total.value);
  }