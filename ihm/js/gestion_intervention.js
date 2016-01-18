/**
 * Cette fonction va copier le contenue de id_td et va le mettre dans id_input.
 * @param id_td : id du td
 * @param id_input : id de l'input
 */
function copie_texte(id_td, id_input){
		document.getElementById(id_input).value = document.getElementById(id_td).innerText;
}

/**
 * Cette fonction va mettre la pk_intervention dans l'id_intervention et execute le formulaire pour supprimer l'intervention.
 * @param pk_intervention : la pk de l'intervention
 */
function supprime_intervention(pk_intervention){
	document.getElementById("id_intervention").value = pk_intervention;
	document.forms["form_supprime_intervention"].submit();
}

/**
 * Cette fonction va copier le contenue de id_intervention_plus_un et execute le formulaire pour mettre à jour l'ordre de l'intervention (+1)
 * @param pk_intervention : la pk de l'intervention
 */
function update_intervention_plus_un(pk_intervention){
	document.getElementById("id_intervention_plus_un").value = pk_intervention;
	document.forms["form_update_intervention_plus_un"].submit();
}

/**
 * Cette fonction va copier le contenue de id_intervention_moins_un et execute le formulaire pour mettre à jour l'ordre de l'intervention (-1)
 * @param pk_intervention : la pk de l'intervention
 */
function update_intervention_moins_un(pk_intervention){
	document.getElementById("id_intervention_moins_un").value = pk_intervention;
	document.forms["form_update_intervention_moins_un"].submit();
}

/**
 * Cette fonction va copier le contenue de area_texte pour le mettre dans id_intervention_add_texte,
 * ensuite elle va récuperer la valeur du select pour le mettre dans id_intervention_add_intervenant 
 * et execute le formulaire pour ajouter l'intervention.
 */
function add_intervention(){
	document.getElementById("id_intervention_add_texte").value = document.getElementById("area_texte").value;
	var select = document.getElementById("select_intervenant");
	var pk_intervenant = select.options[select.selectedIndex].value;
	document.getElementById("id_intervention_add_intervenant").value = pk_intervenant;
	document.forms["form_add_intervention"].submit();
}