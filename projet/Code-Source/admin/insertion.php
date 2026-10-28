<?php
include 'database.php';

$values = [00, 15, 30, 45];

$villes = [
    "Casablanca", "Rabat", "Fès", "Marrakech", "Agadir", "Tanger", "Meknès", "Oujda",
  "Kenitra", "Tétouan", "Safi", "Mohammedia", "Khouribga", "Beni Mellal", "El Jadida",
    "Taza", "Nador", "Settat", "Khemisset", "Larache", "Berkane", "Essaouira", "Laayoune"
];


$dates = ["2024-06-12", "2024-06-13", "2024-06-14"];
$heures_depart = ["08:00:00", "10:00:00", "12:00:00", "14:00:00", "16:00:00", "18:00:00"];

// Tableau des distances
$distances = [
    "Casablanca-Rabat" => 86,
    "Casablanca-Fès" => 291,
    "Casablanca-Marrakech" => 242,
    "Casablanca-Agadir" => 463,
    "Casablanca-Tanger" => 338,
    "Casablanca-Meknès" => 230,
    "Casablanca-Oujda" => 539,
    "Casablanca-Kenitra" => 127,
    "Casablanca-Tétouan" => 348,
    "Casablanca-Safi" => 237,
    "Casablanca-Mohammedia" => 24,
    "Casablanca-Khouribga" => 111,
    "Casablanca-Beni Mellal" => 195,
    "Casablanca-El Jadida" => 106,
    "Casablanca-Taza" => 295,
    "Casablanca-Nador" => 494,
    "Casablanca-Settat" => 68,
    "Casablanca-Khemisset" => 154,
    "Casablanca-Larache" => 293,
    "Casablanca-Berkane" => 590,
    "Casablanca-Essaouira" => 367,
    "Casablanca-Laayoune" => 1221,
    "Rabat-Casablanca" => 86,
    "Rabat-Fès" => 207,
    "Rabat-Marrakech" => 322,
    "Rabat-Agadir" => 531,
    "Rabat-Tanger" => 251,
    "Rabat-Meknès" => 138,
    "Rabat-Oujda" => 522,
    "Rabat-Kenitra" => 40,
    "Rabat-Tétouan" => 286,
    "Rabat-Safi" => 327,
    "Rabat-Mohammedia" => 66,
    "Rabat-Khouribga" => 162,
    "Rabat-Béni Mellal" => 232,
    "Rabat-El Jadida" => 190,
    "Rabat-Taza" => 303,
    "Rabat-Nador" => 409,
    "Rabat-Settat" => 139,
    "Rabat-Khemisset" => 84,
    "Rabat-Larache" => 168,
    "Rabat-Berkane" => 522,
    "Rabat-Essaouira" => 427,
    "Rabat-Laâyoune" => 1286,
    "Fès-Rabat" => 207,
    "Fès-Casablanca" => 291,
    "Fès-Marrakech" => 485,
    "Fès-Agadir" => 694,
    "Fès-Tanger" => 289,
    "Fès-Meknès" => 64,
    "Fès-Oujda" => 328,
    "Fès-Kenitra" => 161,
    "Fès-Tétouan" => 304,
    "Fès-Safi" => 387,
    "Fès-Mohammedia" => 273,
    "Fès-Khouribga" => 207,
    "Fès-Béni Mellal" => 256,
    "Fès-El Jadida" => 348,
    "Fès-Taza" => 118,
    "Fès-Nador" => 261,
    "Fès-Settat" => 285,
    "Fès-Khemisset" => 138,
    "Fès-Larache" => 226,
    "Fès-Berkane" => 389,
    "Fès-Essaouira" => 571,
    "Fès-Laâyoune" => 1416,
    "Marrakech-Rabat" => 322,
    "Marrakech-Casablanca" => 242,
    "Marrakech-Fès" => 485,
    "Marrakech-Agadir" => 258,
    "Marrakech-Tanger" => 577,
    "Marrakech-Meknès" => 460,
    "Marrakech-Oujda" => 826,
    "Marrakech-Kenitra" => 348,
    "Marrakech-Tétouan" => 588,
    "Marrakech-Safi" => 151,
    "Marrakech-Mohammedia" => 222,
    "Marrakech-Khouribga" => 213,
    "Marrakech-Béni Mellal" => 195,
    "Marrakech-El Jadida" => 191,
    "Marrakech-Taza" => 558,
    "Marrakech-Nador" => 735,
    "Marrakech-Settat" => 155,
    "Marrakech-Khemisset" => 373,
    "Marrakech-Larache" => 473,
    "Marrakech-Berkane" => 840,
    "Marrakech-Essaouira" => 177,
    "Marrakech-Laâyoune" => 1085,
    "Agadir-Rabat" => 531,
    "Agadir-Casablanca" => 463,
    "Agadir-Fès" => 694,
    "Agadir-Marrakech" => 258,
    "Agadir-Tanger" => 809,
    "Agadir-Meknès" => 635,
    "Agadir-Oujda" => 1060,
    "Agadir-Kenitra" => 563,
    "Agadir-Tétouan" => 802,
    "Agadir-Safi" => 130,
    "Agadir-Mohammedia" => 444,
    "Agadir-Khouribga" => 499,
    "Agadir-Béni Mellal" => 417,
    "Agadir-El Jadida" => 384,
    "Agadir-Taza" => 769,
    "Agadir-Nador" => 922,
    "Agadir-Settat" => 419,
    "Agadir-Khemisset" => 586,
    "Agadir-Larache" => 712,
    "Agadir-Berkane" => 1080,
    "Agadir-Essaouira" => 173,
    "Agadir-Laâyoune" => 619,
    "Tanger-Rabat" => 251,
    "Tanger-Casablanca" => 338,
    "Tanger-Fès" => 289,
    "Tanger-Marrakech" => 577,
    "Tanger-Agadir" => 809,
    "Tanger-Meknès" => 332,
    "Tanger-Oujda" => 628,
    "Tanger-Kenitra" => 205,
    "Tanger-Tétouan" => 61,
    "Tanger-Safi" => 495,
    "Tanger-Mohammedia" => 318,
    "Tanger-Khouribga" => 365,
    "Tanger-Béni Mellal" => 427,
    "Tanger-El Jadida" => 414,
    "Tanger-Taza" => 388,
    "Tanger-Nador" => 490,
    "Tanger-Settat" => 388,
    "Tanger-Khemisset" => 263,
    "Tanger-Larache" => 84,
    "Tanger-Berkane" => 616,
    "Tanger-Essaouira" => 678,
    "Tanger-Laâyoune" => 1267,
    "Meknès-Rabat" => 138,
    "Meknès-Casablanca" => 230,
    "Meknès-Fès" => 64,
    "Meknès-Marrakech" => 460,
    "Meknès-Agadir" => 635,
    "Meknès-Tanger" => 332,
    "Meknès-Oujda" => 390,
    "Meknès-Kenitra" => 119,
    "Meknès-Tétouan" => 372,
    "Meknès-Safi" => 352,
    "Meknès-Mohammedia" => 211,
    "Meknès-Khouribga" => 154,
    "Meknès-Béni Mellal" => 191,
    "Meknès-El Jadida" => 266,
    "Meknès-Taza" => 179,
    "Meknès-Nador" => 320,
    "Meknès-Settat" => 255,
    "Meknès-Khemisset" => 84,
    "Meknès-Larache" => 227,
    "Meknès-Berkane" => 415,
    "Meknès-Essaouira" => 503,
    "Meknès-Laâyoune" => 1333,

];
$y=70;

