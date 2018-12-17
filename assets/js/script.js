var btn2 = document.getElementById('btnsub');


btn2.addEventListener('click',function(e){
    e.preventDefault();

    var select = document.getElementById('selectedValues');
    var selectedValues= select.value;

    const req = new XMLHttpRequest(); 

    req.onreadystatechange = function(event) {
        // XMLHttpRequest.DONE === 4
        if (this.readyState === XMLHttpRequest.DONE) {
            if (this.status === 200) {
                console.log("Réponse reçue: %s", this.responseText);
                var result = document.getElementById('result');
                result.innerHTML = this.responseText;
            } else {
                console.log("Status de la réponse: %d (%s)", this.status, this.statusText);
            }
        }
    };
    
    req.open('GET','js/gestion.ajax.php?selectedValues='+ selectedValues, true);
    req.send(null);
});