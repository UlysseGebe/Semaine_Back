<?php
    $track = !empty($_GET['product']) ? $_GET['product'] : null;
    if ($track !== null) {
        $search = "style='display: flex;'";
    }
    else {
        $search = '';
    }
    $resultTab[] = 0;
    $visib = "style='display: none'";
    
    if ($track !== null) {
        $url = 'http://ws.audioscrobbler.com/2.0/?';
        $url .= http_build_query([
            'method' => 'track.search',
            'track' => $track,
            'limit' => '15',
            'api_key' => '5aa9ea10c7ea42ce6172efce2ef8256f',
            'format' => 'json',
        ]);
    
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);
    
        foreach ($response->results as $_response) {
            if (isset($_response->track)) {
                $tracks = $_response->track;
            }
        }
        $textImage = '#text';
        $visib = "style='display: block'";
    }

    if(isset($_POST['selection'])) {
        if(isset($_POST['productName'])) {
            $prod = $_POST['productName'];
            $pddprod = '';
            for ($i=0; $i<count($prod); $i++) {
                $pddprod = $prod[$i];
                $data = [
                    'id_Party' => (int)($_SESSION['party_id']),
                    'datas' => $pddprod,
                ];
                $prepare = $bdd->prepare('INSERT INTO musique (id_Party, datas) VALUES (:id_Party, :datas)');
                $prepare->execute($data);
            }
        }
        $search = "style='display: none;'";
    }
    $data = [
        'id_Party' => (int)($_SESSION['party_id']),
    ];
    $prepare = $bdd->prepare('SELECT * FROM musique WHERE id_Party = :id_Party ORDER BY id DESC');
    $prepare->execute($data);
    $tracking = $prepare->fetchAll();

?>

<div class="besoin" style="width: 100%;">
    <div class="title">
        <h2>Musique</h2>
        <div class="move"></div>
    </div>
    <div class="itemList musique">
        <?php foreach($tracking as $_track): ?>
            <?php $data = explode('|', $_track->datas); ?>
            <div class="container"><?php echo $data[0];?>
                <div class="point" onclick="location.href='<?= URL ?>delete?idtrack=<?php echo $_track->id; ?>'" ></div>
                <p><?php echo $data[1];?></p>
                <img class="jacket" src="<?php echo $data[2];?>" alt="photo cd">
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="background" <?php echo $search; ?>>
    <div class="popup">
        <form action="" method="get" class="present">
            <h2>Musique
            <span class="close">&times;</span>
            </h2>
            <input type="search" name="product" placeholder="Search">
            <input class='sub' type="submit" name="find">
        </form>
        <form class="itemList" <?php echo $visib; ?> method="post">
            <?php if($track !== null): ?>
                <?php foreach ($tracks as $value):?>
                    <label class="container">
                        <img class="img_food" src="<?php echo $value->image[3]->$textImage; ?>">
                        <?php echo $value->name; ?>
                        <input class="checkbox" name="productName[]" type="checkbox" value="<?php echo $value->name."|".$value->artist."|".$value->image[2]->$textImage;; ?>">
                        <span class="checkmark"></span>
                    </label>
                <?php endforeach ?>
            <?php endif ?>
            <input type="submit" name="selection">
        </form>
    </div>
</div>