<?php
require_once "functions.php";

Head();     //de <head> sectie
Cookies(); //de cookies sectie
?>

<div class="jumbotron text-center">
    <h1>Tandarts Niels Bohr</h1>
    <h4>Maak een afspraak</h4>
</div>

<div class="container">
    <div class="row">

            <?php
            if ( FormPosted() ) //werd het afspraakformulier gepost?
            {
                if ( SaveAfspraak() ) //probeer de afspraak op te slaan
                {
                    ShowAfspraakConfirmed(); //als dat gelukt is, toon een bevestiging in het groen
                }
                else
                {
                    ShowAfspraakRefused(); //als dat NIET gelukt is, toon dan een foutmelding in het rood
                    ToonFormulierAfspraak(); //en toon opnieuw het formulier
                }
            }
            else //als er niks gepost werd, toon dan het afspraakformulier
            {
                ToonFormulierAfspraak();
            }
            ?>

    </div>
</div>

