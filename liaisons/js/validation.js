var validation = {
    //si le javascript et activé, la classe js est placée dans le body
    jsActif: document.body.className = "js",
    //conserve la référence de l'élément de formulaire
    $refFormulaire: $(".rejoindreFormulaire"),
    //conserse le tableau des messages d'erreur
    tErreurs: messagesErreurForm,
    //tableau des validités des champs
    tValide: Array(),

    initialiser: function () {

        //si javascript est activé, jquery doit prendre le controle, pas de validation HTML pour le formulaire
        this.$refFormulaire.attr('novalidate', 'novalidate');

        //Définir les écouteurs d'événement des boutons submit et reset
        this.$refFormulaire.on("submit", this.validerFormulaire.bind(this));
        // this.$refFormulaire.on("reset", this.effacerFormulaire.bind(this));
        // this.$refFormulaire.on("submit", this..bind(this));
        //Définir les écouteurs blur des éléments de texte du formulaire
        this.$refFormulaire.find("#nom").on("blur", this.validerChampTexte.bind(this));
        this.$refFormulaire.find("#courriel").on("blur", this.validerChampTexte.bind(this));
        this.$refFormulaire.find("#message").on("blur", this.validerChampTexte.bind(this));
        this.$refFormulaire.find("#sujet").on("blur", this.validerChampTexte.bind(this));
        this.$refFormulaire.find("#destinataire").on("blur", this.validerChampTexte.bind(this));

        // this.$refFormulaire.find("#destinataire").on("blur", this.validerChampTexte(this));

        //Initialiser le tableau de validation $tValide
        this.tValide["nom"] = false;
        this.tValide["courriel"] = false;
        this.tValide["sujet"] = false;
        this.tValide["message"] = false;
        this.tValide["destinataire"] = false;

        //Vider les champs du formulaire, si fl
        this.$refFormulaire.find("input").val("");
        this.$refFormulaire.find("textarea").val("");

    },

    // validerChampDestinataire:function(evenement){
    //     var valide = false;
    //     //objet du DOM déclencheur, initialise un objet jQuery
    //     var objCible = $(evenement.currentTarget);
    //     if(this.validerSiVide(objCible)){
    //         this.afficherChampErreur(objCible, this.tErreurs[objCible.attr("name")]['erreurs']["vide"]);
    //     }
    //     else {
    //         var valide = true;
    //     }
    //
    //     this.modifierTableauValidation(objCible.attr("name"), valide);
    //
    // },

    validerChampTexte: function (evenement) {


        //champ invalide par défaut
        var valide = false;

        //objet du DOM déclencheur, initialise un objet jQuery
        var objCible = $(evenement.currentTarget);

        // console.log(objCible.val())

        var strChaineExp = new RegExp(objCible.attr('pattern'));

        if (this.validerSiVide(objCible)) {
            // console.log("vide");
            //si vide, afficher le message d'erreur
            this.afficherChampErreur(objCible, this.tErreurs[objCible.attr("name")]['erreurs']["vide"]);
        } else {
            // console.log("plein");
            var valide = true;
            if (strChaineExp.test(objCible.val())) {
                //effacer le champ d'erreur
                this.effacerChampErreurs(objCible);
            } else {
                //si pas vide, tester le pattern
                this.afficherChampErreur(objCible, this.tErreurs[objCible.attr("name")]['erreurs']["motif"]);
            }

        }
        //si pattern ok c'est valide





        //modifier le tableau des validitées
        this.modifierTableauValidation(objCible.attr("name"), valide);
    },

    validerFormulaire: function (evenement) {
        //Par defaut, le formulaire est considé comme valide
        var valide = true;
        //Pour chacun des champs présent dans le tableau de validation
        for (var champ in this.tValide) {
            if (this.tValide[champ] === false) {
                // if () {
                //cible l'objet du DOM fautif et créer un objet jQuery
                var objCible = $("#" + champ);

                var strChaineExp = new RegExp(objCible.attr('pattern'));
                //ici deux possibilité de message, vide ou pattern

                if (strChaineExp.test(objCible.val())) {
                    //sinon l'erreur que le champ est vide
                    this.afficherChampErreur(objCible, this.tErreurs[objCible.attr("name")]['erreurs']["vide"]);
                } else {
                    //affiche que l'entrée n'est pas du bon format
                    this.afficherChampErreur(objCible, this.tErreurs[objCible.attr("name")]['erreurs']["motif"]);
                }
                var valide = false;
            }
        }
        // si le formulaire n'est pas valide, on annule la soumission du formulaire de l'événement submit
        if (valide === false) {
            evenement.preventDefault();
        }
    },


    //Méthodes utilitaires**********************************
    validerSiVide: function (objCible) {
        var valide = true;
        if (objCible.val() !== "") {
            valide = false;
        }
        return valide;
    },

    modifierTableauValidation: function (nomChamp, valide) {
        this.tValide[nomChamp] = valide;
    },

    effacerChampErreurs: function (objCible) {
        var spanErreur=objCible.next();
        objCible.next().html("");
        objCible.parent(".formulaire__item").removeClass("erreur");
        spanErreur.next().addClass('invisible');
    },

    afficherChampErreur: function (objCible, message) {
        var spanErreur=objCible.next();
        objCible.next().html(message);
        objCible.parent(".formulaire__item").addClass("erreur");
        console.log(spanErreur.next())
        spanErreur.next().removeClass('invisible');
    },
};
//Fin méthodes utilitaires**********************************
$(document).ready(validation.initialiser.bind(validation));
