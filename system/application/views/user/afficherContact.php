<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="contact">
    <h1>الإتصـــال بنـــا:</h1>
    <form id="ContactForm" action="">
        <p>
            <label>الإســــم :</label>
            <input id="name" name="name" class="inplaceError" maxlength="120" type="text" autocomplete="off"/>
            <span class="error" style="display:none;"></span>
        </p>
        <p>
            <label>البريد الإلكتروني :</label>
            <input id="email" name="email" class="inplaceError" maxlength="120" type="text" autocomplete="off"/>
            <span class="error" style="display:none;"></span>
        </p>
        <p>
            <label>الموقع <span>(اختياري)</span></label>
            <input id="website" name="website" class="inplaceError" maxlength="120" type="text" autocomplete="off"/>
        </p>
        <p>
            <label>النـــص :<br /> <span>مسموح ب300 حرف</span></label>
            <textarea id="message" name="message" class="inplaceError" cols="6" rows="5" autocomplete="off"></textarea>
            <span class="error" style="display:none;"></span>
        </p>
        <p class="submit">
            <input id="send" type="button" value="Submit"/>
            <span id="loader" class="loader" style="display:none;"></span>
            <span id="success_message" class="success"></span>
        </p>
        <input id="newcontact" name="newcontact" type="hidden" value="1"></input>
    </form>
</div>