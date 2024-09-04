function tafutaKwenyeJedwali() {
    // Ingiza thamani kutoka kwenye search bar
    var input = document.getElementById("searchBar");
    var filter = input.value.toLowerCase();
    var table = document.getElementById("myTable");
    var tr = table.getElementsByTagName("tr");

    // Pitia kila mstari (tr) wa jedwali
    for (var i = 1; i < tr.length; i++) {
        var td = tr[i].getElementsByTagName("td");
        var match = false;
        
        // Angalia kila seli ndani ya mstari wa sasa
        for (var j = 0; j < td.length; j++) {
            if (td[j]) {
                var textValue = td[j].textContent || td[j].innerText;
                if (textValue.toLowerCase().indexOf(filter) > -1) {
                    match = true;
                    break;
                }
            }
        }

        // Onyesha mstari kama kuna mechi, au ficha kama hakuna mechi
        tr[i].style.display = match ? "" : "none";
    }
}
