jQuery.fn.progressBar = function (params) {
    params = jQuery.extend({ orientation: 'vertical', // vertical|horizontal -> definit si la progress bar est verticale ou horizontale
            value: 0, // valeur par d�faut
            rows: 30, // nombre de lignes pour l'affichage
            max: 100, // valeur maximum possible
            debug: false}, // affiche les infos de debug
        params);
    // pour chaque element qui doit contenir une progress bar
    this.each(function () {
        var nb_bar_on = Math.round(params.value * params.rows / params.max); // on calcul le nombre de barre "on"
        var pourcent = Math.round((100 * params.value / params.max) * 10) / 10; // sprintf '%0.1f'
        var title = Math.round(params.value * 10) / 10 + '/' + params.max + ' ' + pourcent + '%'; // sprintf '%0.1f'
        var tableau = '';
        if (params.orientation == 'vertical') { // progress bar VERTICAL
            tableau += '<table title="' + title + '" class="progressBar progressBar-vertical">';
            for (var i = 0; i < (params.rows - nb_bar_on); i++) { // affichage des barres off
                tableau += '<tr><td class="progressBar-off"></td></tr>';
            }
            for (var i = 0; i < nb_bar_on; i++) { // affichage des barres on
                tableau += '<tr><td class="progressBar-on progressBar-vertical"></td></tr>';
            }
            // affichage de la valeur en %
            tableau += '<tr><td class="progressBar-value progressBar-vertical">' + pourcent + '&nbsp;%</td></tr>';
        } else if (params.orientation == 'horizontal') { // progress bar HORIZONTAL
            tableau += '<table title="' + title + '" class="progressBar progressBar-horizonal">';
            // affichage de la valeur en %
            tableau += '<tr><td class="progressBar-value">' + pourcent + '&nbsp;%</td>';
            for (var i = 0; i < nb_bar_on; i++) { // affichage des barres on
                tableau += '<td class="progressBar-on"></td>';
            }
            for (var i = 0; i < (params.rows - nb_bar_on); i++) { // affichage des barres off
                tableau += '<td class="progressBar-off"></td>';
            }
            tableau += '</tr>';
        }
        tableau += '</table>';
        if (params.debug)
            tableau += "DEBUG<br/>" +
                "params.max='" + params.max + "'<br/>" +
                "params.value='" + params.value + "'<br/>" +
                "params.rows='" + params.rows + "'<br/>" +
                "nb_bar_on='" + nb_bar_on + "'<br/>" +
                "pourcent='" + pourcent + "'";
        $(this).html(tableau); // on affiche le tout dans l'element selectionn�
    });
    return this; // on retourne l'element envoy� pour ne pas rompre la chaine jQuery
}

