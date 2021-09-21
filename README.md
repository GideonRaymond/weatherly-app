# The Weatherly App

Hieronder ga ik even kort mijn gedachteprocessen beschrijven. Waar ik tegenaan liep, de oplossingen die ik daarvoor heb kunnen vinden en wat mij uiteindelijk niet gelukt is.

Belangrijk om hierbij te melden is dat ik voor zaterdagochtend nog nooit met PHP gewerkt heb en nooit in de Laravel framework (en dus ook nooit met Vue). Vrijdagavond ging ik de docs doorlezen en besloot dat het wel een poging waard was.

Na 2.5 dag te strugglen heb ik wel een beetje het gevoel ervoor gekregen. Ik denk dat ik het in Angular heb gebouwd met een simpele gRpc backend dat dit hele project wat vlotter en completer afgerond kon worden; alleen deels van de opdracht (althans; dit verzin ik er zelf bij) was om aan te tonen dat ik veel zelf uit kan zoeken in een korte tijd.

### Wat mij WEL gelukt is:

-   Een app opgezet in de Laravel framework, samen met Vue.
-   Een database gekoppeld om de user-management te managen.
-   Email-verificatie op te zetten
-   Api's aangesloten om weer-informatie op te halen en om de locatiegegevens van iemand zijn IP-adres op te halen.

### Waar ik tegenaan liep:

Het framework zelf. Het duurde echt even voordat ik door had hoe alles binnen de framework met elkaar communieert. Tegenwoordig kan je simpel packages toevoegen om veel dingen (zoals de email verificatie) automagisch op te zetten; echter vergroot dit de complexiteit van de app enorm omdat er vele bestanden toegevoegd worden die ik zelf niet geschreven heb. Dit kostte veel tijd om uit te vogelen. Ook het server-side renderen van pagina's is iets wat ik nog goed moet uitzoeken; het is, en voelt ook, heel erg achterstevoren. Ook omdat de Laravel app met Inertia geshipped wordt (wat weer client-side is), maakte dit alles nog ingewikkelder omdat mijn eigen app dan net-niet overeenkomt met 90% van de documentatie online. Gelukkig zijn de docs van Inertia zelf helder en kwam ik redelijk snel uit mijn voeten daarmee.

### Wat niet gelukt is

De historische data op te halen. Dit heb ik eigenlijk gewoon overgeslagen. Charts wou ik aan de voorkant rederen via ChartJs; alleen na heel wat struggle kwam ik erachter dat Vue-ChartJS (de extentie van Chart) nog niet met Vue-3 overweg kan. Hierdoor kreeg ik steeds kryptische compile errors op braken mijn package-dependencies; waardoor het eigenlijk op neer kwam dat ik ChartJs niet kon gebruiken. Tegen die tijd was het ook te laat om server-side Charts te bouwen (want dat zou nog wat uitzoekwerk kosten ook).

Het is mij dus ook niet gelukt om de weer-trend en verwachte-regen te plotten. Ook kwam ik hierbij achter dat mijn API wel een 5-daagse voorspelling had met regen-variabelen; alleen kwam die altijd voor regen als 'undefined' terug. Dus voor die had ik ook een andere api moeten zoeken; of mijn huidige wisselen. Vandaar dat ik gwn de 5-daagse voorspelling toon ipv de gevraagde statistieken.

Ook wou ik de linear-gradient in de achtergrond draaien met de verloop van de dag; wat niet super moeilijk is, alleen mij zin daarin raakte een beetje op.

### Waar ik zelf trots op ben

Tot 4 uur geleden dacht ik dat het mij gewoon zou lukken om alles af te ronden (kut ChartJs); wat ik gistermiddag eigenlijk niet meer verwacht had. Het is bizar hoeveel sneller ik te werk ging in de laatste paar dagen.

Thanks voor deze opdracht. Het heeft mij wat energie gekost en wellicht een heel klein beetje stres ook. Maar ik heb (voor mezelf iig) bewezen dat ik slimmer en aanpaspaarder ben ik dan dat ik zelf vaak geloof. Dus daar voel ik mij zeker goed bij :)

### OM HET TE STARTEN:

Prerequisits:

-   NodeJs moet je geinstalleerd hebben, dit komt automatisch met NPM. Dit kun je hier doen: https://nodejs.org/en/download/ Om te controlleren dat je ze hebt kun je "npm -v" en "node -v" in de terminal typen.
-   php moet je geinstalleerd hebben. Ik heb een map "php" aangemaakt in "C:\Program Files\" en de constents van de Zip file van "VS16 x64 Thread Safe (2021-Aug-25 09:24:54)" erin gezet (te downloaden op https://www.php.net/downloads). Ook moet je een Path toevoegen aan je environment variables zodat de php.exe gevonden kan worden: (Windows-knop; "Environment Variables" zoeken; Klik op "Edit the system environment variables"; Klik op "Environment Variables"; In de bovenste vak klik je op "Path" en dan "Edit"; Klik op "new" en zet de path "C:\Program Files\php" erin; Klik op "OK", "ok", "OK" om alles op te slaan"). Open een nieuwe terminal en type vervolgens "php -v" in om te controleren dat het er is.
-   In het mapje php zit een bestand genoemd "php.ini-development". Kopieer deze en noem hem dan "php.ini". In dat bestand, zoek naar ";extension=". Al deze extensies kun je even weg-commenten (de ";" verwijderen). Dan zou php het moeten doen. Zo niet, moet je waarschijnlijk "extension_dir='./'" veranderen naar "extension_dir='./ext'" in het php.ini bestand.
-   Composer installeren: https://getcomposer.org/doc/00-intro.md#globally; scrollen naar "Installation -- Windows"
-   Een database draaiend hebben; of een nieuwe maken specifiek voor deze app.

1. Open de terminal in VS-Code of navigeer naar de folder vanaf een andere terminal "cd < path to code >"
2. run "npm install"
3. run "composer install"
4. rename "example.env" --> ".env"
5. run "php artisan key:create"
6. De .env bestand aanpassen. Hier moet je dus een lokale database bij aansluiten; dus alle variabelen van DB_DATABASE, DB_USERNAME etc. in het .env bestand. Als je postgres gebruikt ipv mysql moet je "mysql" vervangen met "pgsql"
7. run "php artisan serve" --> De app zou dan moeten draaien op "localhost:8000" en kun je daar naartoe navigeren in je browser.

Dit is echt gezeik. Hier was ook ik ook best veel tijd aan kwijt dit weekend om op te zetten. Hopelijk lukt het!
