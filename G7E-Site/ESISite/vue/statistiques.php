<?php
/**
 * Created by PhpStorm.
 * User: mathi
 * Date: 25/04/2019
 * Time: 10:48
 */
?>

<!--
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>ESI - Quotidien</title>
    <link rel="stylesheet" href="vue/CSS/css.statistiques.css"/>

</head>


<body>
<h1>Suite de Fibonacci</h1>

<h2>1- Données</h2>
<tr>
    <td> u<sub>0</sub> = </td>
    <td><input type="text" id="u0" name="u0" value="0"></td>
</tr><br />
<tr>
    <td>u<sub>1</sub> = </td>
    <td><input type="text" id="u1" name="u1" value="1"></td>
</tr><br />
<tr style="margin-bottom:5px;">
    <td> &#8239; n  =</td>
    <td><input type="text" id="n" name="n" value="10"> (dans l'intervalle [0,20])</td>
</tr><br />
<tr>
    <button style="width:350px;" type="button" onclick="invalide();calculer();dessin();">Calculer</button>
</tr>

<h2>2- Résultats</h2>
u<sub>n</sub> = <input type="text" id="afficheUn" disabled="disabled" name="un"><br />
s<sub>n</sub> = <input type="text" id="afficheSn" disabled="disabled" name="sn"><br />
Fenêtre des valeurs de la suite de Fibonacci<br />
<textarea id="resultats" disabled="disabled" cols="50" rows="5"></textarea>

<h2>3- Histogramme</h2>
<div id="ici">
    <table>
        <tr id="histogramme"> //une ligne mais on doit faire apparaître n+1 colonnes

        </tr>
    </table>
</div>
</body>

<script type="text/javascript">
    function invalide()
    {
        var premierterme = document.getElementById("u0").value;
        var secondterme = document.getElementById("u1").value;
        var intervalle = document.getElementById("n").value;

        if(isNaN(premierterme) || isNaN(secondterme) || isNaN(intervalle) || intervalle>20 || intervalle<0)
        {
            alert("données invalides");
        }
    }

    var tab =[0,1];

    function calculer()
    {
        var Nieme = document.getElementById("n").value;

        for (n=2; n<=Nieme; n++)
        {
            tab[n] = tab[n-1] + tab[n-2];
            document.getElementById('resultats').value += tab[n] + " ";
        }

        document.getElementById('afficheUn').value=tab[Nieme];

        var somme = 0;
        for (n=2; n<=Nieme; n++)
        {
            tab[n] = tab[n-1] + tab[n-2];
            somme += tab[n]
        }
        document.getElementById('afficheSn').value=somme;
    }

    function dessin()
    {
        var Nieme = document.getElementById("n").value;
        for(n=0; n<=Nieme; n++)
        {
            var colonne = document.createElement("td");
            histogramme.appendChild(colonne);

            var soustable = document.createElement("table");
            colonne.appendChild(soustable);
            soustable.style.height = tab[Nieme]+"px";

            //ligne 1
            var souscolonne3 = document.createElement("td");
            souscolonne3.textContent=tab[n].toString();
            souscolonne3.style.height=(tab[Nieme]-tab[n]+20)+"px";
            souscolonne3.style.verticalAlign="bottom";
            var sousligne3 = document.createElement("tr");

            sousligne3.appendChild(souscolonne3);
            soustable.appendChild(sousligne3);

            //ligne 2
            var souscolonne2 = document.createElement("td");
            souscolonne2.style.backgroundColor ="aquamarine";
            souscolonne2.style.height=tab[n]+"px";
            var sousligne2 = document.createElement("tr");

            sousligne2.appendChild(souscolonne2);
            soustable.appendChild(sousligne2);

            //ligne 3
            var souscolonne1 = document.createElement("td");
            souscolonne1.textContent="U"+n.toString();
            var sousligne1 = document.createElement("tr");

            sousligne1.appendChild(souscolonne1);
            soustable.appendChild(sousligne1);
        }
    }
</script>

</html>

-->


<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>ESI - Quotidien</title>
    <link rel="stylesheet" href="vue/CSS/css.statistiques.css"/>
</head>

<body>

</body>
</html>
