<?php

function inputElement($icon, $placeholder, $name, $value = "")
{
    $ele = '
        <div class="input-group mb-3">
    <span class="input-group-text bg-warning" id="basic-addon1">' . $icon . '</span>
    <input type="text" name=' . $name . ' value="' . $value . '" autocomplete="off" placeholder="' . $placeholder . '" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
        </div>
   ';
    echo $ele;

}
function buttonElement($btnid, $styleclass, $text, $name, $attr)
{
    $btn = '
        <button id=' . $btnid . ' class="' . $styleclass . '" name=' . $name . ' ' . $attr . '>' . $text . '</button>
    ';
    echo $btn;
}
