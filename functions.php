<?php
require_once "pdo.php";

function Head()
{
    //laad en print de inhoud van basic_head.html

}

function Cookies()
{
    //check of de gebruiker het cookieformulier gepost heeft, of hij op Accept of Decline geklikt heeft,
    //en bewaar zijn antwoord in een sessievariabele


    //check of eerder al een antwoord ivm de cookies opgeslagen werd in de sessievariabele,
    //zoniet toon dan de cookies-tekst en stop de PHP code uitvoering

    //toon in een hidden div waarop de gebruiker geklikt heeft (cookies geaccepteerd of niet)

}

function ToonFormulierAfspraak()
{
    //toon het formulier om een afspraak te maken

}

function FormPosted()
{
    //controleer of het formulier om een afspraak te maken, gepost werd,
    //en return true of false

}

function SaveAfspraak()
{
    //controleer in de databank of het gekozen moment (datum/tijd) nog vrij is
    //zoniet, return false

    //afspraak opslaan en return true

}

function ShowAfspraakConfirmed()
{
    //bericht weergeven dat de afspraak goed opgeslagen is

    //voorzie een hyperlink om nog een afspraak te maken

}

function ShowAfspraakRefused()
{
    //bericht weergeven dat de afspraak NIET goed opgeslagen is

}