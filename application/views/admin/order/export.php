<?php
require_once 'template/PHPOffice/PHPWord/PHPWord.php';
$PHPWord = new PhpWord();
$document = $PHPWord->loadTemplate('template/PHPOffice/PHPWord/order.docx');
$document->setValue('code', $item['code']);
$document->setValue('created', date('d/m/Y', $item['created']));
$document->setValue('name', $item['cus_name']);
$document->setValue('phone', $item['cus_phone']);
$document->setValue('email', $item['cus_email']);
$document->setValue('address', $item['cus_address']);
$stt = 1;
$sum_total = 0;
foreach ($detail as $d) {
    $document->setValue('stt', $stt);
    $document->setValue('product_name', $d['product'] . ' - ' . $d['color']);
    $document->setValue('qty', $d['quantity']);
    $document->setValue('price', number_format($d['price']));
    $document->setValue('total', number_format($d['quantity'] * $d['price']));
    $sum_total += $d['quantity'] * $d['price'];
    $stt++;
}
$document->setValue('sum_total', number_format($sum_total));
$document->setValue('account_name', $item['account_name']);
$document->save('export/hoa_don_dat_hang_' . $item['code'] . '.docx');
