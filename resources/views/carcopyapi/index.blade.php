<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>KFZ Suche</title>
    <link rel="stylesheet" type="text/css"
        href="http://yui.yahooapis.com/2.4.1/build/reset-fonts-grids/reset-fonts-grids.css">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('custom/libs/carcopyapi/css/design1.css') }}">
    <script language="JavaScript" type="text/javascript" src="{{ asset('custom/libs/carcopyapi/js/cc.js') }}"></script>
    <link rel="stylesheet" type="text/css" media="print" href="{{ asset('custom/libs/carcopyapi/css/design1p.css') }}">
</head>

<body>
    <a class="back" href="search.php">Suche neustarten</a>

    <div class="SearchForm">
        <h2>CarApi KFZ Suche</h2>
        <form action="{{route('carcopy.search')}}" method="post">
            @csrf
            <fieldset class="allgemein">
                <legend>Allgemeine Angaben</legend>

                <label for="make">Marke</label>
                <select id="make" name="make" tabindex="100">
                    <?php echo App\Http\Controllers\CarCopyController::generateOption('make', $dropdownData['manufacturer'], '', [], $filterRequest); ?>
                </select>

                <label for="kfzkat">Fahrzeugkategorie</label>
                <select id="kfzkat" name="kfzkat" tabindex="104">
                    <?php echo App\Http\Controllers\CarCopyController::generateOption('kfzkat', $dropdownData['type'], '', $CCAPI_LANG['type'], $filterRequest); ?>
                </select><br />

                <label for="model">Modell</label>
                <select id="model" name="model" tabindex="101">
                    <?php echo App\Http\Controllers\CarCopyController::generateOption('model', $dropdownData['model'], '', [], $filterRequest); ?>
                </select>

                <label for="karoform">Karosserieform</label>
                <select id="karoform" name="karoform" tabindex="105">
                    <?php echo App\Http\Controllers\CarCopyController::generateOption('karoform', $dropdownData['karoform'], '', [], $filterRequest); ?>
                </select><br />

                <label for="version">Version</label>
                <input id="version" name="version" tabindex="102">

                <label for="getriebe">Getriebe</label>
                <select id="getriebe" name="getriebe" tabindex="106">
                    <?php echo App\Http\Controllers\CarCopyController::generateOption('getriebe', $dropdownData['getriebe'], '', $CCAPI_LANG['gearbox'], $filterRequest); ?>
                </select><br />

                <label for="fuel">Kraftstoff</label>
                <select id="fuel" name="fuel" tabindex="103">
                    <?php echo App\Http\Controllers\CarCopyController::generateOption('fuel', $dropdownData['fuel'], '', $CCAPI_LANG['fuel'], $filterRequest); ?>
                </select><br />

                <br />

                <label for="kw_from">Leistung</label>
                <select class="half" id="kw_from" name="kw_from" tabindex="110">
                    <?php echo App\Http\Controllers\CarCopyController::generateOption('kw_from', $dropdownData['power'], 'formatKW', [], $filterRequest); ?>
                </select>
                <select class="half_outer" id="kw_to" name="kw_to" tabindex="111">
                    <?php echo App\Http\Controllers\CarCopyController::generateOption('kw_to', $dropdownData['power'], 'formatKW', [], $filterRequest); ?>
                </select>

                <label for="accidentcar">Unfallwagen</label>
                <input type="checkbox" id="accidentcar" name="accidentcar" value="1" class="quarter_outer"
                    tabindex="118" <?php echo App\Http\Controllers\CarCopyController::isCheckboxChecked($filterRequest, 'accidentcar'); ?> /><br />


                <label for="ez_from">Erstzulassung</label>
                <select class="half" id="ez_from" name="ez_from" tabindex="112">
                    <?php echo App\Http\Controllers\CarCopyController::generateOption('ez_from', $dropdownData['regdate'], 'formatDate', [], $filterRequest); ?>
                </select>
                <select class="half_outer" id="ez_to" name="ez_to" tabindex="113">
                    <?php echo App\Http\Controllers\CarCopyController::generateOption('ez_to', $dropdownData['regdate'], 'formatDate', [], $filterRequest); ?>
                </select>
                <br />

                <label for="km_from">Kilometerstand</label>
                <select class="half" id="km_from" name="km_from" tabindex="114">
                    <?php echo App\Http\Controllers\CarCopyController::generateOption('km_from', $dropdownData['km'], '', [], $filterRequest); ?>
                </select>
                <select class="half_outer" id="km_to" name="km_to" tabindex="115">
                    <?php echo App\Http\Controllers\CarCopyController::generateOption('km_to', $dropdownData['km'], '', [], $filterRequest); ?>
                </select>
                <br />

                <label for="acolor">Au&szlig;enfarbe</label>
                <select id="acolor" name="acolor" tabindex="116">
                    <?php echo App\Http\Controllers\CarCopyController::generateOption('acolor', $dropdownData['colors'], '', $CCAPI_LANG['colors'], $filterRequest); ?>
                </select>

                <label for="colormetallic">Metallic<input type="hidden" name="colormetallic" value="0"></label>
                <input type="checkbox" id="colormetallic" name="colormetallic" value="1" class="quarter_outer"
                    tabindex="119" <?php echo App\Http\Controllers\CarCopyController::isCheckboxChecked($filterRequest, 'colormetallic'); ?> /><br />

                <hr />

                <label for="ep_from">Endpreis (&euro;)</label>
                <select class="half" id="ep_from" name="ep_from" tabindex="120">
                    <?php echo App\Http\Controllers\CarCopyController::generateOption('ep_from', $dropdownData['price'], ' &euro;', [], $filterRequest); ?>
                </select>
                <select class="half_outer" id="ep_to" name="ep_to" tabindex="121">
                    <?php echo App\Http\Controllers\CarCopyController::generateOption('ep_to', $dropdownData['price'], ' &euro;', [], $filterRequest); ?>
                </select><br />

            </fieldset>

            <input type="submit" value="Ergebnisse Anzeigen" name="submit" class="submit" tabindex="127" />
            <br style="clear:both;" />



            <fieldset class="accs">
                <legend>Ausstattung</legend>

                <div class="title">Komfort</div>
                <div class="title">Sicherheit</div>
                <div class="title">Au&szlig;en</div>

                <br />
                <hr />

                <input type="checkbox" id="accs_K05" name="accs[K05]" value="1" class="chbox"
                    tabindex="130" <?php echo App\Http\Controllers\CarCopyController::isCheckboxChecked($_POST_accs, 'K05'); ?> />
                <label for="accs_K05">Elektr. Fensterheber</label>

                <input type="checkbox" id="accs_S24" name="accs[S24]" value="1" class="chbox"
                    tabindex="140" <?php echo App\Http\Controllers\CarCopyController::isCheckboxChecked($_POST_accs, 'S24'); ?> />
                <label for="accs_S24">Alarmanlage</label>

                <input type="checkbox" id="accs_F12" name="accs[F12]" value="1" class="chbox"
                    tabindex="150" <?php echo App\Http\Controllers\CarCopyController::isCheckboxChecked($_POST_accs, 'F12'); ?> />
                <label for="accs_F12">Alufelgen</label>

                <br />

                <input type="checkbox" id="accs_I08" name="accs[I08]" value="1" class="chbox"
                    tabindex="131" <?php echo App\Http\Controllers\CarCopyController::isCheckboxChecked($_POST_accs, 'I08'); ?> />
                <label for="accs_I08">Elektrische Sitze</label>

                <input type="checkbox" id="accs_S12" name="accs[S12]" value="1" class="chbox"
                    tabindex="141" <?php echo App\Http\Controllers\CarCopyController::isCheckboxChecked($_POST_accs, 'S12'); ?> />
                <label for="accs_S12">Airbag</label>

                <input type="checkbox" id="accs_V02" name="accs[V02]" value="1" class="chbox"
                    tabindex="151" <?php echo App\Http\Controllers\CarCopyController::isCheckboxChecked($_POST_accs, 'V02'); ?> />
                <label for="accs_V02">Anh&auml;ngerkupplung</label>

                <br />

                <input type="checkbox" id="accs_K01" name="accs[K01]" value="1" class="chbox"
                    tabindex="132" <?php echo App\Http\Controllers\CarCopyController::isCheckboxChecked($_POST_accs, 'K01'); ?> />
                <label for="accs_K01">Klima</label>

                <input type="checkbox" id="accs_S13" name="accs[S13]" value="1" class="chbox"
                    tabindex="142" <?php echo App\Http\Controllers\CarCopyController::isCheckboxChecked($_POST_accs, 'S13'); ?> />
                <label for="accs_S13">Beifahrer Airbag</label>

                <input type="checkbox" id="accs_D08" name="accs[D08]" value="1" class="chbox"
                    tabindex="152" <?php echo App\Http\Controllers\CarCopyController::isCheckboxChecked($_POST_accs, 'D08'); ?> />
                <label for="accs_D08">Dachtr&auml;ger</label>

                <br />

                <input type="checkbox" id="accs_K02" name="accs[K02]" value="1" class="chbox"
                    tabindex="133" <?php echo App\Http\Controllers\CarCopyController::isCheckboxChecked($_POST_accs, 'K02'); ?> />
                <label for="accs_K02">Klimaautomatik</label>

                <input type="checkbox" id="accs_S15" name="accs[S15]" value="1" class="chbox"
                    tabindex="143" <?php echo App\Http\Controllers\CarCopyController::isCheckboxChecked($_POST_accs, 'S15'); ?> />
                <label for="accs_S15">Seitenairbags</label>

                <input type="checkbox" id="accs_S02" name="accs[S02]" value="1" class="chbox"
                    tabindex="153" <?php echo App\Http\Controllers\CarCopyController::isCheckboxChecked($_POST_accs, 'S02'); ?> />
                <label for="accs_S02">Nebelscheinwerfer</label>

                <br />

                <input type="checkbox" id="accs_I04" name="accs[I04]" value="1" class="chbox"
                    tabindex="134" <?php echo App\Http\Controllers\CarCopyController::isCheckboxChecked($_POST_accs, 'I04'); ?> />
                <label for="accs_I04">Lederausstattung</label>

                <input type="checkbox" id="accs_S252" name="accs[S25]" value="2" class="chbox"
                    tabindex="144" <?php echo App\Http\Controllers\CarCopyController::isCheckboxChecked($_POST_accs, 'S25', 2); ?> />
                <label for="accs_S252">Wegfahrsperre</label>

                <input type="checkbox" id="accs_E11" name="accs[E11]" value="1" class="chbox"
                    tabindex="154" <?php echo App\Http\Controllers\CarCopyController::isCheckboxChecked($_POST_accs, 'E11'); ?> />
                <label for="accs_E11">Park Distance Control</label>

                <br />

                <input type="checkbox" id="accs_K07" name="accs[K07]" value="1" class="chbox"
                    tabindex="135" <?php echo App\Http\Controllers\CarCopyController::isCheckboxChecked($_POST_accs, 'K07'); ?> />
                <label for="accs_K07">Sitzheizung</label>

                <input type="checkbox" id="accs_V28" name="accs[V28]" value="1" class="chbox"
                    tabindex="145" <?php echo App\Http\Controllers\CarCopyController::isCheckboxChecked($_POST_accs, 'V28'); ?> />
                <label for="accs_V28">Zentralverriegelung</label>

                <input type="checkbox" id="accs_D012" name="accs[D01]" value="2" class="chbox"
                    tabindex="155" <?php echo App\Http\Controllers\CarCopyController::isCheckboxChecked($_POST_accs, 'D01'); ?> />
                <label for="accs_D012">Schiebedach</label>

                <br />

                <div style="float:left; width:460px;">&nbsp;</div>

                <input type="checkbox" id="accs_S01" name="accs[S01]" value="1" class="chbox"
                    tabindex="156" <?php echo App\Http\Controllers\CarCopyController::isCheckboxChecked($_POST_accs, 'S01'); ?> />
                <label for="accs_S01">Xenonscheinwerfer</label>


                <br />
                <hr />
                <div class="title">Elektronik</div>
                <div class="title">Fahreigenschaften</div>
                <div class="title">Weitere</div>

                <br />
                <hr />

                <input type="checkbox" id="accs_E08" name="accs[E08]" value="1" class="chbox"
                    tabindex="160" <?php echo App\Http\Controllers\CarCopyController::isCheckboxChecked($_POST_accs, 'E08'); ?> />
                <label for="accs_E08">Bordcomputer</label>

                <input type="checkbox" id="accs_F01" name="accs[F01]" value="1" class="chbox"
                    tabindex="170" <?php echo App\Http\Controllers\CarCopyController::isCheckboxChecked($_POST_accs, 'F01'); ?> />
                <label for="accs_F01">ABS</label>

                <input type="checkbox" id="accs_V03" name="accs[V03]" value="1" class="chbox"
                    tabindex="180" <?php echo App\Http\Controllers\CarCopyController::isCheckboxChecked($_POST_accs, 'V03'); ?> />
                <label for="accs_V03">Behindertengerecht</label>

                <br />

                <input type="checkbox" id="accs_E12" name="accs[E12]" value="1" class="chbox"
                    tabindex="161" <?php echo App\Http\Controllers\CarCopyController::isCheckboxChecked($_POST_accs, 'E12'); ?> />
                <label for="accs_E12">Navigationssystem</label>

                <input type="checkbox" id="accs_F06" name="accs[F06]" value="1" class="chbox"
                    tabindex="171" <?php echo App\Http\Controllers\CarCopyController::isCheckboxChecked($_POST_accs, 'F06'); ?> />
                <label for="accs_F06">Allrad</label>

                <br />

                <input type="checkbox" id="accs_E01" name="accs[E01]" value="1" class="chbox"
                    tabindex="162" <?php echo App\Http\Controllers\CarCopyController::isCheckboxChecked($_POST_accs, 'E01'); ?> />
                <label for="accs_E01">Radio</label>

                <input type="checkbox" id="accs_F07" name="accs[F07]" value="1" class="chbox"
                    tabindex="172" <?php echo App\Http\Controllers\CarCopyController::isCheckboxChecked($_POST_accs, 'F07'); ?> />
                <label for="accs_F07">elektr. Stabilit&auml;tsprog. (ESP)</label>

                <br />

                <input type="checkbox" id="accs_E03" name="accs[E03]" value="1" class="chbox"
                    tabindex="163" <?php echo App\Http\Controllers\CarCopyController::isCheckboxChecked($_POST_accs, 'E03'); ?> />
                <label for="accs_E03">Radio/CD</label>

                <input type="checkbox" id="accs_F15" name="accs[F15]" value="1" class="chbox"
                    tabindex="173" <?php echo App\Http\Controllers\CarCopyController::isCheckboxChecked($_POST_accs, 'F15'); ?> />
                <label for="accs_F15">Servolenkung</label>

                <br />

                <input type="checkbox" id="accs_E13" name="accs[E13]" value="1" class="chbox"
                    tabindex="164" <?php echo App\Http\Controllers\CarCopyController::isCheckboxChecked($_POST_accs, 'E13'); ?> />
                <label for="accs_E13">Tempomat</label>

                <input type="checkbox" id="accs_F18" name="accs[F18]" value="1" class="chbox"
                    tabindex="174" <?php echo App\Http\Controllers\CarCopyController::isCheckboxChecked($_POST_accs, 'F18'); ?> />
                <label for="accs_F18">Traktionskontrolle</label>


                <br />

            </fieldset>
            <input type="submit" value="Ergebnisse Anzeigen" name="submit" class="submit" tabindex="180" />
            <br style="clear:both;" />
        </form>
    </div>

</body>

</html>
