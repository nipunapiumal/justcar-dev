<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>CarApi - <?php echo $car->Manufacturer->Name, ' ', $car->Model; ?></title>
    <link rel="stylesheet" type="text/css"
        href="http://yui.yahooapis.com/2.4.1/build/reset-fonts-grids/reset-fonts-grids.css">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('custom/libs/carcopyapi/css/design1.css') }}">
    <script language="JavaScript" type="text/javascript" src="{{ asset('custom/libs/carcopyapi/js/cc.js') }}"></script>
    <link rel="stylesheet" type="text/css" media="print" href="{{ asset('custom/libs/carcopyapi/css/design1p.css') }}">
    <script language="JavaScript" type="text/javascript" src="{{ asset('custom/libs/carcopyapi/js/lightbox.js') }}">
    </script>
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('custom/libs/carcopyapi/js/lightbox.js') }}">
</head>

<body>
    <a class="back" href="{{route('carcopy.result',[urlencode($thisSearchKey)])}}">zur&uuml;ck zu den Ergebnissen</a>
    <div class="carPreview">
        <h2 class="cartitle">
            <?php
            $fullCarName = trim($car->Manufacturer->Name . ' ' . $car->Model . ' ' . $car->Smodel);
            
            if (isset($car->Pictures) && isset($car->Pictures->Picture) && count($car->Pictures->Picture) > 0) {
                echo '<a href="', $car->Pictures->Picture[0]->Full->Href, '" rel="lightbox" title="', $fullCarName, '"><img alt="Bild" src="', $car->Pictures->Picture[0]->Preview->Href, '"></a>';
            }
            ?>
            <?php echo $fullCarName; ?>
        </h2>

        <div class="carnav">
            <ol class="tabs">
                <li class="active"><a
                        href="view.php?site=overview&amp;cid=<?php echo $car->Id; ?>&search=<?php echo urlencode($thisSearchKey); ?>">&Uuml;bersicht</a>
                </li>
                {{-- <li><a href="view.php?site=details&amp;cid=<?php echo $car->Id; ?>&search=<?php echo urlencode($thisSearchKey); ?>">Details</a>
                </li> --}}
                <?php if( isset($car->Pictures) && isset($car->Pictures->Picture)  && count($car->Pictures->Picture)>0 ){ ?>
                {{-- <li><a href="view.php?site=pics&amp;cid=<?php echo $car->Id; ?>&search=<?php echo urlencode($thisSearchKey); ?>">Bilder</a></li> --}}
                <?php } ?>
            </ol>
        </div>

        <div class="carcontent">

            <?php if(isset($car->Pictures) && isset($car->Pictures->Picture) && count($car->Pictures->Picture) > 0){?>

            <script type="text/javascript">
                var carPreviewPics = new Array();
                var carFullPics = new Array();


                @php
                    $picCount = 0;
                    foreach ($car->Pictures->Picture as $onePic) {
                        echo 'carPreviewPics[', $picCount, '] = "', $onePic->Preview->Href, '";';
                        echo 'carMediumPics[', $picCount, '] = "', $onePic->Medium->Href, '";';
                        echo 'carFullPics[', $picCount, '] = "', $onePic->Full->Href, '";';
                        $picCount++;
                    }
                @endphp

                preloadPictures(carPreviewPics);
                preloadPictures(carMediumPics);
                preloadPictures(carFullPics);
            </script>
            <div class="pictures">
                <div class="previewPics">
                    <?php
                    $picCount = count($car->Pictures->Picture);
                    
                    $maxPics = min([$picCount, 5]);
                    
                    for ($i = 0; $i < $maxPics; $i++) {
                        $tpic = $car->Pictures->Picture[$i];
                        echo '<a href="', $car->Pictures->Picture[$i]->Full->Href, '" rel="lightbox" title="', $fullCarName, '"><img alt="Bild ', $i + 1, '" onmouseover="changePictures(this);" src="', $tpic->Preview->Href, '"></a>';
                    }
                    if ($picCount <= 5) {
                        echo '<span class="moreLink"><a href="view.php?site=pics&amp;cid=', $car->Id, '">Mehr...</a></span>';
                    }
                    ?>
                </div>
                <div class="mainPic">
                    <a id="detailpicturelink" href="<?php echo $car->Pictures->Picture[0]->Full->Href; ?>" rel="lightbox"
                        title="<?php echo $fullCarName; ?>"><img alt="Bild 1" id="detailpicture"
                            src="<?php echo $car->Pictures->Picture[0]->Medium->Href; ?>"></a>
                </div>
                <?php if($picCount>5){ ?>
                <div class="previewPicsUnder">
                    <?php
                    $maxPics = min([$picCount, 10]);
                    
                    for ($i = 5; $i < $maxPics; $i++) {
                        $tpic = $car->Pictures->Picture[$i];
                        echo '<a href="', $car->Pictures->Picture[$i]->Full->Href, '" rel="lightbox" title="', $fullCarName, '"><img alt="Bild ', $i + 1, '" onmouseover="changePictures(this);" src="', $tpic->Preview->Href, '"></a>';
                    }
                    
                    echo '<span class="moreLink"><a href="view.php?site=pics&amp;cid=', $car->Id, '">Mehr...</a></span>';
                    ?>
                </div>
                <?php } ?>
            </div>
            <?php } ?>

            <!-- Zahlen Start -->
            <div class="shortNumbers contentBlock">

                @if(isset($CCAPI_LANG['karo'][$car->FullCategory]) && isset($CCAPI_LANG['type'][$car->Type]) )
                <h3><?php echo $CCAPI_LANG['karo'][$car->FullCategory]; ?>, <?php echo $CCAPI_LANG['type'][$car->Type]; ?></h3>
                @endif

                <div>
                    <span class="legend">Preis <?php if($car->Price->Vat==1){ ?><span class="small">(MwSt.
                            ausweisbar.)</span><?php } ?>:</span>
                    <span class="value"><?php echo number_format($car->Price->Client, 2, ',', '.'); ?> EUR</span>
                </div>

                @if(isset($car->Km))
                <div>
                    <span class="legend">Kilometerstand:</span>
                    <span class="value"><?php echo App\Http\Controllers\CarCopyController::formatKM($car->Km); ?></span>
                </div>
                @endif

                <div>
                    <span class="legend">Leistung:</span>
                    <span class="value"><?php echo App\Http\Controllers\CarCopyController::formatKW($car->Power); ?></span>
                </div>

                <div>
                    <span class="legend">Kraftstoffart:</span>
                    <span class="value"><?php echo $CCAPI_LANG['fuel'][$car->Fuel]; ?></span>
                </div>
                <?php
					if(
            			$car->FuelConsumption->Combined!=0 &&
                        $car->FuelConsumption->City!=0 &&
                        $car->FuelConsumption->Country!=0 &&
                        $car->Co2!=0
                    ) {
					?>
                <div>
                    <span class="legend">Kraftstoffverbr. kombiniert:</span>
                    <span class="value">ca. <?php echo number_format($car->FuelConsumption->Combined, 1, ',', '.'); ?> l/100km</span>
                </div>

                <div>
                    <span class="legend">Kraftstoffverbr. innerorts:</span>
                    <span class="value">ca. <?php echo number_format($car->FuelConsumption->City, 1, ',', '.'); ?> l/100km</span>
                </div>

                <div>
                    <span class="legend">Kraftstoffverbr. au&szlig;erorts:</span>
                    <span class="value">ca. <?php echo number_format($car->FuelConsumption->Country, 1, ',', '.'); ?> l/100km</span>
                </div>

                <div>
                    <span class="legend">CO2-Emissionen kombiniert:</span>
                    <span class="value">ca. <?php echo number_format($car->Co2, 0, ',', '.'); ?> g/km</span>
                </div>
                <?php
                    }
					?>
                <div>
                    <span class="legend">Erstzulassung:</span>
                    <span class="value"><?php echo App\Http\Controllers\CarCopyController::formatEZ($car->RegDate); ?></span>
                </div>
            </div>
            <!-- / Zahlen Ende -->


            <!-- Ausstattung Start -->
            <div class="shortAccs contentBlock">
                <h4>Ausstattung:</h4>
                <div>
                    <?php
                    
                    $text = App\Http\Controllers\CarCopyController::formatAccs($car->AccsList->Accs, $CCAPI_LANG);
                    
                    if (strlen($text) > 270) {
                        $wrapText = wordwrap($text, 250, "\n");
                        $arrWrap = explode("\n", $wrapText);
                        $text = array_shift($arrWrap);
                        $text .= ' [...]';
                    }
                    
                    echo $text;
                    
                    // ABS, Allradantrieb, Einparkhilfe, El. Fensterheber, El. Wegfahrsperre, Garantie, HU & AU neu, Lederausstattung, Leichtmetallfelgen, Metallic, Navigationssystem, Scheckheftgepflegt, Schiebedach, Sitzheizung, Stabilit&auml;tskontrolle, Tempomat, Xenonscheinwerfer, Zentralverriegelung
                    
                    ?>
                </div>
            </div>
            <!-- / Ausstattung Ende -->


            <!-- Beschreibung Start -->
            <div class="shortDescr contentBlock">
                <?php
                
                $text = '';
                if ($car->Freetext->Default != '' || $car->Freetext->Hpm != '') {
                    // Default Text
                    if ($car->Freetext->Default != '') {
                        $text .= $car->Freetext->Default;
                    }
                
                    // HPM Text
                    if ($car->Freetext->Hpm != '') {
                        $text .= ' ' . $car->Freetext->Hpm;
                    }
                
                    $text = trim($text);
                }
                
                if (strlen($text) > 130) {
                    $wrapText = wordwrap($text, 100, "\n");
                    $arrWrap = explode("\n", $wrapText);
                    $text = array_shift($arrWrap);
                    $text .= ' [...]';
                }
                
                if ($text != '') {
                    echo '					<h4>Fahrzeugbeschreibung:</h4>
                                    				<div>';
                    echo $text;
                    echo '</div>';
                }
                
                // ABS, Allradantrieb, Einparkhilfe, El. Fensterheber, El. Wegfahrsperre, Garantie, HU & AU neu, Lederausstattung, Leichtmetallfelgen, Metallic, Navigationssystem, Scheckheftgepflegt, Schiebedach, Sitzheizung, Stabilit&auml;tskontrolle, Tempomat, Xenonscheinwerfer, Zentralverriegelung
                
                ?>
                {{-- <span class="moreLink"><a href="view.php?site=details&amp;cid=<?php echo $car->Id; ?>">Mehr...</a></span> --}}
            </div>
            <!-- / Beschreibung Ende -->


            <!-- Kontakt Formular -->
            {{-- <div class="contact contentBlock">
                <h4>Kontakt</h4>
                <form action="contact.php" method="post">
                    <input type="hidden" name="cid" value="<?php echo intval($cid); ?>">
                    <input type="hidden" name="search" value="<?php echo urlencode($thisSearchKey); ?>">

                    <fieldset class="adress">
                        <legend>Anrede</legend>

                        <input name="adress" type="radio" value="Frau" id="adress_f">
                        <label for="adress_f">Frau</label>

                        <input name="adress" type="radio" value="Herr" id="adress_m">
                        <label for="adress_m">Herr</label>

                        <input name="adress" type="radio" value="Firma" id="adress_c">
                        <label for="adress_c">Firma</label>
                    </fieldset>

                    <div class="row">
                        <label for="name">Ihr Name:</label>
                        <input type="text" name="name" id="name">
                    </div>

                    <div class="row">
                        <label for="email">Ihre eMail-Adresse <span class="small">(Falls
                                verf&uuml;gbar)</span>:</label>
                        <input type="text" name="email" id="email">
                    </div>

                    <div class="tel">
                        <div class="col2 col">
                            <label for="intpresel">Int. Vorwahl</label>
                            <select name="intpresel" id="intpresel">
                                <option value="0049">Deutschland (+49)</option>
                                <option value="0043">&Ouml;sterreich (+43)</option>
                                <option value="0041">Schweiz (+41)</option>
                            </select>
                        </div>

                        <div class="col1 col">
                            <label for="natpresel">Vorwahl:</label>
                            <input type="text" name="natpresel" id="natpresel">
                        </div>

                        <div class="col2 col">
                            <label for="telnum">Telefonnummer:</label>
                            <input type="text" name="telnum" id="telnum">
                        </div>
                    </div>

                    <div class="msgrow">
                        <label for="message">Ihre Nachricht:</label>
                        <textarea name="message" id="message" cols="35" rows="6"></textarea>
                    </div>

                    <div class="submit row">
                        <input type="reset">
                        <input type="submit">
                    </div>
                </form>
            </div> --}}
            <!-- / Kontakt Ende -->


            {{-- <div id="tools">
                <a href="#tools" onclick="print();" class="print">Drucken</a>
            </div> --}}
        </div>
    </div>
</body>

</html>
