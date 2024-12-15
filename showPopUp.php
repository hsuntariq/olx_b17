<?php

function showPopup($name)
{
    if (isset($_SESSION[$name])) {

        echo "<div class='popup' id='popup'>
            <div class='popup-header'>
                <h4>Notification</h4>
                <button class='close-btn' id='closePopup'>
                    <i class='fas fa-times'></i>
                </button>
            </div>
            <div class='popup-body'>
                <p>
                    {$_SESSION[$name]}
                </p>
            </div>
        </div>";


        unset($_SESSION[$name]);
    }
}
