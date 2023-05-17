<?php

require './vendor/autoload.php';

use Symfony\Component\HttpClient\HttpClient;

$client = HttpClient::create();

$response = $client->request('GET', 'https://api.sunrise-sunset.org/json?lat=25.284266&lng=14.438434&date=today');


$statusCode = $response->getStatusCode();
$type = $response->getHeaders()['content-type'][0];

if ($statusCode === 200 && $type === 'application/json') {
  $content = $response->getContent();
  // get the response in JSON format

  $content = $response->toArray();
  // convert the response (here in JSON) to an PHP array
}

$sunrise = $content['results']['sunrise'];

// To account for summer time  and time zone
$adjustedSunrise = date('H:i:s', strtotime($sunrise . ' + 2 hours'));

$minutes = date('i', strtotime($adjustedSunrise));
$hours = date('H', strtotime($adjustedSunrise));
// Removes 0 when hour can be displayed with one digit
if (str_starts_with($hours, '0')) {
  $hours = substr($hours, -1, 1);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="details.css" rel="stylesheet">

  <title>Document</title>
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.css" rel="stylesheet" />
  <!-- UIkit CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.17/dist/css/uikit.min.css" />
</head>

<body class="sand">
  <div class="image">
    <img src="pexels-vlada-karpovich-4449318.png" alt="desert" style="width:100%">
    <div class="sahara freight ">DECOUVREZ LE SAHARA</div>
    <div class="montserrat titre text-center">Mille et une nuits dans le désert algérien</div>
  </div>
  <div class="sand">
    <div class="center d-flex justify-content-center flex-wrap m-4">
      <h2 class="contact freight">L'itinéraire</h2>
      <iframe src="https://www.google.com/maps/d/u/0/embed?mid=15N-IZd0QFzrk3FIALZR2C0XcN81Jw44&ehbc=2E312F" width="90%" height="300rm"></iframe>
    </div>
    <div class="d-flex justify-content-center flex-wrap m-4">
      <h2 class="freight">Programme</h2>
      <p class="aktiv ">Au programme de ce voyage, nous vous proposons des vols au départ de Paris, tous les mercredi à 10h.
        Arrivée prévue à l'aéroport de Tindouf quatre heures plus tard. Nous viendrons vous chercher à l'aéroport.
        En chemin vers l'hôtel, vous aurez un aperçu du désert et verrez les premières dunes. Vous aurez du temps l'après-midi
        pour flaner au souk du centre ville et goûter aux spécialités locales.</br>
        Le lendemain, nous viendrons vous chercher à l'hôtel, en direction de la ferme de dromadaires. Apès une initiation,
        commencera la traversée du désert à dos de dromadaire. Accompagné par les nomades, vous découvrirez des dunes de sable à
        perte de vue, des paysages uniques, au rythme des anecdotes sur la vie désertique.</br>
        Au cours de l'après-midi, vous rejoindrez un des nombreux campements nomades où vous serez invités au rituel du thé.
        Véritable tradition millénaire, le thé tient une place importante dans la journée.</br>
        Le trek reprendra ensuite en direction du lieu de bivouac, où vous passerez la nuit à la belle étoile. Ce sera alors l'occasion
        de partager des moments de convivialité autour d'un feu de camps.</br>
        Le lendemain, vous assisterez à un lever de soleil magistral sur les dunes.Actuellement, dans le désert, le soleil se lève à <?php
                                                                                                                                      echo $hours;
                                                                                                                                      ?> heures <?php
                                                                                                                                                echo $minutes;
                                                                                                                                                ?>. Après ce moment d'émerveillement, vous reprendez la route, en direction de l'Oasis de Gourara, point culminant de ce voyage.
        L'Oasis est un lieu luxuriant, qui réunit toute la faune du désert. Avec un peu de chance, peut-être apercevrez-vous un fennec
        venu se désalterer?</br>
        L'heure du retour arrive et tout au long de votre trajet vers Tindouf, vous serez entourés par l'immensité du désert et de ses dunes.
        A mi-parcours, vous passerez votre deuxième nuit dans le désert. L'arrivée à Tindouf est prévue en milieu de journée, le lendemain.
        Le vol retour est prévu en fin de journée, ce qui vous laisse le temps de profiter du hammam ou d'aller manger des pâtisseries
        locales dans un salon de thé.</br></br>
        Tarif : à partir de 1450€ par personne</p>
    </div>

    <div class="col-lg-3 col-md-12 mb-4">
      <div class="card">
        <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
            <img src="./assets/images/lune.jpg" class="w-100 cardImage" />
            <div class="hover-overlay">
              <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title mb-3 cardTitle text-white text-center">Pour votre prochain voyage, Objectif lune!</h5>
        </div>
      </div>
    </div>

    <div class="m-4">
      <h2 class="contact freight">Nous contacter</h2>

      <form class="bloc">
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div class="row mb-4 ">
          <div class="col">
            <div class="form-outline">
              <input type="text" id="form6Example1" class="form-control" />
              <label class="form-label" for="form6Example1">Nom</label>
            </div>
          </div>
          <div class="col">
            <div class="form-outline">
              <input type="text" id="form6Example2" class="form-control" />
              <label class="form-label" for="form6Example2">Prénom</label>
            </div>
          </div>
        </div>
        <!-- Text input -->
        <div class="form-outline mb-4">
          <input type="text" id="form6Example4" class="form-control" />
          <label class="form-label" for="form6Example4">Address</label>
        </div>

        <!-- Email input -->
        <div class="form-outline mb-4">
          <input type="email" id="form6Example5" class="form-control" />
          <label class="form-label" for="form6Example5">Email</label>
        </div>

        <!-- Number input -->
        <div class="form-outline mb-4">
          <input type="number" id="form6Example6" class="form-control" />
          <label class="form-label" for="form6Example6">Télephone</label>
        </div>

        <!-- Message input -->
        <div class="form-outline mb-4">
          <textarea class="form-control" id="form6Example7" rows="4"></textarea>
          <label class="form-label" for="form6Example7">Votre question</label>
        </div>
        <!-- Submit button -->
        <div class="ks">
          <button type="submit" class="btn ">Validation</button>
        </div>
      </form>
    </div>
    <div class="d-flex justify-content-center flex-wrap m-4">
      <h3 class="freight text-center">Qui sommes nous?</h3>
      <p class="freight aktiv">Nous sommes une agence locale et familiale qui organisons des treks à dos de dromadaire dans la partie algérienne du Sahara
        Notre souhait est de vous faire découvrir la vie de nomade dans le Sahara et surtout partager des moments authentiques avec
        des locaux. Forts de trente ans d'expérience, nous vous accompagnons dans le voyage de vos rêves, au pays des Milles et Une Nuits.</p>
    </div>
  </div>
</body>
<footer>
  <p>Hackaton Mai 2023 - Andressa, Fouad, Sébastien & Thuy An</p>
</footer>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.js"></script>
<!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.16.17/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.16.17/dist/js/uikit-icons.min.js"></script>

</html>