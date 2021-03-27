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

// update data
function UpdateData(){
    $bookid = textboxValue("book_id");
    $bookname = textboxValue("book_name");
    $bookpublisher = textboxValue("book_publisher");
    $bookprice = textboxValue("book_price");

    if($bookname && $bookpublisher && $bookprice){
        $sql = "
                    UPDATE books SET book_name='$bookname', book_publisher = '$bookpublisher', book_price = '$bookprice' WHERE id='$bookid';                    
        ";

       mysqli_query($GLOBALS['con'], $sql);
            setStatus("success", "Data Successfully Updated");
    
            setStatus("danger", "Enable to Update Data");
        

    }else{
        setStatus("danger", "Select Data Using Edit Icon");
    }


}


function deleteRecord(){
    $bookid = (int)textboxValue("book_id");

    $sql = "DELETE FROM books WHERE id=$bookid";

    mysqli_query($GLOBALS['con'], $sql);
        setStatus("success","Record Deleted Successfully...!");
    
        setStatus("danger","Enable to Delete Record...!");
    

}


function deleteBtn(){
    $result = getData();
    $i = 0;
    if($result){
        while ($row = mysqli_fetch_assoc($result)){
            $i++;
            if($i > 3){
                buttonElement("btn-deleteall", "btn btn-danger" ,"<i class='fas fa-trash'></i> Delete All", "deleteall", "");
                return;
            }
        }
    }
}


function deleteAll(){
    $sql = "DROP TABLE books";

    mysqli_query($GLOBALS['con'], $sql);
        setStatus("success","All Record deleted Successfully...!");
        createDb();
  
        setStatus("danger","Something Went Wrong Record cannot deleted...!");
  }


// set id to textbox
function setID(){
    $getid = getData();
    $id = 0;
    if($getid){
        while ($row = mysqli_fetch_assoc($getid)){
            $id = $row['id'];
        }
    }
    return ($id + 1);
}