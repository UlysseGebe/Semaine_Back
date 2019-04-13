<?php
    $productName = !empty($_GET['product']) ? $_GET['product'] : null;
    if ($productName !== null) {
        $search = "style='display: flex;'";
    }
    else {
        $search = '';
    }
    
    $resultTab[] = 0;
    $visib = "style='display: none'";
    if ($productName !== null) {
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.fr.carrefour.io/v1/openapi/items",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode([
          'queries' => [
            [
              'query' => $productName,
              'field' => 'barcodeDescription',
            ],
          ]
        ]),
        CURLOPT_HTTPHEADER => array(
          "accept: application/json",
          "content-type: application/json",
          "x-ibm-client-id: 6dbcbac3-ff4e-4d3e-b1d5-f331ebaebe77",
          "x-ibm-client-secret: yM5mB3vB0vD6mN3aI6eM8bL1oF6rK7sR3iP4qL3hE0rC5lO2aX"
        ),
      ));
    
      $response = curl_exec($curl);
      curl_close($curl);
      $response = json_decode($response);
      $key = 0;
      foreach ($response->list as $_list) {
        $curl = curl_init('https://world.openfoodfacts.org/api/v0/product/'.$_list->gtin.'.json');
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        $responseOpen = curl_exec($curl);
        curl_close($curl);
        $responseOpen = json_decode($responseOpen);
        if ($responseOpen->status !== 0 ) {
          if (!empty($responseOpen->product->image_front_url)) {
            $name = $responseOpen->product->product_name;
            $image = $responseOpen->product->image_front_url;
            $resultTab[$key] = [$name, $image = $responseOpen->product->image_front_url];
            $key = $key + 1;
            $visib = "style='display: block'";
          }
        }
      }
    }

    if(isset($_POST['selection'])) {
        if(isset($_POST['productName'])) {
            $prod = $_POST['productName'];
            $pddprod = '';
            for ($i=0; $i<count($prod); $i++) {
                $data = [
                    'id_Party' => (int)($_SESSION['party_id']),
                    'productName' => $prod[$i]
                ];
                $prepare = $bdd->prepare('INSERT INTO boisson (id_Party, drinkName) VALUES (:id_Party, :productName)');
                $prepare->execute($data);
            }
        }
        $search = "style='display: none;'";
    }
    $data = [
        'id_Party' => (int)($_SESSION['party_id']),
    ];
    $prepare = $bdd->prepare('SELECT * FROM boisson WHERE id_Party = :id_Party ORDER BY id DESC');
    $prepare->execute($data);
    $foods = $prepare->fetchAll();

?>

<div class="besoin">
    <div class="title">
        <h2>Produit pour la soirée</h2>
        <div class="move"></div>
    </div>
    <div class="itemList">
        <?php foreach($foods as $_food): ?>
            <div class="container"><?= $_food->drinkName ?>
                <div class="point" onclick="location.href='<?= URL ?>delete?idprodb=<?php echo $_food->id; ?>'" ></div>
                <p>Something about me and my composition. </p>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="achat">
    <div class="title">
        <h2>Produits en cours d'acquisition</h2>
        <div class="move"></div>
    </div>
    <div class="itemList">
        <?php foreach($foods as $_food): ?>
            <div class="container"><?= $_food->drinkName ?>
                <div class="move_1"></div>
                <p>In order to discuss the general funct of the logo. </p>
                <div class="users">
                    <div class="user_btn"></div>
                    <div class="user_perso"></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="acquis">
    <div class="title">
        <h2>Produit acquis</h2>
        <div class="move"></div>
    </div>
    <div class="itemList">
        <?php foreach($foods as $_food): ?>
            <div class="container"><?= $_food->drinkName ?>
                <div class="move_1"></div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="background" <?php echo $search; ?>>
    <div class="popup">
        <form action="" method="get" class="present">
            <img src= '<?= URL ?>assets/images/burger.svg' alt="burger"/>
            <h2>Boissons
            <span class="close">&times;</span>
            </h2>
            <input type="search" name="product" placeholder="Search">
            <input class='sub' type="submit" name="find">
        </form>
        <form class="itemList" <?php echo $visib; ?> method="post">
            <?php for ($i=0; $i < count($resultTab); $i++):?>
                <label class="container">
                    <img class="img_food" src="<?php echo $resultTab[$i][1]; ?>">
                    <?php echo $resultTab[$i][0]; ?>
                    <input class="checkbox" name="productName[]" type="checkbox" value="<?php echo $resultTab[$i][0]; ?>">
                    <span class="checkmark"></span>
                </label>
            <?php endfor ?>
            <input type="submit" name="selection">
        </form>
    </div>
</div>