function getDistance($lieu_depart, $destination, $distances) {
    $key1 = "$lieu_depart-$destination";
    $key2 = "$destination-$lieu_depart";
    if (isset($distances[$key1])) {
        return $distances[$key1];
    } elseif (isset($distances[$key2])) {
        return $distances[$key2];
    } else {
        return null;
    }
}

for ($i = 0; $i <$y; $i++) {
    $lieu_depart = $villes[array_rand($villes)];
    $destination = $villes[array_rand($villes)];
    while ($destination == $lieu_depart) {
        $destination = $villes[array_rand($villes)];
    }

    $date = $dates[array_rand($dates)];
    
    // Calculer la distance
    $distance = getDistance($lieu_depart, $destination, $distances);
    
    if ($distance !== null) {
        // Ajuster la durée en fonction de la distance (exemple : 1h pour chaque 100 km)
        $duree_heure = floor($distance / 100);
        $duree_minute = $values[array_rand($values)];
        $duree = $duree_heure . "h " . $duree_minute . "min";
        
        // Ajuster le prix en fonction de la distance (exemple : 1 MAD pour chaque km)
        $prix = (int)$distance + rand(0, 50);
    } else {
        // Valeurs par défaut si la distance n'est pas trouvée
        $duree = rand(1, 5) . "h " .  $values[array_rand($values)] . "min";
        $prix = rand(70, 200);
    }

    $siege_disp = rand(30, 60);
    $heure_depart = $heures_depart[array_rand($heures_depart)];

    $sql = "INSERT INTO voyage (lieu_depart, destination, date, duree, siege_disp, prix, heure_depart)
            VALUES ('$lieu_depart', '$destination', '$date', '$duree', $siege_disp, $prix, '$heure_depart')";

    if ($dbconn->query($sql) !== TRUE) {
        echo "Erreur: " . $sql . "<br>" . $dbconn->error;
    }
}

echo "$y voyages insérés avec succès";

$dbconn->close();
?>
