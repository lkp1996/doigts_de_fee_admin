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

function search_cliente(){
    document.getElementById("list_dates").selectedIndex = 0;
    document.getElementById("list_prestataires").selectedIndex = 0;
    var i;
    var tableau_prestations = document.getElementById("tableau_prestations");
    for(i = 0; i < tableau_prestations.rows.length; i++) {
        var cliente = document.getElementById("cliente_" + i).innerHTML;
        var selected_cliente = document.getElementById( "list_clientes" ).options[document.getElementById("list_clientes").selectedIndex].innerHTML;
        if(selected_cliente == "-- Choisir cliente --"){
            document.getElementById(i).style.display = '';
        }else if(cliente != selected_cliente){
            document.getElementById(i).style.display = 'none';
        }else{
            document.getElementById(i).style.display = '';
        }
    }
}

function search_prestataire(){
    document.getElementById("list_dates").selectedIndex = 0;
    document.getElementById("list_clientes").selectedIndex = 0;
    var i;
    var tableau_prestations = document.getElementById("tableau_prestations");
    for(i = 0; i < tableau_prestations.rows.length; i++) {
        var prestataire = document.getElementById("prestataire_" + i).innerHTML;
        var selected_prestataire = document.getElementById( "list_prestataires" ).options[document.getElementById("list_prestataires").selectedIndex].innerHTML;
        if(selected_prestataire == "-- Choisir prestataire --"){
            document.getElementById(i).style.display = '';
        }else if(prestataire != selected_prestataire){
            document.getElementById(i).style.display = 'none';
        }else{
            document.getElementById(i).style.display = '';
        }
    }
}

function search_date(){
    document.getElementById("list_clientes").selectedIndex = 0;
    document.getElementById("list_prestataires").selectedIndex = 0;
    var aujourdhui = new Date();
    var aujourdhui_format = "";
    if(aujourdhui.getDate() < 10 && (aujourdhui.getMonth() + 1) < 10){
        aujourdhui_format = "0" + aujourdhui.getDate() + "/0" + (aujourdhui.getMonth() + 1) + "/" + aujourdhui.getFullYear();
    }else if(aujourdhui.getDate() < 10 && (aujourdhui.getMonth() + 1) > 10){
        aujourdhui_format = "0" + aujourdhui.getDate() + "/" + (aujourdhui.getMonth() + 1) + "/" + aujourdhui.getFullYear();
    }else if(aujourdhui.getDate() > 10 && (aujourdhui.getMonth() + 1) < 10){
        aujourdhui_format = aujourdhui.getDate() + "/0" + (aujourdhui.getMonth() + 1) + "/" + aujourdhui.getFullYear();
    }else{
        aujourdhui_format = aujourdhui.getDate() + "/" + (aujourdhui.getMonth() + 1) + "/" + aujourdhui.getFullYear();
    }
    var i;
    var tableau_prestations = document.getElementById("tableau_prestations");
    for(i = 0; i < tableau_prestations.rows.length; i++) {
        var date = document.getElementById("date_" + i).innerHTML;
        var selected_date = document.getElementById( "list_dates" ).options[document.getElementById("list_dates").selectedIndex].value;
        var annee = date[6] + date[7] + date[8] + date[9];
        var mois = date[3] + date[4];
        var jour = date[0] + date[1];
        var date_select = new Date(annee, mois - 1, jour);
        if(selected_date == "-- Choisir date --"){
            document.getElementById(i).style.display = '';
        }else if(selected_date == "Aujourd'hui"){
            if(date == aujourdhui_format){
                document.getElementById(i).style.display = '';
            }else{
                document.getElementById(i).style.display = 'none';
            }
        }else if(selected_date == "Cette semaine"){
            
            if(date_select.getWeek() == aujourdhui.getWeek()){
                document.getElementById(i).style.display = '';
            }else{
                document.getElementById(i).style.display = 'none';
            }
        }else if(selected_date == "Ce mois"){
            if(mois == (aujourdhui_format[3] + aujourdhui_format[4]) && annee == (aujourdhui_format[6] + aujourdhui_format[7] + aujourdhui_format[8] + aujourdhui_format[9])){
                document.getElementById(i).style.display = '';
            }else{
                document.getElementById(i).style.display = 'none';
            }
        }else if(selected_date == "Cette Année"){
            if(date.indexOf(aujourdhui.getFullYear()) == 6){
                document.getElementById(i).style.display = '';
            }else{
                document.getElementById(i).style.display = 'none';
            }
        }
    }
}

Date.prototype.getWeek = function () {  
    // Create a copy of this date object  
    var target  = new Date(this.valueOf());  
  
    // ISO week date weeks start on monday  
    // so correct the day number  
    var dayNr   = (this.getDay() + 6) % 7;  
  
    // ISO 8601 states that week 1 is the week  
    // with the first thursday of that year.  
    // Set the target date to the thursday in the target week  
    target.setDate(target.getDate() - dayNr + 3);  
  
    // Store the millisecond value of the target date  
    var firstThursday = target.valueOf();  
  
    // Set the target to the first thursday of the year  
    // First set the target to january first  
    target.setMonth(0, 1);  
    // Not a thursday? Correct the date to the next thursday  
    if (target.getDay() != 4) {  
        target.setMonth(0, 1 + ((4 - target.getDay()) + 7) % 7);  
    }  
  
    // The weeknumber is the number of weeks between the   
    // first thursday of the year and the thursday in the target week  
    return 1 + Math.ceil((firstThursday - target) / 604800000); // 604800000 = 7 * 24 * 3600 * 1000  
}  