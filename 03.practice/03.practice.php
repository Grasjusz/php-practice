<?php

/* Get date of birth from form, print day of birth, check if adult or not > 18 */

$data['dzien'] = $_POST['dzien'];
$data['miesiac'] = $_POST['miesiac'];
$data['rok'] = $_POST['rok'];

/* Check day of week of birth (input date) */
function wypisz_dzien_tygodnia($data)
{
    $day = date("w", mktime (0,0,0,$data['miesiac'],
    $data['dzien'],$data['rok']));

    $exp = "Dzień tygodnia narodzin: ";
    switch($day){
    case 1:
        echo "$exp Poniedziałek <br>";
        break;
    case 2:
        echo "$exp Wtorek <br>";
        break;
    case 3:
        echo "$exp Środa <br>";
        break;
    case 4:
        echo "$exp Czwartek <br>";
        break;
    case 5:
        echo "$exp Piątek <br>";
        break;
    case 6:
        echo "$exp Sobota <br>";
        break;
    case 0:
        echo "$exp Niedziela <br>";
        break;

    }

}

/* Function that count days from yout birth to now and outputs number of days*/
function oblicz_dni($data)
{
  // 60 sekund to 1 minuta, 60 minut to 1 godzina, 24 godziny to 1 dzień
  $czas = (time() - mktime (0,0,0,$data['miesiac'],$data['dzien'],$data['rok']))/60/60/24;
  return "Ile dni upłynęło od narodzin: $czas<br>";
}

$wiek = (date("Y") - $data['rok']);

/* Checks if person is adult (set 18 years), outputs proper information adult or not*/
function adult($wiek){
    if ($wiek >= 18){
        echo "Masz $wiek lat, a więc jesteś pełnoletni!";
      }
    else{
        echo "Niestety nie jesteś pełnoletni!";
      }
}

wypisz_dzien_tygodnia($data);

echo oblicz_dni($data), adult($wiek);

?>