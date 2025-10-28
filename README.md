## Kandidāta mājasdarbs: PHP / Moodle / TYPO3 programmētājs

Prasības:

- [x] Ziņu saraksts (virsraksts, datums, fragments, komentāru skaits), jaunākie sākumā.
- [x] Atsevišķa ziņas skatīšanās lapa.
- [x] Komentāru pievienošana bez pieslēgšanās, ar vienkāršu CAPTCHA vai pārbaudes
jautājumu.
---
- [x] Autorizācija (lietotājvārds, parole ar password_hash/verify).
- [x] Jaunu ziņu pievienošana, rediģēšana, dzēšana.
---
- [x] Droša datubāzes piekļuve (PDO + sagatavotie pieprasījumi).
- [x] Izvades datu aizsardzība pret XSS.
- [x] CSRF tokeni formām.
- [x] Pievienots vismaz viens vienību tests (PHPUnit).
---
- [x] Lapdales sadalījums (piem., 10 ziņas lapā).
- [x] Komentāru moderācija (dzēšana).
- [x] Pielikumu pievienošana ziņām (faila tipa un izmēra validācija).
- [x] Minimāls CSS dizains pietiekams.
---


- [x] Bildes maiņa ziņā
- [x] Ja nav ziņas, neuzrādās paziņojums, ka nav nevienas ziņas
- [ ] Administrācijas lietotāju vadība
- [ ] Bildes dzēšana no ziņas


## Prasības

- ***php8.3***
- ***composer2***

## Installation Steps

- palaist komandu ```composer install```
- nokopēt ```.env.example``` kā ```.env```
- palaist komandu ```php artisan key:generate```
- rediģēt ```.env``` kopni un aizpildīt datubāzes pieejas datus
- palaist komandu ```php artisan migrate --seed```

## Testa Lietotājs

- **email:** ***test@example.com***
- **password:** ***password***

## Ja netiek lietots Nginx/Apache testēšanai, tad var izmantot komandu:

- ```php artisan server```
- open in browser [http://localhost:8000](http://localhost:8000)
