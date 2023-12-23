<?php
include_once('connexionbase.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $longUrl =  strip_tags($_POST["longUrl"]);
    $customAlias = strip_tags( $_POST["customAlias"]);

    if (!empty($longUrl)) {
        
        $key = generateShortUrl($longUrl, $customAlias);
        $shortUrl = "ti.we/" . $key;
        echo $shortUrl;
        $testSql= "SELECT * from shortUrl where long_url = :longUrl";
        $get= $bdd -> prepare($testSql);
        $get -> execute(
            [
                'longUrl'=>$longUrl,
            ]
        );
        $result=$get->fetch(PDO::FETCH_ASSOC);
        if(!$result ){
            $sql = "INSERT INTO shortUrl(long_url, short_url, custom_alias) VALUES (:longUrl, :shortUrl, :customAlias)";
            $add= $bdd -> prepare($sql);
            $add -> execute(
                [
                    'longUrl'=>$longUrl,
                    'shortUrl'=>$shortUrl,
                    'customAlias'=>$customAlias,
                ]
            );
        }
        else if($result['short_url'] != $shortUrl){
            $update='UPDATE shortUrl SET short_url = :shortUrl WHERE long_url = :longUrl';
            $requete= $bdd-> prepare($update);
            $requete->execute(
    
                [
                    'shortUrl'=>$shortUrl,
                    'longUrl'=>$longUrl,
                ]
            );
            
        }
       
        $_SESSION['shortUrl']=$shortUrl;
        $_SESSION['longUrl']=$longUrl;

    }

    
    // echo $result ['short_url'];
    header('Location:../index.php');
  
}
function generateShortUrl($longUrl, $customAlias) {
    $hash = hash('sha256', $longUrl);
    return $customAlias."/".substr($hash, 0, 7);
}
