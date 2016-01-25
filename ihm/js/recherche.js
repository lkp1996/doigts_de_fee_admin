function search_name(){
    var i;
    var tableau_clientes = document.getElementById("tableau_clientes");
    for(i = 0; i < tableau_clientes.rows.length; i++) {
        var name = document.getElementById("nom_" + i).innerHTML + " " + document.getElementById("prenom_" + i).innerHTML;
        var name_search = document.getElementById("search_name").value;
        if(name.toLowerCase().indexOf(name_search.toLowerCase()) > -1){
            document.getElementById(i).style.display = '';
        }else{
            document.getElementById(i).style.display = 'none';
        }
    }
}