<?php
require_once "db.php";
require_once "component.php";
$con = createDb();
$holder = new \stdClass();

function getStatus() {
    global $holder;

    if (isset($holder->status)) {
        textNode($holder->status, $holder->msg);
        unset($holder->status);
    }
}

function setStatus($status, $msg) {
    global $holder;

    $holder->status = $status;
    $holder->msg = $msg;
}

function createData()
{
    $bookname = textboxValue('book_name');
    $bookpublisher = textboxValue('book_publisher');
    $bookprice = textboxValue('book_price');

    if ($bookname && $bookpublisher && $bookprice) {
        $sql = "INSERT INTO books(book_name,book_publisher,book_price) VALUES('$bookname','$bookpublisher','$bookprice')";
        mysqli_query($GLOBALS['con'], $sql);
        setStatus('success', 'Record Successfully Inserted...!');
    } else {
        setStatus('danger', 'Provide Data in the Textbox');
    }
}
function textboxValue($value)
{
    $textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if (empty($textbox)) {
        return false;
    } else {return $textbox;}
}

// messages
function textNode($classname, $msg)
{
    $element = '<div class="alert alert-'.$classname.' col-md-12"><p class=>' . $msg . '</p></div>';
    echo $element;

}

// get data from mysql database
function getData()
{
    $sql = "SELECT*FROM books";
    $result = mysqli_query($GLOBALS['con'], $sql);
    return $result;
}
