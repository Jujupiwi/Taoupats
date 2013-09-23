//Constructeur d'attributs pour les tables
function TableAttrs(field, defaultVal) {
    "use strict";
    this.field = field;
    this.defaultVal = defaultVal;
}
//Constructeur contenant les informations de la ligne courante
function RowInfos(rowId, row) {
    "use strict";
    this.rowId = rowId;
    this.row = row;
}

//Scope du framework
var fmk = {

    //Timeout courant
    currentTimeout: 0,

    //Racine du context web
    contextRoot: null,

    //Paramètres mis en cache (webStorage)
    parameters: {
        //Durée d'affichage des popups par défaut
        defaultTimeout: "default.timeout",
        //Format date par défaut
        defaultDateFormat: "default.date.format",
        //Message de succès par défaut
        defaultSuccessMessage: "default.success.message",
        //Message d'erreur par défaut
        defaultErrorMessage: "default.error.message"
    },

    //Attributs d'une table et leurs valeurs par défaut
    tableAttributes: {
        //Indique si la table doit être gérée en AJAX pour les modifications et suppressions
        ajax: new TableAttrs("ajax", true),
        //Indique si les données doivent être rechargées après chaque modification ou suppression
        reload: new TableAttrs("reload", false),
        //Indique l'id de la popup permettant d'éditer la table
        editPopupId: new TableAttrs("edit-popup", "popup"),
        /**
         * base de l'uri afin de pouvoir appeler un contrôleur différent pour l'édition. Par exemple, si notre url
         * courante est '/fmk/param' et que nous souhaitons appeler l'url '/fmk/toto', la valeur doit être 'toto'
         */
        editUri: new TableAttrs("edit-uri", window.location.pathname),
        /**
         * base de l'uri afin de pouvoir appeler un contrôleur différent la suppression. Par exemple, si notre url
         * courante est '/fmk/param' et que nous souhaitons appeler l'url '/fmk/toto', la valeur doit être 'toto'.
         * Le message de confirmation de suppression sera également appelé à l'aide de cette uri
         */
        deleteUri: new TableAttrs("delete-uri", window.location.pathname)
    },

    /**
     * Récupère la valeur d'un élément mis en cache
     * @param code élément à récupérer en cache
     * @returns {*}
     */
    getParamValue: function (code) {
        "use strict";
        var ctx, path, param, params = [], result;
        if (sessionStorage.length === 0) { //webStorage non initialisé
            path = window.location.pathname;
            ctx = path.substring(0, path.substring(1).indexOf("/") + 1); //récupération du context root
            for (param in fmk.parameters) { //Création d'un tableau de paramètres
                if (fmk.parameters.hasOwnProperty(param)) {
                    params.push(fmk.parameters[param]);
                }
            }
            $.ajax({ //chargement du cache
                url: ctx + '/param/cache',
                data: {codes: params},
                traditional: true,
                async: false
            })
                .done(function (response) { //reponse contenant les valeurs du cache
                    var code;
                    if (response.success) {
                        for (code in response.data) { //Pour chaque paramètre
                            if (response.data.hasOwnProperty(code)) {
                                sessionStorage.setItem(code, response.data[code]); //Sauvegarde du paramètre
                            }
                        }
                    } else {
                        fmk.displayError(response);
                    }
                }).fail(function (response) {
                    fmk.displayError(response);
                });
        }
        result = sessionStorage.getItem(code); //Récupération du paramètre
        if (result !== null) {
            return result;
        }
        throw "Le paramètre '" + code + "' est absent du cache";
    },

    /**
     * Renvoi la valeur d'un attribut de la table et si il existe sinon sa valeur par défaut
     * @param $table objet jQuery représentant la table
     * @param attr TableAttrs contenant le champ à rechercher et sa valeur par défaut
     * @returns {*} valeur de l'attribut
     */
    getTableAttr: function ($table, attr) {
        "use strict";
        if (!attr) {
            throw "Attribut inconnu";
        }
        if (!attr.field) {
            throw "Le paramètre de la méthode est l'objet 'TableAttrs' est non la valeur de son attribut 'field'";
        }
        var res = $table.data(attr.field);
        return res === undefined ? attr.defaultVal : res;
    },


    /**
     * Affiche un message de succès dans le bandeau
     * @param [message] à afficher
     */
    displaySuccess: function (message) {
        "use strict";
        var alertDiv = $("#alert"), alertIcon = $('#alert-icon'), alertMessage = $('#alert-message');
        if (!message) {
            message = fmk.getParamValue(fmk.parameters.defaultSuccessMessage); //Récupération du message
        }
        clearTimeout(fmk.currentTimeout);
        alertMessage.text(message);
        if (alertDiv.hasClass('alert-danger')) {
            alertDiv.removeClass('alert-danger');
        }
        if (!alertDiv.hasClass('alert-success')) {
            alertDiv.addClass('alert-success');
        }
        if (alertIcon.hasClass('icon-warning-sign')) {
            alertIcon.removeClass('icon-warning-sign');
        }
        if (!alertIcon.hasClass('icon-ok')) {
            alertIcon.addClass('icon-ok');
        }
        alertDiv.addClass('in'); //Fait apparaitre l'alert
        fmk.currentTimeout = window.setTimeout(function () { //Fait disparaitre l'alerte au bout d'un certain temps
            alertDiv.removeClass('in');
        }, fmk.getParamValue(fmk.parameters.defaultTimeout));
    },

    /**
     * Affiche un message d'erreur dans le bandeau
     * @param [response] ResponseMessage contenant le message
     */
    displayError: function (response) {
        "use strict";
        var alertDiv = $("#alert"), alertIcon = $('#alert-icon'), alertMessage = $('#alert-message'), message;
        if (response) {
            if (response.message) {
                message = response.message; //Récupération du message
            } else {
                message = fmk.getParamValue(fmk.parameters.defaultErrorMessage);
            }
        } else {
            message = fmk.getParamValue(fmk.parameters.defaultErrorMessage); //Si pas de message on prend le default
        }
        clearTimeout(fmk.currentTimeout);
        alertMessage.text(message);
        if (alertDiv.hasClass('alert-success')) {
            alertDiv.removeClass('alert-success');
        }
        if (!alertDiv.hasClass('alert-danger')) {
            alertDiv.addClass('alert-danger');
        }
        if (alertIcon.hasClass('icon-ok')) {
            alertIcon.removeClass('icon-ok');
        }
        if (!alertIcon.hasClass('icon-warning-sign')) {
            alertIcon.addClass('icon-warning-sign');
        }
        alertDiv.addClass('in'); //Affichage de l'alerte
    },

    /**
     * Ajoute l'identifiant des formulaires aux requêtes de contrôle 'remote' de jQuery validation.
     * @param url de la fonction de contrôle
     * @param [id] identifiant représentant l'id de l'objet à contrôler
     * @returns {{url: *, data: {id: (*|jQuery)}}}
     */
    control: function (url, id) {
        "use strict";
        var domainIdVal = id ? $('#' + id).val() : $('#id').val();
        if (!domainIdVal.length) {
            throw "L'identifiant du formulaire '" + id ? id : 'id' + "' est introuvable";
        }
        return {
            url: url,
            data: {
                id: domainIdVal
            }
        };
    },

    /**
     * Créée une table gérée par le framework puis stocke une référence de la table en avec jQuery.data
     * @param id identifiant de la table
     * @param options paramètres de la table
     */
    createTable: function (id, options) {
        "use strict";
        var $table = $('#' + id);
        if (!$table.length) {
            throw "L'identifiant de la table est incorrect";
        }
        $table.data('dt', $table.dataTable(options)); //On stocke une référence vers l'objet 'dataTable'
    },

    /**
     * Affiche le contenu d'une colonne de détail avec débranchement vers écran détail
     * @param [id] identifiant de la table (defaut = "id")
     * @param [width] taille de la colonne (defaut = 100)
     * @returns {{mData: string, sWidth: number, bSearchable: boolean, bSortable: boolean, sClass: string, mRender:
     * Function}}
     */
    detailCol: function (id, width) {
        "use strict";
        return {
            mData: id || "id",
            sWidth: width || 100,
            bSearchable: false,
            bSortable: false,
            sClass: "center",
            mRender: function (data) {
                var path = window.location.pathname, detailUrl;
                detailUrl = path.match(/\/$/) ? path + data + "/detail" : path + "/" + data + "/detail";
                return "<a href='" + detailUrl + "'><i class='icon-search icon-large'></i></a>";
            }
        };
    },

    /**
     * Affiche le contenu d'une colonne de édition avec débranchement vers écran détail
     * @param [id] identifiant de la table (defaut = "id")
     * @param [width] taille de la colonne (defaut = 100)
     * @returns {{mData: string, sWidth: number, bSearchable: boolean, bSortable: boolean, sClass: string, mRender:
     * Function}}
     */
    editCol: function (id, width) {
        "use strict";
        return {
            mData: id || "id",
            sWidth: width || 100,
            bSearchable: false,
            bSortable: false,
            sClass: "center",
            mRender: function (data) {
                var path = window.location.pathname, editUrl;
                editUrl = path.match(/\/$/) ? path + data : path + "/" + data;
                return "<a class='edit-btn' href='" + editUrl + "'><i class='icon-edit icon-large'></i></a>";
            }
        };
    },

    /**
     * Affiche le contenu d'une colonne de modification avec débranchement vers une popup
     * @param [id] identifiant de la table (defaut = "id")
     * @param [width] taille de la colonne (defaut = 100)
     * @returns {{mData: string, sWidth: number, bSearchable: boolean, bSortable: boolean, sClass: string, mRender:
     * Function}}
     */
    popupCol: function (id, width) {
        "use strict";
        return {
            mData: id || "id",
            sWidth: width || 100,
            bSearchable: false,
            bSortable: false,
            sClass: "center",
            mRender: function (data) {
                return "<a href='javascript:;' class='edit-btn' onclick='fmk.displayEditPopup( " + data + ", $(this))'>"
                    + "<i class='icon-edit icon-large'></i></a>";
            }
        };
    },

    /**
     * Affiche le contenu d'une colonne de suppression
     * @param [id] identifiant de la table (defaut = "id")
     * @param [width] taille de la colonne (defaut = 115)
     * @returns {{mData: string, sWidth: number, bSearchable: boolean, bSortable: boolean, sClass: string, mRender:
      * Function}}
     */
    deleteCol: function (id, width) {
        "use strict";
        return {
            mData: id || "id",
            sWidth: width || 115,
            bSearchable: false,
            bSortable: false,
            sClass: "center",
            mRender: function (data) {
                var fct = "fmk.displayConfirmPopup(" + data + ", $(this))";
                return "<a href='javascript:;' onclick='" + fct + "'><i class='icon-trash icon-large'></i></a>";
            }
        };
    },

    /**
     * Affiche la popup de confirmation d'une suppression de ligne
     * @param id identifiant de la ligne à supprimer
     * @param $event évennement
     */
    displayConfirmPopup: function (id, $event) {
        "use strict";
        var uri, $table = $event.closest("table[id^=dt_]"); //Récupération de la table
        if (!$table.length) {
            throw "La table est introuvable. Le nom d'une datatable doit commencer par dt_";
        }
        uri = this.getTableAttr($table, this.tableAttributes.deleteUri);
        uri = uri.match(/\/$/) ? uri + id : uri + "/" + id;
        $.ajax(uri + '/message').
            done(function (response) { //Récupération du message à afficher dans la popup
                if (response.success) {
                    $('#delete-message').text(response.message);
                } else {
                    $("#confirmDeletePopup").modal('hide');
                    fmk.displayError(response);
                }

            }).fail(function (response) {
                $("#confirmDeletePopup").modal('hide');
                fmk.displayError(response);
            });
        //Stockage des infos relatives à la ligne ayant déclenché l'événement
        $table.data("rowInfos", new RowInfos(id, $event.closest('tr')[0]));
        $('body').data("currentTable", $table.attr('id'));
        $("#confirmDeletePopup").modal();
    },

    /**
     * Supprime une ligne de la table
     */
    removeRow: function () {
        "use strict";
        var tableId = $('body').data('currentTable'), $table = $('#' + tableId), dataTable = $table.data('dt'),
            rowInfos = $table.data('rowInfos'), uri;
        uri = fmk.getTableAttr($table, fmk.tableAttributes.deleteUri);
        uri = uri.match(/\/$/) ? uri + rowInfos.rowId : uri + "/" + rowInfos.rowId;
        if (fmk.getTableAttr($table, fmk.tableAttributes.ajax)) { //Appel AJAX
            $.ajax({
                type: 'DELETE',
                url: uri
            }).done(
                function (response) {
                    if (response.success) {
                        dataTable.fnDeleteRow(rowInfos.row); //Si delete effectuée côté serveur on le fait côté client
                        if (fmk.getTableAttr($table, fmk.tableAttributes.reload)) { //Si les données sont rechargées
                            dataTable.fnReloadAjax(); //Rechargement des données
                        }
                        fmk.displaySuccess(response.message);
                    } else {
                        dataTable.fnReloadAjax();
                        fmk.displayError(response);
                    }
                    $('#confirmDeletePopup').modal('hide'); //On cache la popup de confirmation
                }
            ).fail(
                function (response) {
                    dataTable.fnReloadAjax();
                    fmk.displayError(response);
                    $('#confirmDeletePopup').modal('hide');
                }
            );
        } else { //Appel non-AJAX
            window.location = uri + "/delete";
        }
    },

    /**
     * Affiche la popup d'édition d'une ligne
     * @param id identifiant de la ligne
     * @param $event évennement ayant déclenché l'ouverture (click icone edit)
     */
    displayEditPopup: function (id, $event) {
        "use strict";
        var $table = $event.closest("table[id^=dt_]"), $popup, $newTitle, $editTitle, uri;
        $popup = $('#' + fmk.getTableAttr($table, fmk.tableAttributes.editPopupId));
        if (!$popup.length) {
            throw "Popup introuvable";
        }
        $newTitle.hide();
        $editTitle.show();
        $popup.modal();
        uri = uri.match(/\/$/) ? uri + id : uri + "/" + id;
        $.ajax(uri).done(function (response) {
            var field, data = response.data;
            if (response.success) {
                for (field in data) {
                    if (data.hasOwnProperty(field)) {
                        $popup.find('input[name="' + field + '"]').val(data[field]);
                    }
                }
                $popup.data(new RowInfos(id, $event.closest('tr')[0]));
            } else {
                fmk.displayError(response);
                $table.fnReloadAjax();
                $popup.modal('hide');
            }
        })
            .error(function (response) {
                $table.fnReloadAjax();
                fmk.displayError(response);
            });
    }
};

