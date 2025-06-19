<?php

    require_once 'config/config.php';

    function salvarFilme($titulo, $descricao, $poster) {
        global $pdo;

        try { 
            $sql = "INSERT INTO filmes (titulo, descricao, poster) VALUES (:titulo, :descricao, :poster)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':titulo' => $titulo,
                ':descricao' => $descricao,
                ':poster' => $poster
            ]);
        } catch (PDOException $e){
            echo "Erro ao salvar filme" . $e->getMessage();
        }
    }

    function listarFilmes() {
        global $pdo;

        $sql = "SELECT * FROM filmes";
        $result = $pdo -> query($sql);

        return $result -> fetchAll(PDO::FETCH_ASSOC);
    }   

?>