<?php
function getProducts($nameTable)
{
    return getAssocResult("SELECT id, name_product, price, path FROM {$nameTable}");
}

function getOneProduct($nameTable, $id)
{
    return getOneResult("SELECT * FROM {$nameTable} WHERE id = {$id}");
}