$(function () {
    "use strict";
    var $alert = $('#alert'), $wrapTable = $('table.wrap'), $searchFormClient = $('.search-form.client');

    //Display les alertes déjà initialisées
    if ($alert.hasClass('alert-success')) {
        $alert.addClass('in');
        fmk.currentTimeout = window.setTimeout(function () { //Fait disparaitre l'alerte au bout d'un certain temps
            $alert.removeClass('in');
        }, fmk.getParamValue(fmk.parameters.defaultTimeout));
    }
    if ($alert.hasClass('alert-danger')) {
        $alert.addClass('in');
    }


    //Ajoute la classe 'wrap-cell' sur les cellules qui sont wrappées
    $wrapTable.on('mouseenter', 'td', function (e) {
        var target = e.target, $target = $(target);
        if (target.offsetWidth < target.scrollWidth) {
            $target.addClass('wrap-cell');
        }
    });

    //Gère le wrapping et unwrapping des cellules ayant la classe 'wrap-cell'
    $wrapTable.on('click', 'td.wrap-cell', function (e) {
        var target = e.target, $target = $(target);
        if ($target.hasClass('unwrap')) {
            $target.removeClass('unwrap');
        } else {
            $target.addClass('unwrap');
        }
    });

    //Recherche en mode client (type:text)
    $searchFormClient.find('input').keyup(function () {
        var dataTable, tableId, $dt, $form = $(this).closest('form'), idx = $(this).data('idx');
        tableId = $form.data('table-id');
        if (!tableId) { //Si le développeur n'a pas spécifié sur quelle table la recherche doit être effectuée
            $dt = $('table[id^=dt_]');
            if ($dt.length !== 1) {
                throw "Impossible de definir la table sur laquelle la recherche doit être effectuée";
            }
            tableId = $dt.attr('id');
        }
        dataTable = $('#' + tableId).data('dt'); // Récupération de la dataTable
        if (!dataTable) {
            throw "DataTable introuvable. Aucune DataTable pour l'id : '" + tableId + "'.";
        }
        if (idx === undefined) {
            idx = $('.search-form.client').find(':input').index(this);
        }
        dataTable.fnFilter($(this).val(), idx);
    });

    //Recherche en mode client (type:select)
    $searchFormClient.find('select').change(function () {
        var dataTable, tableId, $dt, $form = $(this).closest('form'), idx = $(this).data('idx');
        tableId = $form.data('table-id');
        if (!tableId) { //Si le développeur n'a pas spécifié sur quelle table la recherche doit être effectuée
            $dt = $('table[id^=dt_]');
            if ($dt.length !== 1) {
                throw "Impossible de definir la table sur laquelle la recherche doit être effectuée";
            }
            tableId = $dt.attr('id');
        }
        dataTable = $('#' + tableId).data('dt'); // Récupération de la dataTable
        if (!dataTable) {
            throw "DataTable introuvable. Aucune DataTable pour l'id : '" + tableId + "'.";
        }
        if (idx === undefined) {
            idx = $('.search-form.client').find(':input').index(this);
        }
        dataTable.fnFilter($(this).val(), idx);
    });

    //Fermeture des alertes après click sur 'close'
    $('#close-alert').click(function () {
        $(this).parent('.alert').removeClass('in');
    });
});
