<?php
include_once('connexionbase.php');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Max-Age: 86400'); 

$content = trim(file_get_contents("php://input"));

if (!empty($content)) {
    $decodedData = json_decode($content, true);

    if ($decodedData) {
        $_SESSION['contenu'] = $decodedData['data'];

        $testSql = "SELECT * from shortUrl where short_url = :shortUrl";
        $get = $bdd->prepare($testSql);
        $get->execute(['shortUrl' => $_SESSION['contenu']]);
        $result = $get->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $content = $result['long_url'];
        }
        echo json_encode(['data' => $content]);
    } else {
      
        echo json_encode(['error' => 'Invalid JSON data']);
    }
} else {

    echo json_encode(['error' => 'Empty content']);
}
?>
