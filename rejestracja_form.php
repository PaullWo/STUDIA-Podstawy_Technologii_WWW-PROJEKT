<!--Strona z logowaniem-->

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="grafika/logo.png" type="image/x-icon">
    <title>CATS GANG</title>
</head>

<body>
    <div class="tlo">
        <div class="okno">
            <div class="okno_menu" id="okno_rejestracja">
                <div class="zakoncz">
                    <a href="index.html"><img src="grafika/x.png" alt="zakoncz"></a>
                </div>
                <div id="okno_rejestracja_mniejsze">   
                    <img src="grafika/logo.png" alt="logo" id="rejestracja_logo">
                    <p id="info_rejestracja">
                        Stań się jednym z członków najbardziej niebezpiecznych gangów na świecie!<br>
                        Wybierz swoją drużynę. <b class="antywyrozniony_tekst"><br>*Pamiętaj zrób to rozsądnie, ponieważ nie można <br>
                        zrzec się z gangu bez konsekwencji.*</b><br>
                    </p>
                    
                    <div id="formularz_rejestracja">
                        <p> REJESTRACJA</p>
                        <p id="info_gangi">
                            <b class="wyrozniony_tekst">MIEJSKIE DACHOWCE</b> - pozostań z boku i zaskocz w najmniej spodziewanym momencie.<br>
                            Wyróżniasz się wielką siłą i sprytem, a swoją niezależnością imponujesz nie jednej kotce.<br>
                            Każda mysz drży na Twój widok!<br>
                            <b class="wyrozniony_tekst">RASOWA MAFIA</b> - postaw na elegancje i otaczaj się w najbardziej
                            prestiżowym środowisku.<br> Przemierzaj świat w garniturze, ale nie daj się zwieść swojej waleczności.<br>
                            Łosoś, kawior i pieniądze to coś do czego dążysz!<br>
                        </p>
                        <form action="" id="form_rejestracja">
                            <p id="wybor_p">
                                <input type="radio" name="wybor_gangu" id="wybor_dachowce" value="dachowce"> MIEJSKIE DACHOWCE
                                <input type="radio" name="wybor_gangu" id="wybor_mafia" value="mafia"> RASOWA MAFIA <br>
                            </p>
                            <p>login: <input type="text" name="rejestracja_login" id="rejestracja_login" value="login"></p>
                            <p>hasło: <input type="password" name="rejestracja_haslo" id="rejestracja_haslo" value="haslo"></p>
                            <button type="submit">Zarejestruj się</button>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</body>

</html>