<?php
if(isset($_GET['id'])) {
//    echo "hello";
$size=8;
$alpha_key1 = '';
$alpha_key2 = '';
$no_key = '';
$keys = range('A', 'Z');
$keys1 = range(0, 9);

for ($i = 0; $i < 2; $i++) {
    $alpha_key1 .= $keys[array_rand($keys)];
}

for ($i = 2; $i < 4; $i++) {
    $no_key .= $keys1[array_rand($keys1)];
}
for ($i = 4; $i < 6; $i++) {
    $alpha_key2 .= $keys[array_rand($keys)];
}
$length = $size - 6;
$key = '';
$keys = range(0, 8);
for ($i = 0; $i < $length; $i++) {
    $key .= $keys[array_rand($keys)];
} ?>
<div class="captcha-img" id="random">
    <span class="rotate_char1"><?php echo $alpha_key1; ?></span>
    <span class="rotate_char2"><?php echo $no_key; ?></span>
    <span class="rotate_char3"><?php echo $alpha_key2 ?></span>
    <span class="rotate_char4"><?php echo $key; ?></span>
</div>

<?php }
?>
