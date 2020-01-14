<?php
require_once "pdo.php";

function Head()
{
    //laad en print de inhoud van basic_head.html
    print file_get_contents("basic_head.html");
}

function Cookies()
{
    //check of de gebruiker het cookieformulier gepost heeft, of hij op Accept of Decline geklikt heeft,
    //en bewaar zijn antwoord in een sessievariabele
    session_start();
    if ( $_POST['cookiebutton'] == 'Accept' ) $_SESSION['cookies'] = 'OK';
    if ( $_POST['cookiebutton'] == 'Decline' ) $_SESSION['cookies'] = 'Niet OK';

    //check of eerder al een antwoord ivm de cookies opgeslagen werd in de sessievariabele,
    //zoniet toon dan de cookies-tekst en stop de PHP code uitvoering
    if ( ! isset($_SESSION['cookies']) )
    {
        print file_get_contents("cookies.html"); exit;
    }

    //toon in een hidden div waarop de gebruiker geklikt heeft (cookies geaccepteerd of niet)
    if ( $_SESSION['cookies'] == 'OK' ) print "<div id=divHiddenCookieStatus>U hebt cookies geaccepteerd</div>";
    else print "<div id=divHiddenCookieStatus>U hebt cookies NIET geaccepteerd</div>";
}

function ToonFormulierAfspraak()
{
    //toon het formulier om een afspraak te maken
    print file_get_contents("afspraak.html");
}

function FormPosted()
{
    //controleer of het formulier om een afspraak te maken, gepost werd,
    //en return true of false
    if ( $_POST['formname'] == 'form_afspraak' AND $_POST['buttonMaakAfspraak'] == "Maak afspraak" ) return true;

    return false;
}

function SaveAfspraak()
{
    $datum = new DateTime($_POST['datum'], new DateTimeZone("Europe/Brussels"));
    $mysql_date = $datum->format("Y-m-d");

    //controleer in de databank of het gekozen moment (datum/tijd) nog vrij is
    //zoniet, return false
    $sql = "select * from afspraak where afs_datum='" . $mysql_date . "' AND afs_begin='" . $_POST['uur'] . "'";
    $data = GetData($sql);

    if ( count($data) > 0 ) return false;

    //afspraak opslaan en return true
    $ins = "insert into afspraak SET " .
        " afs_naam=" . "'" . htmlentities($_POST['per_naam']) . "'," .
        " afs_voornaam=" . "'" . htmlentities($_POST['per_voornaam']) . "'," .
        " afs_datum=" . "'" . $mysql_date  . "'," .
        " afs_begin=" . "'" . $_POST['uur']  . "'" ;
    ExecuteSQL($ins);
    return true;
}

function ShowAfspraakConfirmed()
{
    //bericht weergeven dat de afspraak goed opgeslagen is
    $datum = new DateTime($_POST['datum'], new DateTimeZone("Europe/Brussels"));
    $printdate = $datum->format("d-m-Y");

    print "<p class='green'>Uw afspraak met de tandarts op $printdate om " . $_POST['uur'] . " is goed opgeslagen. Tot dan!</p>";

    //voorzie een hyperlink om nog een afspraak te maken
    print "<p><a href='index.php'>Nog een afspraak maken</a></p>";
}

function ShowAfspraakRefused()
{
    //bericht weergeven dat de afspraak NIET goed opgeslagen is
    $datum = new DateTime($_POST['datum'], new DateTimeZone("Europe/Brussels"));
    $printdate = $datum->format("d-m-Y");

    print "<p class='red'>Sorry. De tandarts heeft al een afspraak op $printdate om " . $_POST['uur'] . ". Kies een ander moment aub.</p>";
}