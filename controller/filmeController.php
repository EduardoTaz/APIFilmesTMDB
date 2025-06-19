<?php 

    require_once 'config/config.php';
    require_once 'model/filmeModel.php';

    $api_key = 'a5da001a0a3ca1b80a5bdac141e82cce';
    $url = "http://api.themoviedb.org/3/movie/popular?api_key=$api_key&language=pt-BR";

    $response = file_get_contents($url);
    $data = json_decode($response, true);

    foreach($data['results'] as $filme) {
        $titulo = $filme['title'];
        $descricao = $filme['overview'];
        $poster = "http://image.tmdb.org/t/p/w500" . $filme['poster_path'];
        salvarFilme($titulo, $descricao, $poster);
    }

    $filmes = listarFilmes();

?>