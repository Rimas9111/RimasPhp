<?php
$rates = [
    1 => [
        'code' => 'EUR',
        'rate' => '1'
    ],
    2 => [
        'code' => 'USD',
        'rate' => '1.15'
    ],
    3 => [
        'code' => 'GBP',
        'rate' => '0.905'
    ]
];

$products = [
    1 => [
        'name' => 'Product1',
        'short-description' => 'lorem ipsum',
        'price' => '12'
    ],
    2 => [
        'name' => 'Product2',
        'short-description' => 'lorem ipsum',
        'price' => '11',
        'special-price' => "9.99"
    ],
    3 => [
        'name' => 'Product3',
        'short-description' => 'lorem ipsum',
        'price' => '14',
        'special-price' => "12.99"
    ]
];

function getRightPrice($product, $rates){
    $priceBlock = "";
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        if (isset($product['special-price'])){
            $priceBlock .= '<span class="old-price"><strike>'.convert($product['price'], $rates[$id]['rate'],$rates[$id]['code']) .' </strike></span>';
            $priceBlock .= '<span class="special-price">' .convert($product['special-price'], $rates[$id]['rate'],$rates[$id]['code']) .'</span>';
        } else {
            $priceBlock .= '<span class="special-price">' .convert($product['price'], $rates[$id]['rate'],$rates[$id]['code']) .'</span>';
        }
        return $priceBlock;

        $convertedValue = $price * $rates[$id]['rate'];
        return $convertedValue . $rates[$id]['code'];
    }else{
        return '0';
    }
}
function convert($price ,$rate, $code){
    return $price * $rate ." " .$code;
}

?>

<div class='products'>
    <?php
    foreach ($products as $product): ?>
    <div class='product'>
        <div class='name'><?php echo $product['name'] ?></div>
        <div class='short-description'><?php echo $product['short-description'] ?></div>
        <div class='price'><?php echo getRightPrice($product, $rates)?></div>
        <?php echo "<br>" ?>
    </div>
</div>
<?php endforeach; ?>

