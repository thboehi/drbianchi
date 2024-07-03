# Paramètres
## Employés
Pour modifier la team, éditez le fichier team.json qui se trouve dans /data
```json
[
    {
        "name": "Margot D.",
        "post": "Secrétaire",
        "picture": "margot.jpg"
    }
]
```
Pour ajouter un membre il suffit d'ajouter une donnée, et de mentionner correctement l'image que vous aurez préalablement posée dans `/img/team`

## Album
Chaque image que vous placerez dans le dossier `/img/album` seront automatiquement ajoutée dans le petit train de photo.

Attention cependant à vérifier la vitesse de déroulement dans le CSS

## Feedbacks

Fonctionnent comme les [employés](#employés)

## Horaires

Lorsque vous modifiez les horaires de la page contact dans `/views/contact.php`, faites bien attention à modifier dans le code PHP et dans le code HTML !

>Ici pour le code PHP, lignes `12 à 26`
```php
// Définit les plages horaires pour chaque jour
$workingHours = [
    1 => [['08:30', '12:00'], ['14:00', '17:00']], // Lundi
    2 => [['08:30', '12:00'], ['14:00', '17:00']], // Mardi
    3 => [['08:30', '12:00']],                    // Mercredi
    4 => [['08:30', '12:00']],                    // Jeudi
    5 => [['08:30', '12:00'], ['14:00', '17:00']], // Vendredi
];

$openHours = [
    1 => [['08:30', '13:00']], // Lundi
    2 => [['08:30', '13:00']], // Mardi
    3 => [['08:30', '13:00']], // Mercredi
    4 => [['08:30', '13:00']], // Jeudi
    5 => [['08:30', '13:00']], // Vendredi
];
```

>Ici pour le code HTML, lignes `71 à 100`
```php
<div class="contact-top-right">
                <div class="phone-schedule">
                    <h3>Horaires téléphoniques</h3>
                    <h4>Lundi - Mardi - Vendredi</h4>
                    <p>8h30 - 12h / 14h - 17h</p>
                    <h4>Mercredi - Jeudi</h4>
                    <p>8h30 - 12h</p>
                    <?php
                    // Affiche "Joignable" ou "Injoignable" en fonction de la disponibilité
                    if (isAvailable($dayOfWeek, $currentTime, $workingHours)) {
                        echo "<p class=\"contact-active\">Joignable</p>";
                    } else {
                        echo "<p class=\"contact-inactive\">Injoignable</p>";
                    }
                    ?>
                </div>
                <div class="consult-schedule">
                    <h3>Horaires de consultation</h3>
                    <h4>Lundi au Vendredi</h4>
                    <p>8h30 - 13h</p>
                    <?php
                    // Affiche "Joignable" ou "Injoignable" en fonction de la disponibilité
                    if (isAvailable($dayOfWeek, $currentTime, $openHours)) {
                        echo "<p class=\"contact-active\">Ouvert</p>";
                    } else {
                        echo "<p class=\"contact-inactive\">Fermé</p>";
                    }
                    ?>
                </div>
            </div>
```
.

.

.

.

.

.

# Typographie

## Nunito (main font)
```css
// <uniquifier>: Use a unique and descriptive class name
// <weight>: Use a value from 200 to 1000
// <width>: Use a value from 75 to 125
// <lowercase height>: Use a value from 440 to 540

.nunito-sans-<uniquifier> {
  font-family: "Nunito Sans", sans-serif;
  font-optical-sizing: auto;
  font-weight: <weight>;
  font-style: normal;
  font-variation-settings:
    "wdth" <width>,
    "YTLC" <lowercase height>;
}
```

## Della Respira (Main title)

```css
.della-respira-regular {
  font-family: "Della Respira", serif;
  font-weight: 400;
  font-style: normal;
}
```

## Merriweather Static (Subtitle)
```css
.merriweather-light {
  font-family: "Merriweather", serif;
  font-weight: 300;
  font-style: normal;
}

.merriweather-regular {
  font-family: "Merriweather", serif;
  font-weight: 400;
  font-style: normal;
}

.merriweather-bold {
  font-family: "Merriweather", serif;
  font-weight: 700;
  font-style: normal;
}

.merriweather-black {
  font-family: "Merriweather", serif;
  font-weight: 900;
  font-style: normal;
}

.merriweather-light-italic {
  font-family: "Merriweather", serif;
  font-weight: 300;
  font-style: italic;
}

.merriweather-regular-italic {
  font-family: "Merriweather", serif;
  font-weight: 400;
  font-style: italic;
}

.merriweather-bold-italic {
  font-family: "Merriweather", serif;
  font-weight: 700;
  font-style: italic;
}

.merriweather-black-italic {
  font-family: "Merriweather", serif;
  font-weight: 900;
  font-style: italic;
}